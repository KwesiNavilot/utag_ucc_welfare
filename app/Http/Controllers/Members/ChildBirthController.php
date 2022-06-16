<?php

namespace App\Http\Controllers\Members;

use App\Events\BenefitRequestEvent;
use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Traits\Essentials;
use Illuminate\Support\Facades\Storage;

class ChildBirthController extends Controller
{
    use Essentials;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('members.childbirth.create');
//        return redirect()->route('members.childbirth.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
//        if($request->user()->cannot('requestForChildBirthBenefit', BenefitRequest::class)){
//            $toast = [
//                'type' => 'warning',
//                'message' => "You can't request for more than 2 Child Birth benefits"
//            ];
//
//            return redirect()->back()->with('toast', $toast);
//        }

        $children = Child::where([
                ['member_id', Auth::id()],
                ['status', '<>', 'deceased']
            ])
            ->get(['child_id', 'firstname', 'lastname']);

//        dd($children);

        return view('members.childbirth.create')->with('children', $children);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'child' => ['required', 'string', 'min:2', 'max:50'],
            'birth_certificate' => ['required', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = BenefitRequest::create([
            'request_id' => $this->generateRequestId(),
            'member_id' => Auth::id(),
            'child_id' => $request->child,
            'request_type' => 'Child Birth',
            'media' => $request->birth_certificate->store('childbirths', 'public')
        ]);

        $benefitRequest = $benefitRequest->load('user');

        event(new BenefitRequestEvent($benefitRequest));

        $toast = [
            'type' => 'success',
            'message' => 'You have successfully requested benefit'
        ];

        return redirect()->route('members.requests')->with('toast', $toast);
    }

    /**
     * Display the specified resource.
     *
     * @param $request_id
     * @return Response
     */
    public function show($request_id)
    {
        $request = BenefitRequest::findOrFail($request_id)->load('child');

        return view('members.childbirth.show')->with('request', $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $request_id
     * @return Response
     */
    public function edit($request_id)
    {
        $request = BenefitRequest::findOrFail($request_id);
        return view('members.childbirth.edit')->with('request', $request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $request_id
     * @return Response
     */
    public function update(Request $request, $request_id)
    {
//        dd($request);

        $this->validate($request, [
            'child' => ['required', 'string', 'min:2', 'max:50'],
            'birth_certificate' => ['sometimes', 'required', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = tap(BenefitRequest::findOrFail($request_id))->update([
            'child' => $request->child_id,
        ]);

        if ($request->hasFile('birth_certificate')) {
            $this->updateMedia($benefitRequest);
        }

        $toast = [
            'type' => 'success',
            'message' => 'You have successfully updated the benefit request'
        ];

        return redirect()->route('members.childbirth.show', $request_id)->with('toast', $toast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $request_id
     * @return Response
     */
    public function destroy($request_id)
    {
        $request = BenefitRequest::findOrFail($request_id);

        //check if there is a media for the request and delete the file(s)
        if (isset($request->media)) {
            Storage::disk('public')->delete($request->media);
        }

        $request->delete();

        $toast = [
            'type' => 'success',
            'message' => "Benefit request deleted successfully"
        ];

        return redirect()->route('members.requests')->with('toast', $toast);
    }
}

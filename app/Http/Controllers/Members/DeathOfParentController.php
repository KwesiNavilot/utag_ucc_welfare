<?php

namespace App\Http\Controllers\Members;

use App\Events\BenefitRequestEvent;
use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Parents;
use App\Traits\Essentials;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DeathOfParentController extends Controller
{
    use Essentials;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return redirect()->route('deathofparent.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if($request->user()->cannot('requestForDeathOfParentBenefit', BenefitRequest::class)){
            $toast = [
                'type' => 'warning',
                'message' => "You can't request for more than 2 Death of Parent benefits"
            ];

            return redirect()->route('members.requests')->with('toast', $toast);
        }

        $parents = Parents::where([
                ['member_id', Auth::id()],
                ['status', '<>', 'deceased']
            ])
            ->get(['parent_id', 'firstname', 'lastname']);

        return view('members.deathofparent.create')->with('parents', $parents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//                dd($request);
        $this->validate($request, [
            'parent' => ['required', 'string', 'min:2', 'max:50'],
            'funeral_date' => ['required', 'date'],
            'publish' => ['required', 'string'],
            'poster' => ['required', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = BenefitRequest::create([
            'request_id' => $this->generateRequestId(),
            'member_id' => Auth::id(),
            'parent_id' => $request->parent,
            'request_type' => 'Death of Parent',
            'funeral_date' => $request->funeral_date,
            'publish' => $request->publish,
            'media' => $request->poster->store('deathofparents', 'public')
        ]);

        $benefitRequest = $benefitRequest->load('user');

        event(new BenefitRequestEvent($benefitRequest));

        $toast = [
            'type' => 'success',
            'message' => 'You have successfully requested for benefit'
        ];

        return redirect()->route('members.requests')->with('toast', $toast);
    }

    /**
     * Display the specified resource.
     *
     * @param  $request_id
     * @return Response
     */
    public function show($request_id)
    {
        $request = BenefitRequest::findOrFail($request_id);
        $parent = Parents::where('parent_id', $request->parent_id)
                            ->get(['firstname', 'lastname', 'relation'])
                            ->first();

//        dd($request);
//        dd($parent);
        return view('members.deathofparent.show')
                ->with([
                    'request' => $request,
                    'parent' => $parent
                ]);
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
        $parent = Parents::where('parent_id', $request->parent_id)
            ->get(['firstname', 'lastname', 'parent_id'])
            ->first();

        return view('members.deathofparent.edit')
                    ->with([
                        'request' => $request,
                        'parent' => $parent
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BenefitRequest $benefitRequest
     * @return Response
     */
    public function update(Request $request, $request_id)
    {
//        dd($request);
        $this->validate($request, [
            'funeral_date' => ['required', 'date'],
            'parent' => ['required', 'string', 'min:2', 'max:50'],
            'publish' => ['required', 'string'],
            'poster' => ['sometimes', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = tap(BenefitRequest::findOrFail($request_id))->update([
            'funeral_date' => $request->funeral_date,
            'parent_name' => $request->parent_name,
            'publish' => $request->publish
        ]);

        if ($request->hasFile('poster')) {
            $this->updateMedia($benefitRequest);
        }

        $toast = [
            'type' => 'success',
            'message' => 'You have successfully updated the benefit request'
        ];

        return redirect()->route('members.deathofparent.show', $request_id)->with('toast', $toast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BenefitRequest $benefitRequest
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

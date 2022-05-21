<?php

namespace App\Http\Controllers\Members;

use App\Events\BenefitRequestEvent;
use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Traits\Essentials;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RetirementController extends Controller
{
    use Essentials;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('members.deathofparent.create');
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

            return redirect()->back()->with('toast', $toast);
        }

        return view('members.deathofparent.create');
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
            'funeral_date' => ['required', 'date'],
            'parent_name' => ['required', 'string', 'min:2', 'max:50'],
            'relation' => ['required', 'string'],
            'publish' => ['required', 'string'],
            'poster' => ['required', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = BenefitRequest::create([
            'request_id' => $this->generateRequestId(),
            'staff_id' => Auth::id(),
            'request_type' => 'Death of Parent',
            'funeral_date' => $request->funeral_date,
            'parent_name' => $request->parent_name,
            'relation' => $request->relation,
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
//        dd($request_id);
        $request = BenefitRequest::findOrFail($request_id);
        return view('members.deathofparent.show')->with('request', $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $request_id
     * @return Response
     */
    public function edit($request_id)
    {
//        dd($benefitRequest);
        $request = BenefitRequest::findOrFail($request_id);
        return view('members.deathofparent.edit')->with('request', $request);
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
            'parent_name' => ['required', 'string', 'min:2', 'max:50'],
            'relation' => ['required', 'string', Rule::in(['mother', 'father'])],
            'publish' => ['required', 'string'],
            'uploadNewImage' => ['required', 'string'],
            'poster' => ['sometimes', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = tap(BenefitRequest::findOrFail($request_id))->update([
            'funeral_date' => $request->funeral_date,
            'parent_name' => $request->parent_name,
            'relation' => $request->relation,
            'publish' => $request->publish
        ]);

        if ($request->hasFile('poster')) {
            $this->updateMedia($benefitRequest);
        }

        $toast = [
            'type' => 'success',
            'message' => 'You have successfully updated the benefit request'
        ];

        return redirect()->route('deathofparent.show', $request_id)->with('toast', $toast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BenefitRequest $benefitRequest
     * @return Response
     */
    public function destroy(BenefitRequest $benefitRequest)
    {
        //
    }
}

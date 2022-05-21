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
//        return redirect()->route('retirement.create');
        return view('members.retirement.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
//        if($request->user()->cannot('requestForDeathOfParentBenefit', BenefitRequest::class)){
//            $toast = [
//                'type' => 'warning',
//                'message' => "You can't request for more than 2 Death of Parent benefits"
//            ];
//
//            return redirect()->route('members.requests')->with('toast', $toast);
//        }

        return view('members.retirement.create');
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
            'retirement_date' => ['required', 'date'],
            'publish' => ['required', 'string']
        ]);

        $benefitRequest = BenefitRequest::create([
            'request_id' => $this->generateRequestId(),
            'staff_id' => Auth::id(),
            'request_type' => 'Retirement',
            'retirement_date' => $request->retirement_date,
            'publish' => $request->publish
        ]);

        $benefitRequest = $benefitRequest->load('user');

        event(new BenefitRequestEvent($benefitRequest));

        $toast = [
            'type' => 'success',
            'message' => 'You have successfully requested for the benefit'
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
        return view('members.retirement.show')->with('request', $request);
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
//        dd($request);
        return view('members.retirement.edit')->with('request', $request);
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
            'retirement_date' => ['required', 'date']
        ]);

        $benefitRequest = tap(BenefitRequest::findOrFail($request_id))->update([
            'retirement_date' => $request->retiment_date
        ]);

//        if ($request->hasFile('poster')) {
//            $this->updateMedia($benefitRequest);
//        }

        $toast = [
            'type' => 'success',
            'message' => 'You have successfully updated the benefit request'
        ];

        return redirect()->route('retirement.show', $request_id)->with('toast', $toast);
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

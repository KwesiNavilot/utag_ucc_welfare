<?php

namespace App\Http\Controllers\Members;

use App\Events\BenefitRequestEvent;
use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Spouse;
use App\Traits\Essentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeathOfSpouseController extends Controller
{
    use Essentials;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('deathofspouse.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->user()->cannot('requestForDeathOfSpouseBenefit', BenefitRequest::class)){
            $toast = [
                'type' => 'warning',
                'message' => "You can't request for more than 1 Spousal benefits"
            ];

            return redirect()->route('members.requests')->with('toast', $toast);
        }

//        dd(Auth::user()->spouse);

        return view('members.deathofspouse.create')->with('spouse', );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'funeral_date' => ['required', 'date'],
            'spouse_name' => ['required', 'string', 'min:2', 'max:50'],
            'relation' => ['nullable', 'string'],
            'publish' => ['required', 'string'],
            'poster' => ['required', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = BenefitRequest::create([
            'request_id' => $this->generateRequestId(),
            'member_id' => Auth::id(),
            'request_type' => 'Death of Spouse',
            'funeral_date' => $request->funeral_date,
            'spouse_name' => $request->spouse_name,
//            'relation' => $request->relation,
            'publish' => $request->publish,
            'media' => $request->poster->store('deathofspouses', 'public')
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
     * @param  \App\Models\Spouse  $deathOfSpouse
     * @return \Illuminate\Http\Response
     */
    public function show($request_id)
    {
        $request = BenefitRequest::findOrFail($request_id);
        return view('members.deathofspouse.show')->with('request', $request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spouse  $deathOfSpouse
     * @return \Illuminate\Http\Response
     */
    public function edit($request_id)
    {
        $request = BenefitRequest::findOrFail($request_id);
        return view('members.deathofspouse.edit')->with('request', $request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spouse  $deathOfSpouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $request_id)
    {
        //        dd($request);
        $this->validate($request, [
            'funeral_date' => ['required', 'date'],
            'spouse_name' => ['required', 'string', 'min:2', 'max:50'],
//            'relation' => ['nullable', 'string'],
            'publish' => ['required', 'string'],
            'poster' => ['sometimes', 'required', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = tap(BenefitRequest::findOrFail($request_id))->update([
            'funeral_date' => $request->funeral_date,
            'spouse_name' => $request->spouse_name,
//            'relation' => $request->relation,
            'publish' => $request->publish
        ]);

        if ($request->hasFile('poster')) {
            $this->updateMedia($benefitRequest);
        }

        $toast = [
            'type' => 'success',
            'message' => 'You have successfully updated the benefit request'
        ];

        return redirect()->route('deathofspouse.show', $request_id)->with('toast', $toast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spouse  $deathOfSpouse
     * @return \Illuminate\Http\Response
     */
    public function destroy($request_id)
    {
        //
    }
}

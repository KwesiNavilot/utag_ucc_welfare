<?php

namespace App\Http\Controllers\Members;

use App\Events\BenefitRequestEvent;
use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Spouse;
use App\Traits\Essentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $spouse = Spouse::where('member_id', Auth::id())->get(['spouse_id', 'firstname', 'lastname'])[0];

        return view('members.deathofspouse.create')->with([
            'spouse_id' => $spouse->spouse_id,
            'name' => $spouse->firstname . " " . $spouse->lastname
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'spouse' => ['required', 'alpha_num'],
            'funeral_date' => ['required', 'date'],
            'publish' => ['required', 'string'],
            'poster' => ['required', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = BenefitRequest::create([
            'request_id' => $this->generateRequestId(),
            'member_id' => Auth::id(),
            'request_type' => 'Death of Spouse',
            'spouse_id' => $request->spouse,
            'funeral_date' => $request->funeral_date,
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
        $request = BenefitRequest::findOrFail($request_id)->load('spouse');
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
            'spouse' => ['required', 'alpha_num'],
            'publish' => ['required', 'string'],
            'poster' => ['sometimes', 'required', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = tap(BenefitRequest::findOrFail($request_id))->update([
            'funeral_date' => $request->funeral_date,
            'spouse_id' => $request->spouse_id,
            'publish' => $request->publish
        ]);

        if ($request->hasFile('poster')) {
            $this->updateMedia($benefitRequest);
        }

        $toast = [
            'type' => 'success',
            'message' => 'You have successfully updated the benefit request'
        ];

        return redirect()->route('members.deathofspouse.show', $request_id)->with('toast', $toast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spouse  $deathOfSpouse
     * @return \Illuminate\Http\Response
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

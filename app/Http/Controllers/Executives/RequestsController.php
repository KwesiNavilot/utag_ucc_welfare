<?php

namespace App\Http\Controllers\Executives;

use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Departments;
use App\Models\User;
use App\Notifications\NotifyMemberOfRequestUpdate;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = BenefitRequest::with('user')
                                    ->get(['request_id', 'staff_id', 'request_type', 'status', 'created_at'])
                                    ->paginate(25);

//        dd($requests);

        return view('executives.requests.index', ['requests' => $requests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param BenefitRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\
     * Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(BenefitRequest $request)
    {
        $request = $request->load('user');
        $department = Departments::where('short', $request->user->department)->get(['name']);

//        dd($request);

        return view('executives.requests.show', [
            'request' => $request,
            'department' => $department
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $request_id
     * @return \Illuminate\Http\Response
     */
    public function edit($request_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $request_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $request_id)
    {
        $benefitRequest = BenefitRequest::findOrFail($request_id)->load('user');
        $benefitRequest->status = "Approved";
        $benefitRequest->save();

        $benefitRequest->user->notify((new NotifyMemberOfRequestUpdate($benefitRequest))->delay(10));

        $toast = [
            'type' => 'success',
            'message' => 'The benefit request has been approved'
        ];

        return redirect()->back()->with('toast', $toast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $request_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request_id)
    {
        //
    }
}

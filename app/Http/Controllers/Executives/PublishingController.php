<?php

namespace App\Http\Controllers\Executives;

use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\User;
use App\Notifications\EventAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class PublishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(BenefitRequest $request)
    {
//        dd($request);
        return view('executives.publish.create', ['request' => $request]);
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
            'request_id' => ['required', 'alpha_num', 'size:17'],
            'title' => ['required', 'min:2', 'max:150'],
            'attach' => ['required', 'string'],
            'message' => ['required']
        ]);

        $benefitRequest = BenefitRequest::with('user')
                                          ->where('request_id', $request->request_id)
                                          ->get();

        //Broadcast the message to all members, except the request's owner.
        Notification::send(
            User::all()->except($benefitRequest[0]->user->staff_id),
            (new EventAnnouncement($request, $benefitRequest))->delay(60)
        );

        $toast = [
            'type' => 'success',
            'message' => 'The announcement for the request has been sent'
        ];

        return redirect('execs.requests.show', ['request', $benefitRequest])->with('toast', $toast);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

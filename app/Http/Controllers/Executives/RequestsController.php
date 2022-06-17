<?php

namespace App\Http\Controllers\Executives;

use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Department;
use App\Models\User;
use App\Notifications\MemberRequestUpdateNotification;
use App\Traits\Essentials;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    use Essentials;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = BenefitRequest::with('user')
                                    ->get(['request_id', 'member_id', 'request_type', 'status', 'created_at'])
                                    ->paginate(25);

        return view('executives.requests.index', ['requests' => $requests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('executives.requests.demise', ['departments' => Department::all()]);
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
            'staff_id' => ['required', 'string', 'size:8'],
            'funeral_date' => ['required', 'date'],
            'poster' => ['sometimes', 'file', 'mimes:jpg,gif,png,webp,pdf,jpeg', 'max:5000']
        ]);

        $benefitRequest = BenefitRequest::create([
            'request_id' => $this->generateRequestId(),
            'staff_id' => $request->staff_id,
            'request_type' => 'Death of Member',
            'funeral_date' => $request->funeral_date,
            'media' => $request->poster
        ]);

        if ($request->hasFile('poster')) {
            $this->updateMedia($benefitRequest);
        }

        $toast = [
            'type' => 'success',
            'message' => 'You have successfully marked the demise of a member'
        ];

        return redirect()->route('execs.requests.index')->with('toast', $toast);
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
        $department = Department::where('short', $request->user->department)->get(['name']);

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

        $benefitRequest->user->notify((new MemberRequestUpdateNotification($benefitRequest))->delay(10));

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

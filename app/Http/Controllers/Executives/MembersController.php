<?php

namespace App\Http\Controllers\Executives;

use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Department;
use App\Models\User;
use App\Notifications\MemberAdmissionNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::addSelect([
                            'department' => Department::select('name')
                            ->whereColumn('short', 'users.department')
                        ])->orderBy('created_at', 'DESC')->get()->paginate(25);

//        dd($members);

        return view('executives.members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('executives.members.create', ['departments' => Department::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $staff_id
     * @return \Illuminate\Http\Response
     */
    public function show($staff_id)
    {
        $member = User::findOrFail($staff_id)->load('departments');
        $requests = BenefitRequest::where('staff_id', $member->staff_id)
                                    ->get(['request_id', 'request_type', 'status', 'created_at']);
//        dd($requests);

        return view('executives.members.show', [
            'member' => $member,
            'requests' => $requests
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $staff_id
     * @return \Illuminate\Http\Response
     */
    public function edit($staff_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $staff_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $staff_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $staff_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($staff_id)
    {
        //
    }
}

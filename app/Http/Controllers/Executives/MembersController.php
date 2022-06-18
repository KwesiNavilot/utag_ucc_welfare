<?php

namespace App\Http\Controllers\Executives;

use App\Http\Controllers\Controller;
use App\Models\BenefitRequest;
use App\Models\Department;
use App\Models\User;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members_count = User::all()->count();

        return view('executives.members.index')->with('members_count', $members_count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('execs.members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function show(User $member)
    {
        $member = $member->load('departments')->load('benefits');

        return view('executives.members.show')->with('member', $member);
    }

}

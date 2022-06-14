<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('members.children.index')->with('children', Auth::user()->spouse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.children.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $rules = [
            'firstname' => ['required', 'alpha_spaces', 'min:2', 'max:30'],
            'lastname' => ['required', 'alpha_dash', 'min:2', 'max:50'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'string', 'min:4'],
            'status' => ['required', 'string', 'min:5'],
            'phonenumber' => ['nullable', 'numeric', 'digits:10'],
        ];

        $attribute = [
            'phonenumber' => 'phone number',
        ];

        $this->validate($request, $rules, [], $attribute);

        dd($request->all());

        Child::create([
            'child_id' => $this->generateMemberOrRelativeId('relative'),
            'member_id' => Auth::id(),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'status' => $request->status,
            'phonenumber' => $request->phonenumber,
            'alt_phonenumber' => $request->alt_phonenumber,
        ]);

        $toast = [
            'type' => 'success',
            'message' => "Your have successfully added a child"
        ];

        return redirect()->route('members.children.index')->with('toast', $toast);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Spouse $spouse)
    {
        return view('members.children.show',)->with('spouse', $spouse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Spouse $spouse)
    {
        return view('members.children.edit',)->with('spouse', $spouse);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spouse $spouse)
    {
        $rules = [
            'firstname' => ['required', 'alpha', 'string', 'min:2', 'max:30'],
            'lastname' => ['required', 'alpha_dash', 'min:2', 'max:50'],
            'phonenumber' => ['required', 'numeric', 'digits:10'],
            'alt_phonenumber' => ['nullable', 'numeric', 'digits:10'],
            'gender' => ['required', 'string', 'min:4'],
            'status' => ['required', 'string', 'min:5'],
        ];

        $attribute = [
            'phonenumber' => 'phone number',
            'alt_phonenumber' => 'alternate phone number'
        ];

        $this->validate($request, $rules, [], $attribute);

        $spouse->update($request->all());

        $toast = [
            'type' => 'success',
            'message' => "Your spouse's details have been successfully updated"
        ];

        return redirect()->route('members.children.show', $spouse)->with('toast', $toast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spouse $spouse)
    {
        $spouse->delete();

        $toast = [
            'type' => 'success',
            'message' => "Spouse details deleted successfully"
        ];

        return redirect()->route('members.children.index')->with('toast', $toast);
    }
}

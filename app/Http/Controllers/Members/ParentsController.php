<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Traits\Essentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentsController extends Controller
{
    use Essentials;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('members.parents.index')->with('parents', Auth::user()->parents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.parents.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $rules = [
            'firstname' => ['required', 'alpha_spaces', 'min:2', 'max:30'],
            'lastname' => ['required', 'alpha_dash', 'min:2', 'max:50'],
            'relation' => ['required', 'alpha'],
            'gender' => ['required', 'string', 'min:4'],
            'status' => ['required', 'string', 'min:5'],
            'phonenumber' => ['nullable', 'numeric', 'digits:10'],
        ];

        $attribute = [
            'phonenumber' => 'phone number',
        ];

        $this->validate($request, $rules, [], $attribute);

        Parents::create([
            'parent_id' => $this->generateMemberOrRelativeId('relative'),
            'member_id' => Auth::id(),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'relation' => $request->relation,
            'gender' => $request->gender,
            'status' => $request->status,
            'phonenumber' => $request->phonenumber,
        ]);

        $toast = [
            'type' => 'success',
            'message' => "Your have successfully added a parent"
        ];

        return redirect()->route('members.parents.index')->with('toast', $toast);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Parents $parent)
    {
        return view('members.parents.show',)->with('parent', $parent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Parents $parent)
    {
        return view('members.parents.edit',)->with('parent', $parent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parents $parent)
    {
        $rules = [
            'firstname' => ['required', 'alpha', 'string', 'min:2', 'max:30'],
            'lastname' => ['required', 'alpha_dash', 'min:2', 'max:50'],
            'relation' => ['required', 'string'],
            'gender' => ['required', 'string', 'min:4'],
            'status' => ['required', 'string', 'min:5'],
            'phonenumber' => ['nullable', 'numeric', 'digits:10'],
        ];

        $attribute = [
            'phonenumber' => 'phone number',
        ];

        $this->validate($request, $rules, [], $attribute);

        $parent->update($request->all());

        $toast = [
            'type' => 'success',
            'message' => "Your parent's details have been successfully updated"
        ];

        return redirect()->route('members.parents.show', $parent)->with('toast', $toast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parents $parent)
    {
        $parent->delete();

        $toast = [
            'type' => 'success',
            'message' => "Parents details deleted successfully"
        ];

        return redirect()->route('members.parents.index')->with('toast', $toast);
    }
}

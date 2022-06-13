<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Spouse;
use App\Traits\Essentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpouseController extends Controller
{
    use Essentials;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user()->spouse);
        return view('members.spouse.index')->with('spouse', Auth::user()->spouse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.spouse.create');
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

        $rules = [
            'firstname' => ['required', 'alpha', 'string', 'min:2', 'max:30'],
            'lastname' => ['required', 'alpha', 'string', 'min:2', 'max:50'],
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

        Spouse::create([
            'spouse_id' => $this->generateMemberOrRelativeId('relative'),
            'member_id' => Auth::id(),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'status' => $request->status,
            'phonenumber' => $request->phonenumber,
            'alt_phonenumber' => $request->alt_phonenumber,
        ]);

        $toast = [
            'type' => 'success',
            'message' => "Your spouse's details have been successfully added"
        ];

        return redirect()->route('members.spouse.index')->with('toast', $toast);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Spouse $spouse)
    {
        return view('members.spouse.show',)->with('spouse', $spouse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Spouse $spouse)
    {
        return view('members.spouse.edit',)->with('spouse', $spouse);
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
            'lastname' => ['required', 'alpha', 'string', 'min:2', 'max:50'],
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

        return redirect()->route('members.spouse.show', $spouse)->with('toast', $toast);
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

        return redirect()->route('members.spouse.index')->with('toast', $toast);
    }
}

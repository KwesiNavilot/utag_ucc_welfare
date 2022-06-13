<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\User;
use App\Notifications\AccountIgnitedNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //Show account page
    public function index()
    {
        return view('members.account')->with([
            'member' => Auth::user(),
            'departments' => Departments::select('name', 'short')->get()
        ]);
    }

    //We use the store method to update vendor's details
    public function updateDetails(Request $request)
    {
//        dd($request->all());

        $rules = [
            'firstname' => 'required|alpha|string|min:2|max:30',
            'lastname' => 'required|alpha|string|min:2|max:50',
            'email' => 'required|email|max:255|' . Rule::unique('users')->ignore(Auth::id(), 'staff_id'),
            'phonenumber' => ['required', 'string', 'max:10', 'min:10'],
            'department' => ['required', 'string', 'min:2']
        ];

        $this->validate($request, $rules);

        $member = Auth::user();
        $member->update($request->all());

        $toast = [
            'type' => 'success',
            'message' => 'Your personal details have been successfully updated'
        ];

        return redirect('/account')->with('toast', $toast);
    }

    //We use the update method to update member's password
    public function updatePassword(Request $request, User $member)
    {
//        dd($request->new_password);
        $rules = [
            'current-password' => ['required', 'alpha_num', 'min:8', 'current_password'],
            'new_password' => ['required', 'alpha_num', 'min:8', 'confirmed']
        ];

        $messages = [
            'current-password.current_password' => 'Your entered current password is incorrect',
            'new_password.confirmed' => 'Your new password doesn\'t match its confirmation'
        ];

        $this->validate($request, $rules, $messages);

        $member = Auth::user();

//        dd($request->all());
        $member->password = Hash::make($request->new_password);
        $member->save();

        $toast = [
            'type' => 'success',
            'message' => 'Your password has been changed successfully'
        ];

        return redirect('/account')->with('toast', $toast);
    }

    //start the ignition process
    public function startIgnition()
    {
        //if someone, by themselves enter the link or if someone is ignited but still comes here
        if (Auth::user()->ignited_profile == "yes") {
            return back();          //send them back where they came from
        } else {
            //if they were brought here on purpose, then let them ignite thier profile
            return view('members.particulars.ignite_profile', ['departments' => Departments::all()]);
        }
    }

    //Ignite the person's profile
    public function igniteProfile(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'staff_id' => ['required', 'string', 'max:5'],
            'title' => ['required', 'string', 'max:5'],
            'date_of_birth' => ['required', 'date'],
            'date_joined' => ['required', 'date'],
            'department' => ['required', 'string', 'min:2'],
            'dept_position' => ['nullable', 'string', 'min:2', 'max:30'],
            'phonenumber' => ['required', 'string', 'size:10'],
            'alt_phonenumber' => ['nullable', 'string', 'size:10'],
        ]);

        //get the user, update their profile and ignition status
        $member = Auth::user();
        $member->staff_id = $request->staff_id;
        $member->title = $request->title;
        $member->date_of_birth = $request->date_of_birth;
        $member->date_joined = $request->date_joined;
        $member->department = $request->department;
        $member->dept_position = $request->dept_position;
        $member->phonenumber = $request->phonenumber;
        $member->alt_phonenumber = $request->alt_phonenumber;
        $member->ignited_profile = 'yes';
        $member->save();

        //dd($member);

        //notify them of account ignition
        $member->notify((new AccountIgnitedNotification($member))->delay(10));

        //set up a toast for them
        $toast = [
            'type' => 'success',
            'message' => 'You have successfully created your profile'
        ];

        return redirect()->route('members.dashboard')->with('toast', $toast);
    }
}

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
    public function __construct()
    {
       $this->middleware('auth');
    }

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
        if (Auth::user()->ignited == "yes") {
            return back();
        } else {
            return view('auth.ignite');
        }
    }

    public function ignite(Request $request)
    {
//        dd($request->all());

        $this->validate($request, [
            'password' => ['required', 'alpha_num', 'min:8', 'confirmed']
        ]);

        //get the user, update their password and ignition status
        $member = Auth::user();
        $member->password = Hash::make($request->password);
        $member->ignited = 'yes';
        $member->save();

//        dd($member);

        //notify them of account ignition
        $member->notify((new AccountIgnitedNotification($member))->delay(10));

        //log them out and regenerate their session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //get them to login again
        return redirect('/login')->with('relog', 'Log in');

    }
}

<?php

namespace App\Http\Controllers\Executives;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    //Show account page
    public function index()
    {
        return view('executives.account')->with('exec', Auth::user());
    }

    //We use the store method to update vendor's details
    public function updateDetails(Request $request)
    {
//        dd($request->all());

        $rules = [
            'firstname' => ['required', 'alpha', 'string', 'min:2' ,'max:30'],
            'lastname' => ['required', 'alpha_dash', 'string', 'min:2', 'max:50'],
            'email' => ['required', 'email', 'max:255', Rule::unique('admins')->ignore(Auth::id(), 'admin_id')],
            'phonenumber' => ['required', 'string', 'max:10', 'min:10'],
        ];

        $this->validate($request, $rules);

        $exec = Auth::user();
        $exec->update($request->all());

        $toast = [
            'type' => 'success',
            'title' => 'Personal Details Updated',
            'message' => 'Your personal details have been successfully updated'
        ];

        return redirect()->route('execs.account')->with('toast', $toast);
    }

    //We use the update method to update member's password
    public function updatePassword(Request $request, Admin $exec)
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

        $exec = Auth::user();

//        dd($request->all());
        $exec->password = Hash::make($request->new_password);
        $exec->save();

        $toast = [
            'type' => 'success',
            'title' => 'Password Updated',
            'message' => 'Your password has been changed successfully'
        ];

        return redirect()->route('execs.account')->with('toast', $toast);
    }

    //login the execs
    public function login(Request $request)
    {
        //dd($request);

        //validation rules.
        $rules = [
            'email' => ['required', 'email', 'exists:admins', 'min:5'],
            'password' => ['required', 'alpha_num', 'min:8', 'max:20']
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        $this->validate($request, $rules, $messages);

        //authenticate the request against the execs guard
        //request->only gets on the email and password, while the request->filled checks if the remember me is checked
        if(Auth::guard('execs')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...redirect to the intended page, else the dashboard
            return redirect()->intended(route('execs.dashboard'));
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    //logout the executive
    public function logout()
    {
        Auth::guard('execs')->logout();

        return redirect()->route('execs.login');
    }
}

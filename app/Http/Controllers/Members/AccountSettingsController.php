<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSettingsController extends Controller
{
    //show account settings page
    public function index()
    {
        return view('members.settings')->with('member', Auth::user());
    }

    //We use the update method to update member's password
    public function updatePassword(Request $request)
    {
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

        return redirect()->route('members.settings')->with('toast', $toast);
    }

}

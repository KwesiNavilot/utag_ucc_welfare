<?php
namespace App\Http\Controllers\Executives;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Passwords\DatabaseTokenRepository;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public $status;

    /**
     * Get the broker to be used during password reset.
     *
     * @return PasswordBroker
     */
    public function broker(): PasswordBroker
    {
        return Password::broker('execs');
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('execs');
    }

    public function showForgotPasswordView()
    {
        return view('auth.passwords.execs-forgot-password');
    }

    public function sendPasswordResetLink(Request $request)
    {
        $request->validate(['email' => ['required', 'email', 'exists:admins,email']]);

        if ($exec = Admin::where('email', $request->email)->first()) {
            $token = $this->broker()->createToken($exec);

            DB::table(config('auth.passwords.execs.table'))->insert([
                'email' => $exec->email,
                'token' => Hash::make($token)
            ]);

            $exec->sendPasswordResetNotification($token);

            return redirect()->back()->with('status', trans(Password::RESET_LINK_SENT));
        }

        return $this->status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($this->status)])
            : back()->withErrors(['email' => __($this->status)]);
    }

    public function showResetPasswordView()
    {
        return view('auth.passwords.execs-reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:8|confirmed',
        ]);

//        dd($request);

        $this->status = $this->broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $this->status === Password::PASSWORD_RESET
            ? redirect()->route('execs.login')->with('status', __($this->status))
            : back()->withErrors(['email' => [__($this->status)]]);
    }
}

?>

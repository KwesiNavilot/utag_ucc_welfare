<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
//        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        //show the login view
        Fortify::loginView('auth.login');

        Fortify::registerView('auth.register');

        //show the view for requesting password reset links
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.forgot-password');
        });

        //show the view that will actually change the password
        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });

        //Customize the login process
        //Check if the member has ignited their account. If they haven't then
        //force them to ignite
//        Fortify::authenticateUsing(function (Request $request) {
//            $user = User::where('email', $request->email)->first();
//
//            if ($user && Hash::check($request->password, $user->password)) {
////                dd($user->ignited);
//                if ($user->ignited == "no") {
////                    dd('hi');
//                    return redirect()->route('members.startignition');
//                } else {
//                    return $user;
//                }
//            }
//        });
    }
}

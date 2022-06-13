<?php

use App\Http\Controllers\AuxController;
use App\Http\Controllers\Executives\AccountController as ExecsAccountController;
use App\Http\Controllers\Executives\DashboardController as ExecsDashboardController;
use App\Http\Controllers\Executives\MembersController;
use App\Http\Controllers\Executives\PasswordResetController;
use App\Http\Controllers\Executives\PublishingController;
use App\Http\Controllers\Executives\RequestsController;
use App\Http\Controllers\Members\AccountSettingsController;
use App\Http\Controllers\Members\BenefitRequestController;
use App\Http\Controllers\Members\DeathOfParentController;
use App\Http\Controllers\Members\DeathOfSpouseController;
use App\Http\Controllers\Members\AccountController;
use App\Http\Controllers\Members\ChildBirthController;
use App\Http\Controllers\Members\DashboardController;
use App\Http\Controllers\Members\RetirementController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Ignition;
use App\Http\Middleware\RevalidateBackHistory;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest:web')->group(function () {
    Route::get('/', function () {
        return view('homepage');
    });

    Route::get('/home', function () {
        return view('homepage');
    })->name('home');

    Route::post('/contact', [AuxController::class, 'contactUs'])->name('contact');
});


//Routes for members profile ignition
Route::get('/ignite', [AccountController::class, 'startIgnition'])->name('members.startignition');
Route::post('/ignite', [AccountController::class, 'igniteProfile'])->name('members.ignite');

//All routes can be named using 'members.' and the namespaces is Members
Route::name('members.')->middleware([RevalidateBackHistory::class, Authenticate::class, Ignition::class])->group(function(){
    Route::get('/settings', [AccountSettingsController::class, 'index'])->name('settings');
    Route::post('/settings', [AccountSettingsController::class, 'updatePassword'])->name('updatepassword');

    Route::get('/profile/', [AccountController::class, 'index'])->name('profile');
    Route::get('/profile/{user}/edit', [AccountController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/{user}', [AccountController::class, 'update'])->name('profile.update');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/requests', [BenefitRequestController::class, 'index'])->name('requests');

    Route::resource('childbirth', ChildBirthController::class);

    Route::resource('deathofspouse', DeathOfSpouseController::class);

    Route::resource('deathofparent', DeathOfParentController::class);

    Route::resource('retirement', RetirementController::class);
});


//Routes for admins (execs)
//All routings are prefixed with '/execs', all routes can be named using 'execs.' and the namespaces is Executives
Route::prefix('/execs')->name('execs.')->middleware([RevalidateBackHistory::class])->group(function () {
    Route::middleware('guest:execs')->group(function (){
        Route::get('/{url}', function (){
            return view('executives.login');
        })->where(['url' => '/|login|index|home'])->name('home');

        Route::post('/login', [ExecsAccountController::class, 'login'])->name('login');

        //password reset routes
        Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordView'])->name('password.forgot');
        Route::post('/forgot-password', [PasswordResetController::class, 'sendPasswordResetLink'])->name('password.request');
        Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordView'])->name('password.reset');
        Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
    });

    Route::middleware('auth:execs')->group(function (){
        Route::post('/logout',[ExecsAccountController::class, 'logout'])->name('logout');

        Route::get('/dashboard', [ExecsDashboardController::class, 'index'])->name('dashboard');

        Route::resource('requests', RequestsController::class);

        Route::resource('members', MembersController::class);

        //Route::resource('publish', PublishingController::class);
        Route::get('/publish/{request}/create', [PublishingController::class, 'create'])->name('publish.create');
        Route::post('/publish/store', [PublishingController::class, 'store'])->name('publish.store');

        Route::get('/account', [ExecsAccountController::class, 'index'])->name('account');
        Route::post('/account', [ExecsAccountController::class, 'updateDetails'])->name('updatedetails');
        Route::put('/account', [ExecsAccountController::class, 'updatePassword'])->name('updatepassword');
    });
});


//Route to view mailables
Route::prefix('/mailables')->group(function () {
    Route::get('/ignite', function () {
        $member = User::factory()->create();
//        dd($member);
        $mail = (new App\Notifications\AccountIgnitedNotification($member))->toMail('a@andy.com');
        return $mail->render();
    });

    Route::get('/request', function () {
        $mail = (new App\Notifications\NewRequestAcknowledgement('Child Birth'))->toMail('a@andy.com');
        return $mail->render();
    });

    Route::get('/adinterim', function () {
        $mail = (new App\Notifications\MembersAdInterimAnnouncement("Andrews", 'mother'))->toMail('a@andy.com');
        return $mail->render();
    });

    Route::get('/exec-request', function () {
        $mail = (new App\Notifications\Executives\NewBenefitRequestNotification('Child Birth', '123567890'))->toMail('a@andy.com');
        return $mail->render();
    });
});

<?php

namespace App\Models;

use App\Mail\ExecsResetPasswordLink;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'admin_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'admin_id',
        'firstname',
        'lastname',
        'email',
        'isWebMaster',
        'phonenumber',
        'ignited',
        'password',
    ];

    public function isWebMaster()
    {
        return $this->isWebMaster; // this looks for an admin column in your users table
    }

    /**
     * Send the password reset notification.
     *
     * @param  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $link = url(route('execs.password.reset', $token, false)) . "?email=" . request()->email;
        Mail::to(request()->email)->send(new ExecsResetPasswordLink($link));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
}

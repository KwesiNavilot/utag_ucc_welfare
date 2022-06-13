<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'member_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'member_id',
        'staff_id',
        'firstname',
        'lastname',
        'other_names',
        'email',
        'phonenumber',
        'alt_phonenumber',
        'department',
        'date_joined',
        'date_of_birth',
        'dept_position',
        'ignited_profile',
        'ignited_children',
        'ignited_spouse',
        'ignited_parents',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function benefits() {
        return $this->hasMany(BenefitRequest::class, 'staff_id', 'staff_id');
    }

    public function departments()
    {
        return $this->hasOne(Departments::class, 'short', 'department');
    }

    public function scopeRetiree($query)
    {
        return $query->where("ROUND(DATEDIFF(now(), date_of_birth) / 365) >= 60");
    }
}

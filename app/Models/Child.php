<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $primaryKey = 'child_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'child_id',
        'member_id',
        'date_of_birth',
        'firstname',
        'lastname',
        'gender',
        'status',
        'phonenumber',
        'alt_phonenumber'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'member_id', 'member_id');
    }

    public function benefit() {
        return $this->belongsTo(BenefitRequest::class, 'member_id', 'member_id');
    }
}

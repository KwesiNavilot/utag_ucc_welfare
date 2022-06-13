<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    use HasFactory;

    protected $primaryKey = 'spouse_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'spouse_id',
        'member_id',
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
}

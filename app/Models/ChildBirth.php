<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildBirth extends Model
{
    use HasFactory;

    protected $primaryKey = 'request_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'request_id',
        'staff_id',
        'child_name',
        'child_dob',
        'birth_certificate',
    ];
}

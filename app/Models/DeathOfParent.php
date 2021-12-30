<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathOfParent extends Model
{
    use HasFactory;

    protected $primaryKey = 'request_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'request_id',
        'staff_id',
        'funeral_date',
        'parent_name',
        'relation',
        'poster',
        'publish'
    ];
}

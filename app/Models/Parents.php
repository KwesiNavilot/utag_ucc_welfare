<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $primaryKey = 'parent_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'parent_id',
        'member_id',
        'firstname',
        'lastname',
        'relation',
        'gender',
        'status',
        'phonenumber',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'member_id', 'member_id');
    }
}

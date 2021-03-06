<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'department', 'short')->select(['short', 'name']);
    }
}

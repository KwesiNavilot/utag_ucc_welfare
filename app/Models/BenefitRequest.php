<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitRequest extends Model
{
    use HasFactory;

    protected $table = 'requests';
    protected $primaryKey = 'request_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'request_id',
        'member_id',
        'request_type',
        'child_id',
        'funeral_date',
        'parent_id',
        'spouse_id',
        'retirement_date',
        'publish',
        'published',
        'media',
    ];

    public function spouse()
    {
        return $this->hasOne(Spouse::class, 'member_id', 'member_id');
    }

    public function child()
    {
        return $this->hasMany(Child::class, 'member_id', 'member_id');
    }

    public function parents()
    {
        return $this->hasMany(Parents::class, 'member_id', 'member_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'member_id', 'member_id');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}

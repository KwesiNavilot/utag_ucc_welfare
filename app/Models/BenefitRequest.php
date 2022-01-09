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
        'staff_id',
        'request_type',
        'child_name',
        'child_dob',
        'funeral_date',
        'parent_name',
        'spouse_name',
        'relation',
        'publish',
        'published',
        'media',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'staff_id', 'staff_id');
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

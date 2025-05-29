<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'course_id',
        'payment_method',
        'payment_status',
        'receipt_path',
        'status',
        'bank_name',
        'bank_branch',
        'transfer_date',
        'reference',
        'call_center_id',
    ];

    // Relationships (optional but useful)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function callCenter()
    {
        return $this->belongsTo(CallCenter::class, 'call_center_id');
    }
}

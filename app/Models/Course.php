<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_id'; // Custom primary key

    protected $fillable = [
        'name',
        'description',
        'duration',
        'total_price',
        'first_payment',
        'image'
    ];
}

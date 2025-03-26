<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseZoomLink extends Model
{
    use HasFactory;

    protected $primaryKey = 'zoom_link_id';

    protected $fillable = [
        'course_id',
        'week_name',
        'zoom_link',
        'description',
    ];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRecording extends Model
{
    use HasFactory;

    protected $primaryKey = 'recording_id';

    protected $fillable = [
        'course_id',
        'week_name',
        'recording_url',
        'description'
    ];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
}

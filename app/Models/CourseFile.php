<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFile extends Model
{
    use HasFactory;

    protected $primaryKey = 'file_id';

    protected $fillable = [
        'course_id',
        'file_name',
        'file_path',
        'file_type',
    ];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
}

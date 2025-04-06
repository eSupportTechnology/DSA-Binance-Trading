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

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}

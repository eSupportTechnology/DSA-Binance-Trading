<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRecording;
use Illuminate\Http\Request;

class CourseRecordingController extends Controller
{
    // Show recordings for a specific course
    public function index($courseId)
    {
        $course = Course::findOrFail($courseId);
        $recordings = CourseRecording::where('course_id', $courseId)->get();
        return view('AdminDashboard.courseRecordings.index', compact('course', 'recordings'));
    }

    // Store a new recording
    public function store(Request $request, $courseId)
    {
        
        $request->validate([
            'week_name' => 'required|string|max:100',
            'recording_url' => 'required|url',
            'description' => 'nullable|string',
        ]);

        CourseRecording::create([
            'course_id' => $courseId,
            'week_name' => $request->week_name,
            'recording_url' => $request->recording_url,
            'description' => $request->description,
        ]);

        return redirect()->route('coursesRecording.index', $courseId)->with('success', 'Recording added successfully.');
    }

    // Delete a recording
    public function destroy($recordingId)
    {
        $recording = CourseRecording::findOrFail($recordingId);
        $recording->delete();

        return redirect()->back()->with('success', 'Recording deleted successfully.');
    }
}

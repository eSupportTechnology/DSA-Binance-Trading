<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\CourseFile;
use Illuminate\Http\Request;

class CourseFileController extends Controller
{


    // Show files index
    public function index()
    {
        $courses = Course::all();
        return view('AdminDashboard.courseFiles.index', compact('courses'));
    }

    //show files & Documents
    public function second($courseId)
    {
        $course = Course::findOrFail($courseId);
        $files = CourseFile::where('course_id', $courseId)->get();
        return view('AdminDashboard.courseFiles.second', compact('course', 'files'));
    }

    public function store(Request $request, $courseId)
    {
        $request->validate([
            'file_name' => 'required|string|max:255',
            'files' => 'required',
            'files.*' => 'mimes:pdf,docx,txt|max:5120',
        ]);

        $course = Course::findOrFail($courseId);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalFileName = $file->getClientOriginalName();
                $fileType = $file->getClientOriginalExtension();
                $fileName = time() . '_' . $originalFileName;
                $destinationPath = public_path('uploads/courses/' . $courseId . '/files');
    
                // Make directory if not exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
    
                // Move the file to the destination path
                $file->move($destinationPath, $fileName);
    
                // Save the file details to the database
                CourseFile::create([
                    'course_id' => $courseId,
                    'file_name' => $request->file_name,
                    'file_path' => 'uploads/courses/' . $courseId . '/files/' . $fileName,
                    'file_type' => $fileType,
                ]);
            }
        }

        return redirect()->route('courseFile.second', $courseId)->with('success', 'Files uploaded successfully.');
    }

    public function destroy($fileId)
    {
        $file = CourseFile::findOrFail($fileId);

        // Check if the file exists in the public directory
        $filePath = public_path($file->file_path);

        if (file_exists($filePath)) {
            unlink($filePath);  // Delete the file from the public directory
        }

        // Delete the file entry from the database
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }






    
}

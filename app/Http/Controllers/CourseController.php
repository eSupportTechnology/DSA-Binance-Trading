<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Show all courses
    public function index()
    {
        $courses = Course::all();
        return view('AdminDashboard.courses.index', compact('courses'));
    }

    // Show the form for creating a new course
    public function create()
    {
        return view('AdminDashboard.courses.create');
    }

    // Store a newly created course in the database
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'duration' => 'required|integer',
            'total_price' => 'required|numeric',
            'first_payment' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/courses'), $imageName);
            $data['image'] = 'uploads/courses/'.$imageName;
        }

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    // Show a single course
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('AdminDashboard.courses.show', compact('course'));
    }

    // Show the form for editing a course
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('AdminDashboard.courses.edit', compact('course'));
    }

    // Update the course in the database
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'duration' => 'required|integer',
            'total_price' => 'required|numeric',
            'first_payment' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $course = Course::findOrFail($id);
        $data = $request->all();

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image && file_exists(public_path($course->image))) {
                unlink(public_path($course->image));
            }
            
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/courses'), $imageName);
            $data['image'] = 'uploads/courses/'.$imageName;
        }

        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    // Delete the course
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        // Delete the image file if it exists
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}

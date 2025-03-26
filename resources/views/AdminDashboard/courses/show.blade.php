@extends('AdminDashboard.master')
@section('title', 'View Course Details')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>View Course Details</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Course Management</li>
    <li class="breadcrumb-item active">Course Details</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Course Details</h5>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary">Back to Courses</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Course Name:</strong>
                                <p>{{ $course->name }}</p>
                            </div>
                            
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Description:</strong>
                                <p>{{ $course->description ?? 'No description provided.' }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Duration (Days):</strong>
                                <p>{{ $course->duration }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Total Price (Rs.):</strong>
                                <p>{{ $course->total_price }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>First Payment (Rs.):</strong>
                                <p>{{ $course->first_payment }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Course Image:</strong><br>
                                @if($course->image)
                                    <img src="{{ asset($course->image) }}" alt="Course Image" width="200" class="img-thumbnail mt-2">
                                @else
                                    <p>No Image Available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

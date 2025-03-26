@extends('AdminDashboard.master')
@section('title', 'Edit Course')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Edit Course</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Course Management</li>
    <li class="breadcrumb-item active">Edit Course</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Course</h5>
                    </div>
                    <form action="{{ route('courses.update', $course->course_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Course Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="name" value="{{ $course->name }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description" rows="3">{{ $course->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Duration (Days)</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="duration" value="{{ $course->duration }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Total Price (Rs.)</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="total_price" value="{{ $course->total_price }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">First Payment (Rs.)</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" name="first_payment" value="{{ $course->first_payment }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Current Image</label>
                                        <div class="col-sm-9">
                                            @if($course->image)
                                                <img src="{{ asset($course->image) }}" alt="Course Image" width="100" class="mb-2">
                                            @else
                                                <p>No Image Uploaded</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Change Image</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" name="image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer text-end">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-primary" type="submit">Update Course</button>
                                <a href="{{ route('courses.index') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

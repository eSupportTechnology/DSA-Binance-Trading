@extends('AdminDashboard.master')
@section('title', 'Manage Course Zoom Links')

@section('breadcrumb-title')
    <h3>Manage Zoom Links for {{ $course->name }}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Course Management</li>
    <li class="breadcrumb-item">Courses</li>
    <li class="breadcrumb-item active">Manage Zoom Links</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Zoom Links for {{ $course->name }}</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadZoomLinkModal">Add New Zoom Link</button>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Week/Name</th>
                                    <th>Description</th>
                                    <th>Zoom Link</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($zoomLinks as $zoomLink)
                                    <tr>
                                        <td>{{ $zoomLink->zoom_link_id }}</td>
                                        <td>{{ $zoomLink->week_name }}</td>
                                        <td>{{ $zoomLink->description ?? 'No Description' }}</td>
                                        <td><a href="{{ $zoomLink->zoom_link }}" target="_blank">Open Zoom Meeting</a></td>
                                        <td>
                                            <form action="{{ route('coursesZoomLinks.destroy', $zoomLink->zoom_link_id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Zoom Link Modal -->
    <div class="modal fade" id="uploadZoomLinkModal" tabindex="-1" aria-labelledby="uploadZoomLinkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadZoomLinkModalLabel">Add New Zoom Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('coursesZoomLinks.store', ['courseId' => $course->course_id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="week_name" class="form-label">Week/Name</label>
                            <input type="text" class="form-control" name="week_name" placeholder="Enter Week or Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="zoom_link" class="form-label">Zoom Link</label>
                            <input type="url" class="form-control" name="zoom_link" placeholder="Enter Zoom Meeting URL" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter Description (Optional)"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Zoom Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

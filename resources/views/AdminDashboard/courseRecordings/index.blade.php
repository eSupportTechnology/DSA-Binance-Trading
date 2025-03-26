@extends('AdminDashboard.master')
@section('title', 'Manage Course Recordings')

@section('breadcrumb-title')
    <h3>Manage Recordings for {{ $course->name }}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Course Management</li>
    <li class="breadcrumb-item">Courses</li>
    <li class="breadcrumb-item active">Manage Recordings</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Recordings for {{ $course->name }}</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadRecordingModal">Add New Recording</button>
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
                                    <th>Recording Link</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recordings as $recording)
                                    <tr>
                                        <td>{{ $recording->recording_id }}</td>
                                        <td>{{ $recording->week_name }}</td>
                                        <td>{{ $recording->description ?? 'No Description' }}</td>
                                        <td><a href="{{ $recording->recording_url }}" target="_blank">Open Recording</a></td>
                                        <td>
                                            <form action="{{ route('coursesRecording.destroy', $recording->recording_id) }}" method="POST" style="display:inline-block;">
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

    <!-- Upload Recording Modal -->
    <div class="modal fade" id="uploadRecordingModal" tabindex="-1" aria-labelledby="uploadRecordingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadRecordingModalLabel">Add New Recording</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('coursesRecording.store', ['courseId' => $course->course_id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="week_name" class="form-label">Week/Name</label>
                            <input type="text" class="form-control" name="week_name" placeholder="Enter Week or Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="recording_url" class="form-label">Recording URL</label>
                            <input type="url" class="form-control" name="recording_url" placeholder="Enter Recording URL" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter Description (Optional)"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Recording</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

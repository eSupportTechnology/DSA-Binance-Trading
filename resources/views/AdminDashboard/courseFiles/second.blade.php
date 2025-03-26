@extends('AdminDashboard.master')
@section('title', 'Manage Course Files')

@section('breadcrumb-title')
    <h3>Manage Files for {{ $course->name }}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Course Management</li>
    <li class="breadcrumb-item">Courses</li>
    <li class="breadcrumb-item active">Manage Files</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Files for {{ $course->name }}</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadFileModal">Add New File</button>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>File Name</th>
                                    <th>File Path</th>
                                    <th>File Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $file)
                                    <tr>
                                        <td>{{ $file->file_id }}</td>
                                        <td>{{ $file->file_name }}</td>
                                        <td><a href="{{ asset($file->file_path) }}" target="_blank">{{ $file->file_name }}</a></td>
                                        <td>{{ $file->file_type }}</td>
                                        <td>

                                            <form action="{{ route('courseFile.destroy', $file->file_id) }}" method="POST" style="display:inline-block;">
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

    <!-- Upload File Modal -->
    <div class="modal fade" id="uploadFileModal" tabindex="-1" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadFileModalLabel">Upload New File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('courseFile.store', ['courseId' => $course->course_id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file_name" class="form-label">File Name</label>
                            <input type="text" class="form-control" name="file_name" placeholder="Enter File Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="files" class="form-label">Select Files</label>
                            <input type="file" class="form-control" name="files[]" accept=".pdf,.docx,.txt" multiple required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload Files</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
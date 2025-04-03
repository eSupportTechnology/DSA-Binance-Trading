@extends('StudentDashboard.master')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Files for: <strong>{{ $booking->course->name }}</strong></h4>

    @forelse($booking->course->files as $file)
        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6>{{ $file->file_name }}</h6>
                    <small class="text-muted">{{ $file->file_type }}</small>
                </div>
                <a href="{{ asset($file->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-download"></i> Download
                </a>
            </div>
        </div>
    @empty
        <p class="text-muted">No files available for this course.</p>
    @endforelse
</div>
@endsection

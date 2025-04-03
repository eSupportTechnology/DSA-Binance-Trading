@extends('StudentDashboard.master')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Recordings for: <strong>{{ $booking->course->name }}</strong></h4>

    @forelse($booking->course->recordings as $rec)
        <div class="card mb-3">
            <div class="card-body">
                <h6 class="mb-1">{{ $rec->week_name }}</h6>
                <p class="mb-2 text-muted">{{ $rec->description }}</p>
                <a href="{{ $rec->recording_url }}" target="_blank" class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-camera-video"></i> Watch Recording
                </a>
            </div>
        </div>
    @empty
        <p class="text-muted">No video recordings found.</p>
    @endforelse
</div>
@endsection

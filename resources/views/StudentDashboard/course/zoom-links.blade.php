@extends('StudentDashboard.master')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Zoom Links for: <strong>{{ $booking->course->name }}</strong></h4>

    @forelse($booking->course->zoomLinks as $link)
        <div class="card mb-3">
            <div class="card-body">
                <h6 class="mb-1">{{ $link->week_name }}</h6>
                <p class="mb-2 text-muted">{{ $link->description }}</p>
                <a href="{{ $link->zoom_link }}" target="_blank" class="btn btn-sm btn-outline-info">
                    <i class="bi bi-link-45deg"></i> Join Zoom
                </a>
            </div>
        </div>
    @empty
        <p class="text-muted">No Zoom links available for this course.</p>
    @endforelse
</div>
@endsection

@extends('frontend.master')

@section('title', 'Home - Edukon')

@section('content')


@php
    function getYoutubeVideoId($url) {
        if (preg_match('/(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/watch\?v=|\/v\/))([^\&\?\/]+)/', $url, $matches)) {
            return $matches[1];
        }
        return null;
    }
@endphp



<style>
/* Enroll Section */
.enroll-section {
    position: fixed; /* Keeps the button fixed */
    top: 50%; /* Center vertically */
    right: 20px; /* Align to the right */
    transform: translateY(-50%); /* Perfect vertical alignment */
    display: flex; /* Flexbox to align */
    flex-direction: column; /* Vertical alignment */
    align-items: center; /* Center content horizontally */
    justify-content: center; /* Center content vertically */
    z-index: 1000; /* Keep on top of other content */
}

/* Enroll Button */
.enroll-btn {
    background-color:rgb(12, 102, 199); /* Button color (blue) */
    color:rgb(255, 255, 255); /* Text color */
    font-size: 14px; /* Font size */
    font-weight: bold; /* Bold text */
    padding: 6px 15px; /* Space inside the button */
    border-radius: 20px; /* Rounded corners */
    text-decoration: none; /* Remove underline */
    cursor: pointer; /* Pointer cursor on hover */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow */
    transition: all 0.3s ease; /* Smooth hover animation */
    writing-mode: vertical-rl; /* Rotate the text vertically */
    text-orientation: upright; /* Ensure letters stay upright */
}

/* Hover Effect for Button */
.enroll-btn:hover {
    background-color:rgb(21, 133, 252); /* Darker blue on hover */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
}
.h6 {
    position: relative;
    animation: fall 2s ease-in-out;
}

.course-price-box {
    background-color: #ee1831; /* Bright red */
    color: #fff;
    padding: 6px 15px;
    display: inline-block;
    border-radius: 5px;
    font-weight: 600;
    font-size: 16px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.cbs-content-list {
    margin-top: 200px;
}

.meta-post i {
    color: #ee1831 !important;   /* Force red */
    opacity: 1 !important;       /* Ensure visibility */
    visibility: visible !important;
    transition: none !important; /* Cancel any transition effects */
}

@keyframes fall{
    0%{
        transform: translatey(-100%);
        opacity: 0;
    }
    100%{
        transform: translatey(0);
        opacity: 1;
    }
}
.h2{
    animation: typing 4s steps(30, end), blink-caret 0.5s step-end infinite;
}
@keyframes typing{
    from{
        width: 0;
    }
    to{
        width: 100%;
     }
}
@keyframes blink-caret{
    from,to{
        border-color: transparent;
    }
    50%{
        border-color: black;
    }
}
/* Responsive Design */
@media (max-width: 768px) {
    .enroll-section {
        right: 10px; /* Adjust for smaller screens */
    }

    .enroll-btn {
        font-size: 14px; /* Smaller font size */
        padding: 8px 15px; /* Adjust padding */
    }
}
</style>


<style>
    .vip-btn {
        background-color: #ed3532;
        font-weight:bold;
        color: #000;
        transition: background 0.3s ease;
    }

    .vip-btn:hover {
        background-color: #c8232c;
        color: #fff;
    }
</style>

    <!-- banner section start here -->
    <section class="banner-section style-1" style="background:#eddddd">
        <div class="container">
            <div class="section-wrapper">
                <div class="row align-items-center">
                    <!-- Text Area -->
                    <div class="col-xxl-6 col-xl-7 col-lg-11">
                        <div class="banner-content">
                            <h6 class="subtitle text-uppercase fw-medium mt-5" style="color:#ee1831;">Empowering Education</h6>
                            <h2 class="title" style="color:#1b2954;">
                                <span class="d-lg-block">DSA Academy</span>
                                Learn The Skills That <span class="d-lg-block">Transform Your Life</span>
                            </h2>
                            <p class="desc">
                                Join 10,000+ students across Sri Lanka.<br>
                                Gain real-world skills through online and physical classes.<br>
                                Start your journey with DSA today!
                            </p>
                            
                        </div>
                    </div>

                    <!-- Image Area -->
                    <div class="col-xxl-6 col-xl-5 d-none d-xl-block"
                        style="background-image: url('{{ asset('frontend/assets/images/logo.png') }}');
                            background-size: contain;
                            background-repeat: no-repeat;
                            background-position: center;
                            min-height: 500px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional: Floating Stats -->
        <div class="cbs-content-list d-none d-lg-block mt-4">
            <ul class="lab-ul">
                <li class="ccl-shape shape-1"><a href="#">10,000+ Students Trained</a></li>
                <li class="ccl-shape shape-2"><a href="#">25+ Certified Courses</a></li>
                <li class="ccl-shape shape-3"><a href="#">95% Student Satisfaction</a></li>
                <li class="ccl-shape shape-4"><a href="#">Experienced Trainers</a></li>
                <li class="ccl-shape shape-5"><a href="#">Flexible Learning Modes</a></li>
            </ul>
        </div>
    </section>
    <!-- banner section ending here -->


    <!-- course section start here -->
    <div class="course-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle" style="color:#ed3532;">Featured Courses</span>
                <h2 class="title" style="color:#1b2954;">Pick A Course To Get Started</h2>
            </div>

            <div class="section-wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">

                    @forelse($featuredCourses as $course)
                    <div class="col">
                        <div class="course-item">
                            <div class="course-inner">
                                <div class="course-thumb">
                                    <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" style="height:350px; object-fit:cover;">
                                </div>
                                <div class="course-content">
                                    
                                <div class="course-category d-flex justify-content-between align-items-center">
                                    <div class="course-price-box">
                                        Rs. {{ number_format($course->total_price, 2) }}
                                    </div>

                                    <div class="course-review text-end">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                        <span class="ratting-count">4.8</span>
                                    </div>
                                </div>

                                    <a href="{{ route('frontend.Course', $course->slug) }}">
                                        <h5>{{ $course->name }}</h5>
                                    </a>
                                    <div class="course-details">
                                        <div class="couse-count"><i class="icofont-video-alt"></i> {{ $course->duration }} Lessons</div>
                                        <div class="couse-topic"><i class="icofont-signal"></i> {{ ucfirst($course->mode) }} Class</div>
                                    </div>
                                    <div class="course-footer">
                                        <div class="course-author">
                                            <a href="#">DSA Academy</a>
                                        </div>
                                        <div class="course-btn">
                                            <a href="{{ route('frontend.Course', $course->slug) }}" class="lab-btn-text">
                                                Read More <i class="icofont-external-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No courses available at the moment.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
    <!-- course section ending here -->



    <!-- abouts section start here -->
    <div class="about-section">
        <div class="container">
            <div class="row justify-content-center row-cols-xl-2 row-cols-1 align-items-end flex-row-reverse">
                <!-- Right Side Content -->
                <div class="col">
                    <div class="about-right padding-tb">
                        <div class="section-header">
                            <span class="subtitle" style="color:#ed3532;">About DSA Academy</span>
                            <h2 class="title" style="color:#1b2954;">Empowering Your Future With Practical Skills</h2>
                            <p>DSA Academy is a leading education provider focused on delivering high-quality, practical training in IT, business, and professional development. We empower individuals through hands-on learning, expert instructors, and industry-recognized certifications—ensuring you're ready for the real world.</p>
                        </div>
                        <div class="section-wrapper">
                            <ul class="lab-ul">
                                <li>
                                    <div class="sr-left">
                                        <img src="{{ asset('frontend/assets/images/instructor.png') }}" alt="Skilled Instructors">
                                    </div>
                                    <div class="sr-right">
                                        <h5>Experienced Instructors</h5>
                                        <p>Learn from industry professionals with real-world experience, passionate about teaching and mentoring.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sr-left">
                                        <img src="{{ asset('frontend/assets/images/cetificate.png') }}" alt="Certified Courses">
                                    </div>
                                    <div class="sr-right">
                                        <h5>Recognized Certifications</h5>
                                        <p>Receive certificates that are valued by employers and recognized across industries.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sr-left">
                                        <img src="{{ asset('frontend/assets/images/world-grid.png') }}" alt="Online Learning">
                                    </div>
                                    <div class="sr-right">
                                        <h5>Online & Physical Classes</h5>
                                        <p>Flexible learning options that fit your lifestyle—whether you're at home or on campus.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Left Side Image -->
                <div class="col">
                    <div class="about-left" style="margin-bottom:200px;">
                        <div class="about-thumb">
                            <img src="{{ asset('frontend/assets/images/skill/skill.gif') }}" alt="DSA Academy" style="height:400px; width:auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about section ending here -->


    <!-- VIP Packages Section Start -->
    <div class="course-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle" style="color:#ed3532;">DSA Special</span>
                <h2 class="title" style="color:#1b2954;">Our VIP Signal Packages</h2>
            </div>

            <div class="section-wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">
                    @forelse($vipPackages as $package)
                        <div class="col">
                            <div class="course-item">
                                <div class="course-inner">
                                    <div class="course-thumb">
                                        <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->title }}" style="height:350px; object-fit:cover;">
                                    </div>
                                    <div class="course-content">
                                        <!-- Price and Rating Row -->
                                        <div class="course-category d-flex justify-content-between align-items-center">
                                            <div class="course " style="backgroud-color:#000;">
                                                
                                            </div>
                                            <!-- Price and Rating Row -->
                                            <div class="course-category d-flex justify-content-between align-items-center">
                                                <div class="course-price-box">
                                                    Rs. {{ number_format($package->price, 2) }}
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="text-truncate">{{ $package->title }}</h5>

                                        <!-- Description -->
                                        <p>{{ \Illuminate\Support\Str::limit($package->description, 100) }}</p>

                                        <!-- Footer -->
                                        <div class="course-footer">
                                            <div class="course-author">
                                                <a href="#">DSA Academy</a>
                                            </div>
                                            <div class="course-btn">
                                                <a  class="lab-btn-text">
                                                    Read More <i class="icofont-external-link"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No VIP packages available at the moment.</p>
                        </div>
                    @endforelse
                </div>

                
            </div>
        </div>
    </div>
    <!-- VIP Packages Section End -->



<!-- Achievement section start here -->
<div class="achievement-section padding-tb">
    <div class="container">
        <!-- Stats Top -->
        <div class="section-header text-center">
            <span class="subtitle" style="color:#ed3532;">START TO SUCCESS</span>
            <h2 class="title" style="color:#1b2954;">Achieve Your Goals With DSA Academy</h2>
        </div>

        <div class="section-wrapper">
            <div class="counter-part mb-5">
                <div class="row g-4 row-cols-lg-4 row-cols-sm-2 row-cols-1 justify-content-center">
                    <div class="col">
                        <div class="count-item text-center">
                            <h2><span class="count">{{ $stats['experience'] }}</span>+</h2>
                            <p>Years of Education Experience</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="count-item text-center">
                            <h2><span class="count">{{ $stats['students'] }}</span>+</h2>
                            <p>Students Trained</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="count-item text-center">
                            <h2><span class="count">{{ $stats['teachers'] }}</span>+</h2>
                            <p>Expert Instructors</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="count-item text-center">
                            <h2><span class="count">{{ $stats['courses'] }}</span>+</h2>
                            <p>Certified Courses</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- YouTube Section -->
            <div class="achieve-part mt-4">
                <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
                    @forelse($youtubeVideos as $video)
                        @php
                            $videoId = getYoutubeVideoId($video->youtube_url);
                            $thumbnailUrl = $video->thumbnail
                                ? asset('storage/' . $video->thumbnail)
                                : ($videoId ? 'https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg' : null);
                        @endphp

                        <div class="col">
                            <div class="p-3 bg-white shadow-sm rounded-3 d-flex align-items-center h-100" style="min-height: 200px;">
                                <!-- Thumbnail -->
                                @if($thumbnailUrl)
                                    <div class="me-3" style="width: 200px; height: 150px; flex-shrink: 0;">
                                        <a href="{{ $video->youtube_url }}" target="_blank">
                                            <img src="{{ $thumbnailUrl }}" alt="{{ $video->title }}" class="w-100 h-100 object-fit-cover rounded-2">
                                        </a>
                                    </div>
                                @endif

                                <!-- Text Content -->
                                <div class="flex-grow-1">
                                    <h6 class="mb-2 text-dark fw-bold">{{ Str::limit($video->title, 60) }}</h6>
                                    <a href="{{ $video->youtube_url }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                        Watch on YouTube <i class="icofont-play-alt-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">No YouTube videos found.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Achievement section ending here -->



<!-- blog section start here -->
<div class="blog-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">FROM OUR BLOG POSTS</span>
            <h2 class="title">More Articles From Resource Blog</h2>
        </div>
        <div class="section-wrapper">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4">

                @forelse($latestBlogs as $blog)
                    <div class="col">
                        <div class="post-item">
                            <div class="post-inner">
                                
                                <!-- Media (Image or Video) -->
                                <div class="post-thumb" style="height: 250px; overflow: hidden;">
                                    @if($blog->media_type === 'image' && $blog->media_path)
                                        <a href="#">
                                            <img src="{{ asset('storage/' . $blog->media_path) }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        </a>
                                    @elseif($blog->media_type === 'video' && $blog->media_path)
                                        <video width="100%" height="250" controls style="object-fit: cover;">
                                            <source src="{{ asset('storage/' . $blog->media_path) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <img src="{{ asset('frontend/assets/images/blog/default.jpg') }}" alt="default blog" style="width: 100%; height: 100%; object-fit: cover;">
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="post-content">
                                    <a href="#"><h4>{{ Str::limit($blog->title, 60) }}</h4></a>

                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <i class="icofont-ui-user p-2" ></i>DSA Academy
                                            <i class="icofont-calendar m-3"></i>{{ $blog->created_at->format('F d, Y') }}
                                        </ul>
                                    </div>

                                    <p>{{ Str::limit(strip_tags($blog->content), 120) }}</p>
                                </div>

                                <!-- Footer -->
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="#" class="lab-btn-text">
                                            Read more <i class="icofont-external-link"></i>
                                        </a>
                                    </div>
                                    <div class="pf-right">
                                        <i class="icofont-comment"></i>
                                        <span class="comment-count">0</span> {{-- Optional: Dynamic comment count --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No blog posts found.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>
<!-- blog section ending here -->



@endsection


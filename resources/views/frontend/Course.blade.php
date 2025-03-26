@extends('frontend.master')

@section('title', 'Home - Edukon')

@section('content')

    <!-- Page Header section start here -->
    <div class="pageheader-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageheader-content text-center">
                        <h2>Archives: Courses</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Course Page</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->

    <!-- group select section start here -->
    <div class="group-select-section">
        <div class="container">
            <div class="section-wrapper">
                <div class="row align-items-center g-4">
                    <div class="col-md-1">
                        <div class="group-select-left">
                            <i class="icofont-abacus-alt"></i>
                            <span>Filters</span>
                        </div>
                    </div>
                    <div class="col-md-11">
                        <div class="group-select-right">
                            <div class="row g-2 row-cols-lg-4 row-cols-sm-2 row-cols-1">
                                <div class="col">
                                    <div class="select-item">
                                        <select>
                                            <option value="">All Categories</option>
                                            <option value="uncategorized">Uncategorized</option>
                                            <option value="academy">Academy</option>
                                            <option value="agency">Agency</option>
                                            <option value="app">App</option>
                                            <option value="bar">Bar</option>
                                        </select>
                                        <div class="select-icon">
                                            <i class="icofont-rounded-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="select-item">
                                        <select>
                                            <option value="">All Language</option>
                                            <option value="java">JAVA</option>
                                            <option value="php">PHP</option>
                                            <option value="html">HTML</option>
                                            <option value="python">PYTHON</option>
                                            <option value="javascript">JAVASCRIPT</option>
                                        </select>
                                        <div class="select-icon">
                                            <i class="icofont-rounded-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="select-item">
                                        <select>
                                            <option value="">All Prices</option>
                                            <option value="29">29</option>
                                            <option value="39">39</option>
                                            <option value="69">69</option>
                                            <option value="99">99</option>
                                            <option value="199">199</option>
                                        </select>
                                        <div class="select-icon">
                                            <i class="icofont-rounded-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="select-item">
                                        <select>
                                            <option value="">All Skills</option>
                                            <option value="html">HTML</option>
                                            <option value="css">CSS</option>
                                            <option value="php">PHP</option>
                                            <option value="java">JAVA</option>
                                            <option value="javascript">JAVASCRIPT</option>
                                            <option value="wordpress">WORDPRESS</option>
                                            <option value="react">REACT</option>
                                            <option value="vue">VUE</option>
                                            <option value="angular">ANGULAR</option>
                                        </select>
                                        <div class="select-icon">
                                            <i class="icofont-rounded-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- group select section ending here -->


    <!-- course section start here -->
    <div class="course-section padding-tb section-bg">
        <div class="container">
            <div class="section-wrapper">
                <div class="course-showing-part">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        <div class="course-showing-part-left">
                            <p>Showing 1-6 of 10 results</p>
                        </div>
                        <div class="course-showing-part-right d-flex flex-wrap align-items-center">
                            <span>Sort by :</span>
                            <div class="select-item">
                                <select>
                                    <option value="">Select Oder</option>
                                    <option value="html">HTML</option>
                                    <option value="css">CSS</option>
                                    <option value="php">PHP</option>
                                    <option value="java">JAVA</option>
                                    <option value="javascript">JAVASCRIPT</option>
                                </select>
                                <div class="select-icon">
                                    <i class="icofont-rounded-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               <div class="row g-4 justify-content-center">
    @foreach ($courses as $index => $course)
        <div class="col-xl-4 col-md-6 col-12">
            <div class="course-item">
                <div class="course-inner">
                    <div class="course-thumb">
                        @if ($course->image)
                            <img src="{{ asset($course->image) }}" alt="course" width="320px" height="190px">
                        @else
                            <p>No Image</p>
                        @endif
                    </div>
                    <div class="course-content">
                       
                        <div class="course-category">
                            <div class="course-cate">
                                <a href="#">Rs.{{$course->total_price}}</a>
                                <div class="couse-count " style="color:blue;"><span style="color:grey;">First Payment:</span> Rs.{{$course->first_payment}}</div>
                            </div>
                         
                        </div>
                        <a href="course-single.html"><h5>{{ $course->name }}</h5></a>
                        <div class="course-details">
                            <div class="couse-count"><i class="icofont-video-alt"></i> {{$course->duration}}x Lesson</div>
                            <div class="couse-topic"><i class="icofont-signal"></i> Online Class</div>
                        </div>
                        <div class="course-footer">
                            <div class="course-author">
                                <img src="assets/images/course/author/02.jpg" alt="course author">
                                <a href="team-single.html" class="ca-name">Lora Smith</a>
                            </div>
                            <div class="course-btn">
                                <a href="course-single.html" class="lab-btn-text">Read More <i class="icofont-external-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


                    
                </div>
                <ul class="default-pagination lab-ul">
                    <li>
                        <a href="#"><i class="icofont-rounded-left"></i></a>
                    </li>
                    <li>
                        <a href="#">01</a>
                    </li>
                    <li>
                        <a href="#" class="active">02</a>
                    </li>
                    <li>
                        <a href="#">03</a>
                    </li>
                    <li>
                        <a href="#"><i class="icofont-rounded-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- course section ending here -->

     


        @endsection   

    
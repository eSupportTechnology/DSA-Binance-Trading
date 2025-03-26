@extends('frontend.master')

@section('title', 'Home - Edukon')

@section('content')

<style>
.pageheader-section {
    position: relative;
    height: 500px;
    overflow: hidden;
}

.pageheader-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('{{ asset('assets/images/international-cover1.jpeg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    filter: blur(5px);
    z-index: 1;
}

.pageheader-content {
    position: relative;
    z-index: 2;
    padding-top: 150px;
    color: white;
    text-align: center;
}

.breadcrumb-item a {
    color: white;
}

.pageheader-content h2 {
    color:rgb(255, 252, 251); /* Replace this with your desired color code */
    font-weight: bold; /* Optional: To make the text bold */
}
</style>

<!-- Pageheader section start here -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content">
                    <h2>International Student</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">International Student</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pageheader section ending here -->


    
<div class="container mt-5">
    <form action="{{ route('frontend.international-stu') }}" method="POST">
        @csrf
        <div class="row g-3">
            <!-- First Name -->
            <div class="col-md-6">
                <label for="first_name" class="form-label">First Name *</label>
                <input type="text" id="first_name" name="first_name" class="form-control" required>
            </div>
            <!-- Last Name -->
            <div class="col-md-6">
                <label for="last_name" class="form-label">Last Name *</label>
                <input type="text" id="last_name" name="last_name" class="form-control" required>
            </div>
            <!-- Email -->
            <div class="col-md-6">
                <label for="email" class="form-label">Email *</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <!-- Contact Number -->
            <div class="col-md-6">
                <label for="contact_number" class="form-label">Contact Number *</label>
                <input type="text" id="contact_number" name="contact_number" class="form-control" required>
            </div>
            <!-- Address -->
            <div class="col-md-6">
                <label for="address" class="form-label">Address *</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
            <!-- City -->
            <div class="col-md-6">
                <label for="city" class="form-label">City *</label>
                <input type="text" id="city" name="city" class="form-control" required>
            </div>
            <!-- Passport Number -->
            <div class="col-md-6">
                <label for="passport_number" class="form-label">Passport Number *</label>
                <input type="text" id="passport_number" name="passport_number" class="form-control" required>
            </div>
            <!-- Student Registration Number -->
            <div class="col-md-6">
                <label for="student_registration_number" class="form-label">Student Registration Number *</label>
                <input type="text" id="student_registration_number" name="student_registration_number" class="form-control" required>
            </div>
            <!-- Course -->
            <div class="col-md-6">
                <label for="course" class="form-label">Course *</label>
                <select id="course" name="course" class="form-select" required>
                    <option value="" selected disabled>Select Course</option>
                    <option value="Course 1">Course 1</option>
                    <option value="Course 2">Course 2</option>
                </select>
            </div>
            <!-- Amount -->
            <div class="col-md-6">
                <label for="amount" class="form-label">Amount (USD) *</label>
                <input type="number" id="amount" name="amount" class="form-control" required>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-warning">Pay Now</button>
        </div>
    </form>
</div>
<br>

@endsection

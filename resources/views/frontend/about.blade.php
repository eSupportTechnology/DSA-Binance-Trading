@extends('frontend.master')

@section('title', 'Home - Edukon')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
    color: rgb(255, 252, 251); /* Replace this with your desired color code */
    font-weight: bold; /* Optional: To make the text bold */
}

.vis-container {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    background-color:rgb(27, 41, 84);;
    padding: 50px;
    color: white;
    margin-top: 50px; /* Add spacing between sections */
    padding: 20px 10px;
}

.vis-content-box {
    width: 40%;
}

.vis-content-box h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.vis-content-box h2::after {
    content: '';
    display: block;
    width: 50px;
    height: 5px;
    background-color: rgb(254, 108, 18);;
    margin-top: 5px;
}

.vis-content-box p {
    font-size: 16px;
    line-height: 1.8;
    margin: 20px 0;
}

.vis-content-box .quote {
    font-size: 30px;
    font-weight: bold;
}


</style>

<!-- Pageheader section start here -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pageheader section ending here -->

<!-- About Us Section Start Here -->
<div class="about-section style-3 padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center row-cols-xl-2 row-cols-1 align-items-center">
            <div class="col">
                <div class="about-left">
                    <div class="about-thumb">
                        <img src="assets/images/about.jpeg" alt="about">
                    </div>
                    <div class="abs-thumb">
                        <img src="assets/images/about.jpeg" alt="about">
                    </div>
                    <div class="about-left-content">
                        <h3>30+</h3>
                        <p>Years Of Experiences</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="about-right">
                    <div class="section-header">
                        <div class="subtitle">
                            <span class="subtitle" style="color: rgb(254, 108, 18);">About IW</span>
                        </div>
                        <h2 class="title">Good Qualification Services And Better Skills</h2>
                        <p>We are a body of professionals specialising in the fields of Management, Marketing, Finance, Human Resources, Education, and Visa guidance. Having worked for decades in industries relevant to our fields, we have now collaborated in order to provide you with the best solution for your business & educational needs. In order to remain a forerunner among competitors, it is our belief that continuous transformation, creativity, and innovation provide a competitive edge within the industry.</p>
                    </div>
                    <div class="section-wrapper">
                        <ul class="lab-ul">
                            <li>
                                <div class="sr-left">
                                    <i class="fas fa-chalkboard-teacher fa-3x" style="color: rgb(254, 108, 18);"></i>
                                </div>
                                <div class="sr-right">
                                    <h5>Skilled Instructors</h5>
                                    <p>We provide access to skilled instructors who are ready to share their expertise.</p>
                                </div>
                            </li>
                            <li>
                                <div class="sr-left">
                                    <i class="fas fa-certificate fa-3x" style="color: rgb(254, 108, 18);"></i>
                                </div>
                                <div class="sr-right">
                                    <h5>Get Certificate</h5>
                                    <p>Earn certificates to showcase your achievements and skills effectively.</p>
                                </div>
                            </li>
                            <li>
                                <div class="sr-left">
                                    <i class="fas fa-laptop fa-3x" style="color: rgb(254, 108, 18);"></i>
                                </div>
                                <div class="sr-right">
                                    <h5>Online Classes</h5>
                                    <p>Access engaging and interactive online classes from anywhere in the world.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us Section Ending Here -->

<!-- Vision and Mission Section Start Here -->
<div class="vis-container" style = "margin-left: 90px; margin-right: 90px;">
    <div class="vis-content-box" style="color: white;">
        <h2 style="color: white;">Our Vision</h2>
        <span class="quote">“</span>
        <p style="color:white">
            We aspire to cultivate a dynamic learning environment that nurtures creativity, critical thinking, and entrepreneurial mindset to our graduates and aim to inspire our students to become catalysts for change, instilling in them a deep understanding of ethical business practices and social responsibility.
        </p>
    </div>
    <div class="vis-content-box" style="color: white;">
        <h2 style="color: white;">Our Mission</h2>
        <span class="quote">“</span>
        <p style="color:white">
            Our mission at Imperial College of Business Studies is to empower individuals with knowledge, skills, positive attitude and values that drive business excellence and societal impact. We are dedicated to delivering world-class education, coupled with cutting-edge learning tools, and aim to foster a vibrant community of diverse and innovative thinkers who will become successful business leaders.
        </p>
    </div>
</div>
<!-- Vision and Mission Section Ending Here -->

<!-- Message From The Dean Section Start Here -->
<div style="display: flex; align-items: center; padding: 90px;">
  <div style="flex: 1; padding-right: 90px;">
    <h2 class="title">Message From The Dean</h2>
    <br>
    <br>
    <p style="font-size: 16px; line-height: 1.8; text-align: justify;">
      At Imperial College, we prioritize your professional growth and strive to unlock your full career potential. Our carefully designed curriculum and course modules cater to the needs of professionals like you, equipping you with high-caliber skills to tackle the challenges of the contemporary business world. We provide a conducive and comfortable environment for teaching and learning, ensuring an enriching experience throughout your journey. Our dedicated academic staff will guide you step-by-step towards the successful completion of your Master's degree program.
    </p>
    <p style="font-size: 16px; line-height: 1.8; text-align: justify;">
      I take immense pride in sharing that our graduates, both in Sri Lanka and overseas, have excelled in their respective professions. As the Dean, warmly welcome you and congratulate you on considering our programs for your higher education journey. Your decision to join us has the power to bring about a transformative and lasting impact on your life!
    </p>
    <p style="font-size: 18px; font-weight: bold; margin-top: 20px;">Dr. Ganeshamoorthy<br>Ph.D</p>
  </div>
  <div style="flex: 1; display: flex; justify-content: center;">
    <img src="assets/images/dean-icbs.png" alt="Dean's Image" style="border-radius: 10px; max-width: 100%; height: auto;">
  </div>
</div>
<!-- Message From The Dean Section End Here -->

<!-- Our Partners Section Start Here-->
<div class="partners-section" style="padding: 50px 20px; background-color: #f9f9f9; text-align: center;">
  <h1 style="font-size: 2rem; position: relative; display: inline-block; margin-bottom: 20px;">
    Our Partners
    <span style="display: block; width: 50px; height: 3px; background-color: rgb(254, 108, 18); margin: 10px auto 0 auto;"></span>
  </h1>
  <div class="logos" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; margin-top: 30px;">
    <img src="{{ asset('assets/images/logo-uws.png') }}" alt="University of the West of Scotland" style="max-width: 150px; max-height: 100px; object-fit: contain;">
    <img src="{{ asset('assets/images/qmu-logo.png') }}" alt="Queen Margaret University" style="max-width: 150px; max-height: 100px; object-fit: contain;">
    <img src="{{ asset('assets/images/southern-cross-logo.png') }}" alt="Southern Cross University" style="max-width: 150px; max-height: 100px; object-fit: contain;">
    <img src="{{ asset('assets/images/sqa-logo.png') }}" alt="SQA" style="max-width: 150px; max-height: 100px; object-fit: contain;">
    <img src="{{ asset('assets/images/aicpa-logo.jpg') }}" alt="AICPA & CIMA" style="max-width: 150px; max-height: 100px; object-fit: contain;">
    <img src="{{ asset('assets/images/cima-logo.jpg') }}" alt="CIMA" style="max-width: 150px; max-height: 100px; object-fit: contain;">
    <img src="{{ asset('assets/images/aat-logo.png') }}" alt="AAT" style="max-width: 150px; max-height: 100px; object-fit: contain;">
  </div>
</div>
<!-- Our Partners Section End Here-->
@endsection

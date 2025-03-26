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
    color:rgb(255, 252, 251); /* Replace this with your desired color code */
    font-weight: bold; /* Optional: To make the text bold */
}

</style>

    <!-- Page Header section start here -->
    <div class="pageheader-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageheader-content text-center">
                        <h2>Get In Touch With Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->

    <!-- Map & address us Section Section Starts Here -->
    <div class="map-address-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle" style="color: rgb(237, 128, 30);">Get in touch with us</span>
                <h2 class="title">We're Always Eager To Hear From You!</h2>
            </div>
            <div class="section-wrapper">
                <div class="row flex-row-reverse">
                    <div class="col-xl-4 col-lg-5 col-12">
                        <div class="contact-wrapper">
                            <div class="contact-item">
                                <div class="contact-thumb">
                                <i class="fas fa-map-marker-alt" style="color: rgb(237, 128, 30);"></i>
                                </div>
                                <div class="contact-content">
                                    <h6 class="title">Office Address</h6>
                                    <p>No 320, 1/1,
                                       Galle Road, Colombo 3,
                                       Sri Lanka.</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-thumb">
                                <i class="fas fa-phone-alt" style="color: rgb(237, 128, 30);"></i>
                                </div>
                                <div class="contact-content">
                                    <h6 class="title">Phone number</h6>
                                    <p>+94 766 888 184</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-thumb">
                                <i class="fas fa-envelope" style="color: rgb(237, 128, 30);"></i>
                                </div>
                                <div class="contact-content">
                                    <h6 class="title">Send email </h6>
                                    <a href="mailto:info@gmail.com">www.info@impwis@gmail.com</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-thumb">
                                <i class="fas fa-globe" style="color: rgb(237, 128, 30);"></i>
                                </div>
                                <div class="contact-content">
                                    <h6 class="title">Our website</h6>
                                    <a href="#">info@impwis.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-12">
                        <div class="map-area">
                            <div class="maps">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.2275990948147!2d90.38698831543141!3d23.739261895117753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b85c740f17d1%3A0xdd3daab8c90eb11f!2sCodexCoder!5e0!3m2!1sen!2sbd!4v1607313671993!5m2!1sen!2sbd" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Map & address us Section Section Ends Here -->

    <!-- Contact us Section Section Starts Here -->
    <div class="contact-section padding-tb">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Get in touch with Contact us</span>
                <h2 class="title">Fill The Form Below So We Can Get To Know You And Your Needs Better.</h2>
            </div>
            <div class="section-wrapper">
                <form class="contact-form" action="contact.php" id="contact-form" method="POST">
                    <div class="form-group">
                        <input type="text" placeholder="Your Name" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Your Email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Phone" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Subject" id="subject" name="subject" required>
                    </div>
                    <div class="form-group w-100">
                        <textarea name="message" rows="8" id="message" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="form-group w-100 text-center">
                        <button class="lab-btn" style="background-color:rgb(237, 53, 50); "><span>Send our Message</span></button>
                    </div>
                </form>
                <p class="form-message"></p> 
            </div>
        </div>
    </div>
    <!-- Contact us Section Section Ends Here -->

    @endsection
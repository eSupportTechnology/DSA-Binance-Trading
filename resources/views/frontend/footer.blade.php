<!-- footer -->
<div class="news-footer-wrap">
    <div class="fs-shape">
        <img src="{{ asset('frontend/assets/images/shape-img/03.png') }}" alt="fst" class="fst-1">
        <img src="{{ asset('frontend/assets/images/shape-img/04.png') }}" alt="fst" class="fst-2">
    </div>

    <!-- Newsletter Section -->
    <div class="news-letter">
        <div class="container">
            <div class="section-wrapper">
                <div class="news-title">
                    <h3>Want Us To Email You About Special Offers And Updates?</h3>
                </div>
                <div class="news-form">
                    <form action="#">
                        <div class="nf-list">
                            <input type="email" name="email" placeholder="Enter Your Email">
                            <input type="submit" name="submit" style="background-color: #ee1831;" value="Subscribe Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer-top padding-tb pt-0">
            <div class="container">
                <div class="row g-4 row-cols-xl-4 row-cols-md-2 row-cols-1 justify-content-center">

                    <!-- Company Info -->
                    <div class="col pr-5">
                        <div class="footer-item">
                            <div class="footer-inner text-center">
                                <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="DSA Logo" style="max-width: 150px; ">
                                <p class="mt-3 text-muted">DSA Academy is your trusted partner for mastering Forex & Crypto trading with top-tier guidance.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Useful Links -->
                    <div class="col">
                        <div class="footer-item">
                            <div class="footer-inner">
                                <div class="footer-content">
                                    <div class="title">
                                        <h4>Useful Links</h4>
                                    </div>
                                    <div class="content">
                                        <ul class="lab-ul">
                                            <li><a href="{{ url('/') }}">Home</a></li>
                                            <li><a >Courses</a></li>
                                            <li><a >VIP Packages</a></li>
                                            <li><a >Blog</a></li>
                                            <li><a >Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="col">
                        <div class="footer-item">
                            <div class="footer-inner">
                                <div class="footer-content">
                                    <div class="title">
                                        <h4>Follow Us</h4>
                                    </div>
                                    <div class="content">
                                        <ul class="lab-ul">
                                            <li><a href="#"><i class="icofont-facebook"></i> Facebook</a></li>
                                            <li><a href="#"><i class="icofont-twitter"></i> Twitter</a></li>
                                            <li><a href="#"><i class="icofont-instagram"></i> Instagram</a></li>
                                            <li><a href="#"><i class="icofont-youtube"></i> YouTube</a></li>
                                            <li><a href="#"><i class="icofont-brand-whatsapp"></i> WhatsApp</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Support -->
                    <div class="col">
                        <div class="footer-item">
                            <div class="footer-inner">
                                <div class="footer-content">
                                    <div class="title">
                                        <h4>Support</h4>
                                    </div>
                                    <div class="content">
                                        <ul class="lab-ul">
                                            <li><a href="#">Help Center</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Terms & Conditions</a></li>
                                            <li><a href="#">Support Ticket</a></li>
                                            <li><a href="#">FAQs</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom style-2">
            <div class="container">
                <div class="section-wrapper text-center">
                    <p>&copy; {{ date('Y') }} DSA Academy. Designed by <a href="https://esupporttech.lk" target="_blank">Esupport Technologies</a>.</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- footer -->

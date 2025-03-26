
@extends('frontend.master')


@section('content')

<style>
    .pageheader-section {
    position: relative;
    background-image: url('{{ asset('frontend1/assets/images/cover2.jpg') }}');
    background-size: cover;
    background-position: center;
    z-index: 1;
}

.pageheader-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: inherit;
    background-size: cover;
    background-position: center;
    filter: blur(2px);
    z-index: -1; 
}

</style>

  <!-- Page Header section start here -->
  <div class="pageheader-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pageheader-content text-center">
                        <h2  style="color:white !important">Our Blog Posts</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header section ending here -->

    
    <!-- blog section start here -->
    <div class="blog-section padding-tb section-bg">
        <div class="container">
            <div class="section-wrapper">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <a href="blog-single.html"><img src="frontend1/assets/images/blog/01.jpeg" alt="blog thumb" class="responsive-img" style="width:600px; height:270px"></a>
                                </div>
                                <div class="post-content">
                                    <a href="blog-single.html"><h4 class="hover-red" style ="color:rgb(27, 41, 84);" onmouseover="this.style.color=' rgb(237, 53, 50)';" onmouseout="this.style.color='rgb(27, 41, 84)';">The Accomplice.</h4></a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user" style="color: rgb(237, 128, 30);"></i>Begrass Tyson</li>
                                            <li><i class="icofont-calendar" style="color: rgb(237, 128, 30);"></i>April 23,2021</li>
                                        </ul>
                                    </div>
                                    <p>Scrambling to delay the inevitable I’ll cling to the edge of your shirt All my cards are on the table So go ahead, make me hurt</p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="blog-single.html" class="lab-btn-text" style="color: rgb(237, 128, 30);">Read more <i class="icofont-external-link" style="color: rgb(237, 128, 30);"></i></a>
                                    </div>
                                    <div class="pf-right">
                                        <i class="icofont-comment" style="color: rgb(237, 128, 30);"></i>
                                        <span class="comment-count">3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <a href="blog-single.html"><img src="frontend1/assets/images/blog/02.jpg" alt="blog thumb" class="responsive-img" style="width:600px; height:270px"></a>
                                </div>
                                <div class="post-content">
                                    <a href="blog-single.html"><h4 style ="color:rgb(27, 41, 84); "  onmouseover="this.style.color=' rgb(237, 128, 30)';" onmouseout="this.style.color='rgb(27, 41, 84)';">The Patriarchal Society.</h4></a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user" style="color: rgb(237, 128, 30);"></i>Begrass Tyson</li>
                                            <li><i class="icofont-calendar" style="color: rgb(237, 128, 30);"></i>April 23,2021</li>
                                        </ul>
                                    </div>
                                    <p>In general, promoting gender equality requires a multifaceted approach that involves education, legal reform, </p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="blog-single.html" class="lab-btn-text"style="color: rgb(237, 128, 30)">Read more <i class="icofont-external-link"></i></a>
                                    </div>
                                    <div class="pf-right">
                                        <i class="icofont-comment" style="color: rgb(237, 128, 30)"></i>
                                        <span class="comment-count">3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <a href="blog-single.html"><img src="frontend1/assets/images/blog/03.jpeg" alt="blog thumb" style="width:600px; height:270px"></a>
                                </div>
                                <div class="post-content">
                                    <a href="blog-single.html"><h4 style ="color:rgb(27, 41, 84); "  onmouseover="this.style.color=' rgb(237, 53, 50)';" onmouseout="this.style.color='rgb(27, 41, 84)';">Oh, how the mighty have fallen!</h4></a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user" style="color: rgb(237, 128, 30)"></i>Begrass Tyson</li>
                                            <li><i class="icofont-calendar" style="color: rgb(237, 128, 30)"></i>April 23,2021</li>
                                        </ul>
                                    </div>
                                    <p>It was a cold, cold day in December and the grandfather clock was striking eleven.  I walk through the crowd of crime scene investigators, </p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="blog-single.html" class="lab-btn-text" style="color: rgb(237, 128, 30)">Read more <i class="icofont-external-link"></i></a>
                                    </div>
                                    <div class="pf-right">
                                        <i class="icofont-comment"style="color: rgb(237, 128, 30)"></i>
                                        <span class="comment-count">3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <a href="blog-single.html"><img src="frontend1/assets/images/blog/4.jpeg" alt="blog thumb"></a>
                                </div>
                                <div class="post-content">
                                    <a href="blog-single.html"><h4 style ="color:rgb(27, 41, 84) "  onmouseover="this.style.color=' style="color: rgb(237, 128, 30)">Surviving an Earthquake</h4></a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user" style="color: rgb(237, 128, 30)"></i>Begrass Tyson</li>
                                            <li><i class="icofont-calendar" style="color: rgb(237, 128, 30)"></i>April 23,2021</li>
                                        </ul>
                                    </div>
                                    <p>Keep up to date on earthquake threats in your area and be ready to act if necessary.</p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="blog-single.html" class="lab-btn-text"style="color: rgb(237, 128, 30)">Read more <i class="icofont-external-link"></i></a>
                                    </div>
                                    <div class="pf-right">
                                        <i class="icofont-comment" style="color: rgb(237, 128, 30)"></i>
                                        <span class="comment-count"  >3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <a href="blog-single.html"><img src="frontend1/assets/images/blog/5.jpeg" alt="blog thumb"></a>
                                </div>
                                <div class="post-content">
                                    <a href="blog-single.html"><h4 style ="color:rgb(27, 41, 84); "  onmouseover="this.style.color=' rgb(237, 53, 50)';" onmouseout="this.style.color='rgb(27, 41, 84)';">To My Beloved</h4></a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user" style="color: rgb(237, 128, 30)"></i>Begrass Tyson</li>
                                            <li><i class="icofont-calendar" style="color: rgb(237, 128, 30)"></i>April 23,2021</li>
                                        </ul>
                                    </div>
                                    <p>Therefore, in love do I close your eyes,
                                    Your sighs I stop from escaping you,</p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="blog-single.html" class="lab-btn-text" style="color: rgb(237, 128, 30)">Read more <i class="icofont-external-link"></i></a>
                                    </div>
                                    <div class="pf-right">
                                        <i class="icofont-comment" style="color: rgb(237, 128, 30)"></i>
                                        <span class="comment-count">3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <a href="blog-single.html"><img src="frontend1/assets/images/blog/6.jpeg" alt="blog thumb"></a>
                                </div>
                                <div class="post-content">
                                    <a href="blog-single.html"><h4 style ="color:rgb(27, 41, 84); "  onmouseover="this.style.color=' rgb(237, 53, 50)';" onmouseout="this.style.color='rgb(27, 41, 84)';">The Effect of AI for the future</h4></a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user" style="color: rgb(237, 128, 30)"></i>Begrass Tyson</li>
                                            <li><i class="icofont-calendar" style="color: rgb(237, 128, 30)"></i>April 23,2021</li>
                                        </ul>
                                    </div>
                                    <p>In conclusion, while it is difficult to predict the full impact of AI technologies on the ICT sector,</p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="blog-single.html" class="lab-btn-text" style="color: rgb(237, 128, 30)">Read more <i class="icofont-external-link"></i></a>
                                    </div>
                                    <div class="pf-right">
                                        <i class="icofont-comment" style="color: rgb(237, 128, 30)"></i>
                                        <span class="comment-count">3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <!-- blog section ending here -->


    @endsection
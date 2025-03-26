<!-- header section start here --> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>

a {
    text-decoration: none !important;
}
    .header-top a {

}
.header-top a:hover {
    color: #ffa600; 
    text-decoration: underline; 
}
.signup {
    background-color: #ffa600;
    border: 1px solid #ffa600; 
    color: #003366 !important; 
    font-size: 14px; 
    padding: 5px 20px; 
    border-radius: 20px; 
    text-transform: uppercase;
    margin-left:10px;
}
.signup:hover {
    background-color:rgb(4, 40, 75);
    color: #ffa600 !important;  
    border: 1px solid #ffa600; 
}
.login {
    background-color: transparent; 
    border: 1px solid #ffa600; 
    color: #ffa600; 
    font-size: 14px;
    padding: 5px 20px; 
    border-radius: 20px; 
    text-transform: uppercase; 
}
.login:hover {
    background-color: #ffa600; 
    color: #003366 !important; 
}
.lab-ul li i{
    color: #ffa600 !important; 
}
</style>


    <header class="header-section">
        <div class="header-top" style=" background-color:rgb(4, 40, 75); 
    color: #fff; ">
            <div class="container">
                <div class="header-top-area">
                    <ul class="lab-ul left">
                        <li>
                            <i class="fa fa-envelope"></i> <span>dsacademy995@gmail.com</span>
                        </li>
                        <li>
                            <i class="icofont-ui-call"></i> <span>074 002 0222 / 070 360 0690</span>
                        </li>
                    </ul>
                    <ul class="lab-ul social-icons d-flex align-items-center">
                        <li><p></p></li>
                        <li>
                            <a href="https://youtube.com/@dsaacademylk?si=wYkBGSyTYsxDbKAr" class="youtube" target="_blank" title="YouTube">
                                <i class="icofont-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.tiktok.com/@dsa_academy?_t=ZS-8uwiQdxgMmO&_r=1" class="tiktok" target="_blank" title="TikTok">
                                <i class="icofont-twitch"></i> <!-- No TikTok icon, using Twitch as placeholder -->
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/share/1EAj83c8JN/?mibextid=wwXIfr" class="facebook" target="_blank" title="Facebook">
                                <i class="icofont-facebook-messenger"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/share/1B8Hty84zo/?mibextid=wwXIfr" class="facebook" target="_blank" title="Facebook">
                                <i class="icofont-facebook-messenger"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="lab-ul right">
                        <a href="login.html" class="login"><i class="icofont-user"></i> <span>LOG IN</span> </a>
                        <a href="signup.html" class="signup"><i class="icofont-users"></i> <span>SIGN UP</span> </a>
                    </ul>

                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo"  style="width:200px; height:auto"></a>
                    </div> 
                    <div class="menu-area">
                        <div class="menu"  >
                            <ul class="lab-ul right" >
                                
                                <li> <a href="{{ route('frontend.home') }}">Home</a>  </li>

                                <li> <a href="">courses</a> </li>

                                <li><a href="{{ route('frontend.blog') }}">Blogs</a></li>

                                <li> <a href="">About Us</a> </li>
                                   
                                <li><a href="contact.html">Contact</a></li>

                            </ul>
                        </div>

                        <!-- toggle icons -->
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="ellepsis-bar d-lg-none">
                            <i class="icofont-info-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header section ending here -->


    
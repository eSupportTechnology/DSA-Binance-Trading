<!-- header section start here --> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>

a {
    text-decoration: none !important;
}
    .header-top a {

}
.header-top a:hover {
    color: #ee1831; 
    text-decoration: underline; 
}
.signup {
    background-color: white;
    border: 1px solid white; 
    color: #003366 !important; 
    font-size: 14px; 
    padding: 5px 20px; 
    border-radius: 20px; 
    text-transform: uppercase;
    margin-left:10px;
}
.signup:hover {
    background-color:rgb(4, 40, 75);
    color: #ee1831 !important;  
    border: 1px solid #ee1831; 
}
.login {
    
    border: 1px solid white; 
    color: white !important; 
    font-size: 14px; 
    padding: 5px 20px; 
    border-radius: 20px; 
    text-transform: uppercase;
    margin-left:10px;
}
.login:hover {
    background-color:rgb(4, 40, 75);
    color: #ee1831 !important;  
    border: 1px solid #ee1831; 
}
.lab-ul li i{
    color: white !important; 
    font-size:20px!important;
}
.lab-ul li i:hover{
    color:  #ee1831 !important; 
    font-size:20px!important;
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
                        <a href="{{ route('frontend.login') }}" class="login"><i class="icofont-user"></i> <span>LOG IN</span> </a>
                        <a href="{{ route('frontend.signup') }}"  class="signup"><i class="icofont-users"></i> <span>SIGN UP</span> </a>
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

                                <li> <a href="{{route('frontend.Course')}}">courses</a> </li>

                               

                                <li> <a href="{{ route('frontend.about') }}">About Us</a> </li>
                                   
                                <li><a href="{{ route('frontend.contact') }}">Contact</a></li>

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


    
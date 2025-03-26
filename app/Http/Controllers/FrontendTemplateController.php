<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendTemplateController extends Controller
{
    public function home()
    {
        return view('frontend.Home');
    }
    public function Home_Two()
    {
        return view('frontend.Home_Two');
    }
    public function Home_Three()
    {
        return view('frontend.Home_Three');
    }
    public function Home_Four()
    {
        return view('frontend.Home_Four');
    }
    public function Home_Five()
    {
        return view('frontend.Home_Five');
    }
    public function Home_Six()
    {
        return view('frontend.Home_Six');
    }
    public function Home_Seven()
    {
        return view('frontend.Home_Seven');
    }
    public function Course()
    {
        return view('frontend.Course');
    }
    public function Course_Details()
    {
        return view('frontend.Course_Details');
    }
    public function blog()
    {
        return view('frontend.blog');
    }
    public function blog_style2()
    {
        return view('frontend.blog_style2');
    }
    public function blog_style3()
    {
        return view('frontend.blog_style3');
    }
    public function blog_single()
    {
        return view('frontend.blog_single');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function team()
    {
        return view('frontend.team');
    }
    public function instructor()
    {
        return view('frontend.instructor');
    }
    public function shop()
    {
        return view('frontend.shop');
    }
    public function shop_single()
    {
        return view('frontend.shop_single');
    }
    public function cart_page()
    {
        return view('frontend.cart_page');
    }
    public function search_page()
    {
        return view('frontend.search_page');
    }
    public function search_none()
    {
        return view('frontend.search_none');
    }
    public function error()
    {
        return view('frontend.404');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function login()
    {
        return view('frontend.login');
    }
    public function signup()
    {
        return view('frontend.signup');
    }
    public function team_single()
    {
        return view('frontend.team_single');
    }
    public function forgetpass()
    {
        return view('frontend.forgetpass');
    }
    public function study()
    {
        return view('frontend.study');
    }
}

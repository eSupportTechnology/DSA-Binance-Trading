<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendTemplateController;
use App\Http\Controllers\BackendTemplateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseFileController;
use App\Http\Controllers\CourseRecordingController;
use App\Http\Controllers\CourseZoomLinkController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// frontend
Route::get('/', [FrontendTemplateController::class, 'home'])->name('frontend.home');
Route::get('/Home_Two', [FrontendTemplateController::class, 'Home_Two'])->name('frontend.Home_Two');
Route::get('/Home_Three', [FrontendTemplateController::class, 'Home_Three'])->name('frontend.Home_Three');
Route::get('/Home_Four', [FrontendTemplateController::class, 'Home_Four'])->name('frontend.Home_Four');
Route::get('/Home_Five', [FrontendTemplateController::class, 'Home_Five'])->name('frontend.Home_Five');
Route::get('/Home_Six', [FrontendTemplateController::class, 'Home_Six'])->name('frontend.Home_Six');
Route::get('/Home_Seven', [FrontendTemplateController::class, 'Home_Seven'])->name('frontend.Home_Seven');
Route::get('/Course', [FrontendTemplateController::class, 'Course'])->name('frontend.Course');
Route::get('/Course_Details', [FrontendTemplateController::class, 'Course_Details'])->name('frontend.Course_Details');
Route::get('/blog', [FrontendTemplateController::class, 'blog'])->name('frontend.blog');
Route::get('/blog_style2', [FrontendTemplateController::class, 'blog_style2'])->name('frontend.blog_style2');
Route::get('/blog_style3', [FrontendTemplateController::class, 'blog_style3'])->name('frontend.blog_style3');
Route::get('/blog_single', [FrontendTemplateController::class, 'blog_single'])->name('frontend.blog_single');
Route::get('/about', [FrontendTemplateController::class, 'about'])->name('frontend.about');
Route::get('/team', [FrontendTemplateController::class, 'team'])->name('frontend.team');
Route::get('/instructor', [FrontendTemplateController::class, 'instructor'])->name('frontend.instructor');
Route::get('/shop', [FrontendTemplateController::class, 'shop'])->name('frontend.shop');
Route::get('/shop_single', [FrontendTemplateController::class, 'shop_single'])->name('frontend.shop_single');
Route::get('/cart_page', [FrontendTemplateController::class, 'cart_page'])->name('frontend.cart_page');
Route::get('/search_page', [FrontendTemplateController::class, 'search_page'])->name('frontend.search_page');
Route::get('/search_none', [FrontendTemplateController::class, 'search_none'])->name('frontend.search_none');
Route::get('/404', [FrontendTemplateController::class, 'error'])->name('frontend.404');
Route::get('/contact', [FrontendTemplateController::class, 'contact'])->name('frontend.contact');
Route::get('/login', [FrontendTemplateController::class, 'login'])->name('frontend.login');
Route::get('/signup', [FrontendTemplateController::class, 'signup'])->name('frontend.signup');
Route::get('/team_single', [FrontendTemplateController::class, 'team_single'])->name('frontend.team_single');
Route::get('/forgetpass', [FrontendTemplateController::class, 'forgetpass'])->name('frontend.forgetpass');
Route::get('/study', [FrontendTemplateController::class, 'study'])->name('frontend.study');
Route::view('international-stu', 'frontend.international-stu')->name('international-stu');
Route::get('/frontend/international-stu', function (){
    return view('frontend.international-stu');
})->name('frontend.international-stu');
Route::get('/frontend/contact', function (){
    return view('frontend.contact');
})->name('frontend.contact');
require __DIR__.'/auth.php';



//admindashboard

Route::get('/admin', [BackendTemplateController::class, 'index'])->name('admin');

//course Managment
Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
});

//course Files Managment
Route::prefix('coursesFiles')->group(function () {
    Route::get('/', [CourseFileController::class, 'index'])->name('courseFile.index');
    Route::get('/courses/{courseId}/files', [CourseFileController::class, 'second'])->name('courseFile.second');
    Route::get('/create', [CourseFileController::class, 'create'])->name('courseFile.create');
    Route::post('/courses/{courseId}/files', [CourseFileController::class, 'store'])->name('courseFile.store');
    Route::delete('/{id}', [CourseFileController::class, 'destroy'])->name('courseFile.destroy');
});

//course Recordings Managment
Route::prefix('coursesRecording')->group(function () {
    Route::get('/courses/{courseId}/files', [CourseRecordingController::class, 'index'])->name('coursesRecording.index');
    Route::post('/courses/{courseId}/files', [CourseRecordingController::class, 'store'])->name('coursesRecording.store');
    Route::delete('/{id}', [CourseRecordingController::class, 'destroy'])->name('coursesRecording.destroy');
});


//course Zoom Links Managment
Route::prefix('coursesZoomLinks')->group(function () {
    Route::get('/courses/{courseId}/files', [CourseZoomLinkController::class, 'index'])->name('coursesZoomLinks.index');
    Route::post('/courses/{courseId}/files', [CourseZoomLinkController::class, 'store'])->name('coursesZoomLinks.store');
    Route::delete('/{id}', [CourseZoomLinkController::class, 'destroy'])->name('coursesZoomLinks.destroy');
});

<?php

use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminPhotoController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\YouTubeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PhotoGalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class, 'index'])->name('Home');

//Contact page and store contact details
Route::get('/contact',[HomeController::class,'contact']);
Route::post('/save-contacts',[HomeController::class, 'saveContacts']);

//About page details
Route::get('/about',[AboutController::class, 'index'])->name('About');

//Gallery page details
Route::get('/photo-gallery', [PhotoGalleryController::class, 'index'])->name('Photo');

//Video page detail
//Route::get('/video-gallery', [YouTubeController::class, 'index'])->name('Video');
//Route::get('/watch-video', [YouTubeController::class, 'watch']);
Route::get('/video-gallery', function () {
    return view('frontend.video.watch');
});

//Service page details
Route::get('/services', [ServiceController::class, 'index'])->name('Services');

//Blog page details
Route::get('/blog',[BlogController::class, 'index'])->name('Blog');
Route::get('/single-blog/{id}', [BlogController::class, 'singleBlog']);


//Admin section
Route::get('/contact-list',[HomeController::class, 'contactList'])->name('contact-list');
Route::get('/contact-list-remove/{id}',[HomeController::class, 'contactListRemove']);
Route::resource('blogs', AdminBlogController::class);
Route::resource('slides', SlideController::class);
Route::resource('photos', AdminPhotoController::class);
Route::resource('service', AdminServiceController::class);
Route::resource('teams', AdminteamController::class);
Route::resource('abouts', AdminAboutController::class);





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AdminHomeController::class, 'home'])
->name('dashboard');

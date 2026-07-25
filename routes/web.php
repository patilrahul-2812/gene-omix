<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OurProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\OurProductInquiryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[FrontendController::class, 'home'])->name('home');
Route::get('about-us', [AboutController::class, 'about'])->name('about');
Route::get('brand', [BrandController::class, 'brand'])->name('brand');
Route::get('brand/{slug}', [BrandController::class, 'brand_detail'])->name('brand.brand_details');
Route::get('services', [ServiceController::class, 'service'])->name('service');
Route::get('services/{slug}', [ServiceController::class, 'service_detail'])->name('service.service_detail');
Route::get('our-product', [OurProductController::class, 'ourproduct'])->name('ourproduct');
Route::get('our-product/{slug}', [OurProductController::class, 'ourproduct_detail'])->name('ourproduct.ourproduct_detail');
Route::get('blog', [BlogController::class, 'blog'])->name('blog');
Route::get('blog/{slug}', [BlogController::class, 'blog_detail'])->name('blog.blogdetail');
Route::get('contact-us', [InquiryController::class, 'contact'])->name('contact');
Route::post('submit-form', [InquiryController::class, 'submit_inquiry'])->name('submit_contact_form');
Route::get('our-team', [OurTeamController::class, 'ourteam'])->name('ourteam');
Route::post('submit-inquiry-product', [OurProductInquiryController::class, 'submit_product_inquiry'])->name('submit_product_inquiry');
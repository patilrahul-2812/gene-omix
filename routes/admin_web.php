<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OurProductController;
use App\Http\Controllers\OurProductInquiryController;

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\WorkGalleryController;

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

Route::prefix('admin')->group(function() {

    Route::get('login', [UserController::class, 'login'])->name('login');

    Route::post('login_submit', [UserController::class, 'login_submit'])->name('admin.login_submit');

    Route::post('forgot-password', [UserController::class, 'forgot_password'])->name('user.forgot_password');

    Route::get('reset-password/{token}', [UserController::class, 'reset_password'])->name('reset.password.get');
    Route::put('reset-password/{token}', [UserController::class, 'post_password'])->name('reset.password.post');

    Route::group(['middleware' => ['auth']], function(){

        Route::get('profile', [UserController::class, 'profile'])->name('admin.profile');
        Route::post('update', [UserController::class, 'update_profile'])->name('admin.updateprofile');

        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [UserController::class, 'logout'])->name('admin.logout');

        Route::get('change-password', [UserController::class, 'change_password'])->name('changepassword');
        Route::put('update-password', [UserController::class, 'update_password'])->name('update_password');

        Route::resource('user', UserController::class);
        Route::get('user_delete', [UserController::class, 'multiple_delete'])->name('user.multiple_delete');
        Route::get('user_change_status', [UserController::class, 'change_status'])->name('user.change_status');
        Route::post('user_check_duplication', [UserController::class, 'check_duplication'])->name('user_check_duplication');

        Route::resource('slider', SliderController::class);
        Route::get('slider_delete', [SliderController::class, 'multiple_delete'])->name('slider.multiple_delete');
        Route::get('slider_change_status', [SliderController::class, 'change_status'])->name('slider.change_status');
        Route::post('slider_delete_image', [SliderController::class, 'delete_image'])->name('slider.update.image');
        
        Route::resource('testimonial', TestimonialController::class);
        Route::get('testimonial_delete', [TestimonialController::class, 'multiple_delete'])->name('testimonial.multiple_delete');
        Route::get('testimonial_change_status', [TestimonialController::class, 'change_status'])->name('testimonial.change_status');
        Route::post('testimonial_delete_image', [TestimonialController::class, 'delete_image'])->name('testimonial.update.image');
        
        Route::resource('brand', BrandController::class);
        Route::get('brand_delete', [BrandController::class, 'multiple_delete'])->name('brand.multiple_delete');
        Route::get('brand_change_status', [BrandController::class, 'change_status'])->name('brand.change_status');
        Route::post('brand_delete_image', [BrandController::class, 'delete_image'])->name('brand.update.image');
        
        Route::resource('service', ServiceController::class);
        Route::get('service_delete', [ServiceController::class, 'multiple_delete'])->name('service.multiple_delete');
        Route::get('service_change_status', [ServiceController::class, 'change_status'])->name('service.change_status');
        Route::post('service_delete_image', [ServiceController::class, 'delete_image'])->name('service.update.image');
        
        Route::resource('ourproduct', OurProductController::class);
        Route::get('ourproduct_delete', [OurProductController::class, 'multiple_delete'])->name('ourproduct.multiple_delete');
        Route::get('ourproduct_change_status', [OurProductController::class, 'change_status'])->name('ourproduct.change_status');
        Route::post('ourproduct_delete_image', [OurProductController::class, 'delete_image'])->name('ourproduct.update.image');
        
        Route::resource('blog', BlogController::class);
        Route::get('blog_delete', [BlogController::class, 'multiple_delete'])->name('blog.multiple_delete');
        Route::get('blog_change_status', [BlogController::class, 'change_status'])->name('blog.change_status');
        Route::post('blog_delete_image', [BlogController::class, 'delete_image'])->name('blog.update.image');

        Route::resource('setting', SettingController::class);
        Route::post('setting_submit', [SettingController::class, 'setting_submit'])->name('setting_submit');

        Route::resource('about', AboutController::class);
        Route::post('about_delete_image', [AboutController::class, 'delete_image'])->name('about.update.image');
        
        Route::resource('inquiry', InquiryController::class);
        Route::get('inquiry_delete', [InquiryController::class, 'multiple_delete'])->name('inquiry.multiple_delete');

        Route::resource('designation', DesignationController::class);
        Route::get('designation_delete', [DesignationController::class, 'multiple_delete'])->name('designation.multiple_delete');
        Route::get('designation_change_status', [DesignationController::class, 'change_status'])->name('designation.change_status');
        
        Route::resource('department', DepartmentController::class);
        Route::get('department_delete', [DepartmentController::class, 'multiple_delete'])->name('department.multiple_delete');
        Route::get('department_change_status', [DepartmentController::class, 'change_status'])->name('department.change_status');
        
        Route::resource('ourteam', OurTeamController::class);
        Route::get('ourteam_delete', [OurTeamController::class, 'multiple_delete'])->name('ourteam.multiple_delete');
        Route::get('ourteam_change_status', [OurTeamController::class, 'change_status'])->name('ourteam.change_status');
        Route::post('ourteam_delete_image', [OurTeamController::class, 'delete_image'])->name('ourteam.update.image');

        Route::resource('workgallery', WorkGalleryController::class);

        Route::resource('ourproductinquiry', OurProductInquiryController::class);
        Route::get('ourproductinquiry_delete', [OurProductInquiryController::class, 'multiple_delete'])->name('ourproductinquiry.multiple_delete');
    });
});
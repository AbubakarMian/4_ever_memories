<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\StylingsController;
use App\Http\Controllers\Admin\MemorialFormController;
use App\Http\Controllers\reports\MemorialController;
use App\Http\Controllers\Admin\UserController as Admin_UserController;
use App\Http\Controllers\User\CommonServicesController;
use App\Http\Controllers\User\UserController as User_UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PaymentController as Admin_PaymentController;
use App\Http\Controllers\Admin\TestimaonialController;
use App\Http\Controllers\Api\UserController;

//////////////user
Route::post('cropper/crop_image', [CommonServicesController::class, 'crop_image'])->name('crop.image');

Route::post('user/register', [User_UserController::class, 'register'])->name('user.register');
Route::post('user/login', [User_UserController::class, 'login'])->name('user.login');
Route::get('user/logout', [User_UserController::class, 'logout'])->name('user.logout');

Route::get('/', [User_UserController::class, 'index'])->name('user.index');
Route::get('/user/privacy_policy', [User_UserController::class, 'privacy_policy'])->name('user.privacy_policy');
Route::get('/user/service_term', [User_UserController::class, 'service_term'])->name('user.service_term');
Route::get('/user/testimonials', [TestimaonialController::class, 'compact_testimonial'])->name('user.compact_testimonial');
Route::get('/user/plans', [User_UserController::class, 'plans'])->name('user.plans');
Route::get('/user/contactus', [User_UserController::class, 'contactus'])->name('user.contactus');
Route::get('/user/blog', [BlogController::class, 'compact_blog'])->name('user.get_blog');
Route::get('/user/aboutus', [AboutUsController::class, 'compact_about_us'])->name('user.aboutus');
// Route::get('/user/blog', [App\Http\Controllers\Admin\BlogController::class, 'compact_blog'])->name('user.get_blog');
Route::get('/user/blog/{category?}', [App\Http\Controllers\Admin\BlogController::class, 'compact_blog'])->name('user.get_blog');
Route::post('/user/contactus/submit', [User_UserController::class, 'contactus_update'])->name('user.contactus_update');
Route::get('/user/profile', [User_UserController::class, 'profile'])->name('user.profile');
Route::post('/user/profile/update', [User_UserController::class, 'profile_update'])->name('user.profile_update');
// Route::get('/user/blog', [App\Http\Controllers\Admin\BlogController::class, 'compact_blog'])->name('user.blog');
Route::get('/user/forgetpassword', [UserController::class, 'sendForgetEmail'])->name('user.forgetpassword');
Route::get('/user/my_memorials', [User_UserController::class, 'my_memorials'])->name('user.my_memorials');
Route::get('template', [Admin_UserController::class, 'template']);

Route::get('admin/login', [AdminController::class, 'index']);
Route::post('admin/checklogin', [AdminController::class, 'checklogin']);

Route::group(['middleware' => 'admin_auth'], function () { //,'prefix'=>'admin'
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/logout', [AdminController::class, 'logout']);

    Route::get('admin/user/', [Admin_UserController::class, 'index'])->name('admin.user.index');
    Route::get('admin/user/getUsers', [Admin_UserController::class, 'getUsers'])->name('admin.user.getUsers');
    Route::get('admin/user/getOnlyUsers', [Admin_UserController::class, 'getOnlyUsers'])->name('admin.user.getOnlyUsers');
    Route::get('admin/user/getOnlyAdmin', [Admin_UserController::class, 'getOnlyAdmin'])->name('admin.user.getOnlyAdmin');
    Route::get('template', [Admin_UserController::class, 'template']);

    Route::get('admin/memorials/', [MemorialController::class, 'index'])->name('admin.memorials.index');
    Route::get('admin/memorials/getUsers', [MemorialController::class, 'getUsers'])->name('admin.memorials.getUsers');
    Route::get('template', [MemorialController::class, 'template']);

    /////////template
    Route::get('admin/template', [TemplateController::class, 'index']);
    Route::get('admin/template/template1', [TemplateController::class, 'template_1']);
    Route::get('admin/template/template2', [TemplateController::class, 'template_2']);
    Route::get('admin/template/template3', [TemplateController::class, 'template_3']);
    Route::get('admin/template/template4', [TemplateController::class, 'template_4']);
    // Route::get('admin/template/select_template',[TemplateController::class, 'select_template']); //testing
    Route::get('user/template/select_template', [TemplateController::class, 'select_template']); //testing
    Route::get('user/template/select_template/{user_website}', [TemplateController::class, 'select_template']); //testing

});



Route::post('user/adduser', [User_UserController::class, 'add_user'])->name('admin.user.add_user');

Route::group(['prefix' => 'admin', 'middleware' => 'admin_auth'], function () {

    Route::get('make_admin/', [Admin_UserController::class, 'make_admin'])->name('admin.user.make_admin');
    Route::get('signin_as_user/', [Admin_UserController::class, 'signin_as_user'])->name('admin.user.signin_as_user');
    Route::get('user/', [Admin_UserController::class, 'index'])->name('admin.user.index');
    Route::get('user/getUsers', [Admin_UserController::class, 'getUsers'])->name('admin.user.getUsers');    
    Route::get('memorials/', [MemorialController::class, 'index'])->name('admin.memorials.index');
    Route::get('memorials/getmemorials', [MemorialController::class, 'getmemorials'])->name('admin.memorials.getmemorials');
    Route::get('memorial/view_as_user/{memorial_id}', [MemorialController::class, 'view_as_user'])->name('admin.memorials.getmemorials');
    Route::get('memorials/get_gallery/{memorial_id}', [MemorialController::class, 'get_gallery'])->name('admin.memorials.get_gallery');
    Route::get('memoraials/gallery/{memorial_id}', [MemorialController::class, 'gallery'])->name('admin.memorials.gallery');

});
Route::get('template', [Admin_UserController::class, 'template']);
Route::post('admin/memorial/delete', [MemorialController::class, 'destroy_undestroy'])->name('admin.memorials.delete');
Route::post('admin/memorial/restore/{id}', [MemorialController::class, 'restore'])->name('admin.memorials.restore');
Route::post('admin/memorial/restore_gallery/{id}', [MemorialController::class, 'restore_gallery'])->name('admin.memorials.restore_gallery');
Route::get('admin/memorial/invite_email', [MemorialController::class, 'invite_email'])->name('admin.memorials.invite_email');
Route::get('template', [MemorialController::class, 'template']);

/////////template
Route::get('admin/template', [TemplateController::class, 'index']);
Route::get('admin/template/template1', [TemplateController::class, 'template_1']);
Route::get('admin/template/template2', [TemplateController::class, 'template_2']);
Route::get('admin/template/template3', [TemplateController::class, 'template_3']);
Route::get('admin/template/template4', [TemplateController::class, 'template_4']);
/////////category
Route::get('admin/category', [BlogController::class, 'index']);

/////////stylings
Route::get('admin/stylings', [StylingsController::class, 'index']);
// Route::get('admin/template/select_template',[TemplateController::class, 'select_template']); //testing
Route::get('user/template/select_template', [TemplateController::class, 'select_template']); //testing
Route::get('user/template/select_template/{user_website}', [TemplateController::class, 'select_template']); //testing
Route::post('/user/view_as_user', [Admin_UserController::class, 'view_as_user'])->name('user.view_as_user');
Route::post('/user/view_memorials', [Admin_UserController::class, 'view_memorials'])->name('user.view_memorials');

// Route::post('user/adduser', [User_UserController::class, 'add_user'])->name('admin.user.add_user');

Route::get('user/testing', [User_UserController::class, 'index1111'])->name('admin.user.add_user');
Route::get('user/testing2', [User_UserController::class, 'index2'])->name('admin.user.add_user');
Route::get('user/testing3', [User_UserController::class, 'index3'])->name('admin.user.add_user');

Route::post('user/memorial/update_plan', [User_UserController::class, 'update_plan'])->name('user.plan.update');
Route::get('/create-payment', [Admin_PaymentController::class, 'createPayment'])->name('create.payment');
Route::get('/check-payment-status', [Admin_PaymentController::class, 'checkPaymentStatus'])->name('check.payment.status');

// For direct access (if needed)
Route::get('/create-payment/{plan_id}', [Admin_PaymentController::class, 'createPayment'])->name('create.payment.get');

Route::post('user/memorial/privacy', [User_UserController::class, 'privacy'])->name('user.memorial.privacy');
Route::post('user/memorial/save_css', [User_UserController::class, 'save_css'])->name('user.memorial.save_css');
Route::post('user/memorial/start-trial', [User_UserController::class, 'startTrial'])->name('user.memorial.start_trial');

Route::group(['middleware' => 'login.access_token'], function () { //,'prefix'=>'admin'
    // saave_memorial_user *********
    Route::get('user/memorialform', [User_UserController::class, 'memorialform'])->name('user.memorialform'); //index
    Route::get('user/get_memorial/{user_email}', [User_UserController::class, 'get_memorial']);
    //save story
    Route::post('user/storyform', [User_UserController::class, 'storyform'])->name('user.storyform'); //add story
    Route::post('user/tributeform', [User_UserController::class, 'tributeform'])->name('user.tributeform'); //add tributeform
    Route::get('user/get_tribute', [User_UserController::class, 'get_tribute'])->name('user.get_tribute'); //get_tribute
    Route::post('user/invite', [User_UserController::class, 'send_invite'])->name('user.send_invite');
    Route::post('user/upload_gallery', [User_UserController::class, 'upload_gallery'])->name('user.upload_gallery_audio'); //search
    Route::post('user/delete/{id}', [User_UserController::class, 'destroy_undestroy'])->name('user.delete');
});
    Route::post('user/forget_password', [User_UserController::class, 'sendForgetEmail']);

///blog
Route::post('search/memorial', [User_UserController::class, 'search_memorial'])->name('user.search_memorial'); //search
Route::get('search/memorialss', [User_UserController::class, 'search_memorial'])->name('user.search_memorial'); //search

// Route::get('user/blog/child_loss', [User_UserController::class, 'child_loss'])->name('user.child_loss');
// Route::get('user/blog/death', [User_UserController::class, 'death'])->name('user.death');
// Route::get('user/blog/our_story', [User_UserController::class, 'our_story'])->name('user.our_story');


Route::post('/subscribe/{planId}', [Admin_PaymentController::class, 'createYearlySubscription'])->name('subscribe');


Route::group(['prefix' => 'admin', 'middleware' => 'admin_auth'], function () {

    //  =================================  BLOG ==========================
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog.index');
        Route::get('get_blog', [BlogController::class, 'get_blog'])->name('blog.index');
        Route::get('create', [BlogController::class, 'create'])->name('blog.create'); //add
        Route::post('save', [BlogController::class, 'save'])->name('blog.save');
        Route::get('edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('update/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::post('delete/{id}', [BlogController::class, 'destroy_undestroy'])->name('blog.delete');
    });


        //  =================================  about_us ==========================
    Route::group(['prefix' => 'about_us'], function () {
        Route::get('/', [AboutUsController::class, 'edit'])->name('about_us.index');
        Route::get('get_about_us', [AboutUsController::class, 'get_about_us'])->name('about_us.index');
        Route::get('create', [AboutUsController::class, 'create'])->name('about_us.create'); //add
        Route::post('save', [AboutUsController::class, 'save'])->name('about_us.save');
        Route::get('edit/{id?}', [AboutUsController::class, 'edit'])->name('about_us.edit');
        Route::post('update/{id}', [AboutUsController::class, 'update'])->name('about_us.update');
        Route::post('delete/{id}', [AboutUsController::class, 'destroy_undestroy'])->name('about_us.delete');
    });
     //  =================================  testimonial ==========================
    Route::group(['prefix' => 'testimonial'], function () {
        Route::get('/', [TestimaonialController::class, 'index'])->name('testimonial.index');
        Route::get('get_testimonial', [TestimaonialController::class, 'get_testimonial'])->name('testimonial.index');
        Route::get('create', [TestimaonialController::class, 'create'])->name('testimonial.create'); //add
        Route::post('save', [TestimaonialController::class, 'save'])->name('testimonial.save');
        Route::get('edit/{id}', [TestimaonialController::class, 'edit'])->name('testimonial.edit');
        Route::post('update/{id}', [TestimaonialController::class, 'update'])->name('testimonial.update');
        Route::post('delete/{id}', [TestimaonialController::class, 'destroy_undestroy'])->name('testimonial.delete');
    });
     //  =================================  make_admin ==========================
    Route::group(['prefix' => 'make_admin'], function () {
        Route::get('admin/make_admin/', [Admin_UserController::class, 'make_admin'])->name('admin.user.make_admin');
        Route::get('create', [Admin_UserController::class, 'create'])->name('make_admin.create'); //add
        Route::post('save', [Admin_UserController::class, 'save'])->name('make_admin.save');
        Route::get('edit/{id}', [Admin_UserController::class, 'edit'])->name('make_admin.edit');
        Route::post('update/{id}', [Admin_UserController::class, 'update'])->name('make_admin.update');
        Route::post('delete/{id}', [Admin_UserController::class, 'destroy_undestroy'])->name('make_admin.delete');
    });
});
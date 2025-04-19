<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderManageController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSignupController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/holidays', [FrontendController::class, 'holidays'])->name('holidays');
Route::get('/locations', [FrontendController::class, 'location'])->name('locations');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('contact.us');


Route::get('/user-signup', [UserSignupController::class, 'showSignupForm'])->name('show.signup');
Route::get('/user-signin', [UserSignupController::class, 'showSigninForm'])->name('show.signin');
Route::post('/user-signup-store', [UserSignupController::class, 'signupStore'])->name('signup.store');

//Route::middleware('auth')->group(callback: function () {
//    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
//    Route::get('/unauthorized-action', [AdminDashboardController::class, 'unauthorized'])->name('unauthorized.action');
//
//    //Slider Section
//    Route::get('/slider-section', [SliderController::class, 'index'])->name('slider.section');
//    Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
//    Route::put('/slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
//    Route::get('/slider-delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
//
//    //Category Section
//    Route::get('/category-section', [CategoryController::class, 'index'])->name('category.section');
//    Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
//    Route::put('/category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
//    Route::get('/category-delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
//
//    //Service Section
//    Route::get('/service-section', [ServiceController::class, 'index'])->name('service.section');
//    Route::post('/service-store', [ServiceController::class, 'store'])->name('service.store');
//    Route::put('/service-update/{id}', [ServiceController::class, 'update'])->name('service.update');
//    Route::get('/service-delete/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
//
//    //Role and User Section
//    Route::resource('roles', RoleController::class);
//    Route::resource('users', UserController::class);
//
//    //Site Setting
//    Route::get('/site-setting', [SiteSettingController::class, 'index'])->name('site.setting');
//    Route::post('/site-settings-store-update/{id?}', [SiteSettingController::class, 'createOrUpdate'])->name('site-settings.createOrUpdate');
//
//    //Order Manage
//    Route::get('/order-manage', [OrderManageController::class, 'index'])->name('order.manage');
//    Route::get('/order-delete/{id}', [OrderManageController::class, 'destroy'])->name('order.destroy');
//    Route::get('/order-manage/{id}', [OrderManageController::class, 'show'])->name('order.manage.show');
//
//
//
//
//
//});


Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/unauthorized-action', [AdminDashboardController::class, 'unauthorized'])->name('unauthorized.action');

        //Slider Section
        Route::get('/slider-section', [SliderController::class, 'index'])->name('slider.section');
        Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
        Route::put('/slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::get('/slider-delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

        //Category Section
        Route::get('/category-section', [CategoryController::class, 'index'])->name('category.section');
        Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
        Route::put('/category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/category-delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        //Service Section
        Route::get('/service-section', [ServiceController::class, 'index'])->name('service.section');
        Route::post('/service-store', [ServiceController::class, 'store'])->name('service.store');
        Route::put('/service-update/{id}', [ServiceController::class, 'update'])->name('service.update');
        Route::get('/service-delete/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

        //Role and User Section
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);

        //Site Setting
        Route::get('/site-setting', [SiteSettingController::class, 'index'])->name('site.setting');
        Route::post('/site-settings-store-update/{id?}', [SiteSettingController::class, 'createOrUpdate'])->name('site-settings.createOrUpdate');

        //Order Manage
        Route::get('/order-manage', [OrderManageController::class, 'index'])->name('order.manage');
        Route::get('/order-delete/{id}', [OrderManageController::class, 'destroy'])->name('order.destroy');
        Route::get('/order-manage/{id}', [OrderManageController::class, 'show'])->name('order.manage.show');
        //changer order status
        Route::put('/order-status-change/{id}', [OrderManageController::class, 'changeStatus'])->name('order.status.change');


    });

    Route::middleware(['user'])->prefix('user')->group(function () {

        //User
        Route::get('/dashboard', [UserSignupController::class, 'userHome'])->name('dashboard');

    });
});

require __DIR__.'/auth.php';

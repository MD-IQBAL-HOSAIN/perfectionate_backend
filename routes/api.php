<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\Authentication\AuthController;
use App\Http\Controllers\API\CMS\CmsController;
use App\Http\Controllers\API\Logo\LogoController;
use App\Http\Controllers\API\ourNumber\OurNumberController;
use App\Http\Controllers\API\Review\ReviewController;
use App\Http\Controllers\API\SocialLogin\SocialLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


/*
|--------------------------------------------------------------------------
| without jwt api middleware
|--------------------------------------------------------------------------
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    // Route::get('all/users', 'index');
    Route::post('/password/forgot', 'forgotPassword');
    Route::post('/password/reset', 'resetPassword');
    Route::post('/password/verify-otp', 'verifyOtp');
    Route::post('/password/resend-otp', 'resendOtp');
    //Continue with google and facebook login
    Route::post('/social/login', [SocialLoginController::class, 'SocialLogin']);
});

//aLL banner list
Route::controller(CmsController::class)->group(function () {
    Route::get('/banner/pages/all', 'index');
    Route::get('/dynamic/pages/all', 'dynamicPage');
    Route::get('/faq/pages/all', 'faq');
    Route::get('/why-choose-us/all', 'whyChooseUs');
    Route::get('/our-key-highlight/all', 'ourKeyHighlight');
    Route::get('/personal/reminder/all', 'personalReminder');
    Route::get('/feel/top/the/world/all', 'feelTopOnTheWorld');
    Route::get('/value/we/offer/all', 'valueWeOffer');
    Route::get('/our-mission/all', 'ourMission');
    Route::get('/contact-info/all', 'contactInfo');
    Route::get('/social/media/all', 'socialMedia');
    //Blog
    Route::get('/blog/all', 'blog');
    Route::get('/blog/details/{id}', 'blogDetails');
});

//Logo list
Route::controller(LogoController::class)->group(function () {
    Route::get('/logo', 'logo');
    Route::get('/coppyright/text', 'coppyrightText');
    Route::get('/aboute/system', 'abouteSystem');
});

//our numbers
Route::controller(OurNumberController::class)->group(function () {
    Route::get('/our/number/list', 'index');
});

//Review and Rating
Route::controller(ReviewController::class)->group(function () {
    Route::get('/review/get', 'index');
    Route::get('/average/review', 'averageRating');
});




/*
|--------------------------------------------------------------------------
| with jwt middlware api
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::delete('/delete-account', 'deleteAccount');
        Route::post('/profile/update/user', 'ProfileUpdate');
        Route::post('/password/update/user', 'ChangePassword');

        //user profile retrieve
        Route::get('/user/profile/get', 'ProfileGet');
    });


    //Review and Rating
    Route::controller(ReviewController::class)->group(function () {
        Route::post('/review/store', 'store');
    });






});

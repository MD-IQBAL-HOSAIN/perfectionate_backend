<?php

use App\Http\Controllers\Web\Backend\BlogController;
use App\Http\Controllers\Web\Backend\CmsController;
use App\Http\Controllers\Web\Backend\DashboardController;
use App\Http\Controllers\Web\Backend\DynamicPageController;
use App\Http\Controllers\Web\Backend\FaqController;
use App\Http\Controllers\Web\Backend\FeelTopOnTheWorldController;
use App\Http\Controllers\Web\Backend\HomeContentOneController;
use App\Http\Controllers\Web\Backend\OurKeyHighlightController;
use App\Http\Controllers\Web\Backend\OurMissionController;
use App\Http\Controllers\Web\Backend\Settings\MailSettingController;
use App\Http\Controllers\Web\Backend\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Settings\StripeSettingController;
use App\Http\Controllers\Web\Backend\Settings\SystemSettingController;
use App\Http\Controllers\Web\Backend\SocialMediaController;
use App\Http\Controllers\Web\Backend\UserController;
use App\Http\Controllers\Web\Backend\ValueWeOfferController;
use App\Http\Controllers\Web\Backend\WhychooseUsController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;



Route::middleware([AdminMiddleware::class])->group(function () {

    //! Route for DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //! Route for System Settings
    Route::controller(SystemSettingController::class)->group(function () {
        Route::get('/system-setting', 'index')->name('system.index');
        Route::patch('/system-setting', 'update')->name('system.update');
    });

    //! Route for Mail Settings
    Route::controller(MailSettingController::class)->group(function () {
        Route::get('/mail-setting', 'index')->name('mail.setting');
        Route::patch('/mail-setting', 'update')->name('mail.update');
    });

    //! Route for Stripe Settings
    Route::controller(StripeSettingController::class)->group(function () {
        Route::get('/stripe-setting', 'index')->name('stripe.index');
        Route::get('/google-setting', 'google')->name('google.index');
        Route::patch('/credentials-setting', 'update')->name('credentials.update');
    });

    //route for Banner
    Route::controller(CmsController::class)->group(function () {

        //Home Content One
        Route::get('/home/content/one/edit', 'HomeContentOneEdit')->name('home.content.one.edit');
        Route::post('/home/content/one/update', 'HomeContentOneUpdate')->name('home.content.one.update');

        //Home Content Two
        Route::get('/home/content/two/edit', 'HomeContentTwoEdit')->name('home.content.two.edit');
        Route::post('/home/content/two/update', 'HomeContentTwoUpdate')->name('home.content.two.update');

        //Home Content Three
        Route::get('/home/content/three/edit', 'HomeContentThreeEdit')->name('home.content.three.edit');
        Route::post('/home/content/three/update', 'HomeContentThreeUpdate')->name('home.content.three.update');

        //Home Content Four
        Route::get('/home/content/four/edit', 'HomeContentFourEdit')->name('home.content.four.edit');
        Route::post('/home/content/four/update', 'HomeContentFourUpdate')->name('home.content.four.update');

        //Home Content Five
        Route::get('/home/content/five/edit', 'HomeContentFiveEdit')->name('home.content.five.edit');
        Route::post('/home/content/five/update', 'HomeContentFiveUpdate')->name('home.content.five.update');

        //Home Content Six
        Route::get('/home/content/six/edit', 'HomeContentSixEdit')->name('home.content.six.edit');
        Route::post('/home/content/six/update', 'HomeContentSixUpdate')->name('home.content.six.update');

        //Home Content Six (join our thousands...)
        Route::get('/home/content/seven/edit', 'HomeContentSevenEdit')->name('home.content.seven.edit');
        Route::post('/home/content/seven/update', 'HomeContentSevenUpdate')->name('home.content.seven.update');

        //Buy A Home page (finance)
        Route::get('/home/content/eight/edit', 'HomeContentEightEdit')->name('home.content.eight.edit');
        Route::post('/home/content/eight/update', 'HomeContentEightUpdate')->name('home.content.eight.update');

        //Loan option page banner
        Route::get('/home/content/nine/edit', 'HomeContentNineEdit')->name('home.content.nine.edit');
        Route::post('/home/content/nine/update', 'HomeContentNineUpdate')->name('home.content.nine.update');

        //Loan option page 2nd cms
        Route::get('/home/content/ten/edit', 'HomeContentTenEdit')->name('home.content.ten.edit');
        Route::post('/home/content/ten/update', 'HomeContentTenUpdate')->name('home.content.ten.update');

       
    });

    //route for Dynamic page
    Route::controller(DynamicPageController::class)->group(function () {
        Route::get('/dynamic', 'index')->name('dynamic.index');
        Route::get('/dynamic/edit/{id}', 'edit')->name('dynamic.edit');
        Route::post('/dynamic/update/{id}', 'update')->name('dynamic.update');
        Route::get('/dynamic/status/{id}', 'status')->name('dynamic.status');
    });


    //! Route for Profile Settings
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile.setting');
        Route::patch('/update-profile', 'UpdateProfile')->name('update.profile');
        Route::put('/update-profile-password', 'UpdatePassword')->name('update.Password');
        Route::post('/update-profile-picture', 'UpdateProfilePicture')->name('update.profile.picture');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('user.index');
        Route::get('/user/status/{id}', 'status')->name('user.status');
        Route::delete('/user/destroy/{id}', 'destroy')->name('user.destroy');
    });

    //! Route for FAQ
    Route::controller(FaqController::class)->group(function () {
        Route::get('/faq', 'index')->name('faq.index');
        Route::get('/faq/create', 'create')->name('faq.create');
        Route::post('/faq/store', 'store')->name('faq.store');
        Route::get('/faq/edit/{id}', 'edit')->name('faq.edit');
        Route::patch('/faq/update/{id}', 'update')->name('faq.update');
        Route::get('/faq/status/{id}', 'status')->name('faq.status');
        Route::delete('/faq/destroy/{id}', 'destroy')->name('faq.destroy');
    });


    // why choose us
    Route::controller(WhychooseUsController::class)->group(function () {
        Route::get('/why-choose-us', 'index')->name('why-choose-us.index');
        Route::get('/why-choose-us/create', 'create')->name('why-choose-us.create');
        Route::post('/why-choose-us/store', 'store')->name('why-choose-us.store');
        Route::get('/why-choose-us/status/{id}', 'status')->name('why-choose-us.status');
        //update route
        Route::get('/why-choose-us/edit/{id}', 'edit')->name('why-choose-us.edit');
        Route::put('/why-choose-us/update/{id}', 'update')->name('why-choose-us.update');
        //del route
        Route::delete('/why-choose-us/{id}', 'destroy')->name('why-choose-us.destroy');
    });

    // Social Media Module
    Route::controller(SocialMediaController::class)->group(function () {
        Route::get('/social-media', 'index')->name('social.media');
        Route::get('/social-media/create', 'create')->name('social-media.create');
        Route::post('/social-media/store', 'store')->name('social.media.store');
        Route::put('/social-media/{id}', 'update')->name('social.media.update');
        Route::delete('/social-media/{id}', 'destroy')->name('social.media.destroy');
    });



    
});

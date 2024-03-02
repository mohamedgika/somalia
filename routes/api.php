<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Ads\AdsController;
use App\Http\Controllers\Api\Fav\FavController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Blog\BlogController;
use App\Http\Controllers\Api\Chat\ChatController;
use App\Http\Controllers\Api\Shop\ShopController;
use App\Http\Controllers\Api\input\InputController;
use App\Http\Controllers\Api\Public\PublicController;
use App\Http\Controllers\Api\Slider\SliderController;
use App\Http\Controllers\Api\Payment\PaymentController;
use App\Http\Controllers\Api\RateAds\RateadsController;
use App\Http\Controllers\Api\ShopAds\ShopAdsController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Auth\RegisterDetailController;
use App\Http\Controllers\Api\ContactUs\ContactUsController;
use App\Http\Controllers\Api\Auth\Profile\ProfileController;
use App\Http\Controllers\Api\Package\SubScriptionController;
use App\Http\Controllers\Api\SubCategory\SubCategoryController;
use App\Http\Controllers\Api\Notification\NotificationController;

Route::middleware(['api'])->group(function () {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/getaccount', [AuthController::class, 'getaccount']);


    //Google Login
    Route::get('/login/google', [AuthController::class, 'redirectToGoogle']);
    Route::get('/login/google/callback', [AuthController::class, 'handleGoogleCallback']);

    // Register Details
    Route::get('/countries', [RegisterDetailController::class, 'getCountries']);
    Route::get('/states/{country_id}', [RegisterDetailController::class, 'getStates']);
    Route::get('/cities/{state_id}', [RegisterDetailController::class, 'getCities']);

    // Package
    Route::get('/packages', [SubScriptionController::class, 'index']);

    //Contact Us
    Route::get('/contactus', [ContactUsController::class, 'index']);


    //Main Page
    Route::get('/public/ads', [PublicController::class, 'public_ads']);
    Route::get('/public/shops', [PublicController::class, 'public_shops']);
    Route::get('/public/poplocations', [PublicController::class, 'pop_locations']);
    Route::get('/public/ads/{ad}', [PublicController::class, 'show']);
    Route::get('/public/shops/{shop}', [PublicController::class, 'show_shop']);
    Route::get('/public/ads/category/{category}', [PublicController::class, 'public_ads_by_category']);
    Route::get('/public/subcategory', [PublicController::class, 'public_subcategory']);
    Route::get('/public/ads/price/{min}/{max}', [PublicController::class, 'public_ads_by_price']);
    Route::get('/public/ads/name/{name}', [PublicController::class, 'public_ads_by_name']);
    Route::get('/public/shops', [PublicController::class, 'public_shops']);
    Route::get('/public/ads/sort/filteration', [PublicController::class, 'filterAds']);
    Route::get('/public/ads/filter/date', [PublicController::class, 'filterAdsByDate']);
    Route::get('/public/category', [PublicController::class, 'public_category']);
    Route::get('/public/slider', [PublicController::class, 'slider']);
    Route::get('/public/blog', [PublicController::class, 'blog']);
});


// //Profile
Route::middleware(['auth:api'])->controller(ProfileController::class)->group(function () {
    Route::get('/account', 'getAccount');
    //Notification
    Route::get('/notifications', [NotificationController::class, 'notify']);
    Route::get('/myads', 'getMyAds');
    Route::get('/mysubscription', 'getMySubscription');
    Route::get('/myshop', 'getMyShop');
    Route::get('/countMyAds', 'count_of_my_ads');
    Route::get('/favscount', 'fav_ads');
    Route::get('/view_ad/{ad}', 'get_view_one_ad');
    Route::get('/views_ads', 'get_view_ads');
    Route::put('/updateprofile', 'update_profile');
    Route::put('/updateprofilepassword', 'update_profile_password');
});


// Input
Route::middleware(['auth:api'])->controller(InputController::class)->group(function () {
    Route::get('/inputs', 'index');
    Route::get('/inputs/{input}', 'show');
    Route::post('/inputs', 'store');
    Route::put('/inputs/{input}', 'update');
    Route::delete('/inputs/{input}', 'destroy');
});


// Category
Route::middleware(['auth:api'])->controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::get('/categories/{category}', 'show');
    Route::post('/categories', 'store');
    Route::put('/categories/{category}', 'update');
    Route::delete('/categories/{category}', 'destroy');
});

// SubCategory
Route::middleware(['auth:api'])->controller(SubCategoryController::class)->group(function () {
    Route::get('/subcategories', 'index');
    Route::get('/subcategories/{subcategory}', 'show');
    Route::post('/subcategories', 'store');
    Route::put('/subcategories/{subcategory}', 'update');
    Route::delete('/subcategories/{subcategory}', 'destroy');
});

// Ads
Route::middleware(['auth:api'])->controller(AdsController::class)->group(function () {
    Route::get('/ads', 'index');
    Route::get('/ads/{ad}', 'show');
    Route::post('/ads', 'store');
    Route::put('/ads/{ad}', 'update');
    Route::delete('/ads/{ad}', 'destroy');
    Route::get('/ads/category/{category}', 'ads_by_category');
});

//Fav
Route::middleware(['auth:api'])->controller(FavController::class)->group(function () {
    Route::get('/favs', 'getFav');
    Route::post('/favs', 'fav');
    Route::post('/favs/shopad', 'favshopad');
    Route::delete('/favs/{ad_id}', 'destroyFav');
});


//Rate
Route::middleware(['auth:api'])->controller(RateadsController::class)->group(function () {
    Route::post('/rates', 'rate');
});


// Shop
Route::middleware(['auth:api'])->controller(ShopController::class)->group(function () {
    Route::get('/shops', 'index');
    Route::get('/shops/{shop}', 'show');
    Route::post('/shops', 'store');
    Route::put('/shops/{shop}', 'update');
    Route::delete('/shops/{shop}', 'destroy');
});


// Shop Ads
Route::middleware(['auth:api'])->controller(ShopAdsController::class)->group(function () {
    Route::get('/shopads', 'index');
    Route::get('/shopads/{shopad}', 'show');
    Route::post('/shopads', 'store');
    Route::put('/shopads/{shopad}', 'update');
    Route::delete('/shopads/{shopad}', 'destroy');
});

// Chat
Route::middleware(['auth:api'])->controller(ChatController::class)->group(function () {
    Route::get('/chats', 'getChats');
    Route::get('/chat/{chat}', 'getChatById');
    Route::post('/chat/create', 'createChat');
    Route::post('/chat/send', 'sendTextMessage');
    Route::get('/chat/search/phone/{phone}', 'searchUsers');
    Route::post('/chat/messagestatus/{message}', 'messageStatus');
});

//Paypal
Route::middleware(['auth:api'])->controller(PaymentController::class)->group(function () {
    Route::get('/payment', 'payment')->name('payment.create');
    Route::get('/payment/cancel', 'cancel')->name('payment.cancel');
    Route::get('/payment/success', 'success')->name('payment.success');
});



//Slider Store Test
Route::middleware(['auth:api'])->controller(SliderController::class)->group(function () {
    Route::post('/slider', 'store');
});


//Blog Store Test
Route::middleware(['auth:api'])->controller(BlogController::class)->group(function () {
    Route::post('/blog', 'store');
});

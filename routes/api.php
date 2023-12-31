<?php

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Ads\AdsController;
use App\Http\Controllers\Api\Fav\FavController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Chat\ChatController;
use App\Http\Controllers\Api\Shop\ShopController;
use App\Http\Controllers\Api\input\InputController;
use App\Http\Controllers\Api\Public\PublicController;
use App\Http\Controllers\Api\Payment\PaymentController;
use App\Http\Controllers\Api\ShopAds\ShopAdsController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Auth\RegisterDetailController;
use App\Http\Controllers\Api\Auth\Profile\ProfileController;
use App\Http\Controllers\Api\SubCategory\SubCategoryController;
use App\Http\Controllers\Api\SubScription\SubScriptionController;



Route::middleware(['api'])->group(function() {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/getaccount', [AuthController::class, 'getaccount']);


    //Google Login
    Route::get('/login/google', [AuthController::class,'redirectToGoogle']);
    Route::get('/login/google/callback', [AuthController::class,'handleGoogleCallback']);

    // Register Details
    Route::get('/countries',[RegisterDetailController::class,'getCountries']);
    Route::get('/states/{country_id}',[RegisterDetailController::class,'getStates']);
    Route::get('/cities/{state_id}',[RegisterDetailController::class,'getCities']);

    //Main Page
    Route::get('/public/ads/{ad}', [PublicController::class, 'show']);
    Route::get('/public/ads', [PublicController::class, 'public_ads']);
    Route::get('/public/ads/category/{category}', [PublicController::class, 'public_ads_by_category']);
    Route::get('/public/ads/price/{min}/{max}', [PublicController::class, 'public_ads_by_price']);
    Route::get('/public/ads/name/{name}', [PublicController::class, 'public_ads_by_name']);
    Route::get('/public/filterads', [PublicController::class,'filterAds']);
    Route::get('/public/category', [PublicController::class, 'public_category']);
    Route::get('/public/subcategory', [PublicController::class, 'public_subcategory']);
});

//Profile
Route::middleware(['auth:api'])->controller(ProfileController::class)->group(function () {
    Route::get('/account','getAccount');
    Route::get('/myads','getMyAds');
    Route::put('/updateprofile','update_profile');
});


// Input
Route::middleware(['auth:api'])->controller(InputController::class)->group(function () {
    Route::get('/inputs','index');
    Route::get('/inputs/{input}','show');
    Route::post('/inputs','store');
    Route::put('/inputs/{input}','update');
    Route::delete('/inputs/{input}','destroy');
});


// Category
Route::middleware(['auth:api','auth:sanctum'])->controller(CategoryController::class)->group(function () {
    Route::get('/categories','index');
    Route::get('/categories/{category}','show');
    Route::post('/categories','store');
    Route::put('/categories/{category}','update');
    Route::delete('/categories/{category}','destroy');
});

// SubCategory
Route::middleware(['auth:api'])->controller(SubCategoryController::class)->group(function () {
    Route::get('/subcategories','index');
    Route::get('/subcategories/{subcategory}','show');
    Route::post('/subcategories','store');
    Route::put('/subcategories/{subcategory}','update');
    Route::delete('/subcategories/{subcategory}','destroy');
});

// Ads
Route::middleware(['auth:api'])->controller(AdsController::class)->group(function () {
    Route::get('/ads','index');
    Route::get('/ads/{ad}','show');
    Route::post('/ads','store');
    Route::put('/ads/{ad}','update');
    Route::delete('/ads/{ad}','destroy');
    Route::get('/ads/category/{category}','ads_by_category');
    Route::get('/ads/price/{min}/{max}','ads_by_price');
    Route::get('/ads/filterads','filterAds');
});

//Fav
Route::middleware(['auth:api'])->controller(FavController::class)->group(function () {
    Route::get('/favs','getFav');
    Route::post('/favs','fav');
    Route::delete('/favs/{ad_id}','destroyFav');
});


// Shop
Route::middleware(['auth:api'])->controller(ShopController::class)->group(function () {
    Route::get('/shops','index');
    Route::get('/shops/{shop}','show');
    Route::post('/shops','store');
    Route::put('/shops/{shop}','update');
    Route::delete('/shops/{shop}','destroy');
});


// Shop Ads
Route::middleware(['auth:api'])->controller(ShopAdsController::class)->group(function () {
    Route::get('/shopads','index');
    Route::get('/shopads/{shopad}','show');
    Route::post('/shopads','store');
    Route::put('/shopads/{shopad}','update');
    Route::delete('/shopads/{shopad}','destroy');
});

// Chat
Route::middleware(['auth:api'])->controller(ChatController::class)->group(function () {
    Route::get('/chats','getChats');
    Route::get('/chat/{chat}','getChatById');
    Route::post('/chat/create','createChat');
    Route::post('/chat/send','sendTextMessage');
    Route::get('/chat/search/phone/{phone}','searchUsers');
    Route::post('/chat/messagestatus/{message}','messageStatus');
});

Route::middleware(['auth:api'])->controller(PaymentController::class)->group(function(){
    Route::get('/payment/{package_id}', 'payment');
    Route::get('/payment/cancel', 'cancel')->name('payment.cancel');
    Route::get('/payment/success', 'success')->name('payment.success');
});

// SubScription
Route::middleware(['api'])->controller(SubScriptionController::class)->group(function () {
    Route::get('/packages', 'index');
});


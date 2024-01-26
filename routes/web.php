<?php

use App\Livewire\Post\ListPosts;
use Illuminate\Support\Facades\Route;
use App\Livewire\Category\ListCategories;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\AdsController;
use App\Http\Controllers\Dashboard\ShopController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ShopAdsController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\SubCategoryController;

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

Route::middleware(['auth', 'verified', 'CheckUser'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['auth', 'verified', 'CheckUser'])->group(function () {
        //User
        Route::get('/dashboard/user', [UserController::class, 'index'])->name('user.index');
        Route::post('/dashboard/user/store', [UserController::class, 'store'])->name('user.store');
        Route::put('/dashboard/user/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::delete('/dashboard/user/{user}', [UserController::class, 'del'])->name('user.delete');
    });

    //Category
    Route::middleware(['auth', 'verified', 'CheckUser'])->resource('/dashboard/category', CategoryController::class);


    //SubCategory
    Route::middleware(['auth', 'verified', 'CheckUser'])->controller(SubCategoryController::class)->group(function () {
        Route::get('/dashboard/subcategory', 'index')->name('subcategory.index');
        Route::get('/dashboard/subcategory/{sub}', 'show')->name('subcategory.show');
        Route::post('/dashboard/subcategory', 'store')->name('subcategory.store');
        Route::put('/dashboard/subcategory/{sub}', 'edit')->name('subcategory.edit');
        Route::delete('/dashboard/subcategory/{sub}', 'destroy')->name('subcategory.destroy');
    });

    //Ads
    Route::middleware(['auth', 'verified', 'CheckUser'])->controller(AdsController::class)->group(function () {
        Route::get('/dashboard/ads', 'index')->name('ads.index');
        Route::get('/dashboard/ads/{ad}', 'show')->name('ads.show');
        Route::post('/dashboard/ads', 'store')->name('ads.store');
        Route::put('/dashboard/ads/{ad}', 'edit')->name('ads.edit');
        Route::delete('/dashboard/ads/{ad}', 'destroy')->name('ads.destroy');
    });

    //Shop
    Route::middleware(['auth', 'verified', 'CheckUser'])->controller(ShopController::class)->group(function () {
        Route::get('/dashboard/shop', 'index')->name('shop.index');
        Route::get('/dashboard/shop/{shop}', 'show')->name('shop.show');
        // Route::post('/dashboard/shop/{shop}', 'update')->name('shop.update');
        Route::post('/dashboard/shop', 'store')->name('shop.store');
        Route::put('/dashboard/shop/{shop}', 'edit')->name('shop.edit');
        Route::delete('/dashboard/shop/{shop}', 'destroy')->name('shop.destroy');
    });

    //Contact
    Route::middleware(['auth', 'verified', 'CheckUser'])->controller(ContactUsController::class)->group(function () {
        Route::get('/dashboard/contactus', 'index')->name('contact.index');
        Route::get('/dashboard/contactus/{id}', 'show')->name('contact.show');
        Route::post('/dashboard/contactus', 'store')->name('contact.store');
        Route::put('/dashboard/contactus/{id}', 'edit')->name('contact.edit');
        Route::delete('/dashboard/contactus/{id}', 'destroy')->name('contact.destroy');
    });


    //Ads
    Route::middleware(['auth', 'verified', 'CheckUser'])->controller(ShopAdsController::class)->group(function () {
        Route::get('/dashboard/shopads', 'index')->name('shopAds.index');
        Route::get('/dashboard/shopads/{shopad}', 'show')->name('shopAds.show');
        Route::post('/dashboard/shopads', 'store')->name('shopAds.store');
        Route::put('/dashboard/shopads/{shopad}', 'edit')->name('shopAds.edit');
        Route::delete('/dashboard/shopads/{shopad}', 'destroy')->name('shopAds.destroy');
    });
});

Route::middleware(['auth', 'CheckUser'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

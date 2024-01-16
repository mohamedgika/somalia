<?php

use App\Livewire\Post\ListPosts;
use Illuminate\Support\Facades\Route;
use App\Livewire\Category\ListCategories;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\AdsController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
})->name('dashboard');
        //User
        Route::get('/dashboard/user',[UserController::class,'index'])->name('user.index');
        Route::post('/dashboard/user/store',[UserController::class,'store'])->name('user.store');
        Route::put('/dashboard/user/{user}',[UserController::class,'edit'])->name('user.edit');
        Route::delete('/dashboard/user/{user}',[UserController::class,'del'])->name('user.delete');

        //Category
        Route::resource('/dashboard/category',CategoryController::class);

        //Ads
        Route::middleware(['auth','verified'])->controller(AdsController::class)->group(function () {
            Route::get('/dashboard/ads', 'index')->name('ads.index');
            Route::get('/dashboard/ads/{ad}', 'show')->name('ads.show');
            Route::post('/dashboard/ads', 'store')->name('ads.store');
            Route::put('/dashboard/ads/{ad}', 'edit')->name('ads.edit');
            Route::delete('/dashboard/ads/{ad}', 'destroy')->name('ads.destroy');
        });



    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

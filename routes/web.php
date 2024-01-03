<?php

use App\Livewire\Post\ListPosts;
use Illuminate\Support\Facades\Route;
use App\Livewire\Category\ListCategories;
use App\Http\Controllers\ProfileController;
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

Route::middleware('guest')->group(function () {

    Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
});


Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
            })->name('dashboard');
        //User
        Route::get('/dashboard/user',[UserController::class,'index'])->name('user.index');
        Route::post('/dashboard/user/store',[UserController::class,'store'])->name('user.store');
        Route::put('/dashboard/user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
        Route::delete('/dashboard/user/delete/{id}',[UserController::class,'del'])->name('user.delete');
        //Category
        Route::resource('/dashboard/category',CategoryController::class);
        Route::put('dashboard/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

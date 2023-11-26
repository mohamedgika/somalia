<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\RegisterDetailController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\SubCategory\SubCategoryController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['api'])->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    // Register Details
    Route::get('/countries',[RegisterDetailController::class,'getCountries']);
    Route::get('/states/{country_id}',[RegisterDetailController::class,'getStates']);
    Route::get('/cities/{state_id}',[RegisterDetailController::class,'getCities']);


    Route::get('/getaccount', [AuthController::class, 'getaccount']);

});


// Category
Route::middleware(['auth:api'])->controller(CategoryController::class)->group(function () {
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

// // Category
// Route::middleware(['api'])->controller(CategoryController::class)->group(function () {

// });

// // Category
// Route::middleware(['api'])->controller(CategoryController::class)->group(function () {

// });

// // Category
// Route::middleware(['api'])->controller(CategoryController::class)->group(function () {

// });

// // Category
// Route::middleware(['api'])->controller(CategoryController::class)->group(function () {

// });

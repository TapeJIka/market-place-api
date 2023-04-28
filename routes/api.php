<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductPhotoController;
use App\Http\Controllers\Api\ProductTypeController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::put('/updateUserGeneralSettings', [UserController::class, 'updateUserGeneralSettings']);
    Route::put('/updateUserPassword', [UserController::class, 'updateUserPassword']);
    Route::delete('/deleteAccount', [UserController::class, 'handleUserAccountDelete']);
});

Route::apiResource('/complaint',ComplaintController::class);
Route::apiResource('/category',ProductCategoryController::class);
Route::apiResource('/productType',ProductTypeController::class);
Route::apiResource('/product',ProductController::class);
Route::apiResource('/rating',RatingController::class);
Route::apiResource('/productPhoto',ProductPhotoController::class);

Route::get('/product_photo/image/{product_photo}',[ProductPhotoController::class,'getFile'])->name('product_photo.image');

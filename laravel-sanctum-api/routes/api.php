<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** 
 * 
 * Protected Routes
 * 
**/

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Store Product
    Route::post('/products', [ProductController::class, 'store']);

    // Update Product
    Route::put('/products/{product}', [ProductController::class, 'update']);

    // Delete Product
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    // Logout User
    Route::post('/logout', [AuthController::class, 'logout']);
});


/** 
 * 
 * Public Routes
 * 
**/

// Register User
Route::post('/register', [AuthController::class, 'register']);

// Login User
Route::post('/login', [AuthController::class, 'login']);

// All resource routes combined
// Route::resource('products', ProductController::class);

// // Search product name
Route::get('products/search/{name}', [ProductController::class, 'search']);

// Fetch All Products
Route::get('/products', [ProductController::class, 'index']);

// Fetch Single Product
Route::get('/products/{product}', [ProductController::class, 'show']);
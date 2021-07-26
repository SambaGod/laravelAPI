<?php

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

// All routes combined
Route::resource('products', ProductController::class);

// Search product name
Route::get('products/search/{name}', [ProductController::class, 'search']);

// Fetch All
// Route::get('/products', [ProductController::class, 'index']);

// Fetch Single
// Route::get('/products/{product}', [ProductController::class, 'show']);

// Store
// Route::post('/products', [ProductController::class, 'store']);
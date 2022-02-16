<?php

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

Route::namespace('Api')->group(function() {
    // Products get api route
    Route::get('/products', 'ProductController@index');
    
    // Categories get api route
    Route::get('/products/categories', 'CategoryController@index');

    // Product-detail get api route
    Route::get('/products/{slug}', 'ProductController@show');

    // Save new product-review
    Route::get('/reviews', 'ReviewController@index');
    
    Route::post('/reviews', 'ReviewController@store');
});

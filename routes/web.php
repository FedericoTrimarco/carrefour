<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function(){
    
    Route::get('/', 'HomeController@index')->name('home');
    
    // products
    Route::resource('/products', 'ProductController');
    
    // categories
    Route::resource('/categories', 'CategoryController');
    
    // trash
    Route::get('/trash', 'ProductController@getTrash')->name('products.trash');
    
    Route::match(['get', 'post'], '/restore/{id}', 'ProductController@restore')->name('product.restore');
    
    Route::match(['get', 'delete'], '/delete/{id}', 'ProductController@forceDelete')->name('product.forceDelete');
});

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
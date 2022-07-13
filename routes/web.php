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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	

	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
	Route::resource('/brands','App\Http\Controllers\BrandController');
	Route::resource('/products','App\Http\Controllers\ProductController');
	Route::resource('/categories','App\Http\Controllers\CategoryController');
	Route::get('/vendors','App\Http\Controllers\UserController@vendors');
	Route::get('/vendors/create','App\Http\Controllers\UserController@createVendor');
	Route::post('/vendors/store','App\Http\Controllers\UserController@storeVendor');
	Route::get('/vendors/edit','App\Http\Controllers\UserController@editVendor');
	Route::post('/vendors/update','App\Http\Controllers\UserController@updateVendor');
	Route::post('/vendors/delete','App\Http\Controllers\UserController@deleteVendor');
	
});


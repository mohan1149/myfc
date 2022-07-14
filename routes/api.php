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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login','App\Http\Controllers\APIController@login');
Route::post('/register','App\Http\Controllers\APIController@register');


Route::get('/getAllBrands','App\Http\Controllers\APIController@getAllBrands');
Route::get('/getAllCategories','App\Http\Controllers\APIController@getAllCategories');

Route::get('/getProdcuts','App\Http\Controllers\APIController@getProdcuts');

Route::get('/getProductsByVenodrID/{uid}','App\Http\Controllers\APIController@getProductsByVenodrID');

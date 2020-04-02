<?php

use Illuminate\Http\Request;

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


// Users
Route::post('/register', 'Api\Auth\AuthController@register');
Route::post('/login', 'Api\Auth\AuthController@login');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/logout', 'Api\Auth\AuthController@logout');
    Route::get('/user', 'Api\Auth\AuthController@user');
});

//  Posts
Route::resource('/posts', 'Api\PostsController');

//  Categories
Route::resource('/categories', 'Api\CategoriesController');

//    Reservations
Route::resource('/books', 'Api\ReservationController');

//    Find Doctors
Route::post('/search/{doctor}', 'Api\DoctorController@searchDoctor');


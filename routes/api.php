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

//api response
//get All courses
Route::get('/courses', 'CourseControllerApi@getAll');
//show courses
Route::get('/cat/course/{c_id}','CourseControllerApi@show');

Route::get('/cat/{id}','CourseControllerApi@cat');



//crad cat
Route::get('/cats','CatControllerApi@index');
Route::post('/cats/store','CatControllerApi@store');
Route::post('/cats/update/{id}','CatControllerApi@update');
Route::get('/cats/delete/{id}','CatControllerApi@delete');



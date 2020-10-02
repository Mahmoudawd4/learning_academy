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

Route::namespace('Front')->group(function(){

    Route::get('/','HomepageController@index' )->name('front.homepage');

    Route::get('/cat/{id}','CourseController@cat')->name('front.cat');

    Route::get('/cat/{id}/course/{c_id}','CourseController@show')->name('front.show');

    Route::get('/contact','ContactController@index' )->name('front.contact');

    Route::get('/message/newsletter','MessageController@newsletter')->name('front.message.newsletter');

    Route::get('/message/contact','MessageController@contact')->name('front.message.contact');

    Route::get('/message/enroll','MessageController@enroll')->name('front.message.enroll');


});


Route::namespace('Admin')->prefix('dashboard')->group(function(){



    Route::get('/login','AuthController@login')->name('Admin.login');
    Route::post('/do-login','AuthController@doLogin')->name('Admin.doLogin');


    Route::middleware('adminAuth')->group(function(){

        Route::get('/','HomeController@index')->name('Admin.home');
        Route::get('/logout','AuthController@logout')->name('Admin.logout');


        Route::get('/cats','CatController@index')->name('Admin.cats.index');
        Route::get('/cats/create','CatController@create')->name('Admin.cats.create');
        Route::post('/cats/store','CatController@store')->name('Admin.cats.store');
        Route::get('/cats/edit/{id}','CatController@edit')->name('Admin.cats.edit');
        Route::post('/cats/update/{id}','CatController@update')->name('Admin.cats.update');
        Route::get('/cats/delete/{id}','CatController@delete')->name('Admin.cats.delete');



        Route::get('/trainers','TrainerController@index')->name('Admin.trainer.index');
        Route::get('/trainers/create','TrainerController@create')->name('Admin.trainer.create');
        Route::post('/trainers/store','TrainerController@store')->name('Admin.trainer.store');
        Route::get('/trainers/edit/{id}','TrainerController@edit')->name('Admin.trainer.edit');
        Route::post('/trainers/update/{id}','TrainerController@update')->name('Admin.trainer.update');
        Route::get('/trainers/delete/{id}','TrainerController@delete')->name('Admin.trainer.delete');


        Route::get('/courses','CourseController@index')->name('Admin.courses.index');
        Route::get('/courses/create','CourseController@create')->name('Admin.courses.create');
        Route::post('/courses/store','CourseController@store')->name('Admin.courses.store');
        Route::get('/courses/edit/{id}','CourseController@edit')->name('Admin.courses.edit');
        Route::post('/courses/update/{id}','CourseController@update')->name('Admin.courses.update');
        Route::get('/courses/delete/{id}','CourseController@delete')->name('Admin.courses.delete');



    });


});

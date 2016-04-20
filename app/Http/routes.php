<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/dashboard', 'HomeController@index');

Route::post('/basic', 'BasicController@store');

Route::post('/education', 'EducationController@store');

Route::post('/experience', 'ExperienceController@store');

Route::post('/other', 'OtherController@store');

Route::get('/cv', 'CvController@index');

Route::get('/rollback', 'CvController@destroy');

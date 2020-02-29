<?php

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

Route::get('/jobs', 'JobController@index');
Route::get('/jobs/create', 'JobController@create')->middleware('auth');
Route::post('/jobs/store', 'JobController@store');
Route::get('/jobs/show/{id}', 'JobController@show');
Auth::routes();
Route::get('/profile', 'HomeController@profile')->middleware('auth');

Route::get('/my_jobs', 'JobController@my_jobs')->middleware('auth');
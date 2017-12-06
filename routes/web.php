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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// OAuth Routes
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

Route::any('/profile_type', 'UserController@profileType')->name('profile_type');
ROute::any('/expert_info', 'UserController@expertInfo')->name('expert_info');
Route::post('/search', 'HomeController@search')->name('search');
Route::any('/edit_profile', 'UserController@editProfile')->name('edit_profile');
Route::get('/become_expert', 'UserController@becomeExpert')->name('become_expert');
Route::get('/user/{id}', 'UserController@viewProfile')->name('view_profile');
Route::get('/save/{id}', 'UserController@saveExpert')->name('save_expert');
Route::get('/saved', 'UserController@favorites')->name('favorites');
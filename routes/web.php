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
Route::get('/remove/{id}', 'UserController@removeExpert')->name('remove_expert');
Route::get('/saved', 'UserController@favorites')->name('favorites');
Route::any('/report/{id}', 'UserController@report_user')->name('report');

Route::prefix('/messages')->group(function() {
  Route::get('/{id}', 'ConversationsController@getConversation')->name('get_conversation');
  Route::any('/create/{id}', 'ConversationsController@create')->name('create_conversation');
  Route::get('/view/{id}', 'MessagesController@view')->name('view_conversation');
  Route::post('/respond/{id}', 'MessagesController@respond')->name('respond');
  Route::get('/close/{id}', 'ConversationsController@close')->name('close_conversation');
  Route::get('/', 'ConversationsController@view')->name('all_conversation');
});

Route::get('/to_conversation/{id}/{n_id}', 'NotificationController@to_conversation')->name('to_conversation');


Route::get('/pay/success', 'PaymentsController@paySuccess')->name('pay_success');
Route::get('/pay/history', 'PaymentsController@paymentHistory')->name('pay_history');
Route::any('/pay/{id}/{c_id}', 'PaymentsController@payPage')->name('pay_page');

Route::any('/review/{id}', 'ReviewsController@create')->name('create_review');

Route::any('/money/withdraw', 'WithdrawalsController@withdrawal')->name('make_withdrawal');
Route::get('/admin/withdrawals', 'WithdrawalsController@adminWithdrawals')->name('admin_withdrawals');
Route::get('/admin/complete/{id}', 'WithdrawalsController@complete')->name('mark_completed');

Route::any('/add/paypal', 'MethodsController@paypal')->name('paypal');

Route::prefix('/admin')->group(function() {
  Route::get('/reports', 'AdminController@reports')->name('admin_reports');
  Route::get('/deactivate/{id}', 'AdminController@deactivate_user')->name('admin_deactivate');
  Route::get('/mark/{id}', 'AdminController@mark_report')->name('admin_mark_report');
});
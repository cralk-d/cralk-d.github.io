<?php

use App\Admin;
use App\Notifications\NewUserCreated;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::post('/frontend','OrderController@store');
Route::get('/orders','OrderController@index')->name('index');
Route::get('/frontend/{post}','FrontendController@show')->name('show');
Route::get('/','FrontendController@index')->name('index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('owner')->group(function() {

	Route::get('/login','Auth\OwnerLoginController@showLoginForm')->name('owner.login');
	Route::post('/login','Auth\OwnerLoginController@login')->name('owner.login.submit');
});

Route::prefix('admin')->group(function() {
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

	Route::resource('/feeds','FeedController');
    Route::resource('/orders','OrderController');
    Route::resource('/invoices','InvoiceController');
    Route::resource('/posts','PostController');
    Route::resource('/app','AppController');
    Route::resource('/payments','PaymentController');
    Route::resource('/series','SeriesController',['except' =>'show']);
    Route::resource('/users','UsersController');

	Route::get('/setting/{admin}/edit', 'AdminController@edit')->name('setting.edit');
	Route::patch('/setting/{admin}', 'AdminController@update')->name('setting.update');
	Route::get('/','AdminController@index')->name('index');
});
Route::namespace('Owner')->prefix('owner')->name('owner.')->group(function(){ 
	Route::get('/lists','ListController@index')->name('index');
	Route::get('/posts/create', 'PostsController@create');
	Route::post('/p', 'PostsController@store');
	Route::get('/posts/{post}', 'PostsController@show');
	Route::get('/','OwnerController@index')->name('index');
});

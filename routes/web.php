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
    // return view('welcome');
    return redirect('home');
});

// User auth
Auth::routes();

// Admin


Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->name('admin.')->prefix('admin')->group(function () {

	// Admin auth
	Auth::routes();

	Route::get('/home', 'PagesController@index')->name('home');


	Route::get('/bookable/templates/create', 'BookableTemplateController@create')->name('bookable.templates.create');

});
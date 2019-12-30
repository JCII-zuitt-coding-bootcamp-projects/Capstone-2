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

	

	//Bookable templates routes
	Route::get('/bookable/templates', 'BookableTemplateController@index')->name('bookable.templates.index');
	Route::get('/bookable/templates/create', 'BookableTemplateController@create')->name('bookable.templates.create');
	Route::post('/bookable/templates/create', 'BookableTemplateController@store')->name('bookable.templates.store');
	Route::get('/bookable/templates/edit/{id}', 'BookableTemplateController@edit')->name('bookable.templates.edit');
		//template API access for fetch
		Route::post('/template/{id}/data', 'BookableTemplateController@getTemplateData')->name('template.getTemplateData');
		Route::post('/template/{id}/update', 'BookableTemplateController@updateTemplateData')->name('template.updateTemplateData');


	// Bookable routes
	Route::get('/bookables', 'BookableController@index')->name('bookable.index');
	Route::get('/bookable/create', 'BookableController@create')->name('bookable.create');
	Route::post('/bookable/create', 'BookableController@store')->name('bookable.store');
	Route::get('/bookable/edit/{id}', 'BookableController@edit')->name('bookable.edit');



	

	// {parent_cell : 'c_1',col :4,row : 3}
});
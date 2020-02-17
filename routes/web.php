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
    return redirect()->route('reservation.services');
});

// User auth
Auth::routes();

// Admin


Route::get('/home', function () {
    // return view('welcome');
    return redirect()->route('reservation.services');
})->name('home');

Route::get('/reserve/{bookable_id}', 'CustomerPagesController@reserve')->name('reserve');

Route::get('/services', 'ReservationController@services')->name('reservation.services');


Route::get('/reservations', 'ReservationController@index')->name('reservation.index');
Route::post('/reservations', 'ReservationController@getUserReservationsByPayment')->name('reservation.getUserReservationsByPayment');

// for ajax
Route::post('/reservations/{bookable_id}/data', 'ReservationController@getBookableReservations')->name('reservation.reservations'); // array of reserved cells
Route::post('/reservations/{bookable_id}/new', 'ReservationController@newReservation')->name('reservation.new'); // reserve new seats/cell




Route::get('/profile', 'CustomerPagesController@profile')->name('profile');
Route::post('/profile', 'CustomerPagesController@profileData')->name('profile.data');
Route::post('/profile/update', 'CustomerPagesController@update')->name('profile.update');
Route::post('/profile/update-password', 'CustomerPagesController@updatePassword')->name('profile.update.password');








Route::namespace('Admin')->name('admin.')->prefix('admin')->group(function () {

	// Admin auth
	Auth::routes();

	Route::get('/', function () {
	    return redirect()->route('admin.home');
	});


	Route::get('/home', 'PagesController@index')->name('home');
	Route::get('/not-authorized', function(){
		return view('admin.not_authorized');
	})->name('not_authorized');

	

	//Bookable templates routes
	Route::get('/bookable/templates', 'BookableTemplateController@index')->name('bookable.templates.index')->middleware('allow_on_bookable_template');
	Route::get('/bookable/templates/create', 'BookableTemplateController@create')->name('bookable.templates.create')->middleware('allow_on_bookable_template');
	Route::post('/bookable/templates/create', 'BookableTemplateController@store')->name('bookable.templates.store')->middleware('allow_on_bookable_template');
	Route::get('/bookable/templates/edit/{id}', 'BookableTemplateController@edit')->name('bookable.templates.edit')->middleware('allow_on_bookable_template');

	Route::get('/bookable/templates/delete/{template_id}', 'BookableTemplateController@delete')->name('bookable.templates.delete')->middleware('allow_on_bookable_template');
	Route::get('/bookable/templates/copy/{template_id}', 'BookableTemplateController@copy')->name('bookable.templates.copy')->middleware('allow_on_bookable_template');

		//template API access for fetch
	Route::post('/template/{id}/data', 'BookableTemplateController@getTemplateData')->name('template.getTemplateData'); // tinatwag din to sa customer side kaya walang ->middleware('allow_on_bookable_template')
	Route::post('/template/{id}/update', 'BookableTemplateController@updateTemplateData')->name('template.updateTemplateData')->middleware('allow_on_bookable_template');


	// Bookable routes
	Route::get('/bookables', 'BookableController@index')->name('bookable.index');//allow_on_bookable_schedule
	Route::get('/bookable/create', 'BookableController@create')->name('bookable.create');
	Route::post('/bookable/create', 'BookableController@store')->name('bookable.store');
	Route::get('/bookable/edit/{id}', 'BookableController@edit')->name('bookable.edit');



	Route::get('/staff', 'StaffController@index')->name('staff.index');
	Route::post('/staff', 'StaffController@getStaffs')->name('staff.getStaffs');

	Route::get('/staff/create', 'StaffController@create')->name('staff.create');
	Route::post('/staff/create', 'StaffController@store')->name('staff.store');
	Route::post('/staff/update', 'StaffController@update')->name('staff.update');
	


	Route::get('/verify-ticket', 'VerifyTicketController@index')->name('verify.ticket');
	Route::post('/verify-ticket/{code}', 'VerifyTicketController@check')->name('verify.check');


	// {parent_cell : 'c_1',col :4,row : 3}
});
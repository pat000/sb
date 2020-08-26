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


Auth::routes();


Route::group( ['middleware' => 'auth'], function() {

	Route::get('/', 'HomeController@home');
	Route::get('/home', 'HomeController@home');
	// Route::get('/profile','HomeController@profile');

	//Accounts
	Route::get('masterlists','MasterlistController@masterlists');
	Route::post('new-account','MasterlistController@new_account');
	Route::get('/reset-account/{id}', 'MasterlistController@reset_account');
	Route::post('/edit-account/{id}', 'MasterlistController@edit_user'); 

	//Category
	Route::post('new-category','MasterlistController@new_category');
	Route::post('/edit-category/{id}','MasterlistController@edit_category');


	//Ordinance
	Route::get('ordinances','OrdinanceController@index');
	Route::get('getOrdinances','OrdinanceController@getOrdinances');
	Route::post('new-ordinance','OrdinanceController@new_ordinance');
	Route::get('edit-ordinance/{id}','OrdinanceController@edit_ordinance');
	Route::post('update-ordinance/{id}','OrdinanceController@update_ordinance');
	Route::get('delete-ordinance/{id}','OrdinanceController@delete_ordinance');

	Route::get('delete-ordinance-file/{id}/{filename}','OrdinanceController@delete_or_file')->name('delete_or_file');


	// Legalizations
	Route::get('resolutions','LegalizationController@index');
	Route::get('getLegalizations','LegalizationController@getLegalizations');
	Route::post('new-resolution','LegalizationController@new_legalization');
	Route::get('edit-resolution/{id}','LegalizationController@edit_legalization');
	Route::post('update-resolution/{id}','LegalizationController@update_legalization');
	Route::get('delete-resolution/{id}','LegalizationController@delete_legalization');

	Route::get('delete-legalization-file/{id}/{filename}','LegalizationController@delete_leg_file')->name('delete_leg_file');

	// Motorized
	Route::resource('motorized','MotorizedController');
	Route::get('legalization/get-form/{id}','MotorizedController@getForm')->name('get-form');
});

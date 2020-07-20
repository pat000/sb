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
	Route::post('new-ordinance','OrdinanceController@new_ordinance');
	Route::post('edit-ordinance/{id}','OrdinanceController@edit_ordinance');
	Route::get('delete-ordinance/{id}','OrdinanceController@delete_ordinance');

	// Legalizations
	Route::get('legalizations','LegalizationController@index');
	Route::post('new-legalization','LegalizationController@new_legalization');
	Route::post('edit-legalization/{id}','LegalizationController@edit_legalization');
	Route::get('delete-legalization/{id}','LegalizationController@delete_legalization');


	// Motorized
	Route::resource('motorized','MotorizedController');
});

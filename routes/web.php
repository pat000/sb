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

Route::group( ['middleware' => 'auth'], function()

{
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
Route::post('new-ordinance','OrdinanceController@new_ordinance');
Route::post('edit-ordinance/{id}','OrdinanceController@edit_ordinance');
}
);

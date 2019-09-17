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

Route::view('/', 'welcome');

Route::get('dashboard', function(){
	return 'dashboard';
});

Auth::routes();
 
Route::get('login/operator', 'Auth\LoginController@showOperatorLoginForm')->name('login.operator');
Route::get('login/club', 'Auth\LoginController@showClubLoginForm')->name('login.club');

Route::get('register/operator', 'Auth\RegisterController@showOperatorRegisterForm')->name('register.operator');;
Route::get('register/club', 'Auth\RegisterController@showClubRegisterForm')->name('register.club');;

Route::post('login/operator', 'Auth\LoginController@operatorLogin');
Route::post('login/club', 'Auth\LoginController@clubLogin');

Route::post('logout/operator', 'Auth\LoginController@operatorLogout')->name('logout.operator');
Route::post('logout/club', 'Auth\LoginController@clubLogout')->name('logout.club');

Route::post('register/operator', 'Auth\RegisterController@createOperator')->name('register.operator');;
Route::post('register/club', 'Auth\RegisterController@createClub')->name('register.club');


Route::group(['middleware' => 'auth:operator'], function () {
	
	Route::get('dashboard/operator','DashboardOperatorController@index');
	
	Route::get('operator','OperatorController@index');
	
	Route::get('stadium','StadiumController@index');
	
	Route::get('assuransi','AssuransiController@index');
	
	Route::get('wasit','WasitController@index');
	
});

Route::group(['middleware' => 'auth:club'], function () {
	
	Route::get('dashboard/club','DashboardClubController@index');
	
	Route::get('club','ClubController@index');
	
	Route::get('player','PlayerController@index');
	
	Route::get('player/create','PlayerController@create');

	Route::post('player/store','PlayerController@store');

});


Route::get('home', 'HomeController@index');
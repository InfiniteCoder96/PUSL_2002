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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/admin', 'admin.dashboard');
Route::view('/third_parties', 'HomeController@third_parties_index')->name('third_parties_index');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/login/third_parties', 'Auth\LoginController@showThird_PartiesLoginForm');


Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/login/third_parties', 'Auth\LoginController@Third_PartiesLogin');

Route::get('/register/third_parties', 'ThirdPartyController@showThird_PartiesRegisterForm');
Route::post('/register/third_parties', 'ThirdPartyController@createThird_Parties');


Route::get('/view-accident-map', 'AccidentController@view_accident_map')->name('view_accident_map');
Route::get('/third_parties/police_rda_index', 'ThirdPartyController@police_rda_index')->name('police_rda_index');
Route::get('/third_parties/insurance_index', 'ThirdPartyController@insurance_index')->name('insurance_index');

Route::resource('users','UserController');
Route::resource('third_parties','ThirdPartyController');
Route::resource('accidents','AccidentController');

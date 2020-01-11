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


Route::get('/dashboard', 'HomeController@showdashboard')->name('dashboard');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/login/third_parties', 'Auth\LoginController@showThird_PartiesLoginForm');

Route::get('/login-me', 'Auth\LoginController@showLogin')->name('login-me');
Route::post('/login-me', 'Auth\LoginController@login_me');
Route::post('/logout-me', 'Auth\LoginController@logoutMe');

Route::get('/register/third_parties', 'UserController@showThird_PartiesRegisterForm');
Route::post('/register/third_parties', 'UserController@createThird_Parties');

Route::get('/view-accident-map', 'AccidentController@view_accident_map')->name('view_accident_map');

Route::get('/third_parties/police_rda_index', 'UserController@police_rda_index')->name('police_rda_index');
Route::get('/third_parties/insurance_index', 'UserController@insurance_index')->name('insurance_index');

Route::get('/accidents/all', 'AccidentController@all')->name('all');
Route::get('/accidents/pending', 'AccidentController@pending')->name('pending');
Route::post('/accidents/approve', 'AccidentController@approve')->name('accidents.approve');
Route::post('/accidents/reject', 'AccidentController@reject')->name('accidents.reject');
Route::post('/accidents/searchAccidents', 'AccidentController@searchAccidents')->name('accidents.searchAccidents');
Route::get('/accidents/approved-list', 'AccidentController@approved_list')->name('approved_list');

Route::resource('users','UserController');
Route::resource('accidents','AccidentController');

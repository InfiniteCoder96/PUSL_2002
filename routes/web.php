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
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/login/third_parties', 'Auth\LoginController@showThird_PartiesLoginForm');
Route::get('/register/thid_parties', 'Auth\RegisterController@showThird_PartiesRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/login/third_parties', 'Auth\LoginController@Third_PartiesLogin');
Route::post('/register/third_parties', 'Auth\RegisterController@createThird_Parties');


Route::view('/admin', 'admin');
Route::view('/third_parties', 'third_parties');
Route::view('/home', 'home')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/security/dashboard', 'SecurityController@index')->name('security.home');
Route::get('/security/register', 'Auth\RegisterController@showSecurityRegistrationForm')->name('security.register');
Route::post('/security/register', 'Auth\RegisterController@securityRegister');

Route::get('/admin/generate_security_key','AdminController@generateSecurityKey');
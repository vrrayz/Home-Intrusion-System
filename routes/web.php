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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::post('/register', 'Auth\RegisterController@register');

Route::get('/security/dashboard', 'SecurityController@index')->name('security.home')->middleware('verified');
Route::get('/security/register', 'Auth\RegisterController@showSecurityRegistrationForm')->name('security.register');
Route::post('/security/register', 'Auth\RegisterController@securityRegister');

// Security Key Code Route(s)
Route::get('/admin/generate_security_key', 'SecurityKeyCodeController@viewSecurityKeyGenerator')->name('admin.keygen');
Route::post('/admin/generate_security_key', 'SecurityKeyCodeController@generateSecurityKey');
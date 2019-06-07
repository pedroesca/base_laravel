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
    return view('theme.lte.login');
})->middleware('guest');

Route::get('profile', function () {
    return view('theme.lte.profile');
})->name('perfil')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('micuenta', 'UsermanageController');
Route::resource('clientes', 'ClientesController');
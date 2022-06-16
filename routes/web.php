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

Route::get('/home', 'DashBoardController@index')->name('home');
Route::resource('lottery', 'LotteryController')->middleware('auth');
Route::resource('payment', 'PaymentController')->middleware('auth');
//Route::resource('user', 'UserController')->middleware('auth');
Route::resource('profile', 'ProfileController')->middleware('auth');
Route::resource('ticket', 'TicketController')->middleware('auth');

/* Roles */
Route::resource('/admin/roles', 'RolController');

/* Usuarios */
Route::get('/admin/users','UserController@index')->middleware('auth')->name('user.index');
Route::get('/admin/users/crear','UserController@create')->middleware('auth')->name('user.create');
Route::get('/admin/users/edit/{id}','UserController@edit')->middleware('auth')->name('user.edit');
Route::put('/admin/users/update/{user}','UserController@update')->middleware('auth')->name('user.update');
Route::post('/admin/user/{id}','UserController@destroy')->middleware('auth')->name('user.destroy');
Route::post('/admin/users','UserController@store')->middleware('auth')->name('user.store');
Route::get('/admin/users/cliente','UserController@createCliente')->middleware('auth')->name('user.cliente');
Route::get('/admin/users/vendedor','UserController@createVendedor')->middleware('auth')->name('user.vendedor');
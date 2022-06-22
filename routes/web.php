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

/* Rutas de Control de Usuarios del sistema */
Route::get('/admin/users','UserController@index')->middleware('auth')->name('user.index');
Route::get('/admin/users/create','UserController@createUserSystem')->middleware('auth')->name('user.create');
Route::put('/admin/users/update/{user}','UserController@update')->middleware('auth')->name('user.update');
/* Clientes */
Route::get('/admin/clientes','UserController@listarClientes')->middleware('auth')->name('user.clientes');
Route::get('/admin/users/cliente','UserController@createCliente')->middleware('auth')->name('user.cliente');
Route::post('/admin/users/cliente','UserController@storeCliente')->middleware('auth')->name('user.cliente');
Route::put('/admin/customer/update/{user}','UserController@updateCustomerSeller')->middleware('auth')->name('customer.update');


/* Vendedores */
Route::get('/admin/vendedores','UserController@listarVendedores')->middleware('auth')->name('user.vendedores');
Route::get('/admin/users/vendedor','UserController@createClienteVendedor')->middleware('auth')->name('user.vendedor');


Route::get('/admin/users/edit/{id}','UserController@edit')->middleware('auth')->name('user.edit');

Route::post('/admin/user/{id}','UserController@destroy')->middleware('auth')->name('user.destroy');
Route::post('/admin/users','UserController@store')->middleware('auth')->name('user.store');
Route::post('/admin/users/{vendedor}','UserController@storeVendedor')->middleware('auth')->name('user.vendedor1');





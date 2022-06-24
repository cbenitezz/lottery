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

/* Rutas de Control de Usuarios del sistema - Crear y Actualizar */
Route::get('/admin/users','UserController@index')->middleware('auth')->name('user.index');
Route::get('/admin/users/create','UserController@createUserSystem')->middleware('auth')->name('user.create');
Route::post('/admin/users','UserController@store')->middleware('auth')->name('user.store');

/* Rutas para  editar y actualizar Usuarios,Perfiles, Roles y Eliminar */
Route::put('/admin/customer/update/{profile}','UserController@updateCustomerSeller')->middleware('auth')->name('customer.update');
Route::put('/admin/users/update/{user}','UserController@updateRol')->middleware('auth')->name('user.update');
Route::post('/admin/user/{id}','UserController@destroy')->middleware('auth')->name('user.destroy');


/* Ruta para la creación de Clientes y vendedores*/
Route::get('/admin/users/cliente','UserController@createCustomerSeller')->middleware('auth')->name('user.cliente');
Route::post('/admin/users/cliente','UserController@storeCustomerSeller')->middleware('auth')->name('user.cliente');
Route::get('/admin/users/vendedor','UserController@createCustomerSeller')->middleware('auth')->name('user.vendedor');

/* Listar Clientes y Vendedores */ 
Route::get('/admin/clientes','UserController@listarClientes')->middleware('auth')->name('user.clientes');
Route::get('/admin/vendedores','UserController@listarVendedores')->middleware('auth')->name('user.vendedores');



Route::get('/clear-cache', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
 });


 Route::fallback(function() {
    //return 'Hm, why did you land here somehow?';
    return view('errors.404');
});
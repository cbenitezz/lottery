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

use App\Http\Controllers\UserController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/inicio', function(){
    return view('welcome');
});

Route::get('imprimir',function(Request $request){

return view('admin.payments.recibo');

});


Auth::routes();

Route::get('/home', 'DashBoardController@index')->name('home');

/* Rutas Loteria / Sorteo  */
Route::get('admin/boleteria/{id}','LotteryController@boleteria')->middleware('auth')->name('lottery.boleteria');
Route::resource('lottery', 'LotteryController')->middleware('auth');

Route::post('printer','PaymentController@printer')->middleware('auth')->name('printer');
Route::get('controlabonos','PaymentController@controlAbonos')->middleware('auth')->name('payment.controlabonos');
Route::resource('payment', 'PaymentController')->middleware('auth');
//Route::resource('user', 'UserController')->middleware('auth');
Route::resource('profile', 'ProfileController')->middleware('auth');

Route::resource('customer', CustomerController::class)->middleware('auth');


Route::get('listarticket', 'TicketController@listarTicket')->middleware('auth')->name('ticket.listarticket');
Route::get('asignar/{ticket}', 'TicketController@asignar')->middleware('auth')->name('ticket.asignar');
Route::delete('desasignar/{id}', 'TicketController@desasignar')->middleware('auth')->name('ticket.desasignar');
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
Route::get('/admin/users/editseller/{id}','UserController@editSeller')->middleware('auth')->name('user.editseller');
Route::post('/admin/users/vendedor','UserController@updateSeller')->middleware('auth')->name('user.updateseller');
Route::post('/admin/users/cliente','UserController@storeCustomer')->middleware('auth')->name('user.cliente');
Route::post('/admin/users/seller','UserController@storeSeller')->middleware('auth')->name('user.seller');
Route::post('/admin/users/customer','UserController@storeCustomerNumberTicket')->middleware('auth')->name('user.customer');
Route::get('/admin/users/customersave','UserController@customerSave')->middleware('auth')->name('user.customersave');
Route::post('/admin/users/registernumber','UserController@registerNumberSeller')->middleware('auth')->name('user.registernumber');



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

    return view('errors.404');
});

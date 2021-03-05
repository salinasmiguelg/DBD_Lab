<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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

//Vista principal
Route::get('/', function () {
    return view('prueba');
});
//Vista Login
Route::get('/login', function () {
    return view('login');
});
//Vista Registro
Route::get('/registro', function () {
    return view('registro');
});
//Vista Perfil
Route::get('/perfil/{id}','UserController@showPerfil');

//Vista Edicion de perfil borrar


//Vista Edicion de perfil
Route::get('/perfil/edit/{id}',function($id){
    $user = User::find($id);
    return view('edit')->with('user',$user);
});

Route::get('/crearProducto',function(){
    return view('createProducto');
});

Route::get('/validate','UserController@validate')->name("userValidate"){

}

/*
Route::get('/crearUsuario',function(){
    return view('registro');
});*/


Route::get('/feriantes/{id}','UserController@showFeriante');


Route::get('/puestos/{id}','PuestoController@showPuestos');
//Vista de pago
Route::get('/pago/{id}', 'UserController@showPerfilPago');

//Vista comprobante de pago
Route::get('/pago/comprobante', function () {
    return view('comprobante');
});

// Vista carro de compra
Route::get('/carro', function () {
    return view('carro');
});

//cantidad
Route::get('/cantidad','CantidadController@index');
Route::post('/cantidad/create','CantidadController@store');
Route::get('/cantidad/{id}','CantidadController@show');
Route::put('/cantidad/{id}','CantidadController@update');
Route::delete('/cantidad/{id}','CantidadController@destroy');
//comprobante
Route::get('/comprobante','ComprobanteController@index');
Route::post('/comprobante/create','ComprobanteController@store');
Route::get('/comprobante/{id}','ComprobanteController@show');
Route::put('/comprobante/{id}','ComprobanteController@update');
Route::delete('/comprobante/{id}','ComprobanteController@destroy');
//comuna
Route::get('/comuna','ComunaController@index');
Route::post('/comuna/create','ComunaController@store');
Route::get('/comuna/{id}','ComunaController@show');
Route::put('/comuna/{id}','ComunaController@update');
Route::delete('/comuna/{id}','ComunaController@destroy');
//direccion
Route::get('/direccion','DireccionController@index');
Route::post('/direccion/create','DireccionController@store');
Route::get('/direccion/{id}','DireccionController@show');
Route::put('/direccion/{id}','DireccionController@update');
Route::delete('/direccion/{id}','DireccionController@destroy');
//feria
Route::get('/feria','FeriaController@index');
Route::post('/feria/create','FeriaController@store');
Route::get('/feria/{id}','FeriaController@show');
Route::put('/feria/{id}','FeriaController@update');
Route::delete('/feria/{id}','FeriaController@destroy');
//metodo_de_pago
Route::get('/metodo_de_pago','Metodo_de_pagoController@index');
Route::post('/metodo_de_pago/create','Metodo_de_pagoController@store');
Route::get('/metodo_de_pago/{id}','Metodo_de_pagoController@show');
Route::put('/metodo_de_pago/{id}','Metodo_de_pagoController@update');
Route::delete('/metodo_de_pago/{id}','Metodo_de_pagoController@destroy');
//permiso
Route::get('/permiso','PermisoController@index');
Route::post('/permiso/create','PermisoController@store');
Route::get('/permiso/{id}','PermisoController@show');
Route::put('/permiso/{id}','PermisoController@update');
Route::delete('/permiso/{id}','PermisoController@destroy');
//proceso_compra
Route::get('/proceso_compra','Proceso_compraController@index');
Route::post('/proceso_compra/create','Proceso_compraController@store');
Route::get('/proceso_compra/{id}','Proceso_compraController@show');
Route::put('/proceso_compra/{id}','Proceso_compraController@update');
Route::delete('/proceso_compra/{id}','Proceso_compraController@destroy');
//proceso_despacho
Route::get('/proceso_despacho','Proceso_despachoController@index');
Route::post('/proceso_despacho/create','Proceso_despachoController@store');
Route::get('/proceso_despacho/{id}','Proceso_despachoController@show');
Route::put('/proceso_despacho/{id}','Proceso_despachoController@update');
Route::delete('/proceso_despacho/{id}','Proceso_despachoController@destroy');
//proceso_pago
Route::get('/proceso_pago','Proceso_pagoController@index');
Route::post('/proceso_pago/create','Proceso_pagoController@store');
Route::get('/proceso_pago/{id}','Proceso_pagoController@show');
Route::put('/proceso_pago/{id}','Proceso_pagoController@update');
Route::delete('/proceso_pago/{id}','Proceso_pagoController@destroy');
//producto
Route::get('/producto','ProductoController@index');
Route::post('/producto/create','ProductoController@store')->name('crearProducto');
Route::get('/producto/{id}','ProductoController@show');
Route::put('/producto/{id}','ProductoController@update');
Route::delete('/producto/{id}','ProductoController@destroy');
//puesto_producto
Route::get('/puesto_producto','Puesto_productoController@index');
Route::post('/puesto_producto/create','Puesto_productoController@store');
Route::get('/puesto_producto/{id}','Puesto_productoController@show');
Route::put('/puesto_producto/{id}','Puesto_productoController@update');
Route::delete('/puesto_producto/{id}','Puesto_productoController@destroy');
//puesto
Route::get('/puesto','PuestoController@index');
Route::post('/puesto/create','PuestoController@store');
Route::get('/puesto/{id}','PuestoController@show');
Route::put('/puesto/{id}','PuestoController@update');
Route::delete('/puesto/{id}','PuestoController@destroy');
//region
Route::get('/region','RegionController@index');
Route::post('/region/create','RegionController@store');
Route::get('/region/{id}','RegionController@show');
Route::put('/region/{id}','RegionController@update');
Route::delete('/region/{id}','RegionController@destroy');
//rol
Route::get('/rol','RolController@index');
Route::post('/rol/create','RolController@store');
Route::get('/rol/{id}','RolController@show');
Route::put('/rol/{id}','RolController@update');
Route::delete('/rol/{id}','RolController@destroy');
//transaccion_comprobante
Route::get('/transaccion_comprobante','Transaccion_comprobanteController@index');
Route::post('/transaccion_comprobante/create','Transaccion_comprobanteController@store');
Route::get('/transaccion_comprobante/{id}','Transaccion_comprobanteController@show');
Route::put('/transaccion_comprobante/{id}','Transaccion_comprobanteController@update');
Route::delete('/transaccion_comprobante/{id}','Transaccion_comprobanteController@destroy');
//transaccion_producto
Route::get('/transaccion_producto','Transaccion_productoController@index');
Route::post('/transaccion_producto/create','Transaccion_productoController@store');
Route::get('/transaccion_producto/{id}','Transaccion_productoController@show');
Route::put('/transaccion_producto/{id}','Transaccion_productoController@update');
Route::delete('/transaccion_producto/{id}','Transaccion_productoController@destroy');
//transaccion_user
Route::get('/transaccion_user','Transaccion_userController@index');
Route::post('/transaccion_user/create','Transaccion_userController@store');
Route::get('/transaccion_user/{id}','Transaccion_userController@show');
Route::put('/transaccion_user/{id}','Transaccion_userController@update');
Route::delete('/transaccion_user/{id}','Transaccion_userController@destroy');
//transaccion
Route::get('/transaccion','TransaccionController@index');
Route::post('/transaccion/create','TransaccionController@store');
Route::get('/transaccion/{id}','TransaccionController@show');
Route::put('/transaccion/{id}','TransaccionController@update');
Route::delete('/transaccion/{id}','TransaccionController@destroy');
//user
Route::get('/user','UserController@index')->name('userAll');
Route::post('/user/create','UserController@store')->name('userStore');
Route::get('/user/{id}','UserController@show')->name('userGet');
Route::put('/user/{id}','UserController@update')->name('userUpdate');
Route::delete('/user/{id}','UserController@destroy')->name('userDelete');

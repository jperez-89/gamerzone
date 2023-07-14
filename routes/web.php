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

Route::get('/', 'HomeController@Index')->name("Home.Index");

Route::resource('/logueo', LogueoController::class);
Route::resource('/registro', RegistroController::class);

Route::post('agregarcarrito', 'HomeController@AgregarCarrito')->name("Home.AgregarCarrito");

Route::get('categorias', 'CategoriasController@Index')->name("Categorias.Index");
Route::get('categorias/{Categorias:id}', 'CategoriasController@Detalle')->name("Categorias.Detalle");
Route::post('categorias/guardar', 'CategoriasController@Guardar')->name("Categorias.Guardar");
Route::get('categorias/borrar/{Categorias:id}', 'CategoriasController@Borrar')->name("Categorias.Borrar");

Route::get('juegos', 'JuegoController@Index')->name("Juegos.Index");
Route::get('juegos/{Juegos:id}', 'JuegoController@Detalle')->name("Juegos.Detalle");
Route::post('juegos/guardar', 'JuegoController@Guardar')->name("Juegos.Guardar");
Route::get('juegos/borrar/{Juegos:id}', 'JuegoController@Borrar')->name("Juegos.Borrar");

Route::get('rol', 'RolController@Index')->name("Rol.Index");
Route::get('rol/{Roles:id}', 'RolController@Detalle')->name("Rol.Detalle");
Route::post('rol/guardar', 'RolController@Guardar')->name("Rol.Guardar");
Route::get('rol/borrar/{Roles:id}', 'RolController@Borrar')->name("Rol.Borrar");

Route::get('usuarios', 'UsuarioController@Index')->name("Usuarios.Index");
Route::get('usuarios/{Usuarios:correo}', 'UsuarioController@Detalle')->name("Usuarios.Detalle");
Route::get('usuarios/nuevo', 'UsuarioController@Nuevo')->name("Usuarios.Nuevo");
Route::post('usuarios/guardar', 'UsuarioController@Guardar')->name("Usuarios.Guardar");
Route::get('usuarios/borrar/{Usuarios:correo}', 'UsuarioController@Borrar')->name("Usuarios.Borrar");
Route::post('usuarios/registro', 'UsuarioController@Registro')->name("Usuarios.Registro");

Route::get('compra/checkout', 'CompraController@Checkout')->name("Compra.Checkout");
Route::post('compra/borrarCompra', 'CompraController@BorrarCompra')->name("Compra.BorrarCompra");
Route::get('compra/procesarCompra/{Compras:correo}', 'CompraController@ProcesarCompra')->name("Compra.ProcesarCompra");

Route::get('listafacturas', 'ListaFacturasController@index')->name("lista_facturas");

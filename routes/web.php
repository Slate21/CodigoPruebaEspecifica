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
    return view('paginaPrincipal');
});
// Redirecciones
Route::get('listUsers', 'App\Http\Controllers\mainController@RedirigirListaU')->name('ListaUsuarios');
Route::get('RedirectInfo/{id_usuario}', 'App\Http\Controllers\mainController@RedirigirMasInformacion')->name('MasInformacion');
Route::get('RedirectEdit/{id_usuario}', 'App\Http\Controllers\mainController@redirigirEditar')->name('editar');
//CRUD
Route::get('RegistrarUser', 'App\Http\Controllers\mainController@ValidarForm')->name('registrarUsuario');
Route::get('RedirectDelete/{id_usuario}', 'App\Http\Controllers\mainController@eliminar')->name('eliminar');
Route::get('RedirectEditar', 'App\Http\Controllers\mainController@EditarCrud')->name('editarCRUD');





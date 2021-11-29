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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/listar', [App\Http\Controllers\ProductosController::class, 'listar'])->name('listarProductos');
Route::get('/agregar', [App\Http\Controllers\ProductosController::class, 'agregar'])->name('agregarProductos');
Route::get('/agregarSu', [App\Http\Controllers\ProductosController::class, 'agregarSu'])->name('agregarSucursal');
Route::get('/editSu', [App\Http\Controllers\ProductosController::class, 'editSu'])->name('editarSucursal1');

Route::post('/guardarProducto', [App\Http\Controllers\ProductosController::class, 'guardar']);
Route::post('/guardarSucursal', [App\Http\Controllers\ProductosController::class, 'guardarSucursal']);
Route::put('/updateProducto/{id}', [App\Http\Controllers\ProductosController::class, 'updateProducto'])->name('updateProducto');
Route::put('/updateSucursal/{id}', [App\Http\Controllers\ProductosController::class, 'updateSucursal'])->name('updateSucursal');


Route::get('/miniatura/{filename}', [App\Http\Controllers\ProductosController::class, 'getImagen'])->name('miniatura');
Route::get('/eliminarProducto/{id}', [App\Http\Controllers\ProductosController::class, 'deleteProducto'])->name('eliminarProducto');
Route::get('/eliminarSucursal/{id}', [App\Http\Controllers\ProductosController::class, 'deleteSucursal'])->name('eliminarSucursal');
Route::get('/editarProducto/{id}', [App\Http\Controllers\ProductosController::class, 'edit'])->name('editarProducto');
Route::get('/editarSucursal/{id}', [App\Http\Controllers\ProductosController::class, 'edit2'])->name('editarSucursal');


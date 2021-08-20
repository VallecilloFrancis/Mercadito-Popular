<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;

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

//RUTAS CLIENTE

Route::get('cliente',[ClienteController::class, 'index'])->name('cliente.index');

Route::get('cliente/nuevo',[ClienteController::class, 'create'])->name('cliente.nuevo');

Route::post('cliente/nuevo',[ClienteController::class, 'store']);

Route::get('cliente/{id}',[ClienteController::class, 'show'])->name('cliente.ver')-> where('id' ,'[0-9]+');

Route::get('cliente/editar/{id}',[ClienteController::class, 'edit'])->name('cliente.edit')-> where('id' ,'[0-9]+');

Route::put('cliente/editar/{id}',[ClienteController::class, 'update'])-> where('id' ,'[0-9]+');

Route::delete('cliente/borrar/{id}',[ClienteController::class, 'destroy'])->name('cliente.borrar')-> where('id' ,'[0-9]+');

//RUTAS PROVEEDOR


Route::get('proveedor',[ProveedorController::class, 'index'])->name('proveedor.index');

Route::get('proveedor/nuevo',[ProveedorController::class, 'create'])->name('proveedor.nuevo');

Route::post('proveedor/nuevo',[ProveedorController::class, 'store']);

Route::get('proveedor/{id}',[ProveedorController::class, 'show'])->name('proveedor.ver')-> where('id' ,'[0-9]+');

Route::get('proveedor/editar/{id}',[ProveedorController::class, 'edit'])->name('proveedor.edit')-> where('id' ,'[0-9]+');

Route::put('proveedor/editar/{id}',[ProveedorController::class, 'update'])-> where('id' ,'[0-9]+');

Route::delete('proveedor/borrar/{id}',[ProveedorController::class, 'destroy'])->name('proveedor.borrar')-> where('id' ,'[0-9]+');

//RUTAS PRODUCTO

Route::get('producto',[ProductoController::class, 'index'])->name('producto.index');

Route::get('producto/nuevo',[ProductoController::class, 'create'])->name('producto.nuevo');

Route::post('producto/nuevo',[ProductoController::class, 'store']);

Route::get('producto/{id}',[ProductoController::class, 'show'])->name('producto.ver')-> where('id' ,'[0-9]+');

Route::get('producto/editar/{id}',[ProductoController::class, 'edit'])->name('producto.edit')-> where('id' ,'[0-9]+');

Route::put('producto/editar/{id}',[ProductoController::class, 'update'])-> where('id' ,'[0-9]+');

Route::delete('producto/borrar/{id}',[ProductoController::class, 'destroy'])->name('producto.borrar')-> where('id' ,'[0-9]+');

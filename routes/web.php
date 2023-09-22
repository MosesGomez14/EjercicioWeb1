<?php

use App\Http\Controllers\ControladorDeProductos;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('web');
});

Route::get('/listado', [ControladorDeProductos::class,'index'])->name('productos');

Route::post('/listado', [ControladorDeProductos::class,'crear'])->name('productos');

Route::get('/listado/{id}', [ControladorDeProductos::class,'Mostrar'])->name('mostrar-producto');
Route::patch('/listado/{id}', [ControladorDeProductos::class,'Actualizar'])->name('editar-producto');
Route::delete('/listado/{id}', [ControladorDeProductos::class,'Eliminar'])->name('eliminar-producto');


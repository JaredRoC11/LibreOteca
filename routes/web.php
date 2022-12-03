<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PrestamosController;

use App\Models\Libro;
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
    $libros=Libro::paginate(8);
    
    // dd($libros);

    return view('inicioLibreOteca',compact('libros'));
});

//Rutas de libros
Route::resource('libro', LibrosController::class);
///Rutas de libros

//Rutas de prestamos 
Route::resource('prestamos', PrestamosController::class);
Route::get('/recibo-prestamo/{prestamo?}', [PrestamosController::class, 'reciboDelPrestamo'])->name('recibo-prestamo');
Route::post('/devuelto/{prestamo?}', [PrestamosController::class, 'updateDevuelto'])->name('devuelto-prestamo');
///Rutas de prestamos
//Rutasd de autor
Route::resource('autor', AutorController::class);
///Rutas de autor
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
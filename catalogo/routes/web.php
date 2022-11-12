<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/peticion', [ Controlador::class, 'metodo' ] );

use App\Http\Controllers\MarcaController;
Route::get('/marcas', [ MarcaController::class, 'index' ]);
Route::get('/marca/create', [ MarcaController::class, 'create' ]);
Route::post('/marca/store', [ MarcaController::class, 'store' ]);

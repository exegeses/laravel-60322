<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


#####################################
##### crud de marcas



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


#### CRUD de marcas
use App\Http\Controllers\MarcaController;
Route::get('/marcas', [ MarcaController::class, 'index' ])
                ->middleware(['auth'])
                ->name('marcas');
Route::get('/marca/create', [ MarcaController::class, 'create' ])
                ->middleware(['auth']);
Route::post('/marca/store', [ MarcaController::class, 'store' ])
                ->middleware(['auth']);

#### CRUD de categorías
use App\Http\Controllers\CategoriaController;
Route::get('/categorias', [ CategoriaController::class, 'index' ])
                ->middleware(['auth'])
                ->name('categorias');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

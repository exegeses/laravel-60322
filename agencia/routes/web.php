<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fruta', function ()
{
    return 'manzana';
});
Route::get('/prueba', function ()
{
    $nombre = 'marcos';
    return view('prueba', [ 'nombre'=>$nombre ]);
});
Route::get('/inicio', function ()
{
    return view('inicio');
});
/* formulario */
Route::get('/formulario', function ()
{
    return view('form');
});
Route::post('/procesa', function ()
{
    //capturamos dato enviado por el form
    //$nombre = $_POST['nombre'];
    //$nombre = request()->input('nombre');
    //$nombre = request()->nombre;
    $nombre = request('nombre');
    $marcas = [
                'AMD', 'Fernet', 'Audiotechnica',
                'Intel', 'Toshiba', 'Apple'
              ];
    return view('procesa',
                    [
                        'nombre'=>$nombre,
                        'marcas'=>$marcas
                    ]
                );
});

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

########################
## CRUD de regiones
Route::get('/regiones', function ()
{
    //obtenemos listado de regiones
    /* raw SQL
    $regiones = DB::select('SELECT idRegion, regNombre FROM regiones');
    */
    /* Query Builder */
    $regiones = DB::table('regiones')
                        ->select('idRegion', 'regNombre')
                        ->get();
    //retornamos vista
    return view('regiones', [ 'regiones'=>$regiones ] );
});
Route::get('/region/create', function (){
    return view('regionCreate');
});
Route::post('/region/store', function ()
{
    //capturamos dato enviado por el form
    $regNombre = request()->regNombre;
    //insertar dato en tabla regiones
    try {
        /*DB::insert("
                INSERT INTO regiones
                        (regNombre)
                    VALUES
                        ( :regNombre )",
                        [ $regNombre ]
                );*/
        DB::table('regiones')
                ->insert(
                    [ 'regNombre'=>$regNombre ]
                );
        return redirect('/regiones')
                ->with([
                    'mensaje'=>'Región: '.$regNombre.' agregada correctamente.',
                    'css'=>'success'
                ]);
    }
    catch ( \Throwable $th ){
        return redirect('/regiones')
            ->with([
                'mensaje'=>'No se pudo agregar la región: '.$regNombre,
                'css'=>'danger'
            ]);
    }
});
Route::get('/region/edit/{id}', function ($id)
{
    //obtenemos el dato de la región por su id
    /*$region = DB::select(
                        'SELECT idRegion, regNombre
                            FROM regiones
                            WHERE idRegion = :id',
                            [ $id ]);*/
    $region = DB::table('regiones')
                    ->where('idRegion', $id)
                    ->first();

    return view('regionEdit', [ 'region'=>$region ]);
});
Route::patch('/region/update', function ()
{
    //capturamos datos enviados popr el form
    $idRegion = request()->idRegion;
    $regNombre = request()->regNombre;
    /**
     *  Raw SQL
     *  DB::update("UPDATE regiones
     *                   SET regNombre = :regNombre
     *                   WHERE idRegion = :id",
     *                   [ $regNombre, $idRegion ]
     *                 );
     */
    try {
        DB::table('regiones')
                ->where( 'idRegion', $idRegion )
                ->update(
                    [ 'regNombre' => $regNombre ]
                );
        return redirect('/regiones')
                ->with([
                        'mensaje'=>'Región: '.$regNombre.' agregada correctamente',
                        'css'=>'success'
                       ]);
    }
    catch ( \Throwable $th ){
        return redirect('/regiones')
            ->with([
                'mensaje'=>'No se pudo modificar la región: '.$regNombre,
                'css'=>'danger'
            ]);
    }
});

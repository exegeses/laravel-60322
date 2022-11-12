<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtenemos listado de marcas
        //$marcas = DB::table('marcas)->get();
        $marcas = Marca::paginate(3);
        return view('marcas', [ 'marcas'=>$marcas ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('marcaCreate');
    }

    private function validarForm( Request $request )
    {
        $request->validate
        (
            //[ 'campo'=>'reglas' ], [ 'campo.regla'=>'mensaje' ]
            [ 'mkNombre'=>'required|min:2|max:45|unique:marcas,mkNombre' ],
            [
              'mkNombre.required'=>'El campo "Nombre de la marca" es obligatorio.',
              'mkNombre.min' => 'El campo "Nombre de la marca" debe tener al menos 2 caractéres.',
              'mkNombre.max' => 'El campo "Nombre de la marca" debe tener como máximo 45 caractéres.',
              'mkNombre.unique' => 'El campo "Nombre de la marca" ya existe en la base de datos.'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        //validación
        $this->validarForm($request);
        //capturamos dato enviado por el form
        $mkNombre = $request->mkNombre;

        //almacenamos en tabla marcas
        try {
            //instanciamos
            $Marca = new Marca;
            //asignamos atributos
            $Marca->mkNombre = $mkNombre;
            //almacenamos datos en tabla marcas
            $Marca->save();
            return redirect('/marcas')
                    ->with(
                    [
                        'mensaje'=>'Marca: '.$mkNombre.' agregada correctamente.',
                        'css'=>'success'
                    ]);
        }
        catch ( \Throwable $th ){
            return redirect('/marcas')
                    ->with(
                        [
                            'mensaje'=>'No se pudo agregar la marca: '.$mkNombre,
                            'css'=>'danger'
                        ]
                    );
        }

        return 'Pasó validación, enviaste: '.$mkNombre;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

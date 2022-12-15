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
        $marcas = Marca::paginate(8);
        return view('marcas', [ 'marcas'=>$marcas ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcaCreate');
    }

    private function validarForm( Request $request )
    {
        $request->validate(

            //[ 'campo'=>'reglas' ],
            [ 'mkNombre'=>'required|min:2|max:45|unique:marcas,mkNombre' ],

            //[ 'campo.regla'=>'mensaje' ]
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
    public function store(Request $request)
    {
        //capturar dato
        $mkNombre = $request->mkNombre;
        //validación
        $this->validarForm( $request );
        //magia para guardar
        try {
            //instanciamos
            $Marca = new marca;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        //
    }
}

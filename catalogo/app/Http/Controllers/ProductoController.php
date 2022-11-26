<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtenemos listado de productos

        $productos = Producto::with(['getMarca', 'getCategoria'])
                                ->paginate(10);
        return view('/productos', [ 'productos'=>$productos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //obtenemos listado de marcas y de categorías
        $marcas = Marca::orderBy('mkNombre')->get();
        $categorias = Categoria::orderBy('catNombre')->get();
        return view('productoCreate',
                        [
                            'categorias'=>$categorias,
                            'marcas'=>$marcas
                        ]
        );
    }

    private function validarForm( Request $request, $idProducto = null )
    {
        $request->validate(
            //reglas
            [
                'prdNombre'=>'required|min:2|max:50|unique:App\Models\Producto,prdNombre,'.$idProducto.'idProducto',
                'prdPrecio'=>'required|numeric|min:0',
                'idMarca'=>'required',
                'idCategoria'=>'required',
                'prdDescripcion'=>'required|min:10|max:150',
                'prdImagen'=>'image|max:2048'
            ],
            //mensajes
            [
                'prdNombre.required' => 'El campo "Nombre del producto" es obligatorio.',
                'prdNombre.min'=>'El campo "Nombre del producto" debe tener como mínimo 2 caractéres.',
                'prdNombre.max'=>'El campo "Nombre" debe tener 50 caractéres como máximo.',
                'prdNombre.unique'=>'Ya existe un producto con es nombre.',
                'prdPrecio.required'=>'Complete el campo Precio.',
                'prdPrecio.numeric'=>'Complete el campo Precio con un número.',
                'prdPrecio.min'=>'Complete el campo Precio con un número mayor a 0.',
                'idMarca.required'=>'Seleccione una marca.',
                'idCategoria.required'=>'Seleccione una categoría.',
                'prdDescripcion.required'=>'Complete el campo "Descripción".',
                'prdDescripcion.min'=>'Complete el campo Descripción con al menos 10 caractéres',
                'prdDescripcion.max'=>'Complete el campo Descripción con 150 caractéres como máxino.',
                'prdImagen.image'=>'Debe ser una imagen.',
                'prdImagen.max'=>'Debe ser una imagen de 2MB como máximo.'
            ]
        );
    }

    private function subirImagen( Request $request ) : string
    {
        //si no enviaron archivo store()
        $prdImagen = 'noDisponible.png';

        //si no enviarton archivo update()
        //ver si hay imgActual
        if( $request->has('imgActual') ){
            $prdImagen = $request->imgActual;
        }

        //si enviaron archivo
        //if( $_FILES['prdImagen']['error']==0 ){
        if( $request->file('prdImagen') ){
            $archivo = $request->file('prdImagen');
            /* renombramos archivo
                formato:  time() + extension*/
            $tiempo = time();
            $ext = $archivo->getClientOriginalExtension();
            $prdImagen = $tiempo.'.'.$ext;
            //movemos archivo a directorio
            //  /public/imagenes/productos/
            $archivo->move( public_path('imagenes/productos/'), $prdImagen );
        }
        return $prdImagen;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prdNombre = $request->prdNombre;
        //validación
        $this->validarForm($request);
        //subirImagen()
        $prdImagen = $this->subirImagen($request);
        /*magia para almacenar en tabla productos*/
        try {
            //instanciamos
            $Producto = new Producto;
            //asignamos atributos
            $Producto->prdNombre = $prdNombre;
            $Producto->prdPrecio = $request->prdPrecio;
            $Producto->idMarca = $request->idMarca;
            $Producto->idCategoria = $request->idCategoria;
            $Producto->prdDescripcion = $request->prdDescripcion;
            $Producto->prdImagen = $prdImagen;
            $Producto->prdActivo = 1; // hardcoding
            $Producto->save();
            return redirect('/productos')
                ->with([
                    'mensaje'=>'Producto: '.$prdNombre.' agregado correctamente',
                    'css'=>'success'
                ]);
        }
        catch ( \Throwable $th ){
            return redirect('/productos')
                ->with([
                    'mensaje'=>'No se pudo agregar el producto: '.$prdNombre,
                    'css'=>'danger'
                ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        //obtenemos datos de producto por su ID
        $Producto = Producto::find($id);
        //obtenemos listados de marcas y categorías
        $marcas = Marca::orderBy('mkNombre')->get();
        $categorias = Categoria::orderBy('catNombre')->get();
        return view('productoEdit',
                    [
                        'marcas'=>$marcas,
                        'categorias'=>$categorias,
                        'Producto'=>$Producto
                    ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $prdNombre = $request->prdNombre;
        //validación
        $this->validarForm($request, $request->idProducto);
        //subir imagen *
        $prdImagen = $this->subirImagen($request);
        //magia para modificar
        try {
            //obtenemos Producto por su id
            $Producto = Producto::find( $request->idProducto );
            //asignamos atributos
            $Producto->prdNombre = $prdNombre;
            $Producto->prdPrecio = $request->prdPrecio;
            $Producto->idMarca = $request->idMarca;
            $Producto->idCategoria = $request->idCategoria;
            $Producto->prdDescripcion = $request->prdDescripcion;
            $Producto->prdImagen = $prdImagen;
            $Producto->save();
            return redirect('/productos')
                ->with([
                    'mensaje'=>'Producto: '.$prdNombre.' modificado correctamente',
                    'css'=>'success'
                ]);
        }
        catch ( \Throwable $th ){
            return redirect('/productos')
                ->with([
                    'mensaje'=>'No se pudo modificar el producto: '.$prdNombre,
                    'css'=>'danger'
                ]);
        }

    }

    public function preDelete( $id )
    {
        //obtenemos los datos de producto
        $Producto = Producto::find( $id );
        return view('productoDelete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}

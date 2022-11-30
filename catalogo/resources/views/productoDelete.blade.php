@extends('layouts.plantilla')
@section('contenido')

        <h1>Baja de un producto</h1>

        <article class="card border-danger py-3 col-6 mx-auto">
            <div class="row">
                <div class="col">
                    <img src="/imagenes/productos/{{ $Producto->prdImagen }}" class="img-thumbnail">
                </div>
                <div class="col text-danger">
                    <h2>{{ $Producto->prdNombre }}</h2>
                    {{ $Producto->getMarca->mkNombre }} |
                    {{ $Producto->getCategoria->catNombre }}
                    <br>
                    ${{ $Producto->prdPrecio }}
                    <br>
                    {{ $Producto->prdDescripcion }}

                    <form action="/producto/destroy" method="post">
                    @method('delete')
                    @csrf
                        <input type="hidden" name="idProducto"
                               value="{{ $Producto->idProducto }}">
                        <input type="hidden"  name="prdNombre"
                               value="{{ $Producto->prdNombre }}">
                        <button class="btn btn-danger btn-block my-3">
                            Confirmar baja
                        </button>
                        <a href="/productos" class="btn btn-outline-secondary btn-block">
                            Volver a panel
                        </a>

                    </form>

                </div>
            </div>
        </article>

        <script>
           Swal.fire(
                'Advertencia',
                'Si pulsa el botón "Confirmar baja", se eliminará el producto.',
                'warning'
            )
        </script>

@endSection

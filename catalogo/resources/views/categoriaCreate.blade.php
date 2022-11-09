@extends('layouts.plantilla')
@section('contenido')

    <h1>Alta de una categoria</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form action="/categoria/store" method="post">

            <div class="form-group">
                <label for="catNombre">Nombre de la categoría</label>
                <input type="text" name="catNombre"
                       class="form-control" id="catNombre">
            </div>

            <button class="btn btn-dark my-3 px-4">Agregar categoría</button>
            <a href="/categorias" class="btn btn-outline-secondary">
                Volver a panel de categorías
            </a>
        </form>
    </div>

@endsection

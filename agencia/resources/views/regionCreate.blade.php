@extends('layouts.plantilla')
@section('contenido')

    <h1>Alta de una región</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form action="/region/store" method="post">
        @csrf
            <div class="form-group">
                <label for="regNombre">Nombre de la región</label>
                <input type="text" name="regNombre"
                       class="form-control" id="regNombre" required>
            </div>

            <button class="btn btn-dark my-3 px-4">Agregar región</button>
            <a href="/regiones" class="btn btn-outline-secondary">
                Volver a panel de regiones
            </a>
        </form>
    </div>

@endsection

@extends('layouts.plantilla')
@section('contenido')

    <h1>Modificación de una marca</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form action="/marca/update" method="post">
        @method('patch')
        @csrf
            <div class="form-group">
                <label for="mkNombre">Nombre de la marca</label>
                <input type="text" name="mkNombre"
                       value="{{ old('mkNombre', $Marca->mkNombre ) }}"
                       class="form-control" id="mkNombre">
                <input type="hidden" name="idMarca"
                       value="{{ $Marca->idMarca }}">
            </div>

            <button class="btn btn-dark my-3 px-4">Modificar marca</button>
            <a href="/marcas" class="btn btn-outline-secondary">
                Volver a panel de marcas
            </a>
        </form>
    </div>

    @if( $errors->any() )
        <div class="alert alert-danger col-8 mx-auto">
            <ul>
                @foreach( $errors->all() as $error )
                    <li><i class="bi bi-info-circle"></i>
                        {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


@endsection

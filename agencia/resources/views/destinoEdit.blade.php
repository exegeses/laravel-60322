@extends('layouts.plantilla')
@section('contenido')

    <h1>Modificación de un destino</h1>

    <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

        <form action="/destino/update" method="post">
        @csrf
        @method('patch')
            <div class="form-group mb-2">
                <label for="destNombre">Nombre del Destino:</label>
                <input type="text" name="destNombre"
                       value="{{ $destino->destNombre }}"
                       id="destNombre" class="form-control"
                       required>
            </div>

            <div class="form-group mb-2">
                <label for="idRegion">Región</label>
                <select name="idRegion" id="idRegion"
                        class="form-control" required>
                    <option value="">Seleccione una región</option>
                @foreach( $regiones as $region )
                    <option @selected ( $destino->idRegion == $region->idRegion ) value="{{ $region->idRegion }}">{{ $region->regNombre }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group  mb-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="destPrecio"
                           value="{{ $destino->destPrecio }}"
                           class="form-control" placeholder="Ingrese el precio" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">#</div>
                    </div>
                    <input type="number" name="destAsientos"
                           value="{{ $destino->destAsientos }}"
                           class="form-control" placeholder="Ingrese cantidad de Asientos Totales" required>
                </div>
            </div>

            <div class="form-group mb-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">#</div>
                    </div>
                    <input type="number" name="destDisponibles"
                           value="{{ $destino->destDisponibles }}"
                           class="form-control" placeholder="Ingrese cantidad de Asientos Disponibles" required>
                </div>
            </div>
            <input type="hidden" name="idDestino"
                   value="{{ $destino->idDestino }}">

            <button class="btn btn-dark">Modificar destino</button>
            <a href="/destinos" class="btn btn-outline-secondary">
                Volver a panel de destinos
            </a>

        </form>

    </div>


@endsection

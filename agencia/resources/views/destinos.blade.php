@extends('layouts.plantilla')
@section('contenido')

    <h1>Panel de administración de destinos</h1>

    @if( session('mensaje') )
        <div class="alert alert-{{ session('css') }}">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="row my-3 d-flex justify-content-between">
        <div class="col">
            <a href="/admin" class="btn btn-outline-secondary">
                Dashboard
            </a>
        </div>
        <div class="col text-end">
            <a href="/destino/create" class="btn btn-outline-secondary">
                <i class="bi bi-plus-square"></i>
                Agregar
            </a>
        </div>
    </div>


    <ul class="list-group">
    @foreach( $destinos as $destino )
        <li class="col-md-6 list-group-item list-group-item-action d-flex justify-content-between">
            <div class="col-3">
                <span class="fs-5">{{ $destino->destNombre }}</span>
            </div>
            <div class="col-2">
                {{ $destino->regNombre }}
            </div>
            <div class="col-2">
                <span class="precio3">${{ $destino->destPrecio }}</span>
            </div>
            <div class="col text-end btn-group">
                <a href="/destino/edit/{{ $destino->idDestino }}" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-pencil-square"></i>
                    Modificar
                </a>
                <a href="/destino/delete/{{ $destino->idDestino }}" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-trash"></i>
                    &nbsp;Eliminar&nbsp;
                </a>
            </div>
        </li>
    @endforeach
    </ul>

@endsection

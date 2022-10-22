@extends('layouts.plantilla')

    @section('contenido')

        @if( $nombre != 'Marcos' )
            Usuario desconocido
        @else
            Bienvenido: {{ $nombre }}
        @endif

        <hr>

        <ul>
        @foreach( $marcas as $marca )
            <li>{{ $marca }}</li>
        @endforeach
        </ul>


    @endsection

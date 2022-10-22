@extends('layouts.plantilla')

    @section('contenido')

        <div class="alert shadow col-8 mx-auto">
            <form action="/procesa" method="post">
            @csrf
                <input type="text" name="nombre" class="form-control">
                <button class="btn btn-dark">enviar</button>
            </form>
        </div>

    @endsection

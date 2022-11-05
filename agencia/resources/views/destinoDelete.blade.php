@extends( 'layouts.plantilla' )

@section('contenido')

    <h1>Confirmación de baja de un destino</h1>
    <div class="bg-light border-secondary col-6 mx-auto
                    shadow rounded p-4 text-danger">
        Se eliminará el destino: <br>
        <span class="lead">{{ $destino->destNombre }}</span>
        <br>
        {{ $destino->regNombre }}.
        <form action="/destino/destroy" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="destNombre"
                   value="{{ $destino->destNombre }}">
            <input type="hidden" name="idDestino"
                   value="{{ $destino->idDestino }}">
            <button class="btn btn-danger btn-block my-3">
                Confirmar baja
            </button>
            <a href="/destinos" class="btn btn-outline-secondary btn-block">
                Volver a panel
            </a>
        </form>
    </div>


    <script>
        Swal.fire(
            '¡Advertencia!',
            'Si pulsa el botón "Confirmar baja", se eliminará el destino.',
            'warning'
        );
    </script>


@endsection

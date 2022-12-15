<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marcas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                {{-- contenido --}}

                    <h1 class="mb-4">Administración de marcas</h1>

                    @if ( session('mensaje') )
                        <div class="max-w-2xl mx-auto m-12 p-3 mb-4
                            border border-green-300 bg-green-100 text-green-600 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-4 gap-2 w-1/2 mx-auto">
                        <div class="border-b border-gray-100 p-3 flex items-center justify-center">
                            id
                        </div>
                        <div class="border-b border-gray-100 p-3 flex items-center justify-center">
                            Marca
                        </div>
                        <div class="border-b border-gray-100 col-span-2 p-3 flex items-center justify-center">
                        <span class="w-1/4 mx-2">
                            <a href="/marca/create" class="text-yellow-600 hover:text-yellow-500
                                        bg-gray-50 hover:bg-white px-5 py-1
                                        border border-gray-300 rounded
                                        ">Agregar</a>
                        </span>
                        </div>

            @foreach( $marcas as $marca )
                            <div class="border-b border-gray-100 p-3 flex items-center justify-center">
                                {{ $marca->idMarca }}
                            </div>
                            <div class="border-b border-gray-100 p-3 flex items-center justify-start">
                                {{ $marca->mkNombre }}
                            </div>
                            <div class="border-b border-gray-100 p-3 flex items-center justify-center">
                                                <span class="w-1/4 mx-2">
                            <a href="/marca/edit/{{ $marca->idMarca }}" class="text-yellow-600 hover:text-yellow-500
                                        bg-gray-50 hover:bg-white px-5 py-1
                                        border border-gray-300 rounded
                                        ">Modificar</a>
                        </span>
                            </div>
                            <div class="border-b border-gray-100 p-3 flex items-center justify-center">
                                                <span class="w-1/4 mx-2">
                            <a href="#" class="text-yellow-600 hover:text-yellow-500
                                        bg-gray-50 hover:bg-white px-5 py-1
                                        border border-gray-300 rounded
                                        ">Eliminar</a>
                        </span>
                            </div>

                @endforeach

                    </div>

                    <div class="mt-4">{{ $marcas->links() }}</div>


                    {{-- contenido --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

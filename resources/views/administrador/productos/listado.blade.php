@extends('/administrador/layout/base')

@section('contenido')
    <style>
        .td-listado {
            width: 190px;
            max-height: 140px;
            overflow-y: auto;
            display: block;
        }
    </style>

    <button type="button" onclick="window.location.href='/productos/crear';"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Nuevo producto</button>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        existencia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        descuento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        imagen1
                    </th>
                    <th scope="col" class="px-6 py-3">
                        imagen2
                    </th>
                    <th scope="col" class="px-6 py-3">
                        imagen3
                    </th>
                    <th scope="col" class="px-6 py-3">
                        familia_id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        marca_id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        aditivo_id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        proveedor_id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        estado
                    </th>
                    @auth('administrador')
                        @if (!auth()->guard('administrador')->user()->isSoporte())
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $producto->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $producto->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->precio }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->existencia }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->descuento }}
                        </td>
                        <td class="px-6 py-4 td-listado">
                            {{ $producto->descripcion }}
                        </td>
                        <td class="px-2 py-1">
                            <img src="{{ $producto->imagen1 }}" alt="{{ $producto->imagen1 }}" style="width: 100%; height: 100%;">
                        </td>
                        <td class="px-2 py-1">
                            <img src="{{ $producto->imagen2 }}" alt="{{ $producto->imagen2 }}" style="width: 100%; height: 100%;">
                        </td>
                        <td class="px-2 py-1">
                            <img src="{{ $producto->imagen3 }}" alt="{{ $producto->imagen3 }}" style="width: 100%; height: 100%;">
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->familia->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->marca->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->aditivo->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->proveedor->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $producto->estado }}
                        </td>
                        @auth('administrador')
                            @if (!auth()->guard('administrador')->user()->isSoporte())
                                <td class="px-6 py-4">
                                    <a href="/productos/{{ $producto->id }}/editar"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    @auth('administrador')
                                            @if (
                                                (auth()->guard('administrador')->user() && auth()->guard('administrador')->user()->isMaster()) ||
                                                auth()->guard('administrador')->user()->isAdmin()
                                            )
                                                    <a href="/productos/{{ $producto->id }}/mostrar"
                                                        class="font-medium text-red-600 dark:text-blue-500 hover:underline">Borrar</a>
                                            @endif
                                    @endauth
                                </td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
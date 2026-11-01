@extends('/administrador/layout/base')

@section('contenido')
    <button type="button" onclick="window.location.href='/clientes/crear';"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Nuevo cliente</button>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        apellido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        correo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contraseña
                    </th>
                    <th scope="col" class="px-6 py-3">
                        direccion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        imagen
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
                @foreach ($clientes as $cliente)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $cliente->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $cliente->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cliente->apellido }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cliente->correo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cliente->contrasenia }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cliente->direccion }}
                        </td>
                        <td class="px-2 py-1">
                            <img src="{{ $cliente->imagen }}" alt="{{ $cliente->imagen }}" style="width: 100px;">
                        </td>
                        <td class="px-6 py-4">
                            {{ $cliente->estado }}
                        </td>
                        @auth('administrador')
                            @if (
                                !auth()->guard('administrador')->user()->isSoporte()
                                /* (auth()->guard('administrador')->user() && auth()->guard('administrador')->user()->isMaster()) ||
                                 auth()->guard('administrador')->user()->isAdmin() || auth()->guard('administrador')->user()->isEditor() */
                            )
                                <td class="px-6 py-4">
                                    <a href="/clientes/{{ $cliente->id }}/editar"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    <br>
                                    @auth('administrador')
                                        @if (
                                            (auth()->guard('administrador')->user() && auth()->guard('administrador')->user()->isMaster()) ||
                                                auth()->guard('administrador')->user()->isAdmin())
                                            <a href="/clientes/{{ $cliente->id }}/mostrar"
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

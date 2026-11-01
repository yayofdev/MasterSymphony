@extends('/administrador/layout/base')

@section('contenido')
    <button type="button" onclick="window.location.href='/administradores/crear';"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Nuevo administrador</button>

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
                        Apellido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rol
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contraseña
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Imagen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($administradores as $administrador)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $administrador->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $administrador->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $administrador->apellido }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $administrador->usuario }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $administrador->rol }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $administrador->correo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $administrador->contrasenia }}
                        </td>
                        <td class="px-2 py-1">
                            <img src="{{ $administrador->imagen }}" alt="{{ $administrador->imagen }}" style="width: 100px;">
                        </td>
                        <td class="px-6 py-4">
                            {{ $administrador->estado }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="/administradores/{{ $administrador->id }}/editar"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <br>
                            @auth('administrador')
                                @if (auth()->guard('administrador')->user() && auth()->guard('administrador')->user()->isMaster())
                                    <a href="/administradores/{{ $administrador->id }}/mostrar"
                                        class="font-medium text-red-600 dark:text-blue-500 hover:underline">Borrar</a>
                                @endif
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

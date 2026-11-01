@extends('/administrador/layout/base')

@section('contenido')

    <form action="/administradores/{{ $administrador->id }}/borrar" method="POST" class="max-w-md mx-auto">
        @csrf
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Nombre</strong> </h3>
            <h4>
                {{ $administrador->nombre }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Apellido</strong> </h3>
            <h4>
                {{ $administrador->apellido }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Usuario</strong> </h3>
            <h4>
                {{ $administrador->usuario }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Rol</strong> </h3>
            <h4>
                {{ $administrador->rol }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Correo</strong> </h3>
            <h4>
                {{ $administrador->correo }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Contraseña</strong> </h3>
            <h4>
                {{ $administrador->contrasenia }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Imagen</strong> </h3>
            <img src="{{ $administrador->imagen }}" alt="{{ $administrador->imagen }}" width="150">
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Borrar</button>
    </form>
@endsection

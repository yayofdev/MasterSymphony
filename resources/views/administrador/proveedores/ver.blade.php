@extends('/administrador/layout/base')

@section('contenido')

    <form action="/proveedores/{{ $proveedor->id }}/borrar" method="POST" class="max-w-md mx-auto">
        @csrf
        <div class="z-0 w-full mb-5 group">
            <h3> <strong> Nombre </strong> </h3>
            <h4>
                {{ $proveedor->nombre }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Teléfono</strong> </h3>
            <h4>
                {{ $proveedor->telefono }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Dirección</strong> </h3>
            <h4>
                {{ $proveedor->direccion }} </h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Imagen</strong> </h3>
            <img src="{{ $proveedor->imagen }}" alt="{{ $proveedor->imagen }}" width="150">
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Borrar</button>
    </form>
@endsection

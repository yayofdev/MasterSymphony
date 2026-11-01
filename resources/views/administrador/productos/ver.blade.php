@extends('/administrador/layout/base')

@section('contenido')

    <form action="/productos/{{ $producto->id }}/borrar" method="POST" class="max-w-md mx-auto">
        @csrf
        <div class="z-0 w-full mb-5 group">
            <h3> <strong> Nombre</strong> </h3>
            <h4>
                {{ $producto->nombre }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Precio</strong> </h3>
            <h4>
                {{ $producto->precio }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Existencia</strong> </h3>
            <h4>
                {{ $producto->existencia }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Descuento</strong> </h3>
            <h4>
                {{ $producto->descuento }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Descripción</strong> </h3>
            <h4>
                {{ $producto->descripcion }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Imagen1</strong> </h3>
            <img src="{{ $producto->imagen1 }}" alt="{{ $producto->imagen1 }}" width="150">
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Imagen2</strong> </h3>
            <img src="{{ $producto->imagen2 }}" alt="{{ $producto->imagen2 }}" width="150">
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Imagen3</strong> </h3>
            <img src="{{ $producto->imagen3 }}" alt="{{ $producto->imagen3 }}" width="150">
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Familia id</strong> </h3>
            <h4>
                {{ $producto->familia_id }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Marca id</strong> </h3>
            <h4>
                {{ $producto->marca_id }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Aditivo id</strong> </h3>
            <h4>
                {{ $producto->aditivo_id }}</h4>
        </div>
        <div class="z-0 w-full mb-5 group">
            <h3> <strong>Proveedor id</strong> </h3>
            <h4>
                {{ $producto->proveedor_id }}</h4>
        </div>
        {{-- <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">Alright!</span> Username
            available!</p>
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> Username already
            taken!</p> --}}
        {{-- <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">Alright!</span> Username
            available!</p>
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> Username already
            taken!</p> --}}
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Borrar</button>
    </form>
@endsection

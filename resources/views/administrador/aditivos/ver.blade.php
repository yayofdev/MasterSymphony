@extends('/administrador/layout/base')

@section('contenido')

    <form action="/aditivos/{{ $aditivo->id }}/borrar" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <label for="floating_email"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                {{ $aditivo->nombre }}</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <img src="{{ $aditivo->imagen }}" alt="{{ $aditivo->imagen }}" width="150">
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Borrar</button>
    </form>
@endsection

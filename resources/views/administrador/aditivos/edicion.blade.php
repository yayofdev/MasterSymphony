@extends('/administrador/layout/base')

@section('contenido')

    <form action="/aditivos/{{ $aditivo->id }}/actualizar" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nombre" pattern="^[a-zA-ZÀ-ÿ\s]+$" value="{{ $aditivo->nombre }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_email"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Nombre</label>
                <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">¡Oops!</span> Por favor, introduce una ruta de imagen válida.
                </p>
        </div>
        <img src="" alt="" width="150">
        <div class="relative z-0 w-full mb-5 group">
            <img src="{{ $aditivo->imagen }}" alt="{{ $aditivo->imagen }}" width="150">
            <input type="file" name="imagen" accept="image/*" value="{{ $aditivo->imagen }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                 />
            <label for="floating_password"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Imagen</label>
                <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="font-medium">¡Oops!</span> Por favor, introduce una ruta de imagen válida.
                </p>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Guardar</button>
    </form>

    <script>
        // Se recorre cada input que tenga un atributo pattern para validar y mostrar su mensaje de error
        document.getElementById('aditivoForm').addEventListener('submit', function(event) {
            const inputs = this.querySelectorAll('input[pattern]');
            let valid = true;
            
            inputs.forEach(function(input) {
                const regex = new RegExp(input.getAttribute('pattern'));
                const errorMessage = input.parentElement.querySelector('.error-message');
                if (!regex.test(input.value)) {
                    valid = false;
                    input.classList.add('border-red-500');
                    if (errorMessage) {
                        errorMessage.classList.remove('hidden');
                    }
                } else {
                    input.classList.remove('border-red-500');
                    if (errorMessage) {
                        errorMessage.classList.add('hidden');
                    }
                }
            });
            
            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
@endsection
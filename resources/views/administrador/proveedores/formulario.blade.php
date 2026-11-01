@extends('/administrador/layout/base')

@section('contenido')
    <form action="/proveedores/guardar" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto" id="proveedorForm">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nombre"
                pattern="^[a-zA-ZÀ-ÿ\s]+$"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_nombre"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Nombre</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce valores correctos.
            </p>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="telefono" pattern="^[+]?[0-9()\- ]+$"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_telefono"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Teléfono</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce valores correctos.
            </p>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="direccion"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_direccion"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Dirección</label>
        </div>
        <img src="" alt="{{-- {{ $aditivo->imagen }} --}}" width="150">
        <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="imagen" accept="image/*"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_imagen"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Imagen</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce valores correctos.
            </p>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Guardar</button>
    </form>

    <script>
        // Al enviar el formulario se recorre cada input para validar según su atributo pattern
        document.getElementById('proveedorForm').addEventListener('submit', function(event) {
            let inputs = this.querySelectorAll('input');
            let valid = true;
            inputs.forEach(function(input) {
                // Se valida solo si el input tiene atributo pattern y su nombre no es "direccion"
                if (input.hasAttribute('pattern') && input.getAttribute('name') !== 'direccion') {
                    let regex = new RegExp(input.getAttribute('pattern'));
                    // Se busca el párrafo de error en el contenedor del input
                    let errorMessage = input.parentElement.querySelector('.error-message');
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
                }
            });
            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
@endsection

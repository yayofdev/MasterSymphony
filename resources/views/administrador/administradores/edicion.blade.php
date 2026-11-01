@extends('/administrador/layout/base')

@section('contenido')
    <form action="/administradores/{{ $administrador->id }}/actualizar" method="POST" enctype="multipart/form-data"
        class="max-w-md mx-auto" id="adminForm">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nombre" pattern="^[a-zA-ZÀ-ÿ\s]+$" value="{{ $administrador->nombre }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="nombre"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                Nombre</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce un nombre válido.
            </p>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="apellido" pattern="^[a-zA-ZÀ-ÿ\s]+$" value="{{ $administrador->apellido }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="apellido"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                Apellido</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce un apellido válido.
            </p>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="usuario" pattern="^[a-zA-Z0-9_]+$" value="{{ $administrador->usuario }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="usuario"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                Usuario</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce un usuario válido.
            </p>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            {{-- <label for="rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un
                rol </label> --}}
            <select id="rol" name="rol" value="{{ $administrador->rol }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="superadmin" @selected($administrador->rol == 'superadmin')>superadmin</option>
                <option value="admin" @selected($administrador->rol == 'admin')>admin</option>
                <option value="editor" @selected($administrador->rol == 'editor')>editor</option>
                <option value="soporte" @selected($administrador->rol == 'soporte')>soporte</option>

            </select>
            <p id="rolError" class="text-red-500 text-sm hidden">Por favor selecciona un rol válido.</p>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="correo" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                value="{{ $administrador->correo }}" title="Por favor ingrese un correo electrónico válido."
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="correo"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                Correo</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce un correo válido.
            </p>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="contrasenia" minlength="6" maxlength="90" pattern=".{6,}"
                value="{{ $administrador->contrasenia }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="contrasenia"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
                Contraseña</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> La contraseña debe tener al menos 6 caracteres.
            </p>
        </div>
        <img src="" alt="" width="150">
        <div class="relative z-0 w-full mb-5 group">
            <img src="{{ $administrador->imagen }}" alt="{{ $administrador->imagen }}" width="150">
            <input type="file" name="imagen" accept="image/*" value="{{ $administrador->imagen }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                 />
            <label for="imagen"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">
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
        // Recorre cada input con atributo pattern para validar y mostrar su mensaje de error
        document.getElementById('adminForm').addEventListener('submit', function(event) {
            const inputs = this.querySelectorAll('input[pattern]');
            let valid = true;

            let rolSelect = document.getElementById('rol');
            let rolError = document.getElementById('rolError');

            if (rolSelect.value === "") {
                event.preventDefault();
                rolSelect.classList.add('border-red-500');
                rolError.classList.remove('hidden');
            } else {
                rolSelect.classList.remove('border-red-500');
                rolError.classList.add('hidden');
            }

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

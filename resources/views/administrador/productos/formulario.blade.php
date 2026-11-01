@extends('/administrador/layout/base')

@section('contenido')

    <form action="/productos/guardar" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto" id="productoForm" >
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nombre" pattern="^[a-zA-ZÀ-ÿ\s]+$"
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
            <input type="number" name="precio" pattern="^\d+(\.\d+)?$" step="any"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_precio"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Precio</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce valores correctos.
            </p>
        </div>
        {{-- @auth('administrador')
            @if(auth('administrador'->user()-isMaster())) --}}    
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" name="existencia" pattern="^\d+$"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required />
                    <label for="floating_existencia"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Existencia</label>
                    <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">¡Oops!</span> Por favor, introduce valores correctos.
                    </p>
                </div>
            {{-- @endif
        @endauth --}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="descuento" pattern="^\d+(\.\d+)?$" step="any"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_descuento"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Descuento</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce valores correctos.
            </p>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="descripcion" pattern="^.{5,}$"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_descripcion"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Descripción</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce valores correctos.
            </p>
        </div>
        
        <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="imagen1" accept="image/*"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_imagen1"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Imagen 1</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce valores correctos.
            </p>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="imagen2" accept="image/*"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_imagen2"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Imagen 2</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce valores correctos.
            </p>
        </div>
        
        <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="imagen3" accept="image/*"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                required />
            <label for="floating_imagen3"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Imagen 3</label>
            <p class="error-message hidden mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">¡Oops!</span> Por favor, introduce valores correctos.
            </p>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="familia_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una
                Familia</label>
            <select id="familia_id" name="familia_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($familias as $familia)
                    <option value="{{ $familia->id }}">{{ $familia->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="marca_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una
                Marca</label>
            <select id="marca_id" name="marca_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="aditivo_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un
                Aditivo </label>
            <select id="aditivo_id" name="aditivo_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($aditivos as $aditivo)
                    <option value="{{ $aditivo->id }}">{{ $aditivo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="proveedor_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un
                Proveedor </label>
            <select id="proveedor_id" name="proveedor_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Guardar</button>
    </form>

    <script>
        // Se recorre cada input que tenga un patrón definido y un mensaje de error debajo para validar
        document.getElementById('productoForm').addEventListener('submit', function(event) {
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
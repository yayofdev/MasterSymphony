<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900 pb-5">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                    alt="logo">
                Master Simphony
            </a>
            <div
                class="w-full max-w-xs bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Iniciar sesión
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/cliente_in" method="POST">
                        @csrf
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                            <input type="text" name="correo" id="correo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                            <input type="password" name="contrasenia" id="contrasenia" {{-- placeholder="••••••••" --}}
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 active:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Entrar
                        </button>
                    </form>

                    <a href="/auth/google/redirect"
                        style="justify-content: space-around;"
                        class="w-full flex items-center text-gray-600 bg-white border-1 border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <img src="{{ asset('partials/imagenes/google.png') }}" alt="logo-google" style="width: 20px">
                        <strong>Entrar con Google</strong>
                    </a>
                    
                    <a href="/auth/github/redirect"
                        style="justify-content: space-around;"
                        class="w-full flex items-center text-gray-600 bg-white border-1 border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <img src="{{ asset('partials/imagenes/github.png') }}" alt="logo-github" style="width: 20px">
                        <strong>Entrar con Github</strong>
                    </a>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400 mt-4">
                        ¿No tienes una cuenta? 
                        <a href="/cliente_reg"
                        class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                        Crear cuenta</a>
                    </p>


                    @error('credenciales')
                        <span>{{ $message }}</span>
                    @enderror
                    @error('correo')
                        <span>{{ $message }}</span>
                    @enderror
                    
                    @error('contrasenia')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
</body>

</html>
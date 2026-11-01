@extends('cliente.layout.base')
@section('contenido')
<section class="bg-gray-100 py-2">
        <div class="container mx-auto max-w-xl text-justify py-4">
            <h1 class="text-center font-semibold text-gray-900 text-2xl dark:text-white py-4">¡Comunícate a Master Symphøny!</h1>
            <p class="mb-6 text-black-500 dark:text-gray-400">
                En Master Symphøny, estamos siempre dispuestos a ayudarte. Si tienes preguntas sobre nuestros productos,
                necesitas asesoramiento o simplemente deseas saber más, no dudes en ponerte en contacto con nosotros. Nuestro
                equipo está aquí para ofrecerte la mejor atención y ayudarte a encontrar lo que necesitas.
                <br><br>
                Puedes encontrarnos en Calle López Cotilla 1234, Colonia Americana, 44160 Guadalajara, Jalisco, México.
            </p>
        </div>


        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Redes Sociales</h2>
        <div class="flex justify-center items-center space-x-6 mb-10">
            <button class="focus:outline-none transition-transform hover:scale-110">
                <img src="{{ asset('partials/imagenes/whatsapp.png') }}" alt="WhatsApp" class="w-12 h-12">
            </button>
            <button class="focus:outline-none transition-transform hover:scale-110">
                <img src="{{ asset('partials/imagenes/telefono.png') }}" alt="Teléfono" class="w-12 h-12">
            </button>
            <button class="focus:outline-none transition-transform hover:scale-110">
                <img src="{{ asset('partials/imagenes/email.svg') }}" alt="Email" class="w-12 h-12">
            </button>
            <button class="focus:outline-none transition-transform hover:scale-110">
                <img src="{{ asset('partials/imagenes/facebook.svg') }}" alt="Facebook" class="w-12 h-12">
            </button>
            <button class="focus:outline-none transition-transform hover:scale-110">
                <img src="{{ asset('partials/imagenes/instagram.svg') }}" alt="Instagram" class="w-12 h-12">
            </button>
        </div>



        <form class="max-w-md mx-auto">
            <h1 class="text-center font-semibold text-gray-900 text-2xl dark:text-white py-4">¡Envíanos un mensaje!</h1>
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="floating_email" id="floating_email"
                    class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Correo </label>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="floating_first_name" id="floating_first_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_first_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Nombre</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="floating_last_name" id="floating_last_name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_last_name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Apellido</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_phone"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Número de teléfono</label>
            </div>

            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Escribe un mensaje</label>
            <textarea id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escribe aquí"></textarea>
            <br>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar
            </button>
        </form>
</section>
@endsection
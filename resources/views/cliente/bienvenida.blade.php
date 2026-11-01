@extends('cliente.layout.base')
@section('contenido')

    <style>
            #btn-ver-ofertas{
                border: 2px solid transparent; 
                transition: border-color: 0.3s ease;
            } 
            #btn-ver-ofertas:hover{
                border-color: #8128e7;
            }
    </style>
    {{-- BANNER --}}
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" />
                </svg>
                <span class="sr-only">Éxito</span>
                <div>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        @endif
    
        @if ($message = Session::get('error'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 10-2 0 1 1 0 002 0zm-1-9a1 1 0 00-.993.883L9 6v4a1 1 0 001.993.117L11 10V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Error</span>
                <div>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        @endif
    </div>    
    
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-12 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2">
            <div class="mr-auto place-self-center lg:col-span-1 w-full px-8">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Master Symphøny</h1>
                <p class="mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Descubre nuestra colección exclusiva con ofertas únicas pensadas para ti.
                    Compra fácil, rápido y seguro desde donde estés. ¡Eleva tu experiencia de compra
                    y recibe tus productos sin complicaciones!</p>
                <a href="/ofertas" id="btn-ver-ofertas"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-blue-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                    style="">
                    Ver ofertas
                </a>
            </div>
            <div class="lg:mt-0 lg:col-span-2 lg:flex py-8">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        @foreach ($carruselProductos as $carruselProducto)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div class="h-56 w-full">
                                    <a href="/detalle_producto/{{ $carruselProducto->id }}">
                                        <img class="mx-auto h-full dark:hidden" src="{{$carruselProducto->imagen1}}"
                                            alt="imagen_productobateria_drum" />
                                    </a>
                                </div>
            
                                <div class="pt-6">
                                    <div class="mb-4 flex items-center justify-between gap-4">
                                        <span
                                            class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                            Descuento del {{$carruselProducto->descuento}}% </span>
                                    </div>
            
                                    <a href="/detalle_producto"
                                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{$carruselProducto->nombre}}</a>
            
                                    <div class="mt-4 flex items-center justify-between gap-4">
                                        <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">${{$carruselProducto->precio}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-700 hover:bg-gray-900 group-focus:ring-4 group-focus:ring-gray-500">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                        </span>

                    </button>

                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-700 hover:bg-gray-900 group-focus:ring-4 group-focus:ring-gray-500">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1l4 4-4 4" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- PRODUCTOS DESTACADOS --}}
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h1 style="font-size: 150%;"> <strong>Destacados</strong> </h1>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-4 xl:grid-cols-4">
            @foreach ($destacadosProductos as $destacadosProducto)
                <div id="productDiv" onclick="window.location.href = '/detalle_producto';" class="producto jackson instrumentosCuerdas familias rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="h-56 w-full">
                        <a href="/detalle_producto">
                            <img class="mx-auto h-full dark:hidden" src="{{$destacadosProducto->imagen1}}"
                                alt="imagen_producto" />
                        </a>
                    </div>

                    <div class="pt-6">
                        <a href="/detalle_producto"
                        style="min-height: 50px; display: inline-block;"    
                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                            {{$destacadosProducto->nombre}}</a>
                            <br>
                        <p class="text-xs leading-none overflow-hidden text-gray-900 dark:text-white" style="min-height: 60px;">
                            {{$destacadosProducto->descripcion}}
                        </p>

                        <div class="mt-4 flex items-center justify-between gap-4">
                            <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">${{$destacadosProducto->precio}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <a href="/catalogo">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp; Ver mas</h2>
            </a>
        </div>
    </div>

    {{-- PRODUCTOS EN OFERTA --}}
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h1 style="font-size: 150%;"> <strong>¡Productos en descuento!</strong> </h1>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-4 xl:grid-cols-4">
            @foreach ($descuentoProductos as $descuentoProducto)
                <div id="productDiv" onclick="window.location.href = '/detalle_producto';" class="producto jackson instrumentosCuerdas familias rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="h-56 w-full">
                        <a href="/detalle_producto">
                            <img class="mx-auto h-full dark:hidden" src="{{$descuentoProducto->imagen1}}"
                                alt="imagen_producto" />
                        </a>
                    </div>

                    <div class="pt-6">
                        <a href="/detalle_producto"
                        style="min-height: 50px; display: inline-block;"    
                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                            {{$descuentoProducto->nombre}}</a>
                            <br>
                        <p class="text-xs leading-none overflow-hidden text-gray-900 dark:text-white" style="min-height: 60px;">
                            {{$descuentoProducto->descripcion}}
                        </p>

                        <div class="mt-4 flex items-center justify-between gap-4">
                            <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">${{$descuentoProducto->precio}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <a href="/catalogo">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp; Ver mas</h2>
            </a>
        </div>
    </div>
@endsection
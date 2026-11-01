@extends('cliente.layout.base')
@section('contenido')
    <div
        class="grid grid-cols-2 gap-6 border-b border-t border-gray-200 py-4 dark:border-gray-700 md:py-8 lg:grid-cols-2 xl:gap-16">
        <div class="space-y-4 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800">
            <div class="space-y-2">
                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">${{$subtotal}}</dd>
                </dl>

                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Descuento</dt>
                    <dd class="text-base font-medium text-green-500">-${{$descuento}}</dd>
                </dl>

                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Recogida en tienda</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">$99</dd>
                </dl>

                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Impuesto</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">${{$iva}}</dd>
                </dl>
            </div>

            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                <dd class="text-base font-bold text-gray-900 dark:text-white">${{$total}}</dd>
            </dl>
        </div>


        {{-- ENVIO --}}
        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"> Tiempo estimado de entrega</h5>
            <a href="#">
                <p class="mb-2 font-bold text-gray-900 dark:text-white" style="text-size: 125%;"> Numero de orden: #FWB12546798</p>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Entrega <strong>GRATIS</strong> el domingo, 9 de marzo </p>
            <br>
            <a href="/confirmado/{{$descuento}}/{{$iva}}/{{$total}}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Confirmar pago
            </a>
            <a href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-400 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Imprimir
            </a>
        </div>
    </div>
@endsection
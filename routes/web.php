<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AditivoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AuthSocialiteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/* CLIENTEEEEEEEEEEEE */
Route::get('/', [ClienteController::class, 'login'])->name('login');
Route::post('/cliente_in', [ClienteController::class, 'in']);
Route::post('/cliente_out', [ClienteController::class, 'out']);
Route::post('/cliente_registrado', [ClienteController::class, 'registrado']);
Route::get('/cliente_reg', [ClienteController::class, 'reg']);
Route::post('/cambiar_contra', [ClienteController::class, 'cambiar_contra']);


/* 
Route::view('/', '/login'); */
Route::get('/index', [ClienteController::class, 'index']);
Route::view('/contactanos', '/cliente/contactanos');
Route::view('/galeria', '/cliente/galeria');
Route::view('/nosotros', '/cliente/quienes_somos');
Route::view('/cuenta', '/cliente/cuenta');
Route::view('/confirmacion', '/cliente/confirmacion');

Route::view('/pag', '/nivel2/pagina1');

Route::view('/tailwind', '/flowbite');

Route::view('/politicas', '/cliente/politicas');
Route::view('/faq', '/cliente/faq');
Route::view('/registro', '/cliente/registro');

/* PRODUCTO CONTROLER CLIENTE*/
Route::get('catalogo', [ProductoController::class, 'catalogo']);
Route::get('ofertas', [ProductoController::class, 'ofertas']);
Route::get('detalle_producto/{id}', [ProductoController::class, 'detalle_producto']);

Route::get('/auth/google/redirect', [AuthSocialiteController::class, 'redirect']);
Route::get('/auth/google/callback', [AuthSocialiteController::class, 'callback']);

Route::get('/auth/github/redirect', [AuthSocialiteController::class, 'redirectGithub']);
Route::get('/auth/github/callback', [AuthSocialiteController::class, 'callbackGithub']);


Route::middleware('auth:cliente')->group(function () {
    Route::get('paypal', [PayPalController::class, 'index'])->name('paypal');
    Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
    Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');
    Route::get('paypal/payment/{total}', [PayPalController::class, 'payment'])->name('paypal.payment');
    
    Route::get('carrito', [CarritoController::class, 'obtener_carrito']);
    Route::post('sumar_cantidad/{id}', [CarritoController::class, 'sumar_cantidad']);
    Route::post('restar_cantidad/{id}', [CarritoController::class, 'restar_cantidad']);
    Route::post('agregar_carrito/{id}', [CarritoController::class, 'agregar_carrito']);
    Route::post('eliminar_carrito/{id}', [CarritoController::class, 'eliminar_carrito']);
    
    Route::get('perfil', [ClienteController::class, 'perfil']);
    
    Route::get('pagar/{subt}/{desc}/{iva}/{total}', [PedidoController::class, 'pagar']);
    Route::get('confirmacion/{subt}/{desc}/{iva}/{total}', [PedidoController::class, 'confirmacion']);
    Route::get('confirmado/{desc}/{iva}/{total}', [PedidoController::class, 'confirmado']);
});



/* ADMINISTRADOOOOOOOOOOR */

Route::view('/panel', '/administrador/layout/base');

Route::get('/administrador/login', [AdministradorController::class, 'login'])->name('administrador/login');
Route::post('/administradores/in', [AdministradorController::class, 'in']);

Route::middleware('auth:administrador')->group(function () {

    Route::post('/administradores/out', [AdministradorController::class, 'out']);

    /* PRODUCTO CONTROLER */
    Route::get('/productos/registros', [ProductoController::class, 'registros']);
    Route::get('/productos/crear', [ProductoController::class, 'crear']);
    Route::post('/productos/guardar', [ProductoController::class, 'guardar']);
    Route::get('/productos/{id}/editar', [ProductoController::class, 'editar']);
    Route::post('/productos/{id}/actualizar', [ProductoController::class, 'actualizar']);
    Route::get('/productos/{id}/mostrar', [ProductoController::class, 'mostrar']);
    Route::post('/productos/{id}/borrar', [ProductoController::class, 'borrar']);

    /* ADMINISTRADOR CONTROLER */
    Route::get('/administradores/registros', [AdministradorController::class, 'registros']);
    Route::get('/administradores/crear', [AdministradorController::class, 'crear']);
    Route::post('/administradores/guardar', [AdministradorController::class, 'guardar']);
    Route::get('/administradores/{id}/editar', [AdministradorController::class, 'editar']);
    Route::post('/administradores/{id}/actualizar', [AdministradorController::class, 'actualizar']);
    Route::get('/administradores/{id}/mostrar', [AdministradorController::class, 'mostrar']);
    Route::post('/administradores/{id}/borrar', [AdministradorController::class, 'borrar']);

    /* CLIENTE CONTROLER */
    Route::get('/clientes/registros', [ClienteController::class, 'registros']);
    Route::get('/clientes/crear', [ClienteController::class, 'crear']);
    Route::post('/clientes/guardar', [ClienteController::class, 'guardar']);
    Route::get('/clientes/{id}/editar', [ClienteController::class, 'editar']);
    Route::post('/clientes/{id}/actualizar', [ClienteController::class, 'actualizar']);
    Route::get('/clientes/{id}/mostrar', [ClienteController::class, 'mostrar']);
    Route::post('/clientes/{id}/borrar', [ClienteController::class, 'borrar']);

    /* ADITIVO CONTROLER */
    Route::get('/aditivos/registros', [AditivoController::class, 'registros']);
    Route::get('/aditivos/crear', [AditivoController::class, 'crear']);
    Route::post('/aditivos/guardar', [AditivoController::class, 'guardar']);
    Route::get('/aditivos/{id}/editar', [AditivoController::class, 'editar']);
    Route::post('/aditivos/{id}/actualizar', [AditivoController::class, 'actualizar']);
    Route::get('/aditivos/{id}/mostrar', [AditivoController::class, 'mostrar']);
    Route::post('/aditivos/{id}/borrar', [AditivoController::class, 'borrar']);

    /* FAMILIA CONTROLER */
    Route::get('/familias/registros', [FamiliaController::class, 'registros']);
    Route::get('/familias/crear', [FamiliaController::class, 'crear']);
    Route::post('/familias/guardar', [FamiliaController::class, 'guardar']);
    Route::get('/familias/{id}/editar', [FamiliaController::class, 'editar']);
    Route::post('/familias/{id}/actualizar', [FamiliaController::class, 'actualizar']);
    Route::get('/familias/{id}/mostrar', [FamiliaController::class, 'mostrar']);
    Route::post('/familias/{id}/borrar', [FamiliaController::class, 'borrar']);

    /* MARCA CONTROLER */
    Route::get('/marcas/registros', [MarcaController::class, 'registros']);
    Route::get('/marcas/crear', [MarcaController::class, 'crear']);
    Route::post('/marcas/guardar', [MarcaController::class, 'guardar']);
    Route::get('/marcas/{id}/editar', [MarcaController::class, 'editar']);
    Route::post('/marcas/{id}/actualizar', [MarcaController::class, 'actualizar']);
    Route::get('/marcas/{id}/mostrar', [MarcaController::class, 'mostrar']);
    Route::post('/marcas/{id}/borrar', [MarcaController::class, 'borrar']);

    /* PROVEEDOR CONTROLER */
    Route::get('/proveedores/registros', [ProveedorController::class, 'registros']);
    Route::get('/proveedores/crear', [ProveedorController::class, 'crear']);
    Route::post('/proveedores/guardar', [ProveedorController::class, 'guardar']);
    Route::get('/proveedores/{id}/editar', [ProveedorController::class, 'editar']);
    Route::post('/proveedores/{id}/actualizar', [ProveedorController::class, 'actualizar']);
    Route::get('/proveedores/{id}/mostrar', [ProveedorController::class, 'mostrar']);
    Route::post('/proveedores/{id}/borrar', [ProveedorController::class, 'borrar']);
});

Route::get('/administradores/default', function () {
    $administrador = new Administrador();
    $administrador->nombre = "root";
    $administrador->apellido = "web";
    $administrador->usuario = "root";
    $administrador->rol = "master";
    $administrador->contrasenia = Hash::make("root");
    $administrador->correo = "yayon@gmail.com";
    $administrador->imagen = "admin_default.jpg";
    $administrador->estado = 1;
    $administrador->save();
    return "USUARIO DEFAULT CREADO";
});

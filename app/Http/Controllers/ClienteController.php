<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function guardar(Request $req)
    {
        //dd(vars: $req->all());

        $cliente = new Cliente();

        $cliente->nombre = $req->nombre;
        $cliente->apellido = $req->apellido;
        $cliente->correo = $req->correo;
        $cliente->contrasenia = $req->contrasenia;
        $cliente->direccion = $req->direccion;
        $cliente->imagen = "imagenes/clientes/cliente_default.jpg";
        $cliente->estado = 1;

        $cliente->save();

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "cliente_" . $cliente->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/cliente', $nombre, 'public');
            $cliente->imagen = asset('storage/' . $ruta);
            $cliente->save();
        }

        return redirect('/clientes/registros');
    }

    public function registros()
    {
        $clientes = Cliente::all(); //select * from productos
        //dd($clientes);
        return view('/administrador/clientes/listado')->with('clientes', $clientes);
    }

    public function registroPrecio($id)
    {
        return "";
    }

    public function crear()
    {
        return view('/administrador/clientes/formulario');
    }


    public function editar($id)
    {
        $cliente = Cliente::find($id); //select * from productos where id=:id
        return view('/administrador/clientes/edicion')->with('cliente', $cliente);
    }

    public function mostrar($id)
    {
        $cliente = Cliente::find($id); //select * from productos where id=:id
        return view('/administrador/clientes/ver')->with('cliente', $cliente);
    }

    public function borrar($id)
    {
        $cliente = Cliente::find($id);

        $cliente->estado = 0;

        $cliente->save();

        return redirect('/clientes/registros');
    }


    public function actualizar(Request $req, $id)
    {
        $cliente = Cliente::find($id);

        $cliente->nombre = $req->nombre;
        $cliente->apellido = $req->apellido;
        $cliente->correo = $req->correo;
        $cliente->contrasenia = $req->contrasenia;
        $cliente->direccion = $req->direccion;
        /* $cliente->imagen = $req->imagen; */

        $cliente->save();

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "cliente_" . $cliente->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/cliente', $nombre, 'public');
            $cliente->imagen = asset('storage/' . $ruta);
            $cliente->save();
        }

        return redirect('/clientes/registros');
    }
    
    public function perfil()
    {
        // Obtener el cliente de la sesión (suponiendo que el cliente está guardado en la sesión)
        $cliente = session('cliente'); // Aquí 'cliente' es la clave que se usa para guardar el cliente en la sesión
        
        // Enviar el cliente a la vista junto con los otros productos (si lo necesitas)
        return view('cliente/cuenta')->with('cliente', $cliente);
    }

    public function in(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'correo' => 'required|string',
            'contrasenia' => 'required|string',
        ]);

        // Buscar el cliente en la BD
        $cliente = Cliente::where('correo', $request->correo)->first();

        // Si no existe el correo, retornar error
        if (!$cliente || !Hash::check($request->contrasenia, $cliente->contrasenia)) {
            return back()->withErrors([
                'credenciales' => 'correo o contraseña incorrectos',
            ])->onlyInput('correo');
        }

        // Autenticar cliente
        Auth::guard('cliente')->login($cliente);
        $request->session()->regenerate();

        $carruselProductos = Producto::where('estado', 1)->take(3)->get();
        $destacadosProductos = Producto::where('estado', 1)->take(4)->get();
        $descuentoProductos = Producto::where('estado', 1)
                                    ->where('descuento', '!=', 0)
                                    ->take(4)
                                    ->get();



        // Redirigir al panel de control
        return view('/cliente/bienvenida')
        ->with('carruselProductos', $carruselProductos)
        ->with('destacadosProductos', $destacadosProductos)
        ->with('descuentoProductos', $descuentoProductos);

        /* if(!Hash::check($request->contrasenia, $cliente->contrasenia)){
            $request->session()->regenerate();
            //Auth::guard('cliente')->login($cliente);
            //dd(Auth::guard('cliente')->user()->nombre);

            return redirect('/panel');
        } */

        /* if (Auth::guard('cliente')->attempt(['correo' => $request->correo, 
                                                    'contrasenia' => $request->contrasenia, 
                                                    'estado' => 1])){
            $request->session()->regenerate();
            Auth::guard('cliente')->login($cliente);
 
            return redirect('/panel') ->intended('dashboard');
        } */

        /* return back()->withErrors([
            'credenciales' => 'Los datos enviados no fueron encontrados',
        ])->onlyInput('credenciales'); */
    }

    public function out(Request $request)
    {

        Auth::guard('cliente')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $carruselProductos = Producto::where('estado', 1)->take(3)->get();
        $destacadosProductos = Producto::where('estado', 1)->take(4)->get();
        $descuentoProductos = Producto::where('estado', 1)
                                    ->where('descuento', '!=', 0)
                                    ->take(4)
                                    ->get();


        // Redirigir al panel de control
        return view('/cliente/bienvenida')
        ->with('carruselProductos', $carruselProductos)
        ->with('destacadosProductos', $destacadosProductos)
        ->with('descuentoProductos', $descuentoProductos);
    }

    public function registrado(Request $req)
    {

        // Validación de los campos
        $req->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'direccion' => 'required|string',
            'correo' => 'required|string',
            'contrasenia' => 'required|string',
        ]);
        //dd(vars: $req->all());

        $cliente = new Cliente();

        $cliente->nombre = $req->nombre;
        $cliente->apellido = $req->apellido;
        $cliente->correo = $req->correo;
        $cliente->contrasenia = $req->contrasenia;
        $cliente->direccion = $req->direccion;
        $cliente->imagen = "imagenes/clientes/cliente_default.jpg";
        $cliente->estado = 1;

        $cliente->save();
        
        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "cliente_" . $cliente->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/cliente', $nombre, 'public');
            $cliente->imagen = asset('storage/' . $ruta);
            $cliente->save();
        }

        // Autenticar cliente
        Auth::guard('cliente')->login($cliente);
        $req->session()->regenerate();

        $carruselProductos = Producto::where('estado', 1)->take(3)->get();
        $destacadosProductos = Producto::where('estado', 1)->take(4)->get();
        $descuentoProductos = Producto::where('estado', 1)
                                    ->where('descuento', '!=', 0)
                                    ->take(4)
                                    ->get();


        // Redirigir al panel de control
        return view('/cliente/bienvenida')
        ->with('carruselProductos', $carruselProductos)
        ->with('destacadosProductos', $destacadosProductos)
        ->with('descuentoProductos', $descuentoProductos);
    }

    public function login()
    {
        return view('/cliente/login');
    }

    public function reg()
    {
        return view('/cliente/registro');
    }

    public function index()
    {
        $carruselProductos = Producto::where('estado', 1)->take(3)->get();
        $destacadosProductos = Producto::where('estado', 1)->take(4)->get();
        $descuentoProductos = Producto::where('estado', 1)
                                    ->where('descuento', '!=', 0)
                                    ->take(4)
                                    ->get();

        // Redirigir al panel de control
        return view('/cliente/bienvenida')
        ->with('carruselProductos', $carruselProductos)
        ->with('destacadosProductos', $destacadosProductos)
        ->with('descuentoProductos', $descuentoProductos);
    }

    public function cambiar_contra(Request $request)
    {
        // Buscar cliente por correo
        $clienteAuth = Auth::guard('cliente')->user();

        $cliente = Cliente::where('correo', $clienteAuth->correo)->first();
        
       /* dd($cliente); */

        // Verificar si la contraseña actual es correcta
        if (!Hash::check($request->floating_password, $cliente->contrasenia)) {
            return back()->withErrors([
                'floating_password' => 'La contraseña actual no es correcta.',
            ]);
        }
        
        // Guardar nueva contraseña encriptada
        $cliente->contrasenia = Hash::make($request->repeat_password);
        $cliente->save();

        return redirect('/index')
        ->with('success', '¡Cambio de contraseña completado!');
    }
}

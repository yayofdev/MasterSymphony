<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/* use App\Http\Controllers\Auth; */

class AdministradorController extends Controller
{
    public function guardar(Request $req)
    {
        //dd(vars: $req->all());

        $administrador = new Administrador();

        $administrador->nombre = $req->nombre;
        $administrador->apellido = $req->apellido;
        $administrador->usuario = $req->usuario;
        $administrador->rol = $req->rol;
        $administrador->correo = $req->correo;
        $administrador->contrasenia = $req->contrasenia;
        $administrador->imagen = "imagenes/administradores/administrador_default.jpg";
        $administrador->estado = 1;

        $administrador->save();

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "administrador_" . $administrador->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/administrador', $nombre, 'public');
            $administrador->imagen = asset('storage/' . $ruta);
            $administrador->save();
        }

        return redirect('/administradores/registros');
    }

    public function registros()
    {
        $administradores = Administrador::all(); //select * from productos
        //dd($administradores);
        return view('/administrador/administradores/listado')->with('administradores', $administradores);
    }

    public function registroId($id)
    {
        return "";
    }

    public function registroPrecio($id)
    {
        return "";
    }

    public function crear()
    {
        return view('/administrador/administradores/formulario');
    }


    public function editar($id)
    {
        $administrador = Administrador::find($id); //select * from productos where id=:id
        return view('/administrador/administradores/edicion')->with('administrador', $administrador);
    }

    public function mostrar($id)
    {
        $administrador = Administrador::find($id); //select * from productos where id=:id
        return view('/administrador/administradores/ver')->with('administrador', $administrador);
    }

    public function borrar($id)
    {
        $administrador = Administrador::find($id);

        $administrador->estado = 0;

        $administrador->save();

        return redirect('administradores/registros');
    }


    public function actualizar(Request $req, $id)
    {
        $administrador = Administrador::find($id);

        $administrador->nombre = $req->nombre;
        $administrador->apellido = $req->apellido;
        $administrador->usuario = $req->usuario;
        $administrador->rol = $req->rol;
        $administrador->correo = $req->correo;
        $administrador->contrasenia = $req->contrasenia;
        /* $administrador->imagen = "imagenes/administradores/administrador_default.jpg"; */

        $administrador->save();

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "administrador_" . $administrador->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/administrador', $nombre, 'public');
            $administrador->imagen = asset('storage/' . $ruta);
            $administrador->save();
        }

        return redirect('/administradores/registros');
    }

    public function in(Request $request)
    {
        /* $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]); */
        /* $administrador = Administrador::where('usuario', $request->usuario)->first(); */

        //dd($administrador->contrasenia);
        //dd(Hash::make($request->contrasenia)); 
        //dd(Hash::check($request->contrasenia, $administrador->contrasenia));

        // Validación de los campos
        $request->validate([
            'usuario' => 'required|string',
            'contrasenia' => 'required|string',
        ]);

        // Buscar el administrador en la BD
        $administrador = Administrador::where('usuario', $request->usuario)->first();

        // Si no existe el usuario, retornar error
        if (!$administrador || !Hash::check($request->contrasenia, $administrador->contrasenia)) {
            return back()->withErrors([
                'credenciales' => 'Usuario o contraseña incorrectos',
            ])->onlyInput('usuario');
        }

        // Autenticar administrador
        Auth::guard('administrador')->login($administrador);
        $request->session()->regenerate();

        // Redirigir al panel de control
        return redirect()->intended('/panel');

        /* if(!Hash::check($request->contrasenia, $administrador->contrasenia)){
            $request->session()->regenerate();
            //Auth::guard('administrador')->login($administrador);
            //dd(Auth::guard('administrador')->user()->nombre);

            return redirect('/panel');
        } */

        /* if (Auth::guard('administrador')->attempt(['usuario' => $request->usuario, 
                                                    'contrasenia' => $request->contrasenia, 
                                                    'estado' => 1])){
            $request->session()->regenerate();
            Auth::guard('administrador')->login($administrador);
 
            return redirect('/panel') ->intended('dashboard');
        } */

        /* return back()->withErrors([
            'credenciales' => 'Los datos enviados no fueron encontrados',
        ])->onlyInput('credenciales'); */
    }

    public function out(Request $request)
    {

        Auth::guard('administrador')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/administrador/login');
    }

    public function login()
    {
        return view('/administrador/login7/login');
    }
}

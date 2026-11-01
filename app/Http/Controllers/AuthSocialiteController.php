<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;



class AuthSocialiteController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        try {
            $googleUser = Socialite::driver('google')/* ->stateless() */->user();
    
            $user = Cliente::where('correo', $googleUser->getEmail())->first();
    
            if (!$user) {
                $cliente = new Cliente();

                $cliente->nombre = $googleUser->getName();
                $cliente->apellido = '';  
                $cliente->correo = $googleUser->getEmail();
                $cliente->contrasenia = ''; 
                $cliente->direccion = 'Direccion'; 
                $cliente->imagen = $googleUser->getAvatar();
                $cliente->estado = 1; 

                $cliente->save();

                $user = $cliente;
            }
            /* dd($user); */
    
            Auth::guard('cliente')->login($user);
    
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
    
        } catch (\Exception $e) {
            Log::error('Google Authentication Error: ' . $e->getMessage());
            
            return redirect('/')->withErrors(['credenciales' => 'Error de autenticación: ' . $e->getMessage()]);
        }
    }    

    public function redirectGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub(){
        try {
            $githubUser = Socialite::driver('github')->user();
    
            $user = Cliente::where('correo', $githubUser->getEmail())->first();
    
            if (!$user) {
                $cliente = new Cliente();
    
                // GitHub puede no tener nombre completo, usamos nickname como alternativa
                $nombre = $githubUser->getName(); // puede ser null
                $nickname = $githubUser->getNickname(); // alternativa válida
    
                $cliente->nombre = $nombre ?? $nickname ?? 'Unknow'; // fallback
                $cliente->apellido = ''; 
                $cliente->correo = $githubUser->getEmail();
                $cliente->contrasenia = ''; 
                $cliente->direccion = 'Direccion';
                $cliente->imagen = $githubUser->getAvatar();
                $cliente->estado = 1;
    
                $cliente->save();
    
                $user = $cliente;
            }
    
            Auth::guard('cliente')->login($user);
    
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
    
        } catch (\Exception $e) {
            Log::error('Github Authentication Error: ' . $e->getMessage());
            return redirect('/')->withErrors([
                'credenciales' => 'Error de autenticación: ' . $e->getMessage()
            ]);
        }
    }
    
}

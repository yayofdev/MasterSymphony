<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    public function guardar(Request $req){
        //dd(vars: $req->all());
        
        $familia=new Familia();
        
        $familia->nombre=$req->nombre;
        $familia->imagen="imagenes/familias/familia_default.jpg";
        
        $familia->save();

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "familia_" . $familia->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/familia', $nombre, 'public');
            $familia->imagen = asset('storage/' . $ruta);
            $familia->save();
        }
        
        return redirect('/familias/registros');
    }

    public function registros(){
        $familias=Familia::all(); //select * from productos
        //dd($familias);
        return view('/administrador/familias/listado')->with('familias', $familias);
    }

    public function registroId($id){
        return "";
    }

    public function registroPrecio($id){
        return "";
    }

    public function crear(){
        return view('/administrador/familias/formulario');
    }


    public function editar($id){
        $familia=Familia::find($id);//select * from productos where id=:id
        return view('/administrador/familias/edicion')->with('familia', $familia);
    }

    public function mostrar($id){
        $familia=Familia::find($id);//select * from productos where id=:id
        return view('/administrador/familia/ver')->with('familia', $familia);
    }

    public function borrar($id){
        $familia=Familia::find($id);

        $familia->estado=0;

        $familia->save(); 

        return redirect('/familias/registros');
    }


    public function actualizar(Request $req, $id){
        $familia=Familia::find($id);
        
        $familia->nombre=$req->nombre;
        /* $familia->imagen=$req->imagen; */

        $familia->save(); 

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "familia_" . $familia->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/familia', $nombre, 'public');
            $familia->imagen = asset('storage/' . $ruta);
            $familia->save();
        }

        return redirect('/familias/registros');
    }
}

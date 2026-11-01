<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function guardar(Request $req){
        //dd(vars: $req->all());
        
        $marca=new Marca();
        
        $marca->nombre=$req->nombre;
        $marca->imagen="imagenes/marcas/marca_default.jpg";
        
        $marca->save();

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "marca_" . $marca->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/marca', $nombre, 'public');
            $marca->imagen = asset('storage/' . $ruta);
            $marca->save();
        }
        
        return redirect('/marcas/registros');
    }

    public function registros(){
        $marcas=Marca::all(); //select * from productos
        //dd($aditivos);
        return view('/administrador/marcas/listado')->with('marcas', $marcas);
    }

    public function registroId($id){
        return "";
    }

    public function registroPrecio($id){
        return "";
    }

    public function crear(){
        return view('/administrador/marcas/formulario');
    }


    public function editar($id){
        $marca=Marca::find($id);//select * from productos where id=:id
        return view('/administrador/marcas/edicion')->with('marca', $marca);
    }

    public function mostrar($id){
        $marca=Marca::find($id);//select * from productos where id=:id
        return view('/administrador/marca/ver')->with('marca', $marca);
    }

    public function borrar($id){
        $marca=Marca::find($id);

        $marca->estado=0;

        $marca->save(); 

        return redirect('/marcas/registros');
    }


    public function actualizar(Request $req, $id){
        $marca=Marca::find($id);
        
        $marca->nombre=$req->nombre;
        /* $marca->imagen=$req->imagen; */

        $marca->save(); 

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "marca_" . $marca->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/marca', $nombre, 'public');
            $marca->imagen = asset('storage/' . $ruta);
            $marca->save();
        }

        return redirect('/marcas/registros');
    }
}

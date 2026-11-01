<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function guardar(Request $req){
        //dd(vars: $req->all());
        
        $proveedor=new Proveedor();
        
        $proveedor->nombre=$req->nombre;
        $proveedor->telefono=$req->telefono;
        $proveedor->direccion=$req->direccion;
        $proveedor->imagen="imagenes/proveedores/proveedor_default.jpg";
        $proveedor->estado=1;
        
        $proveedor->save();
        
        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "proveedor_" . $proveedor->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/proveedor', $nombre, 'public');
            $proveedor->imagen = asset('storage/' . $ruta);
            $proveedor->save();
        }

        return redirect('/proveedores/registros');
    }

    public function registros(){
        $proveedores=Proveedor::all(); //select * from productos
        //dd($proveedores);
        return view('/administrador/proveedores/listado')->with('proveedores', $proveedores);
    }

    public function registroId($id){
        return "";
    }

    public function registroPrecio($id){
        return "";
    }

    public function crear(){
        return view('/administrador/proveedores/formulario');
    }


    public function editar($id){
        $proveedor=Proveedor::find($id);//select * from productos where id=:id
        return view('/administrador/proveedores/edicion')->with('proveedor', $proveedor);
    }

    public function mostrar($id){
        $proveedor=Proveedor::find($id);//select * from productos where id=:id
        return view('/administrador/proveedores/ver')->with('proveedor', $proveedor);
    }

    public function borrar($id){
        $proveedor=Proveedor::find($id);

        $proveedor->estado=0;

        $proveedor->save(); 

        return redirect('/proveedores/registros');
    }


    public function actualizar(Request $req, $id){
        $proveedor=Proveedor::find($id);
        
        $proveedor->nombre=$req->nombre;
        $proveedor->telefono=$req->telefono;
        $proveedor->direccion=$req->direccion;
        /* $proveedor->imagen=$req->imagen; */

        $proveedor->save(); 

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "proveedor_" . $proveedor->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/proveedor', $nombre, 'public');
            $proveedor->imagen = asset('storage/' . $ruta);
            $proveedor->save();
        }

        return redirect('/proveedores/registros');
    }
}

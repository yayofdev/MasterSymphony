<?php

namespace App\Http\Controllers;

use App\Models\Aditivo;
use Illuminate\Http\Request;

class AditivoController extends Controller
{
    public function guardar(Request $req)
    {
        //dd(vars: $req->all());

        $aditivo = new Aditivo();

        $aditivo->nombre = $req->nombre;
        $aditivo->imagen = "imagenes/aditivos/aditivo_default.jpg";

        $aditivo->save();

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "aditivo_" . $aditivo->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/aditivo', $nombre, 'public');
            $aditivo->imagen = asset('storage/' . $ruta);
            $aditivo->save();
        }

        return redirect('/aditivos/registros');
    }

    public function registros()
    {
        $aditivos = Aditivo::all(); //select * from productos
        //dd($aditivos);
        return view('/administrador/aditivos/listado')->with('aditivos', $aditivos);
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
        return view('/administrador/aditivos/formulario');
    }


    public function editar($id)
    {
        $aditivo = Aditivo::find($id); //select * from productos where id=:id
        return view('/administrador/aditivos/edicion')->with('aditivo', $aditivo);
    }

    public function mostrar($id)
    {
        $aditivo = Aditivo::find($id); //select * from productos where id=:id
        return view('/administrador/aditivo/ver')->with('aditivo', $aditivo);
    }

    public function borrar($id)
    {
        $aditivo = Aditivo::find($id);

        $aditivo->estado = 0;

        $aditivo->save();

        return redirect('/aditivos/registros');
    }


    public function actualizar(Request $req, $id)
    {
        $aditivo = Aditivo::find($id);

        $aditivo->nombre = $req->nombre;
        /* $aditivo->imagen=$req->imagen; */

        $aditivo->save();

        if ($req->hasFile('imagen')) {
            $imagen = $req->imagen;
            $extension = $imagen->extension();
            $nombre = "aditivo_" . $aditivo->id . "." . $extension;
            $ruta = $imagen->storeAs('imagenes/aditivo', $nombre, 'public');
            $aditivo->imagen = asset('storage/' . $ruta);
            $aditivo->save();
        }

        return redirect('/aditivos/registros');
    }
}

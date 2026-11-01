<?php

namespace App\Http\Controllers;

use App\Models\Aditivo;
use App\Models\Familia;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function guardar(Request $req)
    {
        //dd($req->all());

        $producto = new Producto();

        $producto->nombre = $req->nombre;
        $producto->precio = $req->precio;
        $producto->existencia = $req->existencia;
        $producto->descuento = $req->descuento;
        $producto->descripcion = $req->descripcion;
        $producto->imagen1 = "imagenes/productos/producto_default.jpg";
        $producto->imagen2 = "imagenes/productos/producto_default.jpg";
        $producto->imagen3 = "imagenes/productos/producto_default.jpg";
        $producto->familia_id = $req->familia_id;
        $producto->marca_id = $req->marca_id;
        $producto->aditivo_id = $req->aditivo_id;
        $producto->proveedor_id = $req->proveedor_id;
        $producto->estado = 1;

        $producto->save();

        if ($req->hasFile('imagen1')) {
            $imagen = $req->imagen1;
            $extension = $imagen->extension();
            $nombre = "producto_" . $producto->id . "_1." . $extension;
            $ruta = $imagen->storeAs('imagenes/producto', $nombre, 'public');
            $producto->imagen1 = asset('storage/' . $ruta);
            $producto->save();
        }

        if ($req->hasFile('imagen2')) {
            $imagen = $req->imagen2;
            $extension = $imagen->extension();
            $nombre = "producto_" . $producto->id . "_2." . $extension;
            $ruta = $imagen->storeAs('imagenes/producto', $nombre, 'public');
            $producto->imagen2 = asset('storage/' . $ruta);
            $producto->save();
        }
        /* 
        dd($producto); */
        if ($req->hasFile('imagen3')) {
            //dd($producto);
            $imagen = $req->imagen3;
            $extension = $imagen->extension();
            $nombre = "producto_" . $producto->id . "_3." . $extension;
            $ruta = $imagen->storeAs('imagenes/producto', $nombre, 'public');
            $producto->imagen3 = asset('storage/' . $ruta);
            $producto->save();
        }

        return redirect('/productos/registros');
    }

    public function registros()
    {
        $productos = Producto::all(); //select * from productos
        //dd($productos);
        return view('/administrador/productos/listado')->with('productos', $productos);
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
        return view('/administrador/productos/formulario')
            ->with('marcas', Marca::all())
            ->with('proveedores', Proveedor::all())
            ->with('aditivos', Aditivo::all())
            ->with('familias', Familia::all());
    }


    public function editar($id)
    {
        $producto = Producto::find($id); //select * from productos where id=:id
        return view('/administrador/productos/edicion')
            ->with('producto', $producto)
            ->with('marcas', Marca::all())
            ->with('proveedores', Proveedor::all())
            ->with('aditivos', Aditivo::all())
            ->with('familias', Familia::all());
    }

    public function mostrar($id)
    {
        $producto = Producto::find($id); //select * from productos where id=:id
        return view('/administrador/productos/ver')->with('producto', $producto);
    }

    public function borrar($id)
    {
        $producto = Producto::find($id);

        $producto->estado = 0;

        $producto->save();

        return redirect('/productos/registros');
    }


    public function actualizar(Request $req, $id)
    {
        $producto = Producto::find($id);

        $producto->nombre = $req->nombre;
        $producto->precio = $req->precio;
        $producto->existencia = $req->existencia;
        $producto->descuento = $req->descuento;
        $producto->descripcion = $req->descripcion;
        /* $producto->imagen1=$req->imagen1;
        $producto->imagen2=$req->imagen2;
        $producto->imagen3=$req->imagen3; */
        $producto->familia_id = $req->familia_id;
        $producto->marca_id = $req->marca_id;
        $producto->aditivo_id = $req->aditivo_id;
        $producto->proveedor_id = $req->proveedor_id;

        $producto->save();

        if ($req->hasFile('imagen1')) {
            $imagen = $req->imagen1;
            $extension = $imagen->extension();
            $nombre = "producto_" . $producto->id . "_1." . $extension;
            $ruta = $imagen->storeAs('imagenes/producto', $nombre, 'public');
            $producto->imagen1 = asset('storage/' . $ruta);
            $producto->save();
        }

        if ($req->hasFile('imagen2')) {
            $imagen = $req->imagen2;
            $extension = $imagen->extension();
            $nombre = "producto_" . $producto->id . "_2." . $extension;
            $ruta = $imagen->storeAs('imagenes/producto', $nombre, 'public');
            $producto->imagen2 = asset('storage/' . $ruta);
            $producto->save();
        }

        if ($req->hasFile('imagen3')) {

            $imagen = $req->imagen3;
            $extension = $imagen->extension();
            $nombre = "producto_" . $producto->id . "_3." . $extension;
            $ruta = $imagen->storeAs('imagenes/producto', $nombre, 'public');
            $producto->imagen3 = asset('storage/' . $ruta);
            $producto->save();
        }

        return redirect('/productos/registros');
    }

    public function catalogo()
    {
        $productos = Producto::where('estado', 1)->get(); // Trae productos donde estado = 1

        //dd($productos);
        return view('cliente/galeria')->with('productos', $productos);
    }
    public function ofertas()
    {
        $productos = Producto::where('estado', 1)
        ->where('descuento', '!=', 0)
        ->get();

        //dd($productos);
        return view('cliente/galeria')->with('productos', $productos);
    }

    public function detalle_producto($id){
        $producto = Producto::find($id);
        return view('cliente/detalle_producto')->with('producto', $producto);
    }

}

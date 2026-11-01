<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CarritoController extends Controller
{
    public function agregar_carrito(Request $req)
    {
        $clienteId = Auth::guard('cliente')->user()->id;
        $productoId = $req->producto_id;
    
        // Verificar si el producto ya existe en el carrito del cliente
        $existe = Carrito::where('cliente_id', $clienteId)
                         ->where('producto_id', $productoId)
                         ->first();
    
        if ($existe) {
            $mensaje = "Ya está agregado en el carrito";
            // Opcional: Puedes agregar un mensaje flash para notificar al usuario
            // session()->flash('mensaje', 'El producto ya está en el carrito.');
            return redirect('/detalle_producto/' . $productoId)
                        ->with('mensaje', $mensaje);
        }
    
        // Si no existe, se crea un nuevo registro en el carrito
        $carrito = new Carrito();
        $carrito->cliente_id = $clienteId;
        $carrito->producto_id = $productoId;
        $carrito->save();
    
        return redirect('/detalle_producto/' . $productoId);
    }
    

    public function obtener_carrito()
    {
        $total = 0;
        $subtotal = 0;
        $descuento = 0;
        
        // Obtener el cliente autenticado
        $clienteId = Auth::guard('cliente')->user()->id;
    
        // Obtenemos las cantidades asociadas a cada producto, donde la clave es el producto_id
        $cantidades = Carrito::where('cliente_id', $clienteId)
                              ->pluck('cantidad', 'producto_id');
    
        // Extraemos los IDs de los productos desde las claves del arreglo
        $productoIds = array_keys($cantidades->toArray());
    
        // Obtenemos los productos correspondientes
        $productos = Producto::whereIn('id', $productoIds)->get();
    
        foreach ($productos as $producto) {
            // Recuperar la cantidad correspondiente al producto
            $cantidad = $cantidades[$producto->id];
    
            // Calcular el subtotal para ese producto
            $subtotalProducto = $producto->precio * $cantidad;
            $subtotal += $subtotalProducto;
    
            // Calcular el descuento aplicado al producto
            $descuento += $subtotalProducto * ($producto->descuento / 100);
        }
    
        // Total sin IVA
        $total = $subtotal - $descuento;
    
        // Calcular el IVA (16% en este ejemplo)
        $iva = $total * 0.16;
        $total += $iva;
        
        return view('/cliente/carrito')
                ->with('productos', $productos)
                ->with('cantidades', $cantidades)
                ->with('iva', $iva)
                ->with('total', $total)
                ->with('subtotal', $subtotal)
                ->with('descuento', $descuento);
    }
    
    

    public function sumar_cantidad(Request $req)
    {
        $clienteId = Auth::guard('cliente')->user()->id;
        $productoId = $req->id;
    
        // Encontrar el producto en el carrito y sumar 1 a la columna 'cantidad'
        Carrito::where('producto_id', $productoId)
               ->where('cliente_id', $clienteId)
               ->increment('cantidad', 1); // Suma 1 a la cantidad
    
        return redirect('/carrito');
    }
    

    public function restar_cantidad(Request $req)
    {
        $clienteId = Auth::guard('cliente')->user()->id;
        $productoId = $req->id;
    
        // Verificamos si la cantidad es mayor a 1 antes de restar
        $carritoItem = Carrito::where('producto_id', $productoId)
                              ->where('cliente_id', $clienteId)
                              ->first();
    
        // Solo restamos si la cantidad es mayor a 1
        if ($carritoItem && $carritoItem->cantidad > 1) {
            Carrito::where('producto_id', $productoId)
                   ->where('cliente_id', $clienteId)
                   ->decrement('cantidad', 1); // Resta 1 a la cantidad
        } else {
            // Si la cantidad es 1, eliminamos el producto del carrito
            Carrito::where('producto_id', $productoId)
                   ->where('cliente_id', $clienteId)
                   ->delete();
        }
    
        return redirect('/carrito');
    }
    

    public function eliminar_carrito(Request $req)
    {
        /* dd($req->all()); */
        
        $clienteId = Auth::guard('cliente')->user()->id;

        $productoId = $req->id;

        Carrito::where('producto_id', $productoId)
               ->where('cliente_id', $clienteId)
               ->delete();

        return redirect('/carrito');
    }
}

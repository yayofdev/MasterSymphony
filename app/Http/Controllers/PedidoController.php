<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\Producto_pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PedidoController extends Controller
{

    public function pagar($subt, $desc, $iva, $total){
        return view('/cliente/pagar')
            ->with('subtotal', $subt)
            ->with('descuento', $desc)
            ->with('iva', $iva)
            ->with('total', $total);
    }

    public function confirmacion($subt, $desc, $iva, $total){
        return view('/cliente/confirmacion')
            ->with('subtotal', $subt)
            ->with('descuento', $desc)
            ->with('iva', $iva)
            ->with('total', $total);
    }

    public function confirmado($desc, $iva, $total){
        
        // Obtener el cliente autenticado
        $clienteId = Auth::guard('cliente')->user()->id;
    
        // Obtenemos las cantidades asociadas a cada producto, donde la clave es el producto_id
        $cantidades = Carrito::where('cliente_id', $clienteId)
                              ->pluck('cantidad', 'producto_id');
    
        // Extraemos los IDs de los productos desde las claves del arreglo
        $productoIds = array_keys($cantidades->toArray());
    
        // Obtenemos los productos correspondientes
        $productos = Producto::whereIn('id', $productoIds)->get();
        
        Pedido::create([
            'cliente_id' => $clienteId,
            'fecha' => Carbon::now(),
            'iva' => $iva,
            'descuento' => $desc,
            'total' => $total,
            'estado' => 1,
        ]);

        $ultimoPedido = Pedido::latest('id')->first();

        foreach ($productos as $producto) {
            // Recuperar la cantidad correspondiente al producto
            $cantidad = $cantidades[$producto->id];

            Producto_pedido::create([
                'pedido_id' => $ultimoPedido->id,
                'producto_id' => $producto->id,
                'cantidad' => $cantidad,
                'precio' => ($producto->precio*$cantidad),
            ]);

            Producto::where('id', $producto->id)
                    ->decrement('existencia', $cantidad);
        }

        $productosCat = Producto::where('estado', 1)->get(); // Trae productos donde estado = 1
        
        return redirect('/index')
        ->with('productos', $productosCat)
        ->with('success', 'Transacción completada. ¡Gracias por su compra!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        
        if (!$request->has('product_id')) {
            return "No hay productos en el carrito";
        }

        $order = new Order();
        $order->user_id = 1;
        $order->metodo_pago = 'tarjeta';
        $order->total = 0;
        $order->save();

        $product_ids = $request->product_id;
        $prices = $request->price;
        $cantidades = $request->cantidad;

        $total = 0;

        for ($i = 0; $i < count($product_ids); $i++) {

            if (!$product_ids[$i]) continue;

            $subtotal = $prices[$i] * $cantidades[$i];

            $order->products()->attach($product_ids[$i], [
                'cantidad' => $cantidades[$i],
                'price' => $prices[$i]
            ]);

            $total += $subtotal;
        }

        $order->total = $total;
        $order->save();

        return "Orden creada correctamente";
    }
}
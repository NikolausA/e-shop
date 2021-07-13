<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        if(!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        return response()->json(['order' => $order], 200);
    }

    public function addToBasket($product)
    {
        $orderId = session('orderId');
        if(is_null('orderId')) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        $order->products()->attach($product->id);

        return response()->json(['order' => $order], 200);
    }
}

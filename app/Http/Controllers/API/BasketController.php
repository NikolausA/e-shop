<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use App\Http\Controllers\Controller;
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

    public function saveOrder(Request $request) {
        $productsInBasket = $request->order;
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = new Order;
            session(['orderId' => $order->id]);
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->save();
        }
        else {
            $order = Order::find($orderId);
        }
        foreach ($productsInBasket as $product) {
            $productId = $product['id'];
            $productQnt = $product['quantity'];
            if ($order->products->contains($productId)) {
                $pivotRow = $order->products()->where('product_id', $productId)->firsr()->pivot;
                $quantity = $pivotRow->quantity + $productQnt;
                $pivotRow->update(['quantity' => $quantity]);
            } else {
                $order->products()->attach($productId, ['quantity' => $productQnt]);
            }
        }
        return redirect()->route('catalog');
    }
}

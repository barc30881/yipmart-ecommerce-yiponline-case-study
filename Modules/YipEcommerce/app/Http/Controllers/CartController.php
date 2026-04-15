<?php

namespace Modules\YipEcommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\YipEcommerce\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('yip_ecommerce::cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += 1;
        } else {
            $cart[$product->id] = [
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => 1,
                'image'    => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()
            ->with('success', "{$product->name} has been added to your cart!");
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            if ($cart[$id]['quantity'] < 1) unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Cart updated!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Item removed from cart!');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')
            ->with('success', 'Cart cleared!');
    }
}
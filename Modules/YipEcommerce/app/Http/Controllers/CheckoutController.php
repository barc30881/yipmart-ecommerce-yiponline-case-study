<?php
namespace Modules\YipEcommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\YipEcommerce\Models\Order;
use Modules\YipEcommerce\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('yip_ecommerce::checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_address' => 'required|string',
            'shipping_phone' => 'required|string|max:20',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id() ?? null, // null for guests for now
            'total' => $total,
            'status' => 'pending',
            'shipping_name' => $request->shipping_name,
            'shipping_address' => $request->shipping_address,
            'shipping_phone' => $request->shipping_phone,
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            // Optional: decrement stock
            // \Modules\YipEcommerce\Models\Product::find($id)->decrement('stock', $item['quantity']);
        }

        session()->forget('cart'); // Clear cart after successful order

        return redirect()->route('checkout.success', $order)
            ->with('success', 'Order placed successfully! (Paystack simulation)');
    }

    public function success(Order $order)
    {
        return view('yip_ecommerce::checkout.success', compact('order'));
    }
}
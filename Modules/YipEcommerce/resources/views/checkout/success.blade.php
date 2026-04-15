@extends('yip_ecommerce::layouts.app')

@section('content')
    <div class="max-w-md mx-auto text-center py-20">
        <div class="text-7xl mb-6">🎉</div>
        <h1 class="text-4xl font-bold mb-4">Order Placed Successfully!</h1>
        <p class="text-lg mb-8">Order #{{ $order->id }} • Total: ₦{{ number_format($order->total) }}</p>
        
        <div class="alert alert-success mb-8">
            <span>Simulated Paystack payment successful. Thank you for shopping at YipMart!</span>
        </div>

        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
        <a href="{{ route('cart.index') }}" class="btn btn-ghost mt-4 block">View Orders (in Admin later)</a>
    </div>
@endsection
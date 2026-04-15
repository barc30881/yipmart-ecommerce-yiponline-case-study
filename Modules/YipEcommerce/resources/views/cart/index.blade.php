@extends('yip_ecommerce::layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mx-4 mt-4 shadow-lg">{{ session('success') }}</div>
    @endif

    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-5xl font-bold flex items-center gap-3">
                🛒 Your Cart
            </h1>
            @if (!empty($cart))
                <a href="{{ route('cart.clear') }}" class="btn btn-ghost text-error">Clear Cart</a>
            @endif
        </div>

        @if (empty($cart))
            <div class="text-center py-20">
                <p class="text-2xl text-base-content/60">Your cart is empty</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-8 btn-lg">Browse Products</a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-8 space-y-6">
                    @foreach($cart as $id => $item)
                    <div class="card bg-base-100 shadow-md flex flex-row gap-6 p-6 hover:shadow-xl transition-all">
                        <img src="{{ $item['image'] }}" class="w-28 h-28 object-cover rounded-2xl" alt="">
                        <div class="flex-1">
                            <h3 class="font-semibold text-xl">{{ $item['name'] }}</h3>
                            <p class="text-base-content/70">₦{{ number_format($item['price']) }} each</p>
                            
                            <div class="flex items-center gap-6 mt-6">
                                <!-- Quantity -->
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-3">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" 
                                           class="input input-bordered w-20 text-center">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </form>
                                
                                <a href="{{ route('cart.remove', $id) }}" 
                                   onclick="return confirm('Remove item?')" 
                                   class="btn btn-error btn-sm">Remove</a>
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <p class="text-2xl font-bold text-primary">₦{{ number_format($item['price'] * $item['quantity']) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Order Summary Sidebar -->
                <div class="lg:col-span-4">
                    <div class="card bg-base-100 shadow-xl sticky top-8">
                        <div class="card-body">
                            <h3 class="card-title text-2xl mb-6">Order Summary</h3>
                            <div class="flex justify-between text-xl">
                                <span>Subtotal</span>
                                <span class="font-bold">₦{{ number_format($total) }}</span>
                            </div>
                            <div class="divider my-6"></div>
                            <div class="flex justify-between text-3xl font-bold mb-8">
                                <span>Total</span>
                                <span class="text-primary">₦{{ number_format($total) }}</span>
                            </div>
                            <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-block btn-lg bg-orange-600">
                                Proceed to Checkout →
                            </a>
                            <p class="text-center text-sm mt-6 text-base-content/60 text-orange-600">✓ Pay with Paystack (Simulated)</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@extends('yip_ecommerce::layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mx-4 mt-4">{{ session('success') }}</div>
    @endif

    <div class="max-w-4xl mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold mb-8">Checkout</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Order Summary -->
            <div>
                <h2 class="text-2xl font-semibold mb-6">Order Summary</h2>
                <div class="space-y-4">
                    @foreach($cart as $item)
                    <div class="flex justify-between border-b pb-4">
                        <div>
                            <p class="font-medium">{{ $item['name'] }}</p>
                            <p class="text-sm text-base-content/70">Qty: {{ $item['quantity'] }}</p>
                        </div>
                        <p class="font-semibold">₦{{ number_format($item['price'] * $item['quantity']) }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="mt-8 flex justify-between text-xl font-bold">
                    <span>Total</span>
                    <span class="text-primary">₦{{ number_format($total) }}</span>
                </div>
            </div>

            <!-- Shipping Form -->
            <div>
                <h2 class="text-2xl font-semibold mb-6">Shipping Details</h2>
                <form method="POST" action="{{ route('checkout.store') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="label">Full Name</label>
                        <input type="text" name="shipping_name" class="input input-bordered w-full" required>
                    </div>
                    <div>
                        <label class="label">Delivery Address</label>
                        <textarea name="shipping_address" class="textarea textarea-bordered w-full" rows="3" required></textarea>
                    </div>
                    <div>
                        <label class="label">Phone Number</label>
                        <input type="tel" name="shipping_phone" class="input input-bordered w-full" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg">
                        Place Order • Pay with Paystack (Simulated)
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
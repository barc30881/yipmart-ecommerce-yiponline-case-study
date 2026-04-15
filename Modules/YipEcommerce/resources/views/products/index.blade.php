@extends('yip_ecommerce::layouts.app')

@section('content')

<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
<div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:grid-cols-3 lg:gap-x-8">
    
    @foreach($products as $product)
    <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white">
        
        <!-- Product Image -->
        <img 
            src="{{ $product->image }}" 
            alt="{{ $product->name }}"
            class="aspect-3/4 w-full bg-gray-200 object-cover group-hover:opacity-75 sm:aspect-auto sm:h-96">

        <!-- Product Content -->
        <div class="flex flex-1 flex-col space-y-2 p-4">
            
            <!-- Name -->
            <h3 class="text-sm font-medium text-gray-900">
                <a href="{{ route('products.show', $product) }}">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {{ $product->name }}
                </a>
            </h3>

            <!-- Description -->
            <p class="text-sm text-gray-500 line-clamp-3">
                {{ $product->description }}
            </p>

            <!-- Footer -->
            <div class="flex flex-1 flex-col justify-end">
                
                <!-- Stock -->
                <p class="text-sm text-gray-500 italic">
                    {{ $product->stock }} in stock
                </p>

                <!-- Price -->
                <p class="text-base font-medium text-gray-900">
                    ₦{{ number_format($product->price) }}
                </p>

                <!-- Button -->
                <a href="{{ route('products.show', $product) }}"
                   class="mt-3 inline-block text-center px-4 py-2 bg-orange-600 text-white text-sm rounded-md hover:bg-orange-700 transition">
                    View Details
                </a>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection

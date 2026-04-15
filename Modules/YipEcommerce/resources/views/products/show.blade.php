@extends('yip_ecommerce::layouts.app')

@section('content')


<div class="bg-white">
    @if (session('success'))
        
        <div class="alert alert-success mx-4 mt-4">{{ session('success')}} </div>

@endif
    
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
    


    <!-- Product details -->
    <div class="lg:max-w-lg lg:self-end">
      <nav aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-2">
          <li>
            <div class="flex items-center text-sm">
              <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Category</a>
              <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                class="ml-2 size-5 shrink-0 text-gray-300">
                <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
              </svg>
            </div>
          </li>
          <li>
            <div class="flex items-center text-sm">
              <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Product</a>
            </div>
          </li>
        </ol>
      </nav>

      <div class="mt-4">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
          {{ $product->name }}
        </h1>
      </div>

      <section aria-labelledby="information-heading" class="mt-4">
        <h2 id="information-heading" class="sr-only">Product information</h2>

        <div class="flex items-center">
          <p class="text-lg text-gray-900 sm:text-xl">
            ₦{{ number_format($product->price) }}
          </p>

          <div class="ml-4 border-l border-gray-300 pl-4">
            <h2 class="sr-only">Reviews</h2>
            <div class="flex items-center">
              <div>
                <div class="flex items-center">
                  <!-- Static stars (unchanged) -->
                  <svg class="size-5 shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                      clip-rule="evenodd" />
                  </svg>
                  <!-- duplicate or keep exactly as original -->
                </div>
                <p class="sr-only">4 out of 5 stars</p>
              </div>
              <p class="ml-2 text-sm text-gray-500">0 reviews</p>
            </div>
          </div>
        </div>

        <div class="mt-4 space-y-6">
          <p class="text-base text-gray-500">
            {{ $product->description }}
          </p>
        </div>

        <div class="mt-6 flex items-center">
          <svg class="size-5 shrink-0 text-green-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
              clip-rule="evenodd" />
          </svg>
          <p class="ml-2 text-sm text-gray-500">
            {{ $product->stock > 0 ? 'In stock and ready to ship' : 'Out of stock' }}
          </p>
        </div>
      </section>
    </div>

    <!-- Product image -->
    <div class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center">
      <img 
        src="{{ $product->image }}"
        alt="{{ $product->name }}"
        class="aspect-square w-full rounded-lg object-cover">
    </div>

    <!-- Product form -->
    <div class="mt-10 lg:col-start-1 lg:row-start-2 lg:max-w-lg lg:self-start">
      <section aria-labelledby="options-heading">
        <h2 id="options-heading" class="sr-only">Product options</h2>

        <form method="POST" action="{{ route('cart.add', $product) }}">
          @csrf

          <div class="mt-10">
            <button type="submit"
              class="flex w-full items-center justify-center rounded-md border border-transparent bg-orange-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">
              Add to cart
            </button>
          </div>

          <div class="mt-6 text-center">
            <a href="{{ route('products.show', $product) }}" class="group inline-flex text-base font-medium">
              <span class="text-gray-500 hover:text-gray-700">View full details</span>
            </a>
          </div>

        </form>
      </section>
    </div>

   

  </div>
</div>
@endsection
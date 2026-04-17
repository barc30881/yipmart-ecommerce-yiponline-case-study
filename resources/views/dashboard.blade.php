@extends('yip_ecommerce::layouts.app')

@section('content')

@auth
@php
    $user = auth()->user();
    $isAdmin = $user?->email === 'admin@yiponline.com';
@endphp

<div class="flex min-h-[calc(100vh-180px)] flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-50">
  
  <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
    <div class="flex justify-center">
      <span class="text-5xl">🛍️</span>
    </div>

    <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">
      Welcome back, {{ $user->name ?? 'User' }}!
    </h2>

    @if($isAdmin)
      <p class="mt-2 text-gray-600">
        You're successfully logged in to the YipMart Admin Dashboard.
      </p>
    @else
      <p class="mt-2 text-gray-600">
        You're successfully logged in to your YipMart account.
      </p>
    @endif
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
    <div class="bg-white px-6 py-12 shadow-sm sm:rounded-lg sm:px-12 text-center">

      <div class="mb-8">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full">
          <span class="text-4xl">✅</span>
        </div>
      </div>

      <h3 class="text-2xl font-semibold text-gray-900 mb-2">
        You're logged in!
      </h3>

      @if($isAdmin)
        <p class="text-gray-600 mb-10">
          You now have full access to manage orders and the YipMart platform.
        </p>

        <div class="space-y-4">
          <a href="/admin/orders"
             class="block w-full py-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">
            View All Orders
          </a>

          <a href="{{ route('home') }}"
             class="block w-full py-4 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
            Back to Shop
          </a>
        </div>
      @else
        <p class="text-gray-600 mb-10">
          You can continue your shopping.
        </p>

        <div class="space-y-4">
          <a href="{{ route('cart.index') }}"
             class="block w-full py-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">
            View Your Cart
          </a>

          <a href="{{ route('home') }}"
             class="block w-full py-4 bg-white border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
            Back to Shop
          </a>
        </div>
      @endif

    </div>
  </div>
</div>
@endauth

@endsection
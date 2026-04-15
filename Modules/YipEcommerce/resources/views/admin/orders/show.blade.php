<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YipMart - Premium African Products</title>
    
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900">
    

<div class="bg-gray-900 py-10">

  <!-- Title -->
  <h2 class="px-4 text-base/7 font-semibold text-white sm:px-6 lg:px-8">
    Order #{{ $order->id }} - Items
  </h2>

  <!-- Table -->
  <table class="mt-6 w-full text-left whitespace-nowrap">
    <colgroup>
      <col class="w-full sm:w-4/12">
      <col class="lg:w-4/12">
      <col class="lg:w-2/12">
      <col class="lg:w-1/12">
      <col class="lg:w-1/12">
    </colgroup>

    <!-- Head -->
    <thead class="border-b border-white/10 text-sm/6 text-white">
      <tr>
        <th class="py-2 pr-8 pl-4 font-semibold sm:pl-6 lg:pl-8">Product</th>
        <th class="hidden py-2 pr-8 pl-0 font-semibold sm:table-cell">Price</th>
        <th class="py-2 pr-4 pl-0 text-right font-semibold sm:pr-8 sm:text-left lg:pr-20">Status</th>
        <th class="hidden py-2 pr-8 pl-0 font-semibold md:table-cell lg:pr-20">Qty</th>
        <th class="hidden py-2 pr-4 pl-0 text-right font-semibold sm:table-cell sm:pr-6 lg:pr-8">Subtotal</th>
      </tr>
    </thead>

    <!-- Body -->
    <tbody class="divide-y divide-white/5">

      @foreach($order->items as $item)
      <tr>

        <!-- Product -->
        <td class="py-4 pr-8 pl-4 sm:pl-6 lg:pl-8">
          <div class="flex items-center gap-x-4">
            <img
              src="{{ $item->product->image ?? 'https://via.placeholder.com/40' }}"
              class="size-8 rounded-full bg-gray-800">

            <div class="truncate text-sm/6 font-medium text-white">
              {{ $item->product->name }}
            </div>
          </div>
        </td>

        <!-- Price -->
        <td class="hidden py-4 pr-4 pl-0 sm:table-cell sm:pr-8">
          <div class="flex gap-x-3">
            <div class="font-mono text-sm/6 text-gray-400">
              ₦{{ number_format($item->price) }}
            </div>
            <div class="rounded-md bg-gray-700/40 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-white/10 ring-inset">
              unit
            </div>
          </div>
        </td>

        <!-- Status -->
        <td class="py-4 pr-4 pl-0 text-sm/6 sm:pr-8 lg:pr-20">
          <div class="flex items-center justify-end gap-x-2 sm:justify-start">

            <div class="flex-none rounded-full 
              {{ $order->status === 'completed' ? 'bg-green-400/10 text-green-400' : ($order->status === 'cancelled' ? 'bg-rose-400/10 text-rose-400' : 'bg-yellow-400/10 text-yellow-400') }} 
              p-1">
              <div class="size-1.5 rounded-full bg-current"></div>
            </div>

            <div class="hidden text-white sm:block">
              {{ ucfirst($order->status) }}
            </div>
          </div>
        </td>

        <!-- Quantity -->
        <td class="hidden py-4 pr-8 pl-0 text-sm/6 text-gray-400 md:table-cell lg:pr-20">
          {{ $item->quantity }}
        </td>

        <!-- Subtotal -->
        <td class="hidden py-4 pr-4 pl-0 text-right text-sm/6 text-gray-400 sm:table-cell sm:pr-6 lg:pr-8">
          ₦{{ number_format($item->price * $item->quantity) }}
        </td>

      </tr>
      @endforeach

    </tbody>
  </table>

  <!-- Footer Info (kept in same visual style) -->
  <div class="px-4 sm:px-6 lg:px-8 mt-10 text-sm text-gray-400 space-y-2">
    <p><span class="text-white font-medium">Customer:</span> {{ $order->shipping_name }}</p>
    <p><span class="text-white font-medium">Address:</span> {{ $order->shipping_address }}</p>
    <p><span class="text-white font-medium">Phone:</span> {{ $order->shipping_phone }}</p>
    <p class="text-white font-semibold text-base mt-4">
      Total: ₦{{ number_format($order->total) }}
    </p>
  </div>

  <!-- Status Update (styled to match dark UI) -->
  <div class="px-4 sm:px-6 lg:px-8 mt-6">
    <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
      @csrf
      @method('PATCH')

      <div class="flex gap-4 items-center">
        <select name="status"
          class="bg-gray-800 text-white border border-gray-700 rounded-md px-4 py-2">
          <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
          <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
          <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
          <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>

        <button type="submit"
          class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">
          Update Status
        </button>
      </div>
    </form>
  </div>

</div>
</body>
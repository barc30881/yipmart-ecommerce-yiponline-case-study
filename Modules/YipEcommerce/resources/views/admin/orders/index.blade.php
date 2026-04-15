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
    Admin Dashboard - Orders
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
        <th class="py-2 pr-8 pl-4 font-semibold sm:pl-6 lg:pl-8">Customer</th>
        <th class="hidden py-2 pr-8 pl-0 font-semibold sm:table-cell">Order</th>
        <th class="py-2 pr-4 pl-0 text-right font-semibold sm:pr-8 sm:text-left lg:pr-20">Status</th>
        <th class="hidden py-2 pr-8 pl-0 font-semibold md:table-cell lg:pr-20">Total</th>
        <th class="hidden py-2 pr-4 pl-0 text-right font-semibold sm:table-cell sm:pr-6 lg:pr-8">Date</th>
      </tr>
    </thead>

    <!-- Body -->
    <tbody class="divide-y divide-white/5">

      @foreach($orders as $order)
      <tr>

        <!-- Customer -->
        <td class="py-4 pr-8 pl-4 sm:pl-6 lg:pl-8">
          <div class="flex items-center gap-x-4">
            <img
              src="https://ui-avatars.com/api/?name={{ urlencode($order->shipping_name) }}"
              class="size-8 rounded-full bg-gray-800">

            <div class="truncate text-sm/6 font-medium text-white">
              {{ $order->shipping_name }}
            </div>
          </div>
        </td>

        <!-- Order ID -->
        <td class="hidden py-4 pr-4 pl-0 sm:table-cell sm:pr-8">
          <div class="flex gap-x-3">
            <div class="font-mono text-sm/6 text-gray-400">
              #{{ $order->id }}
            </div>
            <div class="rounded-md bg-gray-700/40 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-white/10 ring-inset">
              order
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

        <!-- Total -->
        <td class="hidden py-4 pr-8 pl-0 text-sm/6 text-gray-400 md:table-cell lg:pr-20">
          ₦{{ number_format($order->total) }}
        </td>

        <!-- Date + Action -->
        <td class="hidden py-4 pr-4 pl-0 text-right text-sm/6 text-gray-400 sm:table-cell sm:pr-6 lg:pr-8">
          <div class="flex flex-col items-end gap-1">
            <time datetime="{{ $order->created_at }}">
              {{ $order->created_at->format('d M Y') }}
            </time>

            <a href="{{ route('admin.orders.show', $order) }}"
               class="text-indigo-400 hover:text-indigo-300 text-xs">
               View →
            </a>
          </div>
        </td>

      </tr>
      @endforeach

    </tbody>
  </table>

  <!-- Pagination -->
  <div class="px-4 sm:px-6 lg:px-8 mt-8 text-gray-300">
    {{ $orders->links() }}
  </div>

</div>
</body>
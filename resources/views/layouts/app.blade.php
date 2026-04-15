<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YipMart - Premium African Products</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-base-100 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="navbar">
                <div class="navbar-start">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <span class="text-3xl">🛍️</span>
                        <span class="text-3xl font-bold tracking-tight text-orange-600">YipMart</span>
                    </a>
                </div>

                <div class="navbar-center hidden lg:flex">
                    <ul class="menu menu-horizontal px-1 text-lg">
                        <li><a href="{{ route('home') }}" class="hover:text-orange-600">Shop</a></li>
                        <li><a href="#" class="hover:text-orange-600">Categories</a></li>
                        <li><a href="#" class="hover:text-orange-600">About</a></li>
                    </ul>
                </div>

                <div class="navbar-end flex items-center gap-4">
                    @auth
                        <a href="{{ route('cart.index') }}" class="btn btn-ghost btn-circle relative">
                            <i class="fa-solid fa-shopping-cart text-2xl"></i>
                            @if (session('cart') && count(session('cart')) > 0)
                                <span class="absolute -top-1 -right-1 badge badge-primary badge-xs">
                                    {{ count(session('cart')) }}
                                </span>
                            @endif
                        </a>
                        <div class="dropdown dropdown-end">
                            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                <i class="fa-solid fa-user text-2xl"></i>
                            </label>
                            <ul tabindex="0" class="mt-3 z-50 p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                                <li><a href="#">Profile</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endauth

                    <!-- Admin Link (visible only to admin) -->
                    @if(auth()->check() && auth()->user()->email === 'admin@yiponline.com')
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-warning">Admin</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-neutral text-neutral-content mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-4xl">🛍️</span>
                        <span class="text-3xl font-bold">YipMart</span>
                    </div>
                    <p class="text-neutral-content/70">Premium African products helping businesses scale across the continent.</p>
                </div>
                
                <div>
                    <h4 class="font-semibold text-lg mb-4">Shop</h4>
                    <ul class="space-y-2 text-neutral-content/70">
                        <li><a href="{{ route('home') }}" class="hover:text-white">All Products</a></li>
                        <li><a href="#" class="hover:text-white">Fashion & Fabrics</a></li>
                        <li><a href="#" class="hover:text-white">Beauty & Care</a></li>
                        <li><a href="#" class="hover:text-white">Food & Spices</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold text-lg mb-4">Company</h4>
                    <ul class="space-y-2 text-neutral-content/70">
                        <li><a href="#" class="hover:text-white">About YipOnline</a></li>
                        <li><a href="#" class="hover:text-white">Our Mission</a></li>
                        <li><a href="#" class="hover:text-white">Careers</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold text-lg mb-4">Support</h4>
                    <ul class="space-y-2 text-neutral-content/70">
                        <li><a href="#" class="hover:text-white">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white">Shipping Policy</a></li>
                        <li><a href="#" class="hover:text-white">Returns</a></li>
                    </ul>
                    <div class="mt-6">
                        <p class="text-sm">Made with ❤️ for African businesses</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-neutral-content/20 mt-12 pt-8 text-center text-sm text-neutral-content/60">
                &copy; {{ date('Y') }} YipMart • Case Study for YipOnline PHP Full Stack Developer Role
            </div>
        </div>
    </footer>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</body>
</html>
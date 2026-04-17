@extends('yip_ecommerce::layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-20 px-4">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="text-3xl font-bold text-center mb-8">Welcome Back</h2>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success mb-4">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            class="input input-bordered w-full" 
                            placeholder="you@example.com" />
                        @error('email')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-control mb-6">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            required 
                            class="input input-bordered w-full" />
                        @error('password')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="cursor-pointer flex items-center gap-2">
                            <input type="checkbox" name="remember" class="checkbox checkbox-primary" />
                            <span class="label-text">Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               class="text-sm text-primary hover:underline">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Log in
                    </button>
                </form>

                <div class="text-center mt-6 text-sm">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-primary hover:underline">Register here</a>
                </div>
            </div>
        </div>
    </div>
@endsection
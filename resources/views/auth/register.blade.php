@extends('yip_ecommerce::layouts.app')

@section('content')
    <div class="max-w-md mx-auto mt-20 px-4">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="text-3xl font-bold text-center mb-8">Create an Account</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text">Full Name</span>
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required 
                            autofocus 
                            class="input input-bordered w-full" 
                            placeholder="John Doe" />
                        @error('name')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text">Email Address</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            class="input input-bordered w-full" 
                            placeholder="you@example.com" />
                        @error('email')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-control mb-4">
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

                    <!-- Confirm Password -->
                    <div class="form-control mb-6">
                        <label class="label">
                            <span class="label-text">Confirm Password</span>
                        </label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            class="input input-bordered w-full" />
                        @error('password_confirmation')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mb-4">
                        Register
                    </button>

                    <div class="text-center text-sm">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-primary hover:underline">
                            Log in here
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.master')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-green-100 via-green-50 to-green-200">
    <div class="bg-white p-10 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Input -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" 
                    required 
                    placeholder="Masukan email"
                >
            </div>
            <!-- Password Input -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" 
                    required 
                    placeholder="Masukan password"
                >
            </div>
            <!-- Submit Button -->
            <div>
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-green-600 to-green-500 text-white py-3 rounded-lg shadow-md font-semibold hover:shadow-lg hover:from-green-700 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                >
                    Login
                </button>
            </div>
        </form>
        <!-- Register Link -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600">
                Tidak Punya Akun? 
                <a 
                    href="{{ route('register') }}" 
                    class="text-green-600 font-medium hover:underline hover:text-green-700 transition"
                >
                    Register
                </a>
            </p>
        </div>
    </div>
</div>

@endsection

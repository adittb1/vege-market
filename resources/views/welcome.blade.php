@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <div class="bg-gradient-to-r from-green-100 to-green-200 py-16">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold text-green-900 mb-4">Welcome to Fresh Fruit Market ✨</h1>
            <p class="mt-4 text-gray-700 text-lg">Your one-stop shop for fresh, juicy, and organic fruits. Enjoy the best quality at unbeatable prices!</p>
            <a href="#products" class="mt-6 inline-block bg-green-600 text-white py-3 px-6 rounded-full shadow-lg hover:bg-green-700 transition transform hover:scale-105">Browse Fruits</a>
        </div>
    </div>

    <div id="products" class="mt-16 container mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Our Fresh Picks 🍎</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition transform hover:scale-105">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
                        <p class="text-gray-600 mt-2 text-sm truncate">{{ Str::limit($product->description, 50) }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-green-600 font-bold text-lg">${{ $product->price }}</span>
                            @auth
                                <a href="{{ route('checkout.form', $product->product_id) }}" class="bg-green-600 text-white py-2 px-4 rounded-full hover:bg-green-700 text-sm">Add</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="bg-gradient-to-r from-green-500 to-green-700 text-white py-16 mt-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">Join Our Fruit Club! 🌟</h2>
            <p class="mt-4 text-lg">Get exclusive deals, fresh arrivals, and weekly discounts directly in your inbox.</p>
            <form class="mt-8 flex justify-center">
                <input type="email" placeholder="Enter your email" class="py-3 px-6 rounded-l-full text-gray-800 w-1/2 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                <button type="submit" class="bg-white text-green-600 py-3 px-8 rounded-r-full font-bold hover:bg-gray-200 transition">Subscribe</button>
            </form>
        </div>
    </div>
@endsection

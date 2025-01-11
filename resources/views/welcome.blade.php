@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800">Welcome to Vege Market</h1>
    <p class="mt-4 text-gray-600">Discover fresh vegetables and enjoy easy transactions!</p>

    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                    <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                    <div class="mt-4">
                        <span class="text-green-600 font-bold">${{ $product->price }}</span>
                    </div>
                    @auth
                        <div class="mt-4">
                            <a href="{{ route('checkout.form', $product->product_id) }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Add to Cart</a>
                        </div>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
@endsection

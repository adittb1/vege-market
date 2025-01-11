@extends('layouts.admin')

@section('title', 'All Products')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">All Products</h1>

        <div class="mb-4">
            <a href="{{ route('admin.products.create') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Add Product</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            @if($products->isEmpty())
                <p class="text-gray-600">There are no products here.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $product->product_name }}</h3>
                                <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                                <div class="mt-4">
                                    <span class="text-green-600 font-bold">${{ $product->price }}</span>
                                </div>
                                <div class="mt-4">
                                    <span class="text-gray-600">Stock: {{ $product->stock }}</span>
                                </div>
                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('admin.products.edit', $product->product_id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->product_id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Add Product</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="product_name" class="block text-gray-700">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea name="description" id="description" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600"></textarea>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Price</label>
                    <input type="number" name="price" id="price" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Image</label>
                    <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-gray-700">Stock</label>
                    <input type="number" name="stock" id="stock" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div>
                    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

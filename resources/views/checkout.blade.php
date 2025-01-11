@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Checkout</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center mb-6">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-48 h-48 object-cover rounded-lg mr-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $product->name }}</h2>
                    <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                    <p class="text-gray-800 font-bold mt-4">Price: ${{ $product->price }}</p>
                    <p class="text-gray-800 font-bold">Total Stock: {{ $product->stock }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('checkout') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" min="1" required>
                </div>
                <div class="mb-4">
                    <p id="total-price" class="text-gray-800 font-bold">Total Price: $0.00</p>
                </div>
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('dashboard') }}" class="bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700">Cancel</a>
                    <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Checkout</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('quantity').addEventListener('input', function() {
        const quantity = this.value;
        const totalPrice = {{ $product->price }} * quantity;
        document.getElementById('total-price').innerText = 'Total Price: $' + totalPrice.toFixed(2);
    });
</script>
@endsection

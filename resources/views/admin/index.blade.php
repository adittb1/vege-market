@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Users Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Users</h2>
                <p class="mt-2 text-gray-600">Manage all users</p>
                <a href="#" class="mt-4 inline-block bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">View Users</a>
            </div>

            <!-- Products Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Products</h2>
                <p class="mt-2 text-gray-600">Manage all products</p>
                <a href="#" class="mt-4 inline-block bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">View Products</a>
            </div>

            <!-- Transactions Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Transactions</h2>
                <p class="mt-2 text-gray-600">Manage all transactions</p>
                <a href="#" class="mt-4 inline-block bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">View Transactions</a>
            </div>
        </div>
    </div>
</div>
@endsection

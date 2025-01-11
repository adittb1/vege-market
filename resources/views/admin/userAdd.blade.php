@extends('layouts.admin')

@section('title', 'Add User')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Add User</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div>
                    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit User</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form method="POST" action="{{ route('admin.users.update', $user->user_id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700">Role</label>
                    <select name="role" id="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" required>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                    <small class="text-gray-600">Leave blank to keep current password</small>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                </div>
                <div>
                    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

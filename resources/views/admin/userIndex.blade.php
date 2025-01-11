@extends('layouts.admin')

@section('title', 'All Users')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">All Users</h1>

        <div class="mb-4">
            <a href="{{ route('admin.users.create') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Add User</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            @if($users->isEmpty())
                <p class="text-gray-600">There is no user here.</p>
            @else
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">ID</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Name</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Email</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Role</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $user->user_id }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $user->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $user->role }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    <a href="{{ route('admin.users.edit', $user->user_id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection

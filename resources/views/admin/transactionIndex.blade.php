@extends('layouts.admin')

@section('title', 'All Transactions')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">All Transactions</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            @if($transactions->isEmpty())
                <p class="text-gray-600">There are no transactions here.</p>
            @else
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">ID</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">User</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Total</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Status</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Date</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->transaction_id }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->user->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->price }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    <form method="POST" action="{{ route('admin.transactions.update', $transaction->transaction_id) }}">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" onchange="this.form.submit()">
                                            <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="completed" {{ $transaction->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ $transaction->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->created_at->format('Y-m-d') }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    <form method="POST" action="{{ route('admin.transactions.destroy', $transaction->transaction_id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</button>
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

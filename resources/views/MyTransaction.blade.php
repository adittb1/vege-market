@extends('layouts.master')

@section('title', 'My Transactions')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">My Transactions</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            @if($transactions->isEmpty())
                <p class="text-gray-600">You have no transactions.</p>
            @else
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">ID</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Product</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Quantity</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Price</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Status</th>
                            <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->transaction_id }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->product->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->quantity }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">${{ $transaction->price }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->status }}</td>
                                <td class="py-2 px-4 border-b border-gray-200">{{ $transaction->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection

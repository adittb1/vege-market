<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->get();
        return view('admin.transactionIndex', compact('transactions'));
    }

    public function update(Request $request, $transaction_id)
    {
        $transaction = Transaction::findOrFail($transaction_id);
        $transaction->status = $request->input('status');
        $transaction->save();

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction status updated successfully.');
    }
}

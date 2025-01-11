<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function showCheckoutForm(Product $product)
    {
        return view('checkout', compact('product'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Check if the requested quantity is available
        if ($request->quantity > $product->stock) {
            return back()->withErrors(['quantity' => 'The requested quantity exceeds the available stock.']);
        }

        $totalPrice = $product->price * $request->quantity;

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $totalPrice,
            'status' => 'pending',
        ]);

        // Update the product stock
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('dashboard')->with('success', 'Checkout successful.');
    }

    public function transactions()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return view('MyTransaction', compact('transactions'));
    }

}

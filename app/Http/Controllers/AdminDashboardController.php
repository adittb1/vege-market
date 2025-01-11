<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil data statistik yang akan ditampilkan
        $totalUsers = User::count(); // Jumlah total user
        $totalProducts = Product::count(); // Jumlah total produk
        $totalTransactions = Transaction::count(); // Jumlah total transaksi
        $recentTransactions = Transaction::latest()->take(5)->get(); // 5 transaksi terakhir

        // Menampilkan dashboard dengan data statistik
        return view('admin.index', compact(
            'totalUsers',
            'totalProducts',
            'totalTransactions',
            'recentTransactions'
        ));
    }
}

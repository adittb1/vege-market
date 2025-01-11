<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::all();
        return view('admin.productIndex', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('admin.productCreate');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer|min:0',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Create the product
        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form edit produk
    public function edit(Product $product)
    {
        return view('admin.productEdit', compact('product'));
    }

    // Memperbarui produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer|min:0',
        ]);

    // Handle the file upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }

    // Update the product
    $product->product_name = $request->product_name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->stock = $request->stock;
    $product->save();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
    // Delete the image file
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }

    // Delete the product
    $product->delete();

    return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}

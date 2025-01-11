<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        $users = User::all();
        return view('admin.userIndex', compact('users'));
    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('admin.userAdd');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Menampilkan form edit user
    public function edit(User $user)
    {
        return view('admin.userEdit', compact('user'));
    }

    // Memperbarui user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'role' => 'required|in:admin,customer',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    // Menghapus user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}

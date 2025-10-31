<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Display list of admin users
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('dashboard.admin', compact('users'));
    }

    /**
     * Store a new admin user
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(),
        ]);

        Session::flash('success', 'Akun admin berhasil ditambahkan!');
        return redirect()->route('dashboard.admin');
    }

    /**
     * Update an existing admin user
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Only update password if provided
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        Session::flash('success', 'Akun admin berhasil diperbarui!');
        return redirect()->route('dashboard.admin');
    }

    /**
     * Delete an admin user
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting own account
        if ($user->id === auth()->id()) {
            Session::flash('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
            return redirect()->route('dashboard.admin');
        }

        // Prevent deleting last admin
        if (User::count() <= 1) {
            Session::flash('error', 'Tidak dapat menghapus akun admin terakhir!');
            return redirect()->route('dashboard.admin');
        }

        $user->delete();

        Session::flash('success', 'Akun admin berhasil dihapus!');
        return redirect()->route('dashboard.admin');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            User::create([
                'name'      => $request->name,
                'username'  => $request->username,
                'password'  => Hash::make($request->password),
                'role'      => $request->role
            ]);
            return redirect('user')->with('success', 'Data pengguna berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect('user')->with('error', 'Terjadi kesalahan saat menambahkan data pengguna.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('user.update', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        try {
            $user = User::findOrFail($user_id);

            // Update data lainnya
            $user->name = $request->name;
            $user->username = $request->username;
            $user->role = $request->role;

            // Jika password baru diisi, enkripsi dan simpan
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }

            $user->save();
            return redirect('user')->with('success', 'Data pengguna berhasil diubah.');
        } catch (\Exception $e) {
            return redirect('user')->with('error', 'Terjadi kesalahan saat mengubah data pengguna.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        try {
            $user = User::findOrFail($user_id);
            $user->delete();

            session()->flash('success', 'Data pengguna berhasil dihapus.');

            return response()->json([
                'message' => 'Data pengguna berhasil dihapus.'
            ], 200);
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menghapus data pengguna.');

            return response()->json([
                'message' => 'Gagal menghapus data pengguna.'
            ], 500);
        }
    }

}

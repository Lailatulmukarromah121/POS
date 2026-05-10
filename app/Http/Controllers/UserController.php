<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class UserController extends Controller
{
    // Menampilkan semua data user
    public function index()
    {
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }

    // Menampilkan form tambah user
    public function tambah()
    {
        return view('user_tambah');
    }

    // Menyimpan data user baru
    public function tambah_simpan(Request $request)
    {
        // Gunakan validasi agar tidak error jika data kosong
        $request->validate([
            'username' => 'required',
            'nama'     => 'required',
            'password' => 'required',
            'level_id' => 'required',
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);

        return redirect('/user');
    }

    // Menambahkan 'string' atau 'int' pada $id untuk menghilangkan warning Intelephense
    public function ubah(string $id)
    {
        $user = UserModel::find($id);
        
        if (!$user) {
            return redirect('/user')->with('error', 'Data tidak ditemukan');
        }

        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan(string $id, Request $request)
    {
        $user = UserModel::find($id);

        if ($user) {
            $user->username = $request->username;
            $user->nama = $request->nama;
            
            // Logika ini sudah bagus: password hanya di-hash jika diinput ulang
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            
            $user->level_id = $request->level_id;
            $user->save();
        }

        return redirect('/user');
    }

    public function hapus(string $id)
    {
        $user = UserModel::find($id);
        
        if ($user) {
            $user->delete();
        }

        return redirect('/user');
    }
}
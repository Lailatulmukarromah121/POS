<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    // 1. Edit bagian index untuk menampilkan daftar
    public function index()
    {
        return "Menampilkan daftar foto (Halaman Index)";
    }

    // 2. Edit bagian show untuk menampilkan detail berdasarkan ID
    public function show(string $id)
    {
        return "Menampilkan detail foto dengan ID: " . $id;
    }
    
    // Fungsi lainnya (create, store, edit, update, destroy) 
    // bisa dibiarkan kosong dulu untuk sementara.
}
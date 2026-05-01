<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller 
{
    /**
     * Menampilkan halaman utama
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'title' => 'Halaman Home',
            'welcome_message' => 'Selamat Datang di Sistem POS'
        ];
        return view('home', $data);
    }
}
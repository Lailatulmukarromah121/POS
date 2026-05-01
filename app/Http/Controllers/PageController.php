<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // GET /
    public function index()
    {
        return "Selamat Datang";
    }

    // GET /about
    public function about()
    {
        return "Nama: Laylaa tul | NIM: LA25";
    }

    // GET /articles/{id}
    public function articles(string $id)
    {
        return "Halaman Artikel dengan ID: " . $id;
    }
}
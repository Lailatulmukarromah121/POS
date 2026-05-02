<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'BRG01', 'barang_nama' => 'Indomie Goreng', 'harga_beli' => 2500, 'harga_jual' => 3000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'BRG02', 'barang_nama' => 'Sari Roti', 'harga_beli' => 5000, 'harga_jual' => 6000],
            ['barang_id' => 3, 'kategori_id' => 1, 'barang_kode' => 'BRG03', 'barang_nama' => 'Chitato', 'harga_beli' => 8000, 'harga_jual' => 10000],
            ['barang_id' => 4, 'kategori_id' => 1, 'barang_kode' => 'BRG04', 'barang_nama' => 'Bimoli 1L', 'harga_beli' => 15000, 'harga_jual' => 18000],
            ['barang_id' => 5, 'kategori_id' => 1, 'barang_kode' => 'BRG05', 'barang_nama' => 'Gula Pasir 1kg', 'harga_beli' => 12000, 'harga_jual' => 14000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Menampilkan halaman transaksi/penjualan POS
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Data transaksi penjualan
        $transactions = [
            [
                'id' => 'TRX001',
                'date' => '2024-05-01 10:30:00',
                'items' => [
                    ['name' => 'Kopi Arabika Premium', 'qty' => 2, 'price' => 35000, 'total' => 70000],
                    ['name' => 'Teh Chamomile', 'qty' => 1, 'price' => 15000, 'total' => 15000]
                ],
                'subtotal' => 85000,
                'tax' => 8500,
                'total' => 93500,
                'payment_method' => 'Cash',
                'cashier' => 'Ahmad Hermawan'
            ],
            [
                'id' => 'TRX002',
                'date' => '2024-05-01 11:15:00',
                'items' => [
                    ['name' => 'Sabun Wajah Alami', 'qty' => 3, 'price' => 45000, 'total' => 135000],
                    ['name' => 'Vitamin C Serum', 'qty' => 1, 'price' => 85000, 'total' => 85000]
                ],
                'subtotal' => 220000,
                'tax' => 22000,
                'total' => 242000,
                'payment_method' => 'Debit Card',
                'cashier' => 'Siti Nurhaliza'
            ],
            [
                'id' => 'TRX003',
                'date' => '2024-05-01 12:45:00',
                'items' => [
                    ['name' => 'Pembersih Lantai', 'qty' => 2, 'price' => 25000, 'total' => 50000],
                    ['name' => 'Detergen Cair', 'qty' => 1, 'price' => 30000, 'total' => 30000],
                    ['name' => 'Disinfektan Spray', 'qty' => 1, 'price' => 35000, 'total' => 35000]
                ],
                'subtotal' => 115000,
                'tax' => 11500,
                'total' => 126500,
                'payment_method' => 'Cash',
                'cashier' => 'Ahmad Riyanto'
            ]
        ];

        $data = [
            'title' => 'Halaman Penjualan',
            'transactions' => $transactions
        ];

        return view('sales', $data);
    }
}

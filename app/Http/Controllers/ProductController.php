<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan produk berdasarkan kategori
     * 
     * @param string $category
     * @return \Illuminate\View\View
     */
    public function showByCategory($category)
    {
        // Data produk berdasarkan kategori
        $products = [
            'food-beverage' => [
                'category_name' => 'Makanan & Minuman',
                'category_slug' => 'food-beverage',
                'items' => [
                    [
                        'id' => 1,
                        'name' => 'Kopi Arabika Premium',
                        'price' => 35000,
                        'stock' => 50,
                        'description' => 'Kopi pilihan dari daerah Toraja'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Teh Chamomile',
                        'price' => 15000,
                        'stock' => 100,
                        'description' => 'Teh herbal organik berkualitas'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Jus Jeruk Segar',
                        'price' => 20000,
                        'stock' => 75,
                        'description' => 'Jus jeruk murni tanpa pemanis'
                    ]
                ]
            ],
            'beauty-health' => [
                'category_name' => 'Kecantikan & Kesehatan',
                'category_slug' => 'beauty-health',
                'items' => [
                    [
                        'id' => 4,
                        'name' => 'Sabun Wajah Alami',
                        'price' => 45000,
                        'stock' => 30,
                        'description' => 'Sabun wajah dengan bahan alami'
                    ],
                    [
                        'id' => 5,
                        'name' => 'Vitamin C Serum',
                        'price' => 85000,
                        'stock' => 20,
                        'description' => 'Serum vitamin C untuk kulit cerah'
                    ],
                    [
                        'id' => 6,
                        'name' => 'Masker Wajah Gel',
                        'price' => 55000,
                        'stock' => 40,
                        'description' => 'Masker gel untuk perawatan kulit'
                    ]
                ]
            ],
            'home-care' => [
                'category_name' => 'Perawatan Rumah',
                'category_slug' => 'home-care',
                'items' => [
                    [
                        'id' => 7,
                        'name' => 'Pembersih Lantai',
                        'price' => 25000,
                        'stock' => 60,
                        'description' => 'Cairan pembersih lantai dengan harum segar'
                    ],
                    [
                        'id' => 8,
                        'name' => 'Detergen Cair',
                        'price' => 30000,
                        'stock' => 80,
                        'description' => 'Detergen dengan formula enzim'
                    ],
                    [
                        'id' => 9,
                        'name' => 'Disinfektan Spray',
                        'price' => 35000,
                        'stock' => 50,
                        'description' => 'Spray disinfektan untuk membunuh kuman'
                    ]
                ]
            ],
            'baby-kid' => [
                'category_name' => 'Bayi & Anak-anak',
                'category_slug' => 'baby-kid',
                'items' => [
                    [
                        'id' => 10,
                        'name' => 'Popok Bayi Ukuran M',
                        'price' => 120000,
                        'stock' => 40,
                        'description' => 'Popok bayi dengan teknologi penyerapan maksimal'
                    ],
                    [
                        'id' => 11,
                        'name' => 'Susu Formula Bayi',
                        'price' => 95000,
                        'stock' => 25,
                        'description' => 'Susu formula dengan nutrisi lengkap'
                    ],
                    [
                        'id' => 12,
                        'name' => 'Mainan Edukatif Bayi',
                        'price' => 75000,
                        'stock' => 35,
                        'description' => 'Mainan bayi yang mengembangkan motorik'
                    ]
                ]
            ]
        ];

        // Cek apakah kategori ada
        if (isset($products[$category])) {
            $categoryData = $products[$category];
            $data = [
                'title' => 'Kategori Produk: ' . $categoryData['category_name'],
                'category' => $categoryData,
                'category_slug' => $category
            ];
            return view('category', $data);
        } else {
            $data = [
                'title' => 'Kategori Tidak Ditemukan',
                'error' => 'Kategori produk "' . $category . '" tidak ditemukan.',
                'available_categories' => [
                    'food-beverage' => 'Makanan & Minuman',
                    'beauty-health' => 'Kecantikan & Kesehatan',
                    'home-care' => 'Perawatan Rumah',
                    'baby-kid' => 'Bayi & Anak-anak'
                ]
            ];
            return view('category', $data);
        }
    }
}

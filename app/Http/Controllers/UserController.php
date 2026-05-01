<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan profil user berdasarkan ID dan nama
     * 
     * @param int $id
     * @param string $name
     * @return \Illuminate\View\View
     */
    public function profile($id, $name)
    {
        // Data dummy user
        $users = [
            1 => [
                'id' => 1,
                'name' => 'ahmad',
                'full_name' => 'Ahmad Hermawan',
                'email' => 'ahmad@posmaju.id',
                'role' => 'Admin',
                'department' => 'Development',
                'phone' => '08123456789',
                'join_date' => '2021-06-15'
            ],
            2 => [
                'id' => 2,
                'name' => 'siti',
                'full_name' => 'Siti Nurhaliza',
                'email' => 'siti@posmaju.id',
                'role' => 'Manager',
                'department' => 'Operations',
                'phone' => '08124567890',
                'join_date' => '2021-07-20'
            ],
            5 => [
                'id' => 5,
                'name' => 'ahmad',
                'full_name' => 'Ahmad Riyanto',
                'email' => 'ahmad.riyanto@posmaju.id',
                'role' => 'Cashier',
                'department' => 'Sales',
                'phone' => '08125678901',
                'join_date' => '2022-01-10'
            ]
        ];

        // Cek apakah user dengan ID tersebut ada
        if (isset($users[$id])) {
            $user = $users[$id];
            
            // Validasi nama user (parameter name harus sesuai dengan nama user di database)
            if (strtolower($user['name']) === strtolower($name)) {
                $data = [
                    'title' => 'Profil User',
                    'user' => $user
                ];
                return view('user', $data);
            } else {
                $data = [
                    'title' => 'Profil User',
                    'error' => 'Nama user tidak sesuai dengan ID.'
                ];
                return view('user', $data);
            }
        } else {
            $data = [
                'title' => 'Profil User',
                'error' => 'User dengan ID ' . $id . ' tidak ditemukan.'
            ];
            return view('user', $data);
        }
    }
}

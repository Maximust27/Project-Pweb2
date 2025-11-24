<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class User extends Controller
{
    public function profile()
    {
        //ini data dummy aku belum buat databasenya
        $data = [
            'title' => 'Profile',
            'profile' => [
                'nama'  => 'Rocky Gerung',
                'email' => 'rockybatu@gmail.com',
                'telp'  => '082237789876',
                'foto'  => 'https://cdn-icons-png.flaticon.com/512/847/847969.png'
            ],
            'pesanan_saat_ini' => [
                [
                    'nama' => 'Rocky Gerung',
                    'layanan' => 'Hair Trimming',
                    'waktu' => '08.00 WIB',
                    'tanggal' => '24-9-2025',
                    'status' => 'Dibatalkan'
                ],
                [
                    'nama' => 'Rocky Gerung',
                    'layanan' => 'Conrow',
                    'waktu' => '10.00 WIB',
                    'tanggal' => '01-8-2025',
                    'status' => 'On progress'
                ]
            ],
            'riwayat_pesanan' => [
                [
                    'nama' => 'Rocky Gerung',
                    'layanan' => 'Hair Trimming',
                    'waktu' => '08.00 WIB',
                    'tanggal' => '24-9-2025',
                    'status' => 'Selesai'
                ],
                [
                    'nama' => 'Rocky Gerung',
                    'layanan' => 'Conrow',
                    'waktu' => '16.00 WIB',
                    'tanggal' => '01-8-2025',
                    'status' => 'Selesai'
                ]
            ]
        ];

        return view('user/profile', $data);
    }
}

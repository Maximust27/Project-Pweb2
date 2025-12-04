<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // --- HAIRCUT ---
            [
                'service_name' => 'Basic Haircut',
                'category'     => 'Haircut',
                'price'        => 25000,
                'image'        => 'gambar_basic.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
            [
                'service_name' => 'Beard Trim',
                'category'     => 'Haircut',
                'price'        => 25000,
                'image'        => 'gambar_beard.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
            [
                'service_name' => 'Cornrow',
                'category'     => 'Haircut',
                'price'        => 125000,
                'image'        => 'gambar_cornrow.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
            [
                'service_name' => 'Gimbal / Dreadlock',
                'category'     => 'Haircut',
                'price'        => 125000,
                'image'        => 'gambar_gimbal.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],

            // --- COLORING ---
            [
                'service_name' => 'Basic Coloring',
                'category'     => 'Coloring',
                'price'        => 100000,
                'image'        => 'gambar_coloring.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
            [
                'service_name' => 'Bleaching',
                'category'     => 'Coloring',
                'price'        => 100000,
                'image'        => 'gambar_bleaching.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
            [
                'service_name' => 'Bleaching + Coloring',
                'category'     => 'Coloring',
                'price'        => 120000,
                'image'        => 'gambar_bleaching_coloring.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
            [
                'service_name' => 'Bleaching + Buzzcut',
                'category'     => 'Coloring',
                'price'        => 120000,
                'image'        => 'gambar_bleaching_buzzcut.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],

            // --- PERMING ---
            [
                'service_name' => 'Hair Perm',
                'category'     => 'Perming',
                'price'        => 100000,
                'image'        => 'gambar_hair_perm.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
            [
                'service_name' => 'Down Perm',
                'category'     => 'Perming',
                'price'        => 100000,
                'image'        => 'gambar_down_perm.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],

            // --- TREATMENT ---
            [
                'service_name' => 'Keratin Treatment',
                'category'     => 'Treatment',
                'price'        => 100000,
                'image'        => 'gambar_keratin_treatment.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
            [
                'service_name' => 'Creambath',
                'category'     => 'Treatment',
                'price'        => 100000,
                'image'        => 'gambar_creambath_treatment.jpg',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
            ],
        ];

        // Menggunakan insertBatch untuk memasukkan banyak data sekaligus
        $this->db->table('services')->insertBatch($data);
    }
}
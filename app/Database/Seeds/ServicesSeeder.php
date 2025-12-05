<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'service_name' => 'Cukur Basic',
                'price'        => 30000,
                'image'        => 'gambar_Basic.jpg',
            ],
            [
                'service_name' => 'Bleaching',
                'price'        => 120000,
                'image'        => 'gambar_Bleaching.jpg',
            ],
            [
                'service_name' => 'Perm',
                'price'        => 25000,
                'image'        => 'gambar_hair_perm.jpg',
            ],
        ];

        $this->db->table('services')->insertBatch($data);
    }
}

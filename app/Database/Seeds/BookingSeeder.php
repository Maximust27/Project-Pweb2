<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'service'    => 'Basic',
                'stylist'    => 'Tisna',
                'time'       => '09.00',
                'created_at' => Time::now(),
            ],
            [
                'service'    => 'Down Perm',
                'stylist'    => 'Pinkky',
                'time'       => '10.00',
                'created_at' => Time::now(),
            ],
            // Tambahkan data lain jika perlu
            [
                'service'    => 'Haircut',
                'stylist'    => 'Ahnaf',
                'time'       => '13.00',
                'created_at' => Time::now(),
            ],
        ];

        // Insert data ke tabel booking
        // Menggunakan insertBatch untuk memasukkan banyak data sekaligus
        $this->db->table('booking')->insertBatch($data);
    }
}
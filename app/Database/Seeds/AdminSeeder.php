<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'photo'       => 'default-user.png',
            'name'        => 'Rocky',
            'role'        => 'Master Of Hair cut',
            'full_name'   => 'Rocky Gerung',
            'description' => 'saya adalah rocky gerung mejadi penata rambut adalah profesi saya sadan saya sangat menykai profesi ini pokoke jos jis bolo semangat berjuang sukses',
            'skill_title' => 'Master Of Hair cut',
        ];

        // insert data
        $this->db->table('admin')->insert($data);
    }
}


//(kalo mau jalanin)
//php spark migrate
//php spark db:seed AdminSeeder 
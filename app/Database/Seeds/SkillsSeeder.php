<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SkillsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'admin_id'  => 1,
                'skill'     => null,
                'skill_name'=> 'Hair cut',
            ],
            [
                'admin_id'  => 1,
                'skill'     => null,
                'skill_name'=> 'Hair cut',
            ],
            [
                'admin_id'  => 1,
                'skill'     => null,
                'skill_name'=> 'Hair cut',
            ],
        ];

        $this->db->table('skills')->insertBatch($data);
    }
}


///(kalo mau jalanin)
// php spark migrate
// php spark db:seed SkillsSeeder 

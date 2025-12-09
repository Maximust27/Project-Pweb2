<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [ 
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'full_name' => [ 
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'role' => [ 
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'skill_title' => [ 
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'photo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('admins');
        
        $data = [
            [
                'name' => 'Tisna',
                'full_name' => 'Tisna Prima R',
                'role' => 'Master Of Hair cut',
                'description' => 'Saya adalah Tisna Prima R menjadi penata rambut adalah profesi saya sadan saya sangat menyukai profesi ini pokoke jos jis bolo semangat berjuang sukses',
                'skill_title' => 'Master Of Hair cut',
                'photo' => 'tisna.jpg'
            ],
            [
                'name' => 'Pinnki',
                'full_name' => 'Pinnki Wilianti',
                'role' => 'Senior Stylist',
                'description' => 'Saya adalah Pinnki Wilianti, spesialis pewarnaan dan styling rambut modern. Selalu update dengan tren terbaru untuk kepuasan pelanggan.',
                'skill_title' => 'Expert Colorist',
                'photo' => 'pinnki.jpg'
            ],
            [
                'name' => 'Ahnaf',
                'full_name' => 'Pradipa D Ahnaf',
                'role' => 'Top Barber',
                'description' => 'Saya adalah Pradipa D Ahnaf, ahli dalam potongan klasik dan modern. Detail dan presisi adalah kunci utama layanan saya.',
                'skill_title' => 'Precision Cutter',
                'photo' => 'ahnaf.jpg'
            ]
        ];

        $this->db->table('admins')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
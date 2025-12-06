<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSkillsTable extends Migration
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
            'admin_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'skill_name' => [ // Nama skill (contoh: Hair cut)
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id', true);
        
        // Foreign Key ke tabel admins
        $this->forge->addForeignKey('admin_id', 'admins', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('skills');

        // Insert dummy skills untuk admin ID 1
        $data = [
            ['admin_id' => 1, 'skill_name' => 'Hair cut'],
            ['admin_id' => 1, 'skill_name' => 'Shaving'],
            ['admin_id' => 1, 'skill_name' => 'Styling'],
            ['admin_id' => 2, 'skill_name' => 'Hair cut'],
            ['admin_id' => 2, 'skill_name' => 'Shaving'],
            ['admin_id' => 2, 'skill_name' => 'Styling'],
            ['admin_id' => 3, 'skill_name' => 'Hair cut'],
            ['admin_id' => 3, 'skill_name' => 'Shaving'],
            ['admin_id' => 3, 'skill_name' => 'Styling'],
        ];
        $this->db->table('skills')->insertBatch($data);
    }

    public function down()
    {
        $this->forge->dropTable('skills');
    }
}
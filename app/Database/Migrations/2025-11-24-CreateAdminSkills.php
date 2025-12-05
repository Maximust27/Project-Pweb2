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
                'null'       => true,
            ],
            'skill' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'skill_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
        ]);

        // Primary key
        $this->forge->addKey('id', true);

        // Optional: foreign key ke admin.id (kalau tabel admin sudah ada)
        $this->forge->addForeignKey('admin_id', 'admin', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('skills');
    }

    public function down()
    {
        $this->forge->dropTable('skills');
    }
}

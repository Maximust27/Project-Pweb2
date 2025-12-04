<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServicesTable extends Migration
{
    public function up()
    {
        // Hapus tabel lama jika ada agar bersih
        $this->forge->dropTable('services', true);

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'service_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            // Pastikan kolom ini ada
            'category' => [
                'type'       => 'ENUM',
                'constraint' => ['Haircut', 'Coloring', 'Perming', 'Treatment'],
                'default'    => 'Haircut',
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0.00,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('services');
    }

    public function down()
    {
        $this->forge->dropTable('services', true);
    }
}
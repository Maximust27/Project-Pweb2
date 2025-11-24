<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingTable extends Migration
{
    public function up()
    {
        // Mendefinisikan kolom sesuai screenshot phpMyAdmin kamu
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'service' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'stylist' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'time' => [
                'type'       => 'VARCHAR', // Kita pakai VARCHAR agar format "09.00" tetap aman
                'constraint' => '10',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            // Opsional: updated_at jika nanti dibutuhkan
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        // Menentukan Primary Key (id)
        $this->forge->addKey('id', true);
        
        // Membuat tabel 'booking'
        $this->forge->createTable('booking');
    }

    public function down()
    {
        // Menghapus tabel jika perintah migrate:rollback dijalankan
        $this->forge->dropTable('booking');
    }
}
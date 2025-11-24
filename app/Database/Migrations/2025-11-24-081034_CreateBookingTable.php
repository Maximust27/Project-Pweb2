<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingTables extends Migration
{
    public function up()
    {
        // 1. Tabel bookings (Untuk Data Header/Transaksi)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [ // Relasi ke tabel users
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'stylist' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'time' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'total_price' => [ // Untuk menyimpan total belanja
                'type'       => 'DECIMAL',
                'constraint' => '10,0', // Bisa menampung angka jutaan
                'default'    => 0
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bookings');

        // 2. Tabel booking_details (Untuk Rincian Service yg dipilih)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'booking_id' => [ // Kunci tamu ke tabel bookings
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'service_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'service_price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,0',
            ],
            'service_image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        // Optional: Menambahkan Foreign Key (agar aman)
        // $this->forge->addForeignKey('booking_id', 'bookings', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('booking_details');
    }

    public function down()
    {
        $this->forge->dropTable('booking_details');
        $this->forge->dropTable('bookings');
    }
}
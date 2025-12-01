<?php

namespace App\Models;
use CodeIgniter\Model;

class BookingAdmModel extends Model
{
    protected $table = 'booking_adm';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'client_name', 'service', 'tanggal', 'start_time', 'harga', 'status'
    ];

    // Fungsi search
    public function findBooking($cari)
    {
        return $this->table($this->table)
                    ->like('client_name', $cari)
                    ->orLike('service', $cari)
                    ->orLike('status', $cari);
    }

    public function getNewBookings($limit = 5)
    {
        return $this->where('status', 'new')
                    ->orderBy('tanggal', 'DESC')
                    ->findAll($limit);
    }
}

<?php
namespace App\Models;
use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'stylist', 'time', 'total_price', 'status'];
    protected $useTimestamps = true;

    // Fungsi cek slot tetap sama
    public function isBooked($time, $stylist)
    {
        return $this->where('time', $time)
                    ->where('stylist', $stylist)
                    ->where('status !=', 'canceled')
                    ->countAllResults() > 0;
    }
}
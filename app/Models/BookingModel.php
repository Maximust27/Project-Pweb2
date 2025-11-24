<?php

namespace App\Models;
use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $allowedFields = ['service', 'stylist', 'time'];

    public function isBooked($time, $stylist)
    {
        return $this->where('time', $time)
                    ->where('stylist', $stylist)
                    ->countAllResults() > 0;
    }
}
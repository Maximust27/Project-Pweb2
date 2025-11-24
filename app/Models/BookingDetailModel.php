<?php
namespace App\Models;
use CodeIgniter\Model;

class BookingDetailModel extends Model
{
    protected $table = 'booking_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['booking_id', 'service_name', 'service_price', 'service_image'];
}
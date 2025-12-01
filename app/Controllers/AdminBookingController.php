<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\UserModel;
use App\Models\BookingDetailModel;

class AdminBookingController extends BaseController
{
    public function index_adm()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('bookings');

        // 1. SELECT DATA
        $builder->select('
            bookings.id as booking_id,
            bookings.time,
            bookings.created_at,
            bookings.status, 
            bookings.total_price,
            users.name,
            users.email,
            GROUP_CONCAT(booking_details.service_name SEPARATOR ", ") as service_list
        ');

        // 2. JOIN YANG BENAR
        // Menggunakan "bookings.user_id" sesuai data database Anda
        $builder->join('users', 'users.id = bookings.user_id', 'left'); 
        
        $builder->join('booking_details', 'booking_details.booking_id = bookings.id', 'left');
        
        // 3. GROUP & ORDER
        $builder->groupBy('bookings.id');
        $builder->orderBy('bookings.created_at', 'DESC');

        $query = $builder->get();
        $data['bookings'] = $query->getResultArray();

        return view('admin/booking_adm', $data);
    }

    public function updateStatus($id, $status)
    {
        $model = new BookingModel();
        
        if(in_array($status, ['completed', 'canceled'])) {
            $model->update($id, ['status' => $status]);
        }
        
        return redirect()->to('/admin/booking_adm'); // Pastikan ini redirect atau me-load view dengan data terbaru jika perlu
    }
}
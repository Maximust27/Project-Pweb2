<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\UserModel;
use App\Models\BookingDetailModel;

class AdminBookingController extends BaseController
{
    public function index_adm()
    {
        $db = \Config\Database::connect();

        // --- B. LOGIKA RECENT BOOKINGS DENGAN FILTER & SEARCH ---
        
        // 1. Tangkap filter & search dari URL
        $filterStatus = $this->request->getVar('filter') ?? 'pending';
        $keyword      = $this->request->getVar('search'); // Tangkap keyword search

        $builder = $db->table('bookings');

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

        $builder->join('users', 'users.id = bookings.user_id', 'left'); 
        $builder->join('booking_details', 'booking_details.booking_id = bookings.id', 'left');
        
        // 2. Terapkan Filter Status (Pending/Canceled/Completed)
        if ($filterStatus == 'canceled') {
            $builder->where('bookings.status', 'canceled');
        } elseif ($filterStatus == 'completed') {
            $builder->where('bookings.status', 'completed');
        } else {
            // Default: Upcoming / Pending
            $builder->where('bookings.status', 'pending');
        }

        // 3. Terapkan Filter Search (JIKA ADA KEYWORD)
        // Kita bungkus dalam groupStart/End agar logika 'OR' tidak merusak filter Status 'AND' di atas
        if ($keyword) {
            $builder->groupStart();
                $builder->like('users.name', $keyword);
                $builder->orLike('users.email', $keyword);
                $builder->orLike('booking_details.service_name', $keyword);
            $builder->groupEnd();
        }

        $builder->groupBy('bookings.id');
        
        // Urutkan: Pending (dari tanggal terdekat yg akan datang), History (dari yg terbaru dibuat)
        if($filterStatus == 'pending') {
            $builder->orderBy('bookings.created_at', 'ASC'); 
        } else {
            $builder->orderBy('bookings.created_at', 'DESC');
        }
        
        $query = $builder->get();
        $bookings = $query->getResultArray();

        // --- C. PACKING DATA KE VIEW ---
        $data = [
            'title'        => 'Dashboard',
            'user_name'    => session()->get('name') ?? 'Admin',
            'bookings'      => $bookings,
            'current_filter' => $filterStatus,
            'keyword'        => $keyword // Kirim keyword balik ke view agar input tidak kosong setelah reload
        ];

        // Menggunakan booking_adm karena itu nama file view saat ini
        return view('admin/booking_adm', $data);
    }

    public function updateStatus($id, $status)
    {
        $model = new BookingModel();
        
        if(in_array($status, ['completed', 'canceled'])) {
            $model->update($id, ['status' => $status]);
        }
        
        // PERUBAHAN DISINI:
        // Menggunakan redirect()->back() agar tetap di halaman yang sama (mempertahankan filter & search)
        // alih-alih memaksa redirect ke filter=pending.
        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }
}
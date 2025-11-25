<?php

namespace App\Controllers;

use App\Models\BookingModel;

class AdminBookingController extends BaseController
{
    public function index_adm()
    {
        $booking = new BookingModel();
        $data['bookings'] = $booking->findAll();

        return view('admin/booking_adm', $data);
    }

    public function dashboard()
{
    $db = \Config\Database::connect();

    $builder = $db->table('booking')
        ->select('booking.*, booking_details.service_name')
        ->join('booking_details', 'booking_details.booking_id = booking.id')
        ->orderBy('booking.date', 'DESC')
        ->limit(5);

    $data['recentBookings'] = $builder->get()->getResultArray();

    return view('admin/dashboard-admin', $data);
}
}

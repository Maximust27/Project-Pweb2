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
}

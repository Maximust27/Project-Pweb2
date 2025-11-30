<?php

namespace App\Controllers;

use App\Models\BookingModel;

class AdminBookingController extends BaseController
{
    public function index_adm()
    {
        $booking = new BookingModel(); //bikin object model
        $data['bookings'] = $booking->findAll(); //ambil semua data dari tabel booking disimpan ke $data['bookings']

        return view('admin/booking_adm', $data); //Mengirim data ke tampilan booking_adm
    }
}

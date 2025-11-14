<?php

namespace App\Controllers;

class BookingController extends BaseController
{
    public function Index()
    {
        return view('booking/booking');
    }
}
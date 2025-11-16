<?php
namespace App\Controllers;
use App\Models\BookingModel;

class BookingController extends BaseController
{
    public function index()
    {
        $bookingModel = new BookingModel();
    
        $slots = ['09.00','10.00','11.00','12.00','13.00','14.00','15.00','16.00','17.00','18.00','19.00','20.00'];
    
        $data = [
            'slots' => $slots,
            'bookingModel' => $bookingModel
        ];
    
        return view('booking/booking', $data);
    }

    public function save()
    {
        $booking = new BookingModel();

        $booking->save([
            'service' => $this->request->getPost('service'),
            'stylist' => $this->request->getPost('stylist'),
            'time'    => $this->request->getPost('time'),
        ]);

        return redirect()->to('/booking');
    }

}

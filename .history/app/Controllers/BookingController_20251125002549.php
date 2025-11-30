<?php
namespace App\Controllers;
use App\Models\BookingModel;
use App\Models\BookingDetailModel;

class BookingController extends BaseController
{
    public function index()
    {
        $bookingModel = new BookingModel();
        
        $slots = ['09.00','10.00','11.00','12.00','13.00','14.00','15.00','16.00','17.00','18.00','19.00','20.00'];

        $stylist = $this->request->getGet('stylist') ?? null;

        $data = [
            'slots' => $slots,
            'stylist' => $stylist,
            'bookingModel' => $bookingModel
        ];

        return view('layoutuser/booking', $data);
    }


    public function getSlots()
    {
        $bookingModel = new BookingModel();
        $slots = ['09.00','10.00','11.00','12.00','13.00','14.00','15.00','16.00','17.00','18.00','19.00','20.00'];

        // Ambil stylist dari parameter GET
        $stylist = $this->request->getGet('stylist');

        $result = [];
        foreach ($slots as $slot) {
            $result[] = [
                'time'   => $slot,
                // Cek apakah stylist tersebut sudah dibooking di jam ini
                'booked' => $stylist ? $bookingModel->isBooked($slot, $stylist) : false
            ];
        }

        return $this->response->setJSON($result);
    }


    public function save()
    {
        $bookingModel = new BookingModel();
        $detailModel  = new BookingDetailModel();
        
        // 1. Ambil data dari form
        // Anggap user_id diambil dari session login (Wajib ada tabel user dulu)
        $userId = session()->get('id') ?? 1; // Contoh id=1 jika belum ada login
        
        $stylist = $this->request->getPost('stylist');
        $time    = $this->request->getPost('time');
        
        // Ini string JSON dari input hidden (berisi array service yg dipilih)
        $servicesJson = $this->request->getPost('selected_services_json'); 
        $services = json_decode($servicesJson, true); // Ubah jadi array PHP

        if (empty($services) || !$stylist || !$time) {
            return redirect()->back()->with('error', 'Data tidak lengkap');
        }

        // 2. Hitung Total Harga di Server (Lebih aman daripada percaya input client)
        $totalPrice = 0;
        foreach ($services as $svc) {
            // Bersihkan format "Rp 25.000" jadi angka 25000
            $cleanPrice = str_replace(['.', ','], '', $svc['price']); 
            $totalPrice += (int) $cleanPrice;
        }

        // 3. Simpan ke Tabel bookings (PARENT)
        $bookingData = [
            'user_id'     => $userId,
            'stylist'     => $stylist,
            'time'        => $time,
            'total_price' => $totalPrice
        ];
        
        // Insert dan dapatkan ID baru
        $bookingModel->insert($bookingData);
        $bookingId = $bookingModel->getInsertID();

        // 4. Simpan ke Tabel booking_details (CHILD)
        foreach ($services as $svc) {
            $cleanPrice = str_replace(['.', ','], '', $svc['price']);
            $detailModel->insert([
                'booking_id'    => $bookingId,
                'service_name'  => $svc['name'],
                'service_price' => $cleanPrice,
                'service_image' => $svc['image']
            ]);
        }

        return redirect()->to('/booking')->with('success', 'Booking berhasil!');
    }
}

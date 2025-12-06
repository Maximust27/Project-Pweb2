<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\BookingModel;

class User extends Controller
{
    public function dashboard()
    {
        return view('user/dashboard');
    }

    public function profile()
    {
        // 1. Cek Login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $bookingModel = new BookingModel();
        
        $userId = session()->get('user_id'); 

        // 3. Ambil Data User
        $data['user'] = $userModel->find($userId);

        // 4. LOGIKA PESANAN SAAT INI (Active Bookings)
        // FIX: Kita ambil langsung dari tabel bookings tanpa JOIN (untuk hindari error column not found)
        // Logic: Status 'pending', 'On progres', 'konfirmasi' masuk ke sini
        $data['currentBookings'] = $bookingModel
            ->where('user_id', $userId)
            ->groupStart() // Grouping OR condition
                ->where('status', 'pending')
                ->orWhere('status', 'On progres') // Sesuai teks di gambar
                ->orWhere('status', 'konfirmasi')
                ->orWhere('status', 'proses')
            ->groupEnd()
            ->orderBy('created_at', 'ASC') // Yang paling dekat waktunya di atas
            ->findAll();

        // 5. LOGIKA RIWAYAT PESANAN (History)
        // Logic: Status 'Selesai', 'Dibatalkan', 'completed', 'canceled' masuk ke sini
        $data['historyBookings'] = $bookingModel
            ->where('user_id', $userId)
            ->groupStart()
                ->where('status', 'completed')
                ->orWhere('status', 'canceled')
                ->orWhere('status', 'Selesai')
                ->orWhere('status', 'Dibatalkan')
            ->groupEnd()
            ->orderBy('created_at', 'DESC') // Yang terbaru di atas
            ->findAll();

        $data['title'] = 'Profile Saya';

        return view('user/profile', $data);
    }
}
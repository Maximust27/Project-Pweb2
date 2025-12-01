<?php

    namespace App\Controllers;

    use App\Models\BookingModel;
    use App\Models\UserModel;
    use App\Models\BookingDetailModel;

    class AdminController extends BaseController
{
    public function index()
    {
        // 1. Cek Session Login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();
        
        // --- A. LOGIKA STATISTIK (Sesuai Gambar: Total Clients & Total Service) ---
        // Hitung user dengan role 'user'
        $totalClients = $db->table('users')->where('role', 'user')->countAllResults();
        
        // Hitung total services (Pastikan tabel 'services' ada)
        // Jika belum ada tabel services, kita catch error biar ga crash dan set ke 0
        try {
            $totalServices = $db->table('services')->countAllResults();
        } catch (\Exception $e) {
            $totalServices = 0; 
        }

        // --- B. LOGIKA RECENT BOOKINGS ---
        $builder = $db->table('bookings');

        // Select Data (Sesuaikan dengan kolom tabel kamu)
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

        // JOIN Table untuk mengambil nama user dan detail service
        $builder->join('users', 'users.id = bookings.user_id', 'left'); 
        $builder->join('booking_details', 'booking_details.booking_id = bookings.id', 'left');
        
        // Group by ID booking agar tidak duplikat row saat join one-to-many
        $builder->groupBy('bookings.id');
        
        // Urutkan dari yang terbaru
        $builder->orderBy('bookings.created_at', 'DESC');
        
        // (Opsional) Limit data jika hanya ingin menampilkan misal 10 booking terakhir
        // $builder->limit(10);
        
        // Ambil Data
        $query = $builder->get();
        $bookings = $query->getResultArray();

        // --- C. PACKING DATA KE VIEW ---
        $data = [
            'title'     => 'Dashboard',
            'user_name' => session()->get('name') ?? 'Admin',
            'stats'     => [
                'total_clients'  => $totalClients,
                'total_services' => $totalServices
            ],
            'bookings'  => $bookings 
        ];

        // Memanggil View 'admin/dashboard'
        return view('admin/dashboard', $data);
    }

    public function updateStatus($id, $status)
    {
        $model = new BookingModel();
        
        // Hanya izinkan status 'completed' atau 'canceled' untuk keamanan
        if(in_array($status, ['completed', 'canceled'])) {
            $model->update($id, ['status' => $status]);
        }
        
        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->to('/admin/dashboard')->with('success', 'Status berhasil diupdate');
    }
}
<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\SkillModel;
use App\Models\BookingModel;
// Pastikan Model Service di-use jika ada, contoh: use App\Models\ServiceModel;

class LayoutAdmin extends BaseController
{
    // --- HELPER FUNCTIONS ---

    // 1. Menghitung notifikasi (pending bookings)
    private function getPendingCount()
    {
        $bookingModel = new BookingModel();
        return $bookingModel->groupStart()
            ->where('status', 'pending')
            ->orWhere('status', null)
            ->groupEnd()
            ->countAllResults();
    }

    // 2. Mengambil data Admin yang sedang login
    private function getCurrentAdmin()
    {
        $adminModel = new AdminModel();
        // Ambil ID dari session, default ke 1 jika belum login (untuk dev)
        $idAdmin = session()->get('id') ?? 1; 
        return $adminModel->where('id', $idAdmin)->first();
    }
    
    // --- CONTROLLER METHODS ---

    public function dashboard_admin()
    {
        $bookingModel = new BookingModel();

        $recentBookings = $bookingModel
            ->select('bookings.*, users.name as client_name')
            ->join('users', 'users.id = bookings.user_id')
            ->orderBy('bookings.created_at', 'DESC')
            ->findAll(5);

        $totalClients = $bookingModel->countAllResults();
        $totalService = $bookingModel->distinct()->select('stylist')->countAllResults();

        $data = [
            'activeMenu'     => 'dashboard',
            'recentBookings' => $recentBookings,
            'totalClients'   => $totalClients,
            'totalService'   => $totalService,
            'notif_count'    => $this->getPendingCount(),
            'admin'          => $this->getCurrentAdmin() // Kirim data admin ke View
        ];

        return view('admin/dashboard-admin', $data);
    }

    public function booking_adm()
    {
        $bookingModel = new BookingModel();

        $allBookings = $bookingModel
            ->select('bookings.*, users.name as client_name')
            ->join('users', 'users.id = bookings.user_id', 'left')
            ->orderBy('bookings.date', 'DESC')
            ->findAll();

        $data = [
            'activeMenu'  => 'bookings',
            'bookings'    => $allBookings,
            'notif_count' => $this->getPendingCount(),
            'admin'       => $this->getCurrentAdmin() // Kirim data admin ke View
        ];

        return view('admin/booking_adm', $data);
    }

    public function service()
    {
        // $serviceModel = new ServiceModel();
        // $services = $serviceModel->findAll();

        $data = [
            'activeMenu'  => 'services',
            'services'    => [], // Ganti dengan data asli
            'notif_count' => $this->getPendingCount(),
            'admin'       => $this->getCurrentAdmin() // Kirim data admin ke View
        ];

        return view('admin/service', $data);
    }

    public function notif()
    {
        $bookingModel = new BookingModel();
        
        $newBookings = $bookingModel
            ->select('bookings.*, users.name') 
            ->join('users', 'users.id = bookings.user_id', 'left') 
            ->groupStart()
                ->where('bookings.status', 'pending')
                ->orWhere('bookings.status', null)
            ->groupEnd()
            ->orderBy('bookings.id', 'DESC')
            ->findAll(10);

        foreach ($newBookings as &$booking) {
            if (!empty($booking['name'])) {
                $booking['client_name'] = $booking['name'];
            } else {
                $booking['client_name'] = 'Pelanggan (Tanpa Nama)';
            }
        }

        return view('admin/notif', [
            'recentBookings' => $newBookings,
            'activeMenu'     => 'notif',
            'notif_count'    => $this->getPendingCount(),
            'admin'          => $this->getCurrentAdmin() // Kirim data admin ke View
        ]);
    }

    public function profile_adm()
    {
        $skillModel = new SkillModel();
        
        // Ambil data admin pakai helper biar konsisten
        $adminData = $this->getCurrentAdmin();
        $idAdmin   = $adminData['id'] ?? 1;

        $data['admin']      = $adminData;
        $data['skills']     = $skillModel->where('admin_id', $idAdmin)->findAll();
        $data['activeMenu'] = 'profile';
        $data['notif_count'] = $this->getPendingCount();

        return view('admin/profile_adm', $data);
    }

    public function updateProfile()
    {
        $adminModel = new AdminModel();
        $skillModel = new SkillModel();

        $idAdmin = session()->get('id') ?? 1;

        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama harus diisi']
            ],
            'photo' => [
                'rules' => 'max_size[photo,10000]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File wajib gambar',
                    'mime_in'  => 'Tipe file gambar tidak sesuai'
                ]
            ]
        ])) {
            return redirect()->to('/admin/profile_adm')->withInput();
        }

        $filePhoto = $this->request->getFile('photo');
        if ($filePhoto->getError() == 4) {
            $namaPhoto = $this->request->getVar('photoLama'); 
        } else {
            $namaPhoto = $filePhoto->getRandomName();
            $filePhoto->move('uploads', $namaPhoto);
        }

        $adminModel->save([
            'id'          => $idAdmin,
            'name'        => $this->request->getVar('name'),
            'full_name'   => $this->request->getVar('full_name'),
            'description' => $this->request->getVar('description'),
            'skill_title' => $this->request->getVar('skill_title'),
            'photo'       => $namaPhoto
        ]);

        $skillsInput = $this->request->getPost('skills') ?? [];
        $skillModel->where('admin_id', $idAdmin)->delete();

        foreach ($skillsInput as $skillName) {
            if (!empty(trim($skillName))) {
                $skillModel->insert([
                    'admin_id' => $idAdmin,
                    'skill_name' => $skillName
                ]);
            }
        }

        session()->setFlashdata('success', 'Profile berhasil diupdate');
        return redirect()->to('/admin/profile_adm');
    }

    public function sidebar()
    {
        return view('layout_admin/sidebar');
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); 
        return redirect()->to('/');
    }
}
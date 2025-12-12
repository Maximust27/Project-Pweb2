<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\SkillModel;
use App\Models\BookingModel;

class LayoutAdmin extends BaseController
{
    // Helper function untuk menghitung notifikasi (pending bookings)
    private function getPendingCount()
    {
        $bookingModel = new BookingModel();
        return $bookingModel->groupStart()
            ->where('status', 'pending')
            ->orWhere('status', null)
            ->groupEnd()
            ->countAllResults();
    }
    
    public function sidebar()
    {
        return view('layout_admin/sidebar');
    }

    public function profile_adm()
    {
        $adminModel = new AdminModel();
        $skillModel = new SkillModel();

        // Gunakan session ID user yang sedang login, fallback ke 1 jika null (untuk dev)
        $idAdmin = session()->get('id') ?? 1;

        $data['admin'] = $adminModel->where('id', $idAdmin)->first();
        $data['skills'] = $skillModel->where('admin_id', $idAdmin)->findAll();
        $data['activeMenu'] = 'profile';
        
        // --- PENTING: Kirim data notif ke view ---
        $data['notif_count'] = $this->getPendingCount(); 

        return view('admin/profile_adm', $data);
    }

    public function updateProfile()
    {
        $adminModel = new AdminModel();
        $skillModel = new SkillModel();

        $idAdmin = session()->get('id') ?? 1;

        // Validasi input
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

        // Handle upload foto
        $filePhoto = $this->request->getFile('photo');
        if ($filePhoto->getError() == 4) {
            $namaPhoto = $this->request->getVar('photoLama'); 
        } else {
            $namaPhoto = $filePhoto->getRandomName();
            $filePhoto->move('uploads', $namaPhoto);
        }

        // Update admin
        $adminModel->save([
            'id'          => $idAdmin,
            'name'        => $this->request->getVar('name'),
            'full_name'   => $this->request->getVar('full_name'),
            'description' => $this->request->getVar('description'),
            'skill_title' => $this->request->getVar('skill_title'),
            'photo'       => $namaPhoto
        ]);

        // Update skills
        $skillsInput = $this->request->getPost('skills') ?? [];

        // Hapus skill lama
        $skillModel->where('admin_id', $idAdmin)->delete();

        // Insert skill baru
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

    public function notif()
    {
        $bookingModel = new BookingModel();
        
        // PERBAIKAN: Hapus 'users.username' agar tidak error
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
            // Logic disederhanakan: Jika ada nama gunakan nama, jika tidak gunakan fallback
            if (!empty($booking['name'])) {
                $booking['client_name'] = $booking['name'];
            } else {
                $booking['client_name'] = 'Pelanggan (Tanpa Nama)';
            }
        }

        return view('admin/notif', [
            'recentBookings' => $newBookings,
            'activeMenu' => 'notif',
            'notif_count' => $this->getPendingCount()
        ]);
    }

    public function dashboard_admin()
    {
        $bookingModel = new BookingModel();

        // PERBAIKAN: Ganti 'users.username' dengan 'users.name'
        $recentBookings = $bookingModel
            ->select('bookings.*, users.name as client_name')
            ->join('users', 'users.id = bookings.user_id')
            ->orderBy('bookings.created_at', 'DESC')
            ->findAll(5);

        $totalClients = $bookingModel->countAllResults();
        $totalService = $bookingModel->distinct()->select('stylist')->countAllResults();

        $data = [
            'activeMenu' => 'dashboard',
            'recentBookings' => $recentBookings,
            'totalClients' => $totalClients,
            'totalService' => $totalService,
            // --- PENTING: Kirim data notif ke view ---
            'notif_count' => $this->getPendingCount()
        ];

        return view('admin/dashboard-admin', $data);
    }

    // Logout
    public function logout()
    {
        $session = session();
        $session->destroy(); 
        return redirect()->to('/');
    }
}
<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\SkillModel;
use App\Models\BookingModel;

class LayoutAdmin extends BaseController
{
    public function sidebar()
    {
        return view('layout_admin/sidebar');
    }

    public function index()
    {
        $adminModel = new AdminModel();
        $skillModel = new SkillModel();

        // Ambil admin dengan id = 1 (Gunakan session jika sudah login)
        $data['admin'] = $adminModel->where('id', 1)->first();

        // Ambil semua skill admin
        $data['skills'] = $skillModel->where('admin_id', $data['admin']['id'] ?? 0)->findAll();

        $data['activeMenu'] = 'profile';

        return view('admin/profile_adm', $data);
    }

    public function updateProfile()
    {
        $adminModel = new AdminModel();
        $skillModel = new SkillModel();

        $idAdmin = 1; // Harusnya ambil dari session()->get('id')

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
            $namaPhoto = $this->request->getVar('photoLama'); // gunakan foto lama
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
        
        $newBookings = $bookingModel
            ->select('bookings.*, users.name as client_name')
            ->join('users', 'users.id = bookings.user_id')
            ->groupStart()
                ->whereNotIn('bookings.status', ['completed', 'canceled', 'Selesai', 'Dibatalkan']) 
                ->orWhere('bookings.status', null) 
            ->groupEnd()
            ->orderBy('bookings.id', 'DESC')
            ->findAll(5);

        return view('admin/notif', [
            'recentBookings' => $newBookings,
            'activeMenu' => 'notif'
        ]);
    }

    public function dashboard_admin()
    {
        $bookingModel = new BookingModel();

        // Dashboard juga sebaiknya di-join jika ingin menampilkan nama client di tabel dashboard
        $recentBookings = $bookingModel
            ->select('bookings.*, users.username as client_name') // Opsional: Tambahkan ini agar dashboard juga ada namanya
            ->join('users', 'users.id = bookings.user_id')
            ->orderBy('bookings.created_at', 'DESC')
            ->findAll(5);

        // Total clients & total service
        $totalClients = $bookingModel->countAllResults();
        $totalService = $bookingModel->distinct()->select('stylist')->countAllResults();

        $data = [
            'activeMenu' => 'dashboard',
            'recentBookings' => $recentBookings,
            'totalClients' => $totalClients,
            'totalService' => $totalService
        ];

        return view('admin/dashboard-admin', $data);
    }
}
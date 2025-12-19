<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\SkillModel;
use App\Models\BookingModel;
use App\Models\ServiceModel;

class LayoutAdmin extends BaseController
{
    protected $serviceModel;
    protected $bookingModel;
    protected $adminModel;
    protected $skillModel;
    protected $db;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->bookingModel = new BookingModel();
        $this->adminModel   = new AdminModel();
        $this->skillModel   = new SkillModel();
        $this->db           = \Config\Database::connect();
    }

    // --- HELPER ---
    private function getPendingCount()
    {
        return $this->bookingModel->groupStart()
            ->where('status', 'pending')
            ->orWhere('status', null)
            ->groupEnd()
            ->countAllResults();
    }

    private function getCurrentAdmin()
    {
        $idAdmin = session()->get('id') ?? 1;
        return $this->adminModel->where('id', $idAdmin)->first();
    }

    // --- DASHBOARD ---
    public function dashboard_admin()
    {
        // 1. STATISTIK
        $totalClients = $this->db->table('users')->where('role', 'user')->countAllResults();
        try {
            $totalServices = $this->db->table('services')->countAllResults();
        } catch (\Exception $e) {
            $totalServices = 0;
        }

        // 2. LOGIKA BOOKING DENGAN FILTER & SEARCH
        $filterStatus = $this->request->getVar('filter') ?? 'pending';
        $keyword      = $this->request->getVar('search');

        $builder = $this->db->table('bookings');
        
        // FIX: Menghapus bookings.date sesuai kode asli
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
        
        $builder->join('users', 'users.id = bookings.user_id', 'left');
        $builder->join('booking_details', 'booking_details.booking_id = bookings.id', 'left');

        // Filter Status
        if ($filterStatus == 'canceled') {
            $builder->where('bookings.status', 'canceled');
        } elseif ($filterStatus == 'completed') {
            $builder->where('bookings.status', 'completed');
        } else {
            // Default: Pending
            $builder->where('bookings.status', 'pending');
        }

        // Search
        if ($keyword) {
            $builder->groupStart();
            $builder->like('users.name', $keyword);
            $builder->orLike('users.email', $keyword);
            $builder->orLike('booking_details.service_name', $keyword);
            $builder->groupEnd();
        }

        $builder->groupBy('bookings.id');

        // Sorting
        if ($filterStatus == 'pending') {
            $builder->orderBy('bookings.created_at', 'ASC');
        } else {
            $builder->orderBy('bookings.created_at', 'DESC');
        }

        // Ambil data
        $bookings = $builder->get()->getResultArray();

        $data = [
            'title'          => 'Dashboard',
            'activeMenu'     => 'dashboard',
            'user_name'      => session()->get('name') ?? 'Admin',
            'stats'          => [
                'total_clients'  => $totalClients,
                'total_services' => $totalServices
            ],
            'bookings'       => $bookings, 
            'current_filter' => $filterStatus,
            'keyword'        => $keyword,
            'notif_count'    => $this->getPendingCount(),
            'admin'          => $this->getCurrentAdmin()
        ];

        return view('admin/dashboard', $data);
    }

    // --- BOOKING ---
    public function booking_adm()
    {
        $filterStatus = $this->request->getVar('filter') ?? 'pending';
        $keyword      = $this->request->getVar('search');

        $builder = $this->db->table('bookings');
        
        // FIX: Menghapus bookings.date sesuai kode asli
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

        $builder->join('users', 'users.id = bookings.user_id', 'left');
        $builder->join('booking_details', 'booking_details.booking_id = bookings.id', 'left');

        // Filter
        if ($filterStatus == 'canceled') {
            $builder->where('bookings.status', 'canceled');
        } elseif ($filterStatus == 'completed') {
            $builder->where('bookings.status', 'completed');
        } else {
            $builder->where('bookings.status', 'pending');
        }

        // Search
        if ($keyword) {
            $builder->groupStart();
                $builder->like('users.name', $keyword);
                $builder->orLike('users.email', $keyword);
                $builder->orLike('booking_details.service_name', $keyword);
            $builder->groupEnd();
        }

        $builder->groupBy('bookings.id');

        // Sorting
        if ($filterStatus == 'pending') {
            $builder->orderBy('bookings.created_at', 'ASC');
        } else {
            $builder->orderBy('bookings.created_at', 'DESC');
        }

        $bookings = $builder->get()->getResultArray();

        $data = [
            'activeMenu'     => 'bookings',
            'title'          => 'Daftar Booking',
            'bookings'       => $bookings,
            'current_filter' => $filterStatus,
            'keyword'        => $keyword,
            'notif_count'    => $this->getPendingCount(),
            'admin'          => $this->getCurrentAdmin()
        ];

        return view('admin/booking_adm', $data);
    }

    public function booking_update_status($id, $status)
    {
        if (in_array($status, ['completed', 'canceled'])) {
            $this->bookingModel->update($id, ['status' => $status]);
        }
        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }

    // --- SERVICE ---
    public function service_index()
    {
        $data = [
            'page_title'  => 'Services',
            'activeMenu'  => 'services',
            'services'    => $this->serviceModel->orderBy('id', 'DESC')->findAll(),
            'notif_count' => $this->getPendingCount(),
            'admin'       => $this->getCurrentAdmin()
        ];
        return view('admin/service', $data);
    }

    public function service_create()
    {
        $data = [
            'page_title'  => 'Tambah Service',
            'activeMenu'  => 'services',
            'notif_count' => $this->getPendingCount(),
            'admin'       => $this->getCurrentAdmin()
        ];
        return view('admin/tambah_service', $data);
    }

    public function service_store()
    {
        // Ubah validasi category jadi permit_empty agar tidak wajib
        if (!$this->validate([
            'service_name' => 'required',
            'price'        => 'required|numeric',
            'category'     => 'permit_empty', 
            'image'        => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imageFile = $this->request->getFile('image');
        $imageName = $imageFile->getRandomName();
        $imageFile->move('img', $imageName);

        $this->serviceModel->save([
            'service_name' => $this->request->getPost('service_name'),
            'category'     => $this->request->getPost('category') ?? 'General', // Default jika kosong
            'price'        => $this->request->getPost('price'),
            'image'        => $imageName
        ]);

        return redirect()->to('/admin/service')->with('success', 'Service baru berhasil ditambahkan');
    }

    public function service_edit($id)
    {
        $service = $this->serviceModel->find($id);
        if (!$service) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Service tidak ditemukan');
        }

        $data = [
            'page_title'  => 'Edit Service',
            'activeMenu'  => 'services',
            'service'     => $service,
            'notif_count' => $this->getPendingCount(),
            'admin'       => $this->getCurrentAdmin()
        ];
        return view('admin/edit_service', $data);
    }

    public function service_update($id)
    {
        $service = $this->serviceModel->find($id);
        if (!$service) return redirect()->to('/admin/service');

        // Ubah validasi category jadi permit_empty
        if (!$this->validate([
            'service_name' => 'required',
            'price'        => 'required|numeric',
            'category'     => 'permit_empty', 
            'image'        => 'permit_empty|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imageFile = $this->request->getFile('image');
        if ($imageFile->getError() == 4) {
            $imageName = $service['image'];
        } else {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('img', $imageName);
            if ($service['image'] && file_exists('img/' . $service['image'])) {
                unlink('img/' . $service['image']);
            }
        }

        $this->serviceModel->update($id, [
            'service_name' => $this->request->getPost('service_name'),
            'category'     => $this->request->getPost('category') ?? $service['category'], // Gunakan lama jika kosong
            'price'        => $this->request->getPost('price'),
            'image'        => $imageName
        ]);

        return redirect()->to('/admin/service')->with('success', 'Data berhasil diupdate');
    }

    public function service_delete($id)
    {
        $service = $this->serviceModel->find($id);
        if ($service) {
            if ($service['image'] && file_exists('img/' . $service['image'])) {
                unlink('img/' . $service['image']);
            }
            $this->serviceModel->delete($id);
            return redirect()->to('/admin/service')->with('success', 'Data berhasil dihapus');
        }
        return redirect()->to('/admin/service')->with('error', 'Data tidak ditemukan');
    }

    // --- NOTIF & PROFILE ---
    public function notif()
    {
        $newBookings = $this->bookingModel
            ->select('bookings.*, users.name') 
            ->join('users', 'users.id = bookings.user_id', 'left') 
            ->groupStart()
                ->where('bookings.status', 'pending')
                ->orWhere('bookings.status', null)
            ->groupEnd()
            ->orderBy('bookings.id', 'DESC')
            ->findAll(10);

        foreach ($newBookings as &$booking) {
            $booking['client_name'] = !empty($booking['name']) ? $booking['name'] : 'Pelanggan (Tanpa Nama)';
        }

        return view('admin/notif', [
            'recentBookings' => $newBookings,
            'activeMenu'     => 'notif',
            'notif_count'    => $this->getPendingCount(),
            'admin'          => $this->getCurrentAdmin()
        ]);
    }

    public function profile_adm()
    {
        $adminData = $this->getCurrentAdmin();
        $idAdmin   = $adminData['id'] ?? 1;

        $data = [
            'activeMenu'  => 'profile',
            'admin'       => $adminData,
            'skills'      => $this->skillModel->where('admin_id', $idAdmin)->findAll(),
            'notif_count' => $this->getPendingCount()
        ];
        return view('admin/profile_adm', $data);
    }

    public function updateProfile()
    {
        $idAdmin = session()->get('id') ?? 1;

        if (!$this->validate([
            'name' => 'required',
            'photo' => 'max_size[photo,10000]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]'
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

        $this->adminModel->save([
            'id'          => $idAdmin,
            'name'        => $this->request->getVar('name'),
            'full_name'   => $this->request->getVar('full_name'),
            'description' => $this->request->getVar('description'),
            'skill_title' => $this->request->getVar('skill_title'),
            'photo'       => $namaPhoto
        ]);

        $skillsInput = $this->request->getPost('skills') ?? [];
        $this->skillModel->where('admin_id', $idAdmin)->delete();

        foreach ($skillsInput as $skillName) {
            if (!empty(trim($skillName))) {
                $this->skillModel->insert([
                    'admin_id'   => $idAdmin,
                    'skill_name' => $skillName
                ]);
            }
        }

        return redirect()->to('/admin/profile_adm')->with('success', 'Profile berhasil diupdate');
    }
}
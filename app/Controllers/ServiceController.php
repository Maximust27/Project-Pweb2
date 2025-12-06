<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class ServiceController extends BaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    // 1. LIST SERVICE
    public function index()
    {
        $data = [
            'page_title'  => 'Services',
            'activeMenu'  => 'service',
            'services'    => $this->serviceModel->orderBy('id', 'DESC')->findAll()
        ];

        // View: admin/service.php
        return view('admin/service', $data);
    }

    // 2. HALAMAN TAMBAH
    public function create()
    {
        $data = [
            'page_title' => 'Tambah Service',
            'activeMenu' => 'service'
        ];

        // View: admin/tambah_service.php (Murni Tambah)
        return view('admin/tambah_service', $data);
    }

    // 3. PROSES SIMPAN
    public function store()
    {
        // Validasi
        if (!$this->validate([
            'service_name' => 'required',
            'price'        => 'required|numeric',
            'category'     => 'required',
            'image'        => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload Gambar
        $imageFile = $this->request->getFile('image');
        $imageName = $imageFile->getRandomName();
        $imageFile->move('uploads', $imageName);

        // Simpan DB
        $this->serviceModel->save([
            'service_name' => $this->request->getPost('service_name'),
            'category'     => $this->request->getPost('category'),
            'price'        => $this->request->getPost('price'),
            'image'        => $imageName
        ]);

        return redirect()->to('/admin/service')->with('success', 'Service baru berhasil ditambahkan');
    }

    // 4. HALAMAN EDIT
    public function edit($id)
    {
        $service = $this->serviceModel->find($id);
        
        if (!$service) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Service tidak ditemukan');
        }

        $data = [
            'page_title' => 'Edit Service',
            'activeMenu' => 'service',
            'service'    => $service
        ];

        // FIX: Sekarang arahkan ke view khusus 'admin/edit_service'
        // Sebelumnya ini mengarah ke 'admin/tambah_service'
        return view('admin/edit_service', $data);
    }

    // 5. PROSES UPDATE
    public function update($id)
    {
        $service = $this->serviceModel->find($id);
        if (!$service) {
            return redirect()->to('/admin/service');
        }

        // Validasi (Image permit_empty karena ini edit)
        if (!$this->validate([
            'service_name' => 'required',
            'price'        => 'required|numeric',
            'category'     => 'required',
            'image'        => 'permit_empty|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imageFile = $this->request->getFile('image');

        // Cek gambar baru
        if ($imageFile->getError() == 4) {
            $imageName = $service['image']; // Pakai gambar lama
        } else {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads', $imageName);
            
            // Hapus gambar lama
            if ($service['image'] && file_exists('uploads/' . $service['image'])) {
                unlink('uploads/' . $service['image']);
            }
        }

        // Update DB
        $this->serviceModel->update($id, [
            'service_name' => $this->request->getPost('service_name'),
            'category'     => $this->request->getPost('category'),
            'price'        => $this->request->getPost('price'),
            'image'        => $imageName
        ]);

        return redirect()->to('/admin/service')->with('success', 'Data berhasil diupdate');
    }

    // 6. PROSES HAPUS (DELETE)
    public function delete($id)
    {
        $service = $this->serviceModel->find($id);

        if ($service) {
            // Hapus gambar
            if ($service['image'] && file_exists('uploads/' . $service['image'])) {
                unlink('uploads/' . $service['image']);
            }

            $this->serviceModel->delete($id);
            return redirect()->to('/admin/service')->with('success', 'Data berhasil dihapus');
        }

        return redirect()->to('/admin/service')->with('error', 'Data tidak ditemukan');
    }
}
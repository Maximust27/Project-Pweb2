<?php

namespace App\Controllers;

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
            // Ambil data service
            'services'    => $this->serviceModel->orderBy('id', 'DESC')->findAll()
        ];

        return view('admin/service', $data);
    }

    // 2. HALAMAN EDIT
    public function edit($id)
    {
        $data = [
            'page_title' => 'Edit Service',
            'activeMenu' => 'service',
            'service'    => $this->serviceModel->find($id)
        ];

        return view('admin/edit_service', $data);
    }

    // 3. PROSES UPDATE
    public function update($id)
    {
        // Ambil data lama untuk fallback gambar
        $service = $this->serviceModel->find($id);
        
        // Ambil file gambar dari form
        $imageFile = $this->request->getFile('image');

        // Cek gambar: jika error 4 (tidak ada file diupload), pakai gambar lama
        if ($imageFile->getError() == 4) {
            $imageName = $service['image'];
        } else {
            // Jika ada file baru, generate nama random dan pindahkan
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads', $imageName);
            
            // Hapus file lama jika ada (opsional, biar hemat storage)
            if ($service['image'] && file_exists('uploads/' . $service['image'])) {
                unlink('uploads/' . $service['image']);
            }
        }

        // Lakukan Update ke Database
        $this->serviceModel->update($id, [
            'service_name' => $this->request->getPost('service_name'),
            'category'     => $this->request->getPost('category'), // PENTING: Update Kategori juga
            'price'        => $this->request->getPost('price'),
            'image'        => $imageName
        ]);

        return redirect()->to('/admin/service')->with('success', 'Data berhasil diupdate');
    }
}
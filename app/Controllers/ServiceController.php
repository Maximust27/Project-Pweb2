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

    // LIST SERVICE
    public function index()
    {
        $data = [
            'page_title'  => 'Services',
            'activeMenu'  => 'service',
            'services'    => $this->serviceModel->findAll()
        ];

        return view('admin/service', $data);
    }

    // HALAMAN tambah SERVICE
    public function tambah()
    {
        $data = [
            'page_title' => 'Add Service',
            'activeMenu' => 'service'
        ];

        return view('admin/tambah_service', $data);
    }

    // SIMPAN SERVICE BARU
    public function simpan()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'service_name' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Nama service wajib diisi']
            ],
            'image' => [
                'rules'  => 'uploaded[image]|max_size[image,10000]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Gambar wajib dipilih',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File harus berupa gambar',
                    'mime_in'  => 'Format gambar tidak sesuai'
                ]
            ]
        ])) {
            return redirect()->to('admin/tambah_service/')->withInput();
        }

        // AMBIL FILE GAMBAR
        $fileImage = $this->request->getFile('image');

        // PINDAHKAN GAMBAR KE PUBLIC/uploads
        $fileImage->move('uploads');
        $namaImage = $fileImage->getName();

        // SIMPAN KE DATABASE
        $this->serviceModel->save([
            'service_name' => $this->request->getVar('service_name'),
            'price'        => $this->request->getVar('price'),
            'image'        => $namaImage
        ]);

        // FLASH MESSAGE
        session()->setFlashdata('pesan', 'Service berhasil ditambahkan');

        return redirect()->to('/admin/service');
    }


    // EDIT SERVICE
    public function edit($id)
    {
        $data = [
            'page_title' => 'Edit Service',
            'activeMenu' => 'service',
            'service'    => $this->serviceModel->find($id)
        ];

        return view('admin/edit_service', $data);
    }

    // UPDATE SERVICE
    public function update($id)
    {
        $service = $this->serviceModel->find($id);
        $imageFile = $this->request->getFile('image');

        // Jika tidak upload gambar baru → tetap pakai gambar lama
        if ($imageFile->getError() == 4) {
            $imageName = $service['image'];
        } else {
            // Pakai nama baru
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads', $imageName);
        }

        $this->serviceModel->update($id, [
            'service_name' => $this->request->getPost('service_name'),
            'price'        => $this->request->getPost('price'),
            'image'        => $imageName
        ]);

        return redirect()->to('/admin/service');
    }


    // DELETE SERVICE
    public function hapus($id)
    {
        $this->serviceModel->delete($id);

        session()->setFlashdata('pesan', 'Service berhasil dihapus');

        return redirect()->to('/admin/service');
    }

}


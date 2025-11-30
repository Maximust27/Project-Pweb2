<?php

namespace App\Controllers;

use App\Models\AdminModel;   
use App\Models\SkillModel;   

class LayoutAdmin extends BaseController
{
    public function sidebar()
    {
        return view('layout_admin/sidebar');
    }

    public function profile()
    {
        $adminModel = new AdminModel();
        $skillModel = new SkillModel();

        $id = session()->get('user_id'); // ID admin yang sedang login

        $admin = $adminModel->find($id); //ambil data admin (ID yang sedang login.)
        $skills = $skillModel->where('admin_id', $id)->findAll(); //ambil semau data skill

        return view('admin/profile_adm', [
            'admin' => $admin,
            'skills' => $skills
        ]);
    }

    public function updateProfile() //update profile admin
    {
        $adminModel = new AdminModel();
        $id = session()->get('user_id');

        $data = [
            'name'        => $this->request->getPost('name'),
            'full_name'   => $this->request->getPost('full_name'),
            'description' => $this->request->getPost('description'),
            'skill_title' => $this->request->getPost('skill_title'),
        ];

        //Upload Foto
        $file = $this->request->getFile('photo');

        if ($file && $file->isValid() && !$file->hasMoved()) { //Jika ada file yang diupload, file itu valid, dan file itu belum pernah dipindahkan sebelumnya
            $newName = $file->getRandomName(); //Buat nama file baru random
            $file->move('uploads', $newName); //Pindahkan file yang diupload ke folder bernama ‘uploads’ dengan nama baru tadi

            $data['photo'] = $newName; //Masukkan nama file baru itu ke array $data dengan key ‘photo’
        } //Kalau admin upload foto baru, fotonya dipindah ke folder uploads/ dan nama filenya disimpan ke database.

        //update database
        $adminModel->update($id, $data);

        return redirect()->to('/admin/profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function notif()
    {
        return view('admin/notif');
    }

    public function service()
    {
        return view('admin/service');
    }

    public function dashboard_admin()
{
    $db = \Config\Database::connect();

    $builder = $db->table('booking')
        ->select('booking.*, booking_details.service_name')
        ->join('booking_details', 'booking_details.booking_id = booking.id')
        // ->orderBy('booking.date', 'DESC')
        ->limit(5);

    $data['recentBookings'] = $builder->get()->getResultArray();

    return view('admin/dashboard-admin', $data);
}


    
}

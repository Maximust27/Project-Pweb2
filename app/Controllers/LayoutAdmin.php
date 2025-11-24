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

        $admin = $adminModel->find(1);
        $skills = $skillModel->where('admin_id', 1)->findAll();

        return view('admin/profile_adm', [
            'admin' => $admin,
            'skills' => $skills
        ]);
    }

    public function updateProfile() //update profile admin
    {
        $adminModel = new AdminModel();
        $id = 1; //khusus admin id 1

        $data = [
            'name'        => $this->request->getPost('name'),
            'full_name'   => $this->request->getPost('full_name'),
            'description' => $this->request->getPost('description'),
            'skill_title' => $this->request->getPost('skill_title'),
        ];

        //Upload Foto
        $file = $this->request->getFile('photo');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads', $newName);

            $data['photo'] = $newName;
        }

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
        return view('admin/dashboard-admin');
    }
}

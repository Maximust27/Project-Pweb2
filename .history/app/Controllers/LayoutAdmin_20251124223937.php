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

    public function notif()
    {
        return view('admin/notif');
    }
}

<?php

namespace App\Controllers;

class LayoutAdmin extends BaseController
{
    public function sidebar()
    {
        return view('layout_admin/sidebar');
    }

    public function profile()
    {
     $admin = [
        'photo' => 'default-user.png',
        'name' => 'Admin Default',
        'role' => 'Administrator',
        'full_name' => 'Admin Default',
        'description' => 'Belum ada deskripsi. Silakan update profil.',
        'skill_title' => 'Keahlian Belum Diatur',
    ];

    // dummy skill list
    $skills = [
        'Skill 1',
        'Skill 2',
        'Skill 3',
    ];

    return view('admin/profile_adm', [
        'admin' => $admin,
        'skills' => $skills,
    ]);
    }
}

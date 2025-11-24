<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function auth()
{
    $session = session();
    $model = new UserModel();

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    // ============================
    // DEBUG 1: cek apakah email ditemukan
    // ============================
    if (!$user) {
        return redirect()->back()->with('error', 'Email tidak ditemukan');
    }

    // ============================
    // DEBUG 2: cek password_verify
    // ============================
    if (!password_verify($password, $user['password'])) {
        return redirect()->back()->with('error', 'Password salah');
    }

    // ============================
    // DEBUG 3: coba set session
    // ============================
    $session->set([
        'user_id'    => $user['id'],
        'email'      => $user['email'],
        'role'       => $user['role'],
        'isLoggedIn' => true
    ]);

    // Debug 4: cek apakah session terset
    if (!$session->get('isLoggedIn')) {
        return redirect()->back()->with('error', 'Session gagal disimpan');
    }

    // ============================
    // Jika semua OK → redirect
    // ============================
    return redirect()->to('/user/profile');
}




    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

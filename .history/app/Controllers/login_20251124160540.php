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
    $model   = new UserModel();

    // Ambil input
    $email    = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Validasi input sederhana
    if (!$email || !$password) {
        return redirect()->back()->with('error', 'Email dan password wajib diisi.');
    }

    // Ambil user berdasarkan email
    $user = $model->where('email', $email)->first();

    // Cek user dan password
    if ($user && password_verify($password, $user['password'])) {

        // Set session
        $session->set([
            'user_id'     => $user['id'],
            'email'       => $user['email'],
            'role'        => $user['role'],
            'isLoggedIn'  => true
        ]);

        return redirect()->to('/user/profile');
    }

    // Jika gagal
    return redirect()->back()->with('error', 'Email atau password salah.');
}



    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

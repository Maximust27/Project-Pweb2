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
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    if (!$email || !$password) {
        return redirect()->to('/login')->with('error', 'Email / password kosong');
    }

    $user = $this->userModel->where('email', $email)->first();

    if (!$user || !password_verify($password, $user['password'])) {
        return redirect()->to('/login')->with('error', 'Email atau password salah');
    }

    session()->set([
        'isLogin' => true,
        'user' => $user
    ]);

    return redirect()->to('/'); // Sukses
}



    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

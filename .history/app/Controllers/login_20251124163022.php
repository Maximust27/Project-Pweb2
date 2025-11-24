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

    if ($user && password_verify($password, $user['password'])) {

        $session->set([
            'user_id'    => $user['id'],
            'email'      => $user['email'],
            'role'       => $user['role'],
            'isLoggedIn' => true
        ]);
        dd(session()->get());

        return redirect()->to('/user/profile');
    }

    // LOGIN GAGAL → redirect kembali ke halaman login
    return redirect()->to('/login')->with('error', 'Email atau password salah.');
}



    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

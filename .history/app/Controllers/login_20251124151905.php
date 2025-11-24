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

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $user = $model->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {

        // simpan session
        $session->set([
            'user_id' => $user['id'],
            'role'    => $user['role'],
            'logged_in' => true
        ]);

        // arahkan ke profile user
        return redirect()->to('/user/profile');
    }

    // kalau gagal
    $session->setFlashdata('error', 'Email atau password salah');
    return redirect()->to('/login');
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

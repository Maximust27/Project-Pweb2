<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\MyAuth;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function auth()
    {
        $auth = new MyAuth();

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($auth->attempt($email, $password)) {
            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        $auth = new MyAuth();
        $auth->logout();

        return redirect()->to('/login');
    }
}

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
    $telphone = $this->request->getPost('telphone');
    $password = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {

        $session->set([
            'user_id'    => $user['id'],
            'email'      => $user['email'],
            'telphone'   => $user['telephone'],
            'role'       => $user['role'],
            'isLoggedIn' => true
        ]);

        return redirect()->to('/user/profile');
    }

    return redirect()->to('/login')->with('error', 'Email atau password salah.');
}



    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

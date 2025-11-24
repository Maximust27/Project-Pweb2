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
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {

                $sessionData = [
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'fullname'  => $user['fullname'],
                    'logged_in' => true
                ];

                $session->set($sessionData);

                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah!');
                return redirect()->back();
            }

        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

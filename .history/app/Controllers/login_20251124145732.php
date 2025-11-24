<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan email
        $user = $userModel->where('email', $email)->first();

        if ($user) {

            if (password_verify($password, $user['password'])) {

                // Set Session
                $session->set([
                    'user_id'   => $user['id'],
                    'name'      => $user['name'],
                    'email'     => $user['email'],
                    'role'      => $user['role'],
                    'isLoggedIn'=> true
                ]);

                // Redirect berdasarkan role
                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');
                }

                return redirect()->to('/user/profile');

            } else {
                return redirect()->back()->with('error', 'Password salah!');
            }

        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

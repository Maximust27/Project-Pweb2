<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        // Jika sudah login, langsung lempar sesuai role (biar ga usah login lagi)
        if (session()->get('isLoggedIn')) {
            if (session()->get('role') == 'admin') {
                return redirect()->to('/admin/dashboard');
            }
            return redirect()->to('/user/profile');
        }
        return view('auth/login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $email    = $this->request->getPost('email');
        $telphone = $this->request->getPost('telphone');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        // 1. Cek apakah user ada
        if ($user) {
            // 2. Cek telepon & password
            if ($user['telephone'] === $telphone && password_verify($password, $user['password'])) {
                
                // DATA SESSION
                $sessData = [
                    'user_id'    => $user['id'],
                    'email'      => $user['email'],
                    'telphone'   => $user['telephone'],
                    'role'       => $user['role'], // Pastikan di database isinya 'admin' atau 'user' (huruf kecil)
                    'isLoggedIn' => true
                ];

                // Simpan session
                $session->set($sessData);

                // DEBUGGING (Hapus tanda // di bawah ini kalau masih mental)
                // dd($session->get()); 

                // 3. REDIRECT SESUAI ROLE (PENTING!)
                // Kalau admin -> masuk dashboard admin
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin/dashboard');
                } 
                // Kalau user -> masuk profile user
                else {
                    return redirect()->to('/user/profile');
                }
            }
        }

        return redirect()->to('/login')->with('error', 'Email, telepon atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
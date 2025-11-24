<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class User extends Controller
{
    
     public function profile()
    {
        // Cek apakah user login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $userId = session()->get('user_id');

        // Ambil data dari database
        $data['user'] = $userModel->find($userId);

        return view('user/profile', $data);
    }
}

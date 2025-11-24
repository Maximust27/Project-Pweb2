<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        $data['title'] = 'Login';
        return view('auth/login', $data);
    }

    public function register()
    {
        $data['title'] = 'Register';
        return view('auth/register', $data);
    }
}

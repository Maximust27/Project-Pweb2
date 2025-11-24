<?php

namespace App\Libraries;

use App\Models\UserModel;

class MyAuth
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session   = session();
    }

    public function attempt($email, $password)
    {
        $user = $this->userModel->where('email', $email)->first();

        if (!$user) return false;
        if (!password_verify($password, $user['password'])) return false;

        // Set session
        $this->session->set('user', [
            'id'    => $user['id'],
            'email' => $user['email']
        ]);

        return true;
    }

    public function user()
    {
        return $this->session->get('user');
    }

    public function loggedIn()
    {
        return $this->session->has('user');
    }

    public function logout()
    {
        $this->session->remove('user');
    }
}

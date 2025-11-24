<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Cek login
        if (!$session->has('user')) {
            return redirect()->to('/login');
        }

        $user = $session->get('user'); // array data user

        // Cek role yang dibutuhkan
        if (!empty($arguments) && $user['role'] !== $arguments[0]) {
            return redirect()->to('/unauthorized'); // atau abort 403
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu
    }
}

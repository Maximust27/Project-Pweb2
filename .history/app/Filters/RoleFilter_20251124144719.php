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

        // Jika belum login
        if (!$session->has('user')) {
            return redirect()->to('/login');
        }

        $user = $session->get('user');

        // Jika route butuh role tertentu
        if (!empty($arguments) && $user['role'] !== $arguments[0]) {
            return redirect()->to('/unauthorized');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

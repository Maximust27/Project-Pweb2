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

        // 1. Cek apakah user sudah login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // 2. Ambil role user saat ini dari session
        $currentRole = $session->get('role'); 

        // 3. Ambil role yang DIBUTUHKAN oleh route
        // Di Routes.php ditulis: ['filter' => 'role:admin']
        // Maka $arguments[0] akan berisi 'admin'
        $requiredRole = $arguments[0] ?? null; 

        // 4. Logika Pengecekan Role
        // Jika route butuh role tertentu, TAPI role user sekarang tidak cocok...
        if ($requiredRole && $currentRole !== $requiredRole) {
            
            // Kasus A: Admin nyasar masuk ke halaman User
            // Solusi: Lempar balik ke Dashboard Admin
            if ($currentRole === 'admin') {
                return redirect()->to('/admin/dashboard');
            }

            // Kasus B: User biasa maksa masuk ke halaman Admin
            // Solusi: Lempar balik ke Profile User
            if ($currentRole === 'user') {
                return redirect()->to('/user/profile');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi setelah request
    }
}
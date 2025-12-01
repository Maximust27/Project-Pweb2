<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =====================
// AUTH & PUBLIC
// =====================
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::user');

$routes->get('login', 'Login::index');
$routes->match(['get','post'], 'login/auth', 'Login::auth');
$routes->get('logout', 'Login::logout');

$routes->get('register', 'Register::index');
$routes->post('register/process', 'Register::process');


// =====================
// USER AREA (Role: User)
// =====================
$routes->group('user', ['filter' => 'role:user'], function($routes){
    $routes->get('/', 'User::dashboard');
    $routes->get('profile', 'User::profile');

    // Booking User
    $routes->get('booking', 'BookingController::index');
    $routes->post('booking/save', 'BookingController::save');
    $routes->get('booking/slots', 'BookingController::getSlots');
});


// =====================
// ADMIN AREA (Role: Admin)
// =====================
// Group ini otomatis menambahkan awalan "admin/" ke semua URL di dalamnya
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    
    // 1. Dashboard
    // URL Asli: localhost:8080/admin/dashboard
    $routes->get('dashboard', 'AdminController::index');

    // 2. List Booking
    // URL Asli: localhost:8080/admin/booking_adm
    // FIX: Jangan tulis '/admin/' lagi di sini, cukup 'booking_adm'
    $routes->get('booking_adm', 'AdminBookingController::index_adm');

    // 3. Update Status
    // URL Asli: localhost:8080/admin/booking/update/...
    // FIX: Cukup tulis path lanjutannya saja
    $routes->get('booking/update/(:num)/(:segment)', 'AdminBookingController::updateStatus/$1/$2');

    // 4. Menu Lainnya
    $routes->get('profile_adm', 'LayoutAdmin::profile');
    $routes->get('edit_service', 'ServiceController::edit');
    $routes->get('notif', 'LayoutAdmin::notif');
    $routes->get('service', 'LayoutAdmin::service');
    
    // Jika dashboard-admin berbeda controller:
    $routes->get('dashboard-admin', 'LayoutAdmin::dashboard_admin');
});

// =====================
// CATATAN PENTING:
// Saya menghapus baris-baris $routes->get(...) liar yang ada di bawah file aslimu 
// karena itu membuat filter 'role:admin' tidak jalan (security hole).
// Semua route admin SUDAH saya masukkan ke dalam group di atas.
// =====================
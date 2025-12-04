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
    $routes->get('dashboard', 'AdminController::index');

    // 2. List Booking
    $routes->get('booking_adm', 'AdminBookingController::index_adm');

    // 3. Update Status Booking
    $routes->get('booking/update/(:num)/(:segment)', 'AdminBookingController::updateStatus/$1/$2');

    // 4. MANAGEMENT SERVICES (BAGIAN YANG DIPERBAIKI)
    // =======================================================
    // Mengarah ke ServiceController::index (Bukan LayoutAdmin)
    $routes->get('service', 'ServiceController::index'); 
    
    // Mengarah ke halaman Edit (Butuh ID / :num)
    $routes->get('edit_service/(:num)', 'ServiceController::edit/$1');
    
    // Proses Update Data (POST)
    $routes->post('service/update/(:num)', 'ServiceController::update/$1');
    // =======================================================

    // 5. Menu Lainnya
    $routes->get('profile_adm', 'LayoutAdmin::profile');
    $routes->get('notif', 'LayoutAdmin::notif');
    
    // Jika dashboard-admin berbeda controller:
    $routes->get('dashboard-admin', 'LayoutAdmin::dashboard_admin');
});
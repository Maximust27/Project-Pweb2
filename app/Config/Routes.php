<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =======================================================================
// 1. PUBLIC & AUTH
// =======================================================================
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::user');

// Login & Logout
$routes->get('login', 'Login::index');
$routes->match(['get','post'], 'login/auth', 'Login::auth');
$routes->get('logout', 'Login::logout');

// Register
$routes->get('register', 'Register::index');
$routes->post('register/process', 'Register::process');


// =======================================================================
// 2. USER AREA (Role: User)
// =======================================================================
$routes->group('user', ['filter' => 'role:user'], function($routes){
    $routes->get('/', 'User::dashboard');
    $routes->get('profile', 'User::profile');

    // Booking System
    $routes->get('booking', 'BookingController::index');
    $routes->post('booking/save', 'BookingController::save');
    $routes->get('booking/slots', 'BookingController::getSlots');
});


// =======================================================================
// 3. ADMIN AREA (Role: Admin)
// =======================================================================
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    
    // --- Dashboard & Umum ---
    $routes->get('dashboard', 'AdminController::index');
    $routes->get('dashboard-admin', 'LayoutAdmin::dashboard_admin');
    $routes->get('profile_adm', 'LayoutAdmin::profile_adm');
    $routes->get('notif', 'LayoutAdmin::notif');

    // --- Manajemen Booking ---
    $routes->get('booking_adm', 'AdminBookingController::index_adm');
    $routes->get('booking/update/(:num)/(:segment)', 'AdminBookingController::updateStatus/$1/$2');

    // --- Manajemen Service ---
    $routes->get('service', 'ServiceController::index');                     // Halaman List
    
    $routes->get('tambah_service', 'ServiceController::create');             // Form Tambah
    $routes->post('service/simpan', 'ServiceController::store');             // Proses Simpan DB
    
    $routes->get('edit_service/(:num)', 'ServiceController::edit/$1');       // Form Edit
    $routes->post('service/update/(:num)', 'ServiceController::update/$1');  // Proses Update DB
    
    $routes->get('service/hapus/(:num)', 'ServiceController::delete/$1');    // Proses Hapus
});
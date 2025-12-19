<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. PUBLIC & AUTH
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::user');

// Login & Logout
$routes->get('login', 'Login::index');
$routes->match(['get','post'], 'login/auth', 'Login::auth');
$routes->get('logout', 'Login::logout');

// Register
$routes->get('register', 'Register::index');
$routes->post('register/process', 'Register::process');

// 2. USER AREA (Role: User)
$routes->group('user', ['filter' => 'role:user'], function($routes){
    $routes->get('/', 'User::dashboard');
    $routes->get('profile', 'User::profile');

    // Booking System
    $routes->get('booking', 'BookingController::index');
    $routes->post('booking/save', 'BookingController::save');
    $routes->get('booking/slots', 'BookingController::getSlots');
});

// 3. ADMIN AREA (Role: Admin)
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    
    // Dashboard (Menggunakan LayoutAdmin)
    $routes->get('dashboard', 'LayoutAdmin::dashboard_admin'); 
    $routes->get('dashboard-admin', 'LayoutAdmin::dashboard_admin'); // Alias jika diperlukan

    // Profil & Notif
    $routes->get('profile_adm', 'LayoutAdmin::profile_adm');
    $routes->post('updateProfile', 'LayoutAdmin::updateProfile'); 
    $routes->get('notif', 'LayoutAdmin::notif');

    // Manajemen Booking
    $routes->get('booking_adm', 'LayoutAdmin::booking_adm');
    $routes->get('booking/update/(:num)/(:segment)', 'LayoutAdmin::booking_update_status/$1/$2');

    // Manajemen Service
    $routes->get('service', 'LayoutAdmin::service_index');     
    $routes->get('tambah_service', 'LayoutAdmin::service_create');     
    $routes->post('service/simpan', 'LayoutAdmin::service_store');    
    $routes->get('edit_service/(:num)', 'LayoutAdmin::service_edit/$1');  
    $routes->post('service/update/(:num)', 'LayoutAdmin::service_update/$1');
    $routes->get('service/hapus/(:num)', 'LayoutAdmin::service_delete/$1');    
});
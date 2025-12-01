<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =====================
// AUTH
// =====================
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::user');

$routes->get('login', 'Login::index');
$routes->match(['get','post'], 'login/auth', 'Login::auth');

$routes->get('logout', 'Login::logout');

$routes->get('register', 'Register::index');
$routes->post('register/process', 'Register::process');

// =====================
// USER AREA
// =====================
$routes->group('user', ['filter' => 'role:user'], function($routes){
    $routes->get('/', 'User::dashboard');
    $routes->get('profile', 'User::profile');
});

// =====================
// ADMIN AREA
// =====================
$routes->get('/', 'LayoutAdmin::index');

// Dashboard
$routes->get('admin/dashboard_admin', 'LayoutAdmin::dashboard_admin');


// Services
$routes->get('admin/service', 'ServiceController::index');
$routes->get('admin/tambah_service', 'ServiceController::tambah');
$routes->post('admin/service/simpan', 'ServiceController::simpan');
$routes->get('admin/edit_service/(:num)', 'ServiceController::edit/$1');
$routes->post('admin/service/update/(:num)', 'ServiceController::update/$1');
$routes->get('admin/service/hapus/(:num)', 'ServiceController::hapus/$1');

// Bookings


// Notif
$routes->get('admin/notif', 'LayoutAdmin::notif', ['as' => 'admin.notif']);


// Profile
$routes->get('admin/profile_adm', 'LayoutAdmin::index');
$routes->post('admin/updateProfile', 'LayoutAdmin::updateProfile');


// =====================
// PAGE TANPA FILTER
// =====================

// Sidebar (kalau masih mau diakses langsung)
$routes->get('sidebar', 'LayoutAdmin::sidebar');

// User Booking
$routes->get('booking', 'BookingController::index');
$routes->post('booking/save', 'BookingController::save');
$routes->get('booking/slots', 'BookingController::getSlots');

// Other pages
$routes->get('notif', 'LayoutAdmin::notif');
$routes->get('service', 'LayoutAdmin::service');
$routes->get('dashboard-admin', 'LayoutAdmin::dashboard_admin');

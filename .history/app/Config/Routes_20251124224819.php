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
    $routes->get('profile', 'User::profile'); // ← TAMBAH INI
});


// =====================
// ADMIN AREA
// =====================
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('dashboard', 'AdminController::index');
});

// =====================
// BOOKING
// =====================
$routes->get('sidebar', 'LayoutAdmin::sidebar');
$routes->get('/admin/profile_adm', 'LayoutAdmin::profile');
$routes->get('/admin/edit_service', 'ServiceController::edit');


$routes->get('booking', 'BookingController::index');
$routes->get('notif', 'LayoutAdmin::notif');
$routes->get('service', 'LayoutAdmin::notif');

$routes->get('booking', 'BookingController::index');
$routes->post('booking/save', 'BookingController::save');
$routes->get('booking/slots', 'BookingController::getSlots');

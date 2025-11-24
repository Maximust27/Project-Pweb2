<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =====================
// AUTH
// =====================
$routes->get('/', 'Home::index');

$routes->setAutoRoute(false);
$routes->get('login', 'Login::index');
$routes->post('login/auth', 'Login::auth');

$routes->get('logout', 'Login::logout');

$routes->get('register', 'Register::index');
$routes->post('register/process', 'Register::process');

// =====================
// USER AREA
// =====================
$routes->group('user', ['filter' => 'role:user'], function($routes){
    $routes->get('/', 'UserController::dashboard');
    $routes->get('profile', 'UserController::profile'); // ← TAMBAH INI
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
$routes->get('service', 'LayoutAdmin::service');

$routes->get('booking', 'BookingController::index');
$routes->post('booking/save', 'BookingController::save');
$routes->get('booking/slots', 'BookingController::getSlots');

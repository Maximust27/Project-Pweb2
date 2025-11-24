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
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {

    $routes->get('dashboard', 'AdminController::index');

    // PROFILE ADMIN
    $routes->get('profile', 'LayoutAdmin::profile');
    $routes->post('updateProfile', 'LayoutAdmin::updateProfile');

    // BOOKING ADMIN
    $routes->get('booking', 'AdminBookingController::index_adm');

    // SERVICE EDIT
    $routes->get('edit_service', 'ServiceController::edit');

});

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

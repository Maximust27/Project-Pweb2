<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/profile', 'User::profile');

$routes->get('sidebar', 'LayoutAdmin::sidebar');
$routes->get('booking', 'BookingController::index');
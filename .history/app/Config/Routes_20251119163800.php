<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/profile', 'User::profile');
$routes->post('/login/process', 'Auth::processLogin');



$routes->get('sidebar', 'LayoutAdmin::sidebar');
$routes->get('booking', 'BookingController::index');

// booking routes
$routes->get('/booking', 'BookingController::index');
$routes->post('/booking/save', 'BookingController::save');
$routes->get('/booking/slots', 'BookingController::getSlots');

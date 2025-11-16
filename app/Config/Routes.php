<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('sidebar', 'LayoutAdmin::sidebar');

// booking routes
$routes->get('/booking', 'BookingController::index');
$routes->post('/booking/save', 'BookingController::save');
$routes->get('/booking/success', 'BookingController::success');

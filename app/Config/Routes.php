<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('sidebar', 'LayoutAdmin::sidebar');
$routes->get('booking', 'BookingController::index');

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/artikel', 'Home::artikel');

$routes->get('/pendaftaran', 'Home::pendaftaran');

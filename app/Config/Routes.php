<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/artikel', 'KomunitasEkspor::artikel');

$routes->get('/pendaftaran', 'KomunitasEkspor::pendaftaran');

$routes->get('/data-member', 'KomunitasEkspor::data_member');
$routes->get('/detail-member', 'KomunitasEkspor::detail_member');

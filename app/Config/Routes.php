<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Visitor?Member - Belajar Ekspor
$routes->get('/belajar-ekspor', 'KomunitasEkspor::belajar_ekspor');
$routes->get('/belajar-ekspor-detail', 'KomunitasEkspor::belajar_ekspor_detail');

// Visitor - Pendaftaran
$routes->get('/pendaftaran', 'KomunitasEkspor::pendaftaran');
$routes->post('daftar-member', 'KomunitasEkspor::registrasiMember');

// Visitior?Member - Video Tutorial
$routes->get('/video-tutorial', 'KomunitasEkspor::video_tutorial');
$routes->get('/video-tutorial-detail', 'KomunitasEkspor::video_tutorial_detail');

// Member - Data Member
$routes->get('/data-member', 'KomunitasEkspor::data_member');
$routes->get('/detail-member/(:any)', 'KomunitasEkspor::detail_member/$1');

// Member - Data Buyer
$routes->get('/data-buyer', 'KomunitasEkspor::data_buyer');

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'KomunitasEkspor::index');

// Visitor?Member - Belajar Ekspor
$routes->get('/belajar-ekspor', 'KomunitasEkspor::belajar_ekspor');
$routes->get('/belajar-ekspor-detail/(:segment)', 'KomunitasEkspor::belajar_ekspor_detail/$1');
$routes->get('kategori/(:any)', 'KomunitasEkspor::kategori_belajar_ekspor/$1');

$routes->get('/pendaftaran', 'KomunitasEkspor::pendaftaran');
$routes->post('daftar-member', 'KomunitasEkspor::registrasiMember');

// Visitior?Member - Video Tutorial
$routes->post('daftar-member', 'KomunitasEkspor::registrasiMember');

// Visitior?Member - Video Tutorial
$routes->get('/video-tutorial', 'KomunitasEkspor::video_tutorial');
$routes->get('/video-tutorial-selengkapnya', 'KomunitasEkspor::video_selengkapnya');
$routes->get('/video-tutorial-detail', 'KomunitasEkspor::video_tutorial_detail');

// Member - Data Member
$routes->get('/data-member', 'KomunitasEkspor::data_member_visitor');
$routes->get('/detail-member/(:any)', 'KomunitasEkspor::detail_member/$1');

// Member - Data Buyer
$routes->get('/data-buyers', 'KomunitasEkspor::data_buyers');

// Member - Data Member
$routes->get('/data-member', 'KomunitasEkspor::data_member_visitor');
$routes->get('/detail-member/(:any)', 'KomunitasEkspor::detail_member/$1');

// Member - Data Buyer
$routes->get('/data-buyer', 'KomunitasEkspor::data_buyer');

// member - edit member
$routes->get('/edit_profile', 'KomunitasEkspor::edit_profile');

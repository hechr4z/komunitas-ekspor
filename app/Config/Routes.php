<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('id', function ($routes) {
    $routes->get('/', 'KomunitasEkspor::index');

    // Visitor?Member - Belajar Ekspor
    $routes->get('belajar-ekspor', 'KomunitasEkspor::belajar_ekspor');
    $routes->get('belajar-ekspor/search', 'KomunitasEkspor::search_belajar_ekspor');
    $routes->get('belajar-ekspor-detail/(:segment)', 'KomunitasEkspor::belajar_ekspor_detail/$1');
    $routes->get('kategori/(:any)', 'KomunitasEkspor::kategori_belajar_ekspor/$1');

    $routes->get('pendaftaran', 'KomunitasEkspor::pendaftaran');

    // Member - Data Member
    $routes->get('data-member', 'KomunitasEkspor::data_member_visitor');
    $routes->get('detail-member/(:any)', 'KomunitasEkspor::detail_member/$1');

    // Member - Data Buyer
    $routes->get('data-buyers', 'KomunitasEkspor::data_buyers');
    $routes->get('data-buyers/search', 'KomunitasEkspor::search_buyers');
});

$routes->group('en', function ($routes) {
    $routes->get('/', 'KomunitasEkspor::index');

    // Visitor?Member - Belajar Ekspor
    $routes->get('export-learning', 'KomunitasEkspor::belajar_ekspor');
    $routes->get('export-learning/search', 'KomunitasEkspor::search_belajar_ekspor');
    $routes->get('belajar-ekspor-detail/(:segment)', 'KomunitasEkspor::belajar_ekspor_detail/$1');
    $routes->get('kategori/(:any)', 'KomunitasEkspor::kategori_belajar_ekspor/$1');

    $routes->get('registration', 'KomunitasEkspor::pendaftaran');

    // Member - Data Member
    $routes->get('data-member', 'KomunitasEkspor::data_member_visitor');
    $routes->get('detail-member/(:any)', 'KomunitasEkspor::detail_member/$1');

    // Member - Data Buyer
    $routes->get('data-buyers', 'KomunitasEkspor::data_buyers');
    $routes->get('data-buyers/search', 'KomunitasEkspor::search_buyers');
});

// // Visitor?Member - Belajar Ekspor
// $routes->get('/belajar-ekspor', 'KomunitasEkspor::belajar_ekspor');
// $routes->get('/belajar-ekspor/search', 'KomunitasEkspor::search_belajar_ekspor');
// $routes->get('/belajar-ekspor-detail/(:segment)', 'KomunitasEkspor::belajar_ekspor_detail/$1');
// $routes->get('/kategori/(:any)', 'KomunitasEkspor::kategori_belajar_ekspor/$1');

$routes->get('/pendaftaran', 'KomunitasEkspor::pendaftaran');
$routes->post('/daftar-member', 'KomunitasEkspor::registrasiMember');

// Visitior?Member - Video Tutorial
$routes->post('/daftar-member', 'KomunitasEkspor::registrasiMember');

// Visitior?Member - Video Tutorial
$routes->get('/video-tutorial', 'KomunitasEkspor::video_tutorial');
$routes->get('/video-tutorial-selengkapnya/(:segment)', 'KomunitasEkspor::video_selengkapnya/$1');
$routes->get('/video-tutorial-detail/(:segment)', 'KomunitasEkspor::video_tutorial_detail/$1');

// Member - Data Member
$routes->get('/data-member', 'KomunitasEkspor::data_member_visitor');
$routes->get('/detail-member/(:any)', 'KomunitasEkspor::detail_member/$1');

// // Member - Data Buyer
// $routes->get('/data-buyers', 'KomunitasEkspor::data_buyers');
// $routes->get('/data-buyers/search', 'KomunitasEkspor::search_buyers');

// // Member - Data Buyer
// $routes->get('/data-buyer', 'KomunitasEkspor::data_buyer');

// member - edit member
$routes->get('/edit-profile', 'KomunitasEkspor::edit_profile');

// Visitor - Aplikasi Kalkulator Ekspor
$routes->get('/kalkulator-ekspor', 'KomunitasEkspor::index_kalkulator');

$routes->post('/ganti-satuan/(:num)', 'KomunitasEkspor::ganti_satuan/$1');

$routes->post('/komponen-exwork/add', 'KomunitasEkspor::add_exwork');
$routes->get('/komponen-exwork/delete/(:num)', 'KomunitasEkspor::delete_exwork/$1');

$routes->post('/komponen-fob/add', 'KomunitasEkspor::add_fob');
$routes->get('/komponen-fob/delete/(:num)', 'KomunitasEkspor::delete_fob/$1');

$routes->post('/komponen-cfr/add', 'KomunitasEkspor::add_cfr');
$routes->get('/komponen-cfr/delete/(:num)', 'KomunitasEkspor::delete_cfr/$1');

$routes->post('/komponen-cif/add', 'KomunitasEkspor::add_cif');
$routes->get('/komponen-cif/delete/(:num)', 'KomunitasEkspor::delete_cif/$1');

// member - pengumuman
$routes->get('/pengumuman', 'KomunitasEkspor::pengumuman');

// detail pengumuman
$routes->get('/detail-pengumuman', 'KomunitasEkspor::detail_pengumuman');

// MPM
$routes->get('/mpm', 'KomunitasEkspor::mpm');

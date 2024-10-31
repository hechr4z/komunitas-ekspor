<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('id', function ($routes) {
    // Visitor - Beranda
    $routes->get('/', 'KomunitasEkspor::index');

    // Visitor - Belajar Ekspor
    $routes->get('belajar-ekspor', 'KomunitasEkspor::belajar_ekspor');
    $routes->get('belajar-ekspor/search', 'KomunitasEkspor::search_belajar_ekspor');
    $routes->get('belajar-ekspor/(:segment)', 'KomunitasEkspor::belajar_ekspor_detail/$1');
    $routes->get('kategori/(:any)', 'KomunitasEkspor::kategori_belajar_ekspor/$1');

    // Visitior - Video Tutorial
    $routes->get('tutorial-video', 'KomunitasEkspor::video_tutorial');
    // $routes->get('tutorial-video/kategori/(:segment)');
    $routes->get('tutorial-video/(:segment)', 'KomunitasEkspor::video_tutorial_detail/$1');

    $routes->get('pendaftaran', 'KomunitasEkspor::pendaftaran');

    // Visitor - Data Member
    $routes->get('data-member', 'KomunitasEkspor::visitor_data_member');
    $routes->get('detail-member/(:any)', 'KomunitasEkspor::detail_member/$1');

    // Visitor - Data Buyer
    $routes->get('data-buyers', 'KomunitasEkspor::data_buyers');
    $routes->get('data-buyers/search', 'KomunitasEkspor::search_buyers');
});

$routes->group('en', function ($routes) {
    $routes->get('/', 'KomunitasEkspor::index');

    // Visitor - Belajar Ekspor
    $routes->get('export-learning', 'KomunitasEkspor::belajar_ekspor');
    $routes->get('export-learning/search', 'KomunitasEkspor::search_belajar_ekspor');
    $routes->get('export-learning/(:segment)', 'KomunitasEkspor::belajar_ekspor_detail/$1');
    $routes->get('category/(:any)', 'KomunitasEkspor::kategori_belajar_ekspor/$1');

    // Visitior - Video Tutorial
    $routes->get('video-tutorial', 'KomunitasEkspor::video_tutorial');
    $routes->get('video-tutorial/category/(:segment)', 'KomunitasEkspor::video_selengkapnya/$1');
    $routes->get('video-tutorial/(:segment)', 'KomunitasEkspor::video_tutorial_detail/$1');

    $routes->get('registration', 'KomunitasEkspor::pendaftaran');

    // Visitor - Data Member
    $routes->get('data-member', 'KomunitasEkspor::visitor_data_member');
    $routes->get('detail-member/(:any)', 'KomunitasEkspor::detail_member/$1');

    // Visitor - Data Buyer
    $routes->get('data-buyers', 'KomunitasEkspor::data_buyers');
    $routes->get('data-buyers/search', 'KomunitasEkspor::search_buyers');
});

$routes->post('/user/checkAvailability', 'KomunitasEkspor::checkAvailability');

// login
$routes->get('login', 'KomunitasEkspor::login');
$routes->post('/auth/authenticate', 'KomunitasEkspor::authenticate');
$routes->get('/logout', 'KomunitasEkspor::logout');

$routes->post('/daftar-member', 'KomunitasEkspor::registrasiMember');

$routes->group('', ['filter' => 'auth'], function ($routes) {

    // Member - Edit Member
    $routes->get('/edit-profile', 'KomunitasEkspor::edit_profile');
    $routes->post('/ubah-informasi-akun', 'KomunitasEkspor::ubah_informasi_akun');
    $routes->post('/ubah-profil-perusahaan', 'KomunitasEkspor::ubah_profil_perusahaan');
    $routes->post('/add-sertifikat', 'KomunitasEkspor::add_sertifikat');
    $routes->get('/delete-sertifikat/(:num)', 'KomunitasEkspor::delete_sertifikat/$1');
    $routes->post('/add-produk', 'KomunitasEkspor::add_produk');
    $routes->get('/delete-produk/(:num)', 'KomunitasEkspor::delete_produk/$1');

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

    // Member - Pengumuman
    $routes->get('/pengumuman', 'KomunitasEkspor::pengumuman');
    $routes->get('/detail-pengumuman/(:segment)', 'KomunitasEkspor::detail_pengumuman/$1');

    // MPM
    $routes->get('/mpm', 'KomunitasEkspor::mpm');
    $routes->post('/mpm-add', 'KomunitasEkspor::add_mpm');
    $routes->post('/mpm-edit', 'KomunitasEkspor::edit_mpm');
    $routes->get('mpm/getEmailsByDate/(:num)/(:num)', 'KomunitasEkspor::getEmailsByDate/$1/$2');

    // Member - Data Member
    $routes->get('member-data-member', 'KomunitasEkspor::member_data_member');
    $routes->get('member-detail-member/(:any)', 'KomunitasEkspor::member_detail_member/$1');

    // Member = Data Buyers
    $routes->get('/member-data-buyers', 'KomunitasEkspor::member_data_buyers');

    // Member - Belajar Ekspor
    $routes->get('member-belajar-ekspor', 'KomunitasEkspor::member_belajar_ekspor');
    $routes->get('member-belajar-ekspor/search', 'KomunitasEkspor::member_search_belajar_ekspor');
    $routes->get('member-belajar-ekspor-detail/(:segment)', 'KomunitasEkspor::member_belajar_ekspor_detail/$1');
    $routes->get('member-kategori/(:any)', 'KomunitasEkspor::member_kategori_belajar_ekspor/$1');

    // Member - Video Tutorial
    $routes->get('/member-video-tutorial', 'KomunitasEkspor::member_video_tutorial');
    $routes->get('/member-video-tutorial-selengkapnya/(:segment)', 'KomunitasEkspor::member_video_selengkapnya/$1');
    $routes->get('/member-video-tutorial-detail/(:segment)', 'KomunitasEkspor::member_video_tutorial_detail/$1');

    // Member - Website Audit
    $routes->get('website-audit', 'KomunitasEkspor::website_audit');
    $routes->post('add-website-audit', 'KomunitasEkspor::add_website_audit');
});

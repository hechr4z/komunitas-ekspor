<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('id', function ($routes) {
    // Visitor - Beranda
    $routes->get('/', 'KomunitasEkspor::index');

    // Visitor - Tentang Kami
    $routes->get('tentang-kami', 'KomunitasEkspor::tentang_kami');

    // Visitor - Landing Page Member
    $routes->get('landing-page', 'KomunitasEkspor::visitor_landing_page');

    // Visitor - Belajar Ekspor
    // $routes->get('belajar-ekspor', 'KomunitasEkspor::belajar_ekspor');
    // $routes->get('belajar-ekspor/search', 'KomunitasEkspor::search_belajar_ekspor');
    // $routes->get('belajar-ekspor/(:segment)', 'KomunitasEkspor::belajar_ekspor_detail/$1');
    // $routes->get('kategori/(:any)', 'KomunitasEkspor::kategori_belajar_ekspor/$1');

    // Visitior - Video Tutorial
    // $routes->get('tutorial-video', 'KomunitasEkspor::video_tutorial');
    // $routes->get('tutorial-video/kategori/(:segment)', 'KomunitasEkspor::video_selengkapnya/$1');
    // $routes->get('tutorial-video/(:segment)', 'KomunitasEkspor::video_tutorial_detail/$1');

    $routes->get('pendaftaran', 'KomunitasEkspor::pendaftaran');

    // Visitor - Data Member
    $routes->get('data-member', 'KomunitasEkspor::visitor_data_member');
    $routes->get('detail-member/(:any)', 'KomunitasEkspor::visitor_detail_member/$1');

    // Visitor - Data Buyer
    // $routes->get('data-buyers', 'KomunitasEkspor::data_buyers');
    // $routes->get('data-buyers/search', 'KomunitasEkspor::search_buyers');
});

$routes->group('en', function ($routes) {
    $routes->get('/', 'KomunitasEkspor::index');

    // Visitor - Tentang Kami
    $routes->get('about-us', 'KomunitasEkspor::tentang_kami');

    // Visitor - Belajar Ekspor
    // $routes->get('export-learning', 'KomunitasEkspor::belajar_ekspor');
    // $routes->get('export-learning/search', 'KomunitasEkspor::search_belajar_ekspor');
    // $routes->get('export-learning/(:segment)', 'KomunitasEkspor::belajar_ekspor_detail/$1');
    // $routes->get('category/(:any)', 'KomunitasEkspor::kategori_belajar_ekspor/$1');

    // Visitior - Video Tutorial
    // $routes->get('video-tutorial', 'KomunitasEkspor::video_tutorial');
    // $routes->get('video-tutorial/category/(:segment)', 'KomunitasEkspor::video_selengkapnya/$1');
    // $routes->get('video-tutorial/(:segment)', 'KomunitasEkspor::video_tutorial_detail/$1');

    $routes->get('registration', 'KomunitasEkspor::pendaftaran');

    // Visitor - Data Member
    $routes->get('data-member', 'KomunitasEkspor::visitor_data_member');
    $routes->get('detail-member/(:any)', 'KomunitasEkspor::visitor_detail_member/$1');

    // Visitor - Data Buyer
    // $routes->get('data-buyers', 'KomunitasEkspor::data_buyers');
    // $routes->get('data-buyers/search', 'KomunitasEkspor::search_buyers');
});

$routes->post('/user/checkAvailability', 'KomunitasEkspor::checkAvailability');

// login
$routes->get('login', 'KomunitasEkspor::login');
$routes->post('/auth/authenticate', 'KomunitasEkspor::authenticate');
$routes->get('/logout', 'KomunitasEkspor::logout');

$routes->post('/daftar-member', 'KomunitasEkspor::registrasiMember');

$routes->group('', ['filter' => 'auth'], function ($routes) {

    // Member - Daftar Premium
    $routes->get('/daftar-premium', 'KomunitasEkspor::daftarMemberPremium');

    // Member - Beranda
    $routes->get('/beranda', 'KomunitasEkspor::freeindex');

    // Member - Edit Member
    $routes->get('/edit-profile', 'KomunitasEkspor::edit_profile');
    $routes->post('/update-foto-profil', 'KomunitasEkspor::updateFotoProfil');
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
    // $routes->get('/member-data-buyers', 'KomunitasEkspor::member_data_buyers');

    // Member - Belajar Ekspor
    $routes->get('member-belajar-ekspor', 'KomunitasEkspor::member_belajar_ekspor');
    // $routes->get('member-belajar-ekspor/search', 'KomunitasEkspor::member_search_belajar_ekspor');
    $routes->get('member-belajar-ekspor-detail/(:segment)', 'KomunitasEkspor::member_belajar_ekspor_detail/$1');
    // $routes->get('member-kategori/(:any)', 'KomunitasEkspor::member_kategori_belajar_ekspor/$1');

    // Member - Video Tutorial
    $routes->get('/member-video-tutorial', 'KomunitasEkspor::member_video_tutorial');
    // $routes->get('/member-video-tutorial-selengkapnya/(:segment)', 'KomunitasEkspor::member_video_selengkapnya/$1');
    $routes->get('/member-video-tutorial-detail/(:segment)', 'KomunitasEkspor::member_video_tutorial_detail/$1');

    // Member - Website Audit
    // $routes->get('website-audit', 'KomunitasEkspor::website_audit');
    // $routes->post('add-website-audit', 'KomunitasEkspor::add_website_audit');
    // $routes->get('delete-website-audit/(:num)', 'KomunitasEkspor::delete_website_audit/$1');

    // Member - Kelayakan Investasi
    // $routes->get('/kelayakan-investasi', 'KomunitasEkspor::kelayakan_investasi');
});

$routes->group('', ['filter' => 'premium'], function ($routes) {
    // Premium - Beranda
    $routes->get('/beranda-premium', 'KomunitasEkspor::premiumindex');

    // Premium - Edit Member
    $routes->get('/edit-profile-premium', 'KomunitasEkspor::edit_profile_premium');
    $routes->post('/update-foto-profil-premium', 'KomunitasEkspor::updateFotoProfil_premium');
    $routes->post('/ubah-informasi-akun-premium', 'KomunitasEkspor::ubah_informasi_akun_premium');
    $routes->post('/ubah-profil-perusahaan-premium', 'KomunitasEkspor::ubah_profil_perusahaan_premium');
    $routes->post('/add-sertifikat-premium', 'KomunitasEkspor::add_sertifikat_premium');
    $routes->get('/delete-sertifikat-premium/(:num)', 'KomunitasEkspor::delete_sertifikat_premium/$1');
    $routes->post('/add-produk-premium', 'KomunitasEkspor::add_produk_premium');
    $routes->get('/delete-produk-premium/(:num)', 'KomunitasEkspor::delete_produk_premium/$1');

    // Premium - Aplikasi Kalkulator Ekspor
    $routes->get('/kalkulator-ekspor-premium', 'KomunitasEkspor::index_kalkulator_premium');

    $routes->post('/ganti-satuan-premium/(:num)', 'KomunitasEkspor::ganti_satuan_premium/$1');

    $routes->post('/komponen-exwork-premium/add', 'KomunitasEkspor::add_exwork_premium');
    $routes->get('/komponen-exwork-premium/delete/(:num)', 'KomunitasEkspor::delete_exwork_premium/$1');

    $routes->post('/komponen-fob-premium/add', 'KomunitasEkspor::add_fob_premium');
    $routes->get('/komponen-fob-premium/delete/(:num)', 'KomunitasEkspor::delete_fob_premium/$1');

    $routes->post('/komponen-cfr-premium/add', 'KomunitasEkspor::add_cfr_premium');
    $routes->get('/komponen-cfr-premium/delete/(:num)', 'KomunitasEkspor::delete_cfr_premium/$1');

    $routes->post('/komponen-cif-premium/add', 'KomunitasEkspor::add_cif_premium');
    $routes->get('/komponen-cif-premium/delete/(:num)', 'KomunitasEkspor::delete_cif_premium/$1');

    // Premium - Pengumuman
    $routes->get('/pengumuman-premium', 'KomunitasEkspor::pengumuman_premium');
    $routes->get('/detail-pengumuman-premium/(:segment)', 'KomunitasEkspor::detail_pengumuman_premium/$1');

    // MPM
    $routes->get('/mpm-premium', 'KomunitasEkspor::mpm_premium');
    $routes->post('/mpm-add-premium', 'KomunitasEkspor::add_mpm_premium');
    $routes->post('/mpm-edit-premium', 'KomunitasEkspor::edit_mpm_premium');
    $routes->get('mpm-premium/getEmailsByDate/(:num)/(:num)', 'KomunitasEkspor::getEmailsByDate_premium/$1/$2');

    // Premium - Website Audit
    $routes->get('website-audit', 'KomunitasEkspor::website_audit');
    $routes->post('add-website-audit', 'KomunitasEkspor::add_website_audit');
    $routes->get('delete-website-audit/(:num)', 'KomunitasEkspor::delete_website_audit/$1');

    // Premium - Kelayakan Investasi
    $routes->get('kelayakan-investasi', 'KomunitasEkspor::kelayakan_investasi');

    // Premium - Data Member
    $routes->get('premium-data-member', 'KomunitasEkspor::premium_data_member');
    $routes->get('premium-detail-member/(:any)', 'KomunitasEkspor::premium_detail_member/$1');

    // Premium  Data Buyers
    $routes->get('data-buyers', 'KomunitasEkspor::data_buyers');

    // Premium - Belajar Ekspor
    $routes->get('premium-belajar-ekspor', 'KomunitasEkspor::premium_belajar_ekspor');
    $routes->get('premium-belajar-ekspor/search', 'KomunitasEkspor::premium_search_belajar_ekspor');
    $routes->get('premium-belajar-ekspor-detail/(:segment)', 'KomunitasEkspor::premium_belajar_ekspor_detail/$1');
    $routes->get('premium-kategori/(:any)', 'KomunitasEkspor::premium_kategori_belajar_ekspor/$1');

    // Premium - Video Tutorial
    $routes->get('/premium-video-tutorial', 'KomunitasEkspor::premium_video_tutorial');
    $routes->get('/premium-video-tutorial-selengkapnya/(:segment)', 'KomunitasEkspor::premium_video_selengkapnya/$1');
    $routes->get('/premium-video-tutorial-detail/(:segment)', 'KomunitasEkspor::premium_video_tutorial_detail/$1');
});

$routes->group('', ['filter' => 'admin'], function ($routes) {
    // Admin - Dashboard
    $routes->get('/admin-dashboard', 'KomunitasEkspor::admin_dashboard');

    // Admin - Member
    $routes->get('/admin-member', 'KomunitasEkspor::admin_member');
    $routes->get('/admin-search-member', 'KomunitasEkspor::admin_search_member');
    $routes->get('/admin-add-member', 'KomunitasEkspor::admin_add_member');
    $routes->post('/admin-create-member', 'KomunitasEkspor::admin_create_member');
    $routes->get('/admin-edit-member/(:num)', 'KomunitasEkspor::admin_edit_member/$1');
    $routes->post('/admin-update-member/(:num)', 'KomunitasEkspor::admin_update_member/$1');
    $routes->get('/admin-delete-member/(:num)', 'KomunitasEkspor::admin_delete_member/$1');

    // Admin - Buyers
    $routes->get('/admin-buyers', 'KomunitasEkspor::admin_buyers');
    $routes->get('/admin-search-buyers', 'KomunitasEkspor::admin_search_buyers');
    $routes->get('/admin-add-buyers', 'KomunitasEkspor::admin_add_buyers');
    $routes->post('/admin-create-buyers', 'KomunitasEkspor::admin_create_buyers');
    $routes->get('/admin-edit-buyers/(:num)', 'KomunitasEkspor::admin_edit_buyers/$1');
    $routes->post('/admin-update-buyers/(:num)', 'KomunitasEkspor::admin_update_buyers/$1');
    $routes->get('/admin-delete-buyers/(:num)', 'KomunitasEkspor::admin_delete_buyers/$1');

    // Admin - Produk
    $routes->get('/admin-produk', 'KomunitasEkspor::admin_produk');
    $routes->get('/admin-search-produk', 'KomunitasEkspor::admin_search_produk');
    $routes->get('/admin-add-produk', 'KomunitasEkspor::admin_add_produk');
    $routes->post('/admin-create-produk', 'KomunitasEkspor::admin_create_produk');
    $routes->get('/admin-edit-produk/(:num)', 'KomunitasEkspor::admin_edit_produk/$1');
    $routes->post('/admin-update-produk/(:num)', 'KomunitasEkspor::admin_update_produk/$1');
    $routes->get('/admin-delete-produk/(:num)', 'KomunitasEkspor::admin_delete_produk/$1');

    // Admin - Sertifikat
    $routes->get('/admin-sertifikat', 'KomunitasEkspor::admin_sertifikat');
    $routes->get('/admin-search-sertifikat', 'KomunitasEkspor::admin_search_sertifikat');
    $routes->get('/admin-add-sertifikat', 'KomunitasEkspor::admin_add_sertifikat');
    $routes->post('/admin-create-sertifikat', 'KomunitasEkspor::admin_create_sertifikat');
    $routes->get('/admin-edit-sertifikat/(:num)', 'KomunitasEkspor::admin_edit_sertifikat/$1');
    $routes->post('/admin-update-sertifikat/(:num)', 'KomunitasEkspor::admin_update_sertifikat/$1');
    $routes->get('/admin-delete-sertifikat/(:num)', 'KomunitasEkspor::admin_delete_sertifikat/$1');

    // Admin - Belajar Ekspor
    $routes->get('/admin-belajar-ekspor', 'KomunitasEkspor::admin_belajar_ekspor');
    $routes->get('/admin-belajar-ekspor-search', 'KomunitasEkspor::admin_search_belajar');
    $routes->get('/admin-belajar-ekspor-tambah', 'KomunitasEkspor::admin_belajar_ekspor_tambah');
    $routes->post('/admin-belajar-ekspor-create', 'KomunitasEkspor::admin_belajar_ekspor_store');
    $routes->get('/admin-belajar-ekspor-ubah/(:num)', 'KomunitasEkspor::admin_belajar_ekspor_ubah/$1');
    $routes->post('/admin-belajar-ekspor-update/(:num)', 'KomunitasEkspor::admin_belajar_ekspor_update/$1');
    $routes->get('/admin-belajar-ekspor-delete/(:num)', 'KomunitasEkspor::admin_belajar_ekspor_delete/$1');

    // Admin - Kategori Belajar Ekspor
    $routes->get('/admin-kategori-belajar-ekspor', 'KomunitasEkspor::admin_kategori_belajar_ekspor');
    $routes->get('/admin-kategori-belajar-ekspor-tambah', 'KomunitasEkspor::admin_kategori_belajar_ekspor_tambah');
    $routes->get('/admin-kategori-belajar-ekspor-ubah/(:num)', 'KomunitasEkspor::admin_kategori_belajar_ekspor_ubah/$1');
    $routes->post('/admin-kategori-belajar-ekspor-create', 'KomunitasEkspor::admin_kategori_belajar_ekspor_store/$1');
    $routes->post('/admin-kategori-belajar-ekspor-update/(:num)', 'KomunitasEkspor::admin_kategori_belajar_ekspor_update/$1');
    $routes->get('/admin-kategori-belajar-ekspor-delete/(:num)', 'KomunitasEkspor::admin_kategori_belajar_ekspor_delete/$1');

    // Admin - Video Tutorial
    $routes->get('/admin-video-tutorial', 'KomunitasEkspor::admin_video_tutorial');
    $routes->get('/admin-video-tutorial-tambah', 'KomunitasEkspor::admin_video_tutorial_tambah');
    $routes->post('/admin-vidio-tutorial-create', 'KomunitasEkspor::admin_video_tutorial_store/$1');
    $routes->get('/admin-video-tutorial-ubah/(:num)', 'KomunitasEkspor::admin_video_tutorial_ubah/$1');
    $routes->post('/admin-video-tutorial-update/(:num)', 'KomunitasEkspor::admin_video_tutorial_update/$1');
    $routes->get('/admin-video-tutorial-delete/(:num)', 'KomunitasEkspor::admin_video_tutorial_delete/$1');

    // Admin - Kategori Video Tutorial
    $routes->get('/admin-kategori-video-tutorial', 'KomunitasEkspor::admin_kategori_video_tutorial');
    $routes->get('/admin-kategori-video-tutorial-tambah', 'KomunitasEkspor::admin_kategori_video_tutorial_tambah');
    $routes->post('/admin-kategori-vidio-tutorial-create', 'KomunitasEkspor::admin_kategori_vidio_tutorial_store/$1');
    $routes->get('/admin-kategori-video-tutorial-ubah/(:num)', 'KomunitasEkspor::admin_kategori_video_tutorial_ubah/$1');
    $routes->post('/admin-kategori-video-tutorial-update/(:num)', 'KomunitasEkspor::admin_kategori_video_tutorial_update/$1');
    $routes->get('/admin-kategori-video-tutorial-delete/(:num)', 'KomunitasEkspor::admin_kategori_video_tutorial_delete/$1');

    // Admin - Kalkulator Ekspor
    // EXWORK
    $routes->get('/admin-exwork', 'KomunitasEkspor::admin_exwork');
    $routes->get('/admin-search-exwork', 'KomunitasEkspor::admin_search_exwork');
    $routes->get('/admin-add-exwork', 'KomunitasEkspor::admin_add_exwork');
    $routes->post('/admin-create-exwork', 'KomunitasEkspor::admin_create_exwork');
    $routes->get('/admin-edit-exwork/(:num)', 'KomunitasEkspor::admin_edit_exwork/$1');
    $routes->post('/admin-update-exwork/(:num)', 'KomunitasEkspor::admin_update_exwork/$1');
    $routes->get('/admin-delete-exwork/(:num)', 'KomunitasEkspor::admin_delete_exwork/$1');
    // FOB
    $routes->get('/admin-fob', 'KomunitasEkspor::admin_fob');
    $routes->get('/admin-search-fob', 'KomunitasEkspor::admin_search_fob');
    $routes->get('/admin-add-fob', 'KomunitasEkspor::admin_add_fob');
    $routes->post('/admin-create-fob', 'KomunitasEkspor::admin_create_fob');
    $routes->get('/admin-edit-fob/(:num)', 'KomunitasEkspor::admin_edit_fob/$1');
    $routes->post('/admin-update-fob/(:num)', 'KomunitasEkspor::admin_update_fob/$1');
    $routes->get('/admin-delete-fob/(:num)', 'KomunitasEkspor::admin_delete_fob/$1');
    // CFR
    $routes->get('/admin-cfr', 'KomunitasEkspor::admin_cfr');
    $routes->get('/admin-search-cfr', 'KomunitasEkspor::admin_search_cfr');
    $routes->get('/admin-add-cfr', 'KomunitasEkspor::admin_add_cfr');
    $routes->post('/admin-create-cfr', 'KomunitasEkspor::admin_create_cfr');
    $routes->get('/admin-edit-cfr/(:num)', 'KomunitasEkspor::admin_edit_cfr/$1');
    $routes->post('/admin-update-cfr/(:num)', 'KomunitasEkspor::admin_update_cfr/$1');
    $routes->get('/admin-delete-cfr/(:num)', 'KomunitasEkspor::admin_delete_cfr/$1');
    // CIF
    $routes->get('/admin-cif', 'KomunitasEkspor::admin_cif');
    $routes->get('/admin-search-cif', 'KomunitasEkspor::admin_search_cif');
    $routes->get('/admin-add-cif', 'KomunitasEkspor::admin_add_cif');
    $routes->post('/admin-create-cif', 'KomunitasEkspor::admin_create_cif');
    $routes->get('/admin-edit-cif/(:num)', 'KomunitasEkspor::admin_edit_cif/$1');
    $routes->post('/admin-update-cif/(:num)', 'KomunitasEkspor::admin_update_cif/$1');
    $routes->get('/admin-delete-cif/(:num)', 'KomunitasEkspor::admin_delete_cif/$1');
    // Satuan
    $routes->get('/admin-satuan', 'KomunitasEkspor::admin_satuan');
    $routes->get('/admin-search-satuan', 'KomunitasEkspor::admin_search_satuan');
    $routes->get('/admin-edit-satuan/(:num)', 'KomunitasEkspor::admin_edit_satuan/$1');
    $routes->post('/admin-update-satuan/(:num)', 'KomunitasEkspor::admin_update_satuan/$1');

    // Admin - MPM
    $routes->get('/admin-mpm', 'KomunitasEkspor::admin_mpm');
    $routes->get('/admin-search-mpm', 'KomunitasEkspor::admin_search_mpm');

    // Admin - Website Audit
    $routes->get('/admin-website-audit', 'KomunitasEkspor::admin_website_audit');
    $routes->get('/admin-search-website-audit', 'KomunitasEkspor::admin_search_website_audit');
    $routes->get('/admin-process-website-audit/(:num)', 'KomunitasEkspor::admin_process_website_audit/$1');
    $routes->post('/admin-done-website-audit/(:num)', 'KomunitasEkspor::admin_done_website_audit/$1');

    // Admin - Pengumuman
    $routes->get('/admin-pengumuman', 'KomunitasEkspor::admin_pengumuman');
    $routes->get('/admin-add-pengumuman', 'KomunitasEkspor::admin_add_pengumuman');
    $routes->post('/admin-add-pengumuman-create', 'KomunitasEkspor::admin_add_pengumuman_create/$1');
    $routes->get('/admin-edit-pengumuman/(:num)', 'KomunitasEkspor::admin_edit_pengumuman/$1');
    $routes->post('/admin-update-pengumuman/(:num)', 'KomunitasEkspor::admin_update_pengumuman/$1');
    $routes->get('/admin-delete-pengumuman/(:num)', 'KomunitasEkspor::admin_delete_pengumuman/$1');


    // Admin - Manfaat Join
    $routes->get('/admin-manfaat-join', 'KomunitasEkspor::admin_manfaat_join');
    $routes->get('/admin-edit-manfaat-join/(:num)', 'KomunitasEkspor::admin_edit_manfaat_join/$1');
    $routes->post('/admin-manfaat-join-update/(:num)', 'KomunitasEkspor::admin_update_manfaat_join/$1');

    // Admin - Slider
    $routes->get('/admin-slider', 'KomunitasEkspor::admin_slider');
    $routes->get('/admin-edit-slider/(:num)', 'KomunitasEkspor::admin_edit_slider/$1');
    $routes->post('/admin-update-slider/(:num)', 'KomunitasEkspor::admin_update_slider/$1');
    $routes->get('/admin-delete-slider/(:num)', 'KomunitasEkspor::admin_delete_slider/$1');

    // Admin - Web Profile
    $routes->get('/admin-web-profile', 'KomunitasEkspor::admin_web_profile');
    $routes->get('/admin-edit-web-profile/(:num)', 'KomunitasEkspor::admin_edit_web_profile/$1');
    $routes->post('/admin-update-webprofile/(:num)', 'KomunitasEkspor::admin_update_webprofile/$1');

    // Admin - tentang kami
    $routes->get('/admin-tentang-kami', 'KomunitasEkspor::admin_tentang_kami');
    $routes->get('/admin-edit-tentang-kami/(:num)', 'KomunitasEkspor::edit_admin_tentang_kami/$1');
    $routes->post('/admin-update-tentang-kami/(:num)', 'KomunitasEkspor::update_admin_tentang_kami/$1');
});

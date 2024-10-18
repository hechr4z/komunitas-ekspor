<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/belajar-ekspor', 'KomunitasEkspor::belajar_ekspor');
$routes->get('/belajar-ekspor-detail', 'KomunitasEkspor::belajar_ekspor_detail');
$routes->get('/pendaftaran', 'KomunitasEkspor::pendaftaran');
$routes->get('/video-tutorial', 'KomunitasEkspor::video_tutorial');
$routes->get('/video-tutorial-selengkapnya', 'KomunitasEkspor::video_selengkapnya');
$routes->get('/video-tutorial-detail', 'KomunitasEkspor::video_tutorial_detail');
$routes->post('daftar-member', 'KomunitasEkspor::registrasiMember');
$routes->get('/data-member', 'KomunitasEkspor::data_member');
$routes->get('/detail-member', 'KomunitasEkspor::detail_member');

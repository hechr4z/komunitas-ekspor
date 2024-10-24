<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= isset($meta_title) ? $meta_title : 'Default Title'; ?></title>
    <meta name="title" content="<?= isset($meta_title) ? $meta_title : 'Default Title for the website.'; ?>">
    <meta name="description" content="<?= isset($meta_description) ? $meta_description : 'Default description for the website.'; ?>">

    <?= $this->renderSection('meta'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<style>
    .language-btn {
        padding: 5px 10px;
        /* Ubah padding sesuai keinginan */
        font-size: 0.875rem;
        /* Ubah ukuran font */
        width: 70px;
        height: 30px;
    }

    .flag-icon {
        width: 20px;
        /* Ubah ukuran bendera jika perlu */
        height: auto;
        /* Mempertahankan rasio aspek */
    }

    /* hover header */
    .social-link i {
        color: white;
        font-size: 17px;
        transition: color 0.3s ease, transform 0.3s ease;
        /* Menambahkan transisi pada transform */
    }

    .social-link:hover i {
        color: #03AADE;
        transform: scale(1.1);
        /* Menambahkan efek scaling saat hover */
    }

    .language-btn {
        background-color: transparent;
        border: 1px solid white;
        transition: all 0.3s ease;
    }

    .language-btn:hover {
        background-color: #03AADE;
        border-color: #03AADE;
    }

    .language-btn img {
        transition: transform 0.3s ease;
    }

    .language-btn:hover img {
        transform: scale(1.1);
    }

    /* end */

    /* hover navbar */
    .navbar-nav .nav-link,
    .dropdown-item {
        color: white;
        font-weight: 500;
        padding: 10px 15px;
        position: relative;
        transition: color 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover,
    .dropdown-item:hover {
        color: #FFD700;
    }

    .navbar-nav .nav-link::before,
    .dropdown-item::before {
        content: "";
        position: absolute;
        width: 0;
        height: 3px;
        bottom: 0;
        left: 0;
        background-color: #FFD700;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover::before,
    .dropdown-item:hover::before {
        visibility: visible;
        width: 100%;
    }

    /* Dropdown */
    .dropdown-menu .dropdown-item {
        color: black;
        position: relative;
        transition: color 0.3s ease-in-out;
    }

    .dropdown-menu .dropdown-item:hover {
        color: #FFD700;
    }

    .dropdown-menu .dropdown-item::before {
        content: "";
        position: absolute;
        width: 0;
        height: 3px;
        bottom: 0;
        left: 0;
        background-color: #FFD700;
        visibility: hidden;
        transition: all 0.3s ease-in-out;
    }

    .dropdown-menu .dropdown-item:hover::before {
        visibility: visible;
        width: 100%;
    }

    /* end */

    /* sticky navbar */
    .navbar-custom {
        transition: background-color 0.3s ease, padding 1s ease;
    }

    .navbar-custom.scrolled {
        background-color: rgba(0, 0, 0, 0.8);
        padding: 13px 0;
    }

    .nav-link {
        color: #fff;
    }

    /* end */
    .dropdown-menu {
        position: absolute;
        z-index: 1050;
    }

    .dropdown-menu-end {
        right: 0;
        left: auto;
    }

    #languageDropdown::after {
        border-color: black transparent transparent transparent;
    }

    /* From Uiverse.io by akshayjalluri6 */
    .container2 {
        display: flex;
    }

    .Btn {
        border: none;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition-duration: 0.4s;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        margin-left: 10px;
    }

    .instagram {
        background: #f09433;
        background: -moz-linear-gradient(45deg,
                #f09433 0%,
                #e6683c 25%,
                #dc2743 50%,
                #cc2366 75%,
                #bc1888 100%);
        background: -webkit-linear-gradient(45deg,
                #f09433 0%,
                #e6683c 25%,
                #dc2743 50%,
                #cc2366 75%,
                #bc1888 100%);
        background: linear-gradient(45deg,
                #f09433 0%,
                #e6683c 25%,
                #dc2743 50%,
                #cc2366 75%,
                #bc1888 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f09433', endColorstr='#bc1888', GradientType=1);
    }

    .youtube {
        background-color: #ff0000;
    }

    .twitter {
        background-color: #1da1f2;
    }

    .Btn:hover {
        width: 110px;
        transition-duration: 0.4s;
        border-radius: 30px;
    }

    .Btn:hover .text {
        opacity: 1;
        transition-duration: 0.4s;
    }

    .Btn:hover .svgIcon {
        opacity: 0;
        transition-duration: 0.3s;
    }

    .text {
        position: absolute;
        color: rgb(255, 255, 255);
        width: 120px;
        font-weight: 600;
        opacity: 0;
        transition-duration: 0.4s;
    }

    .svgIcon {
        transition-duration: 0.3s;
    }

    .svgIcon path {
        fill: white;
    }

    /* end */

    /* footer hover */
    .footer-link {
        color: #fff;
        text-decoration: none;
        position: relative;
        transition: color 0.3s ease;
    }

    .footer-link:hover {
        color: #FFD700;
    }

    .footer-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background-color: #FFD700;
        bottom: -5px;
        left: 0;
        transition: width 0.3s ease;
    }

    .footer-link:hover::after {
        width: 100%;
    }

    h5 {
        font-size: 1.2rem;
    }

    p {
        margin-bottom: 10px;
    }

    /* end */

    /* jarak footer */
    .list-unstyled p {
        margin-bottom: 20px;
    }

    /* end */

    /* footer facebook */
    .Btn.facebook {
        background-color: blue;
    }

    .Btn.facebook:hover {
        background-color: darkblue;
    }

    /* end */
</style>

<body>
    <?php
    // Ambil bahasa yang disimpan di session
    $lang = session()->get('lang') ?? 'id'; // Default ke 'en' jika tidak ada di session

    $current_url = uri_string();

    // Ambil query string (misalnya ?keyword=sukses)
    $query_string = $_SERVER['QUERY_STRING']; // Mengambil query string dari URL

    // Simpan segmen bahasa saat ini
    $lang_segment = substr($current_url, 0, strpos($current_url, '/') + 1); // Menyimpan 'id/' atau 'en/'

    // Definisikan tautan untuk setiap halaman berdasarkan bahasa
    $homeLink = ($lang_segment === 'en/') ? '/' : '/';
    $belajarEksporLink = ($lang_segment === 'en/') ? 'export-learning' : 'belajar-ekspor';
    $pendaftaranLink = ($lang_segment === 'en/') ? 'registration' : 'pendaftaran';
    $videoTutorialLink = ($lang_segment === 'en/') ? 'video-tutorial' : 'tutorial-video';
    $memberLink = ($lang_segment === 'en/') ? 'data-member' : 'data-member';
    $buyersLink = ($lang_segment === 'en/') ? 'data-buyers' : 'data-buyers';

    // Buat array untuk menggantikan segmen berdasarkan bahasa
    $replace_map = [
        'pendaftaran' => 'registration',
        'belajar-ekspor' => 'export-learning',

    ];

    // Ambil bagian dari URL tanpa segmen bahasa
    $url_without_lang = substr($current_url, strlen($lang_segment));

    // Tentukan bahasa yang ingin digunakan
    $new_lang_segment = ($lang_segment === 'en/') ? 'id/' : 'en/';

    // Gantikan setiap segmen dalam URL berdasarkan bahasa yang aktif
    foreach ($replace_map as $indonesian_segment => $english_segment) {
        if ($lang_segment === 'en/') {
            // Jika bahasa yang dipilih adalah 'en', maka ganti segmen ID ke EN
            $url_without_lang = str_replace($english_segment, $indonesian_segment, $url_without_lang);
        } else {
            // Jika bahasa yang dipilih adalah 'id', maka ganti segmen EN ke ID
            $url_without_lang = str_replace($indonesian_segment, $english_segment, $url_without_lang);
        }
    }

    // Tautan dengan bahasa yang baru
    $clean_url = $new_lang_segment . ltrim($url_without_lang, '/');

    // Gabungkan query string jika ada
    if (!empty($query_string)) {
        $clean_url .= '?' . $query_string;
    }


    // Tautan Bahasa Inggris
    $english_url = base_url($clean_url);

    // Tautan Bahasa Indonesia
    $indonesia_url = base_url($clean_url);
    ?>


    <!-- header -->
    <header class="header" style="background-color: #F2BF02;">
        <div class="container">
            <div class="head d-flex justify-content-between align-items-center" style="width: 100%; height: 40px;">
                <!-- Alamat dan Email -->
                <div class="d-flex justify-content-start gap-3">
                    <div class="d-flex align-items-center gap-2 icon-text text-light" style="white-space: nowrap;">
                        <i class="fas fa-map-marker-alt m-0" style="font-size: 12px; color: white;"></i>
                        <p class="mb-0" style="color: white; font-size: 12px;">Sawojajar, Malang, Jawa Timur</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 icon-text text-light" style="white-space: nowrap;">
                        <i class="fas fa-envelope m-0" style="font-size: 12px; color: white;"></i>
                        <p class="mb-0" style="color: white; font-size: 12px;">komunitasekspor@gmail.com</p>
                    </div>
                </div>
                <!-- Ikon Sosial Media dan Garis -->
                <div class="d-flex align-items-center" style="margin-left: 500px;">
                    <div class="d-flex gap-3 me-4" style="margin-left: 190px;">
                        <a href="https://www.instagram.com" target="_blank" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com" target="_blank" class="social-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://www.facebook.com" target="_blank" class="social-link">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                    <div class="border-top" style="width: 1.5px; height: 20px; background-color: white;"></div>
                </div>
                <!-- Language Dropdown -->
                <div class="dropdown">
                    <button class="btn text-light language-btn" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/img/flag-<?= $lang === 'id' ? 'id' : 'en'; ?>.png" alt="<?= $lang === 'id' ? 'Indonesian' : 'English'; ?>" class="flag-icon mb-1">
                        <i class="bi bi-chevron-down ms-1"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <li>
                            <a class="dropdown-item <?= $lang == 'id' ? 'disabled' : '' ?>" href="<?= $english_url ?>" <?= $lang == 'id' ? 'style="pointer-events: none; opacity: 0.5;"' : '' ?>>
                                <img src="/img/flag-id.png" alt="Indonesian" class="flag-icon" <?= $lang == 'id' ? 'style="filter: grayscale(100%);"' : '' ?>> Indonesian
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item <?= $lang == 'en' ? 'disabled' : '' ?>" href="<?= $indonesia_url ?>" <?= $lang == 'en' ? 'style="pointer-events: none; opacity: 0.5;"' : '' ?>>
                                <img src="/img/flag-en.png" alt="English" class="flag-icon" <?= $lang == 'en' ? 'style="filter: grayscale(100%);"' : '' ?>> English
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->


    <!-- start navbar -->
    <nav class="navbar navbar-custom navbar-expand-lg sticky-top" style="background-color: #03AADE;">
        <div class="container d-flex justify-content-between align-items-center py-1">
            <img onclick="window.location.href='/'" style="width:160px;" src="/img/logokei.png" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/') ?>"> <?php echo lang('Blog.headerBeranda'); ?>
                        </a>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn dropdown-toggle text-light nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo lang('Blog.headerArtikel'); ?>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-light">
                                    <li><a class="dropdown-item nav-link" href="<?= base_url($lang .  '/' . $belajarEksporLink) ?>"><?php echo lang('Blog.headerArtikel'); ?></a></li>
                                    <li><a class="dropdown-item nav-link" href="<?= base_url('video-tutorial') ?>"><?php echo lang('Blog.headerVideo'); ?>
                                        </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url($lang .  '/' . $pendaftaranLink) ?>"><?php echo lang('Blog.headerPendaftaran'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url($lang .  '/' . $memberLink) ?>"><?php echo lang('Blog.headerMember'); ?></a>
                    </li>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn dropdown-toggle text-light nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo lang('Blog.headerAplikasi'); ?>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-light">
                                    <li><a class="dropdown-item" href="<?= base_url('kalkulator-ekspor') ?>"><?php echo lang('Blog.headerApp1'); ?></a></li>
                                    <li><a class="dropdown-item" href="<?= base_url('mpm') ?>"><?php echo lang('Blog.headerApp2'); ?></a></li>
                                    <li><a class="dropdown-item" href="#"><?php echo lang('Blog.headerApp3'); ?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url($lang . '/' . $buyersLink) ?>"><?php echo lang('Blog.headerBuyers'); ?>
                        </a>
                    </li>
                    <div class="border-top" style="width: 1.5px; height: 40px; background-color: white; margin: 0 23px;"></div>
                    <a href="<?= ($lang == 'en') ? base_url('/en/login') : base_url('/id/login') ?>"><button type="button" class="btn btn-outline-light">Login</button></a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- content -->
    <div>
        <?= $this->renderSection('content'); ?>
    </div>
    <!-- end content -->

    <!-- start footer -->
    <footer class="mt-5" style="background-color: #03AADE; color: #fff;">
        <div class="footer py-5">
            <div class="container">
                <div class="row d-flex justify-content-center gap-5">
                    <!-- Logo and Company Description -->
                    <div class="col-md-6 mb-4">
                        <img src="/img/logokei.png" alt="logo" style="width: 180px;">
                        <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <!-- Social Media Icons -->
                        <div class="container2 gap-2 mt-3">
                            <button class="Btn instagram">
                                <svg
                                    class="svgIcon"
                                    viewBox="0 0 448 512"
                                    height="1.5em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                </svg>
                                <span class="text">Instagram</span>
                            </button>

                            <button class="Btn youtube">
                                <svg
                                    class="svgIcon"
                                    viewBox="0 0 576 512"
                                    height="1.5em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M549.655 148.28c-6.281-23.64-24.041-42.396-47.655-48.685C462.923 85 288 85 288 85S113.077 85 74 99.595c-23.614 6.289-41.374 25.045-47.655 48.685-12.614 47.328-12.614 147.717-12.614 147.717s0 100.39 12.614 147.718c6.281 23.64 24.041 42.396 47.655 48.684C113.077 427 288 427 288 427s174.923 0 214-14.595c23.614-6.289 41.374-25.045 47.655-48.685 12.614-47.328 12.614-147.718 12.614-147.718s0-100.389-12.614-147.717zM240 336V176l144 80-144 80z"></path>
                                </svg>
                                <span class="text">YouTube</span>
                            </button>

                            <button class="Btn facebook">
                                <svg
                                    class="svgIcon"
                                    viewBox="0 0 512 512"
                                    height="1.5em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.5 90.7 225.9 209 240v-168h-63v-72h63v-55.2c0-62.2 37-96.8 93.6-96.8 27.1 0 55.4 4.8 55.4 4.8v61h-31.2c-30.8 0-40.4 19.1-40.4 38.7V256h68l-11 72h-57v168c118.3-14.1 209-116.5 209-240z"
                                        fill="white"></path>
                                </svg>
                                <span class="text">Facebook</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h5 class="mt-4"><b>Menu</b></h5>
                        <div class="list-unstyled pt-2">
                            <p><a href="<?= base_url($lang .  '/' . $belajarEksporLink) ?>" class="footer-link"><?php echo lang('Blog.headerArtikel'); ?></a></p>
                            <p><a href="#" class="footer-link"><?php echo lang('Blog.headerVideo'); ?></a></p>
                            <p><a href="<?= base_url($lang .  '/' . $memberLink) ?>" class="footer-link"><?php echo lang('Blog.headerMember'); ?></a></p>
                            <p><a href="#" class="footer-link"><?php echo lang('Blog.headerBuyers'); ?></a></p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h5 class="mt-4"><b><?php echo lang('Blog.headerAplikasi'); ?></b></h5>
                        <div class="list-unstyled pt-2">
                            <p><a href="<?= base_url('kalkulator-ekspor') ?>" class="footer-link"><?php echo lang('Blog.headerApp1'); ?></a></p>
                            <p><a href="<?= base_url('mpm') ?>" class="footer-link"><?php echo lang('Blog.headerApp2'); ?></a></p>
                            <p><a href="#" class="footer-link"><?php echo lang('Blog.headerApp3'); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Bottom Footer -->
    <div class="py-4" style="background-color: #F2BF02; height: 70px;">
        <div class="container">
            <p class="text-light mb-0 ms-5 ps-1">&copy; 2024 Komunitas Ekspor Indonesia 24. All rights reserved.</p>
        </div>
    </div>


    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar-custom');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
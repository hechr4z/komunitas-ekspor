<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= isset($meta_title) ? $meta_title : 'Default Title'; ?></title>
    <meta name="title" content="<?= isset($meta_title) ? $meta_title : 'Default Title for the website.'; ?>">
    <meta name="description"
        content="<?= isset($meta_description) ? $meta_description : 'Default description for the website.'; ?>">

    <?= $this->renderSection('meta'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    @media (max-width: 768px) {

        .header,
        .container,
        .head,
        .icon,
        .icon-text {
            width: 100%;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            overflow: hidden;
        }

        .icon-text {
            position: relative;
            left: 50px;
        }

        .border-top {
            width: 90px !important;
            height: 1.5px !important;
            margin: 10px 0 !important;
        }

        .navbar img {
            margin-left: 50px;
        }

        .py-4 p {
            text-align: center;
        }

        .col-md-6 img {
            margin-left: 30px;
        }

        .col-md-6 p {
            margin-left: 30px;
        }

        .container2 {
            margin-left: 20px;
        }
    }

    @media (max-width: 576px) {
        .col-md-2 h5 {
            margin-left: 30px;
        }

        .col-md-2 p {
            margin-left: 30px;
        }

        .icon-text {
            font-size: 10px;
        }
    }

    @media (max-width: 425px) {
        .icon-text {
            font-size: 6px;
            position: relative;
            left: 30px;
        }

        .social-link {
            position: relative;
            right: 20px;
        }

        .navbar img {
            position: relative;
            right: 30px;
        }

        .navbar-toggler {
            margin-right: 20px;
        }

        .py-4 p {
            font-size: 13px;
            position: relative;
            right: 22px;
            top: 4px;
        }
    }

    @media (max-width: 375px) {
        .py-4 p {
            font-size: 10px;
            position: relative;
            right: 22px;
            top: 4px;
        }
    }

    @media (max-width: 320px) {
        .icon-text {
            font-size: 5px;
            position: relative;
            left: 20px;
        }

        .py-4 p {
            font-size: 9px;
            position: relative;
            right: 22px;
            top: 3px;
        }
    }
</style>

<body>
    <!-- header -->
    <header class="header" style="background-color: #F2BF02;">
        <div class="container">
            <div class="head d-flex justify-content-between align-items-center" style="width: 100%; height: 40px;">
                <!-- Alamat dan Email -->
                <div class="d-flex justify-content-start gap-3">
                    <div class="d-flex align-items-center gap-2 icon-text text-light" style="white-space: nowrap;">
                        <i class="fas fa-map-marker-alt m-0" style="color: white;"></i>
                        <p class="mb-0" style="color: white;"><?= $webprofile[0]['lokasi_web'] ?></p>
                    </div>
                    <div class="d-flex align-items-center gap-2 icon-text text-light" style="white-space: nowrap;">
                        <i class="fas fa-envelope m-0" style="color: white;"></i>
                        <p class="mb-0" style="color: white;"><?= $webprofile[0]['email_web'] ?></p>
                    </div>
                </div>
                <!-- Ikon Sosial Media dan Garis -->
                <div class="d-flex align-items-center">
                    <div class="d-flex gap-2">
                        <a href="<?= 'https://' . $webprofile[0]['link_ig_web'] ?>" target="_blank" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="<?= 'https://' . $webprofile[0]['link_yt_web'] ?>" target="_blank" class="social-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="<?= 'https://' . $webprofile[0]['link_fb_web'] ?>" target="_blank" class="social-link">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->


    <!-- start navbar -->
    <nav class="navbar navbar-custom navbar-expand-lg sticky-top" style="background-color: #03AADE;">
        <div class="container d-flex justify-content-between align-items-center py-1">
            <img onclick="window.location.href='/beranda'" style="width:160px;"
                src="<?= base_url('img/' . $webprofile[0]['logo_web']); ?>" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse line" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/beranda') ?>">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/pengumuman') ?>">
                            Pengumuman
                        </a>
                    </li>
                    <div id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn dropdown-toggle text-light nav-link" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Belajar Ekspor
                                </button>
                                <ul class="dropdown-menu dropdown-menu-light">
                                    <li>
                                        <a class="dropdown-item nav-link"
                                            href="<?= base_url('member-belajar-ekspor') ?>">
                                            Belajar Ekspor
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link"
                                            href="<?= base_url('member-video-tutorial') ?>">
                                            Video Tutorial
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn dropdown-toggle text-light nav-link" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Aplikasi
                                </button>
                                <ul class="dropdown-menu dropdown-menu-light">
                                    <li>
                                        <a class="dropdown-item nav-link" href="<?= base_url('kalkulator-ekspor') ?>">
                                            Kalkulator Harga Ekspor
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="<?= base_url('mpm') ?>">
                                            Marketing Progress Monitoring
                                        </a>
                                    </li>
                                    <li onclick="showSweetAlertAW()">
                                        <a class="dropdown-item nav-link" href="#">
                                            Website Audit
                                        </a>
                                    </li>
                                    <li onclick="showSweetAlertKI()">
                                        <a class="dropdown-item nav-link" href="#">
                                            Kelayakan Investasi
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('member-data-member') ?>">
                            Data Member
                        </a>
                    </li>
                    <li class="nav-item" onclick="showSweetAlertDB()">
                        <a class="nav-link" href="#">
                            Data Buyers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('edit-profile') ?>">
                            Edit Profile
                        </a>
                    </li>
                    <div class="border-top"
                        style="width: 1.5px; height: 40px; background-color: white; margin: 0 23px;"></div>
                    <?php if (session()->get('logged_in')): ?>
                        <!-- Dropdown untuk pengguna yang sudah login -->
                        <div class="dropdown">
                            <div class="dropdown-toggle nav-link" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle" style="font-size: 20px;"></i> <?= session()->get('username') ?>
                            </div>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('/logout') ?>"><i class="bi bi-box-arrow-in-left" style="color: red; font-size: 20px;"></i> Logout</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <!-- Jika belum login, tampilkan tombol Login dengan kondisi bahasa -->
                        <a href="<?= base_url('/id/login') ?>">
                            <button type="button" class="btn btn-outline-light">Login</button>
                        </a>
                    <?php endif; ?>


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
                        <img src="<?= base_url('img/' . $webprofile[0]['logo_web']); ?>" alt="logo"
                            style="width: 180px;">
                        <p class="mt-4"><?= $webprofile[0]['deskripsi_web'] ?></p>
                        <!-- Social Media Icons -->
                        <div class="container2 gap-2 mt-3">
                            <a href="<?= 'https://' . $webprofile[0]['link_ig_web'] ?>" target="_blank">
                                <button class="Btn instagram">
                                    <svg class="svgIcon" viewBox="0 0 448 512" height="1.5em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                        </path>
                                    </svg>
                                    <span class="text">Instagram</span>
                                </button>
                            </a>

                            <a href="<?= 'https://' . $webprofile[0]['link_yt_web'] ?>" target="_blank">
                                <button class="Btn youtube">
                                    <svg class="svgIcon" viewBox="0 0 576 512" height="1.5em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M549.655 148.28c-6.281-23.64-24.041-42.396-47.655-48.685C462.923 85 288 85 288 85S113.077 85 74 99.595c-23.614 6.289-41.374 25.045-47.655 48.685-12.614 47.328-12.614 147.717-12.614 147.717s0 100.39 12.614 147.718c6.281 23.64 24.041 42.396 47.655 48.684C113.077 427 288 427 288 427s174.923 0 214-14.595c23.614-6.289 41.374-25.045 47.655-48.685 12.614-47.328 12.614-147.718 12.614-147.718s0-100.389-12.614-147.717zM240 336V176l144 80-144 80z">
                                        </path>
                                    </svg>
                                    <span class="text">YouTube</span>
                                </button>
                            </a>

                            <a href="<?= 'https://' . $webprofile[0]['link_fb_web'] ?>" target="_blank">
                                <button class="Btn facebook">
                                    <svg class="svgIcon" viewBox="0 0 512 512" height="1.5em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.5 90.7 225.9 209 240v-168h-63v-72h63v-55.2c0-62.2 37-96.8 93.6-96.8 27.1 0 55.4 4.8 55.4 4.8v61h-31.2c-30.8 0-40.4 19.1-40.4 38.7V256h68l-11 72h-57v168c118.3-14.1 209-116.5 209-240z"
                                            fill="white"></path>
                                    </svg>
                                    <span class="text">Facebook</span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h5 class="mt-4"><b>Menu</b></h5>
                        <div class="list-unstyled pt-2">
                            <p><a href="<?= base_url('beranda') ?>" class="footer-link">Beranda</a></p>
                            <p><a href="<?= base_url('pengumuman') ?>" class="footer-link">Pengumuman</a></p>
                            <p><a href="<?= base_url('member-belajar-ekspor') ?>" class="footer-link">Belajar Ekspor</a></p>
                            <p><a href="<?= base_url('member-video-tutorial') ?>" class="footer-link">Video Tutorial</a></p>
                            <p><a href="<?= base_url('member-data-member') ?>" class="footer-link">Data Member</a></p>
                            <p onclick="showSweetAlertDB()"><a href="#" class="footer-link">Data Buyers</a></p>
                            <p><a href="<?= base_url('edit-profile') ?>" class="footer-link">Edit Profile</a></p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h5 class="mt-4"><b>Aplikasi</b></h5>
                        <div class="list-unstyled pt-2">
                            <p>
                                <a href="<?= base_url('kalkulator-ekspor') ?>" class="footer-link">
                                    Kalkulator Harga Ekspor
                                </a>
                            </p>
                            <p>
                                <a href="<?= base_url('mpm') ?>" class="footer-link">
                                    Marketing Progress Monitoring
                                </a>
                            </p>
                            <p onclick="showSweetAlertAW()">
                                <a href="#" class="footer-link">
                                    Website Audit
                                </a>
                            </p>
                            <p onclick="showSweetAlertKI()">
                                <a href="#" class="footer-link">
                                    Kelayakan Investasi
                                </a>
                            </p>
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
            <p class="text-light mb-0 ms-5 ps-1"><?= $webprofile[0]['footer_text'] ?></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar-custom');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        function showSweetAlertAW() {
            Swal.fire({
                title: "Mau Buka Aplikasi Audit Website?",
                text: "Yuk Daftar Member Premium Dulu",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Daftar",
                cancelButtonText: "Nanti"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open("<?= base_url('/daftar-premium') ?>", "_blank");
                } else {
                    Swal.fire("Oke, Jangan Lupa Daftar!");
                }
            });
        }

        function showSweetAlertKI() {
            Swal.fire({
                title: "Mau Buka Aplikasi Kelayakan Investasi?",
                text: "Yuk Daftar Member Premium Dulu",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Daftar",
                cancelButtonText: "Nanti"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open("<?= base_url('/daftar-premium') ?>", "_blank");
                } else {
                    Swal.fire("Oke, Jangan Lupa Daftar!");
                }
            });
        }

        function showSweetAlertDB() {
            Swal.fire({
                title: "Mau Buka Fitur Data Buyers?",
                text: "Yuk Daftar Member Premium Dulu",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Daftar",
                cancelButtonText: "Nanti"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open("<?= base_url('/daftar-premium') ?>", "_blank");
                } else {
                    Swal.fire("Oke, Jangan Lupa Daftar!");
                }
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
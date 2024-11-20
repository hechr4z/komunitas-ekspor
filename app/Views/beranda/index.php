<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<?php
// Mengirimkan meta title dan description
$this->setData([
    'meta_title' => 'Beranda - Komunitas Ekspor',
    'meta_description' => 'Sorotan member komunitas ekspor Indonesia. Temukan anggota populer dalam peta eksportir kami.'
]);
?>

<!-- Tambahkan link CSS dan JS Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<!-- Tambahkan Plugin MarkerCluster -->
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<style>
    .carousel-item img {
        width: 100%;
        height: 500px;
        height: auto;
        max-height: 500px;
        object-fit: cover;
    }

    /* card popular member */
    .card-container {
        width: 300px;
        height: 300px;
        position: relative;
        border-radius: 10px;
    }

    .card-container::before {
        content: "";
        z-index: -1;
        position: absolute;
        inset: 0;
        background: linear-gradient(-25deg, #03AADE 0%, #03AADE 100%);
        transform: translate3d(0, 0, 0) scale(0.95);
        filter: blur(20px);
    }

    .card {
        width: 100%;
        height: 100%;
        border-radius: inherit;
        overflow: hidden;
    }

    .card .img-content {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(-25deg, white 0%, #03AADE 100%);
        transition: scale 0.6s, rotate 0.6s, filter 1s;
    }

    .card .img-content svg {
        width: 50px;
        height: 50px;
        fill: #e8e8e8;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .card .content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        gap: 10px;
        color: #e8e8e8;
        padding: 20px;
        line-height: 1.5;
        border-radius: 5px;
        opacity: 0;
        pointer-events: none;
        transform: translateY(50px);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .card .content .heading {
        font-size: 32px;
        font-weight: 700;
    }

    .card:hover .content {
        opacity: 1;
        transform: translateY(0);
    }

    .card:hover .img-content {
        scale: 2.5;
        rotate: 30deg;
        filter: blur(7px);
    }

    .card:hover .img-content svg {
        fill: transparent;
    }

    /* end */

    /* button daftar */
    .button-find {
        background-color: #03AADE;
        transition: background-color 0.3s ease;
    }

    .button-find:hover {
        background-color: #0288c7;
        border: 1px solid #fff;
    }

    /* end */

    @media (max-width: 768px) {
        .carousel-item img {
            max-height: 400px;
        }

        .carousel-caption h5 {
            font-size: 17px;
        }

        .carousel-caption p {
            font-size: 12px;
        }

        .daftar p {
            font-size: 10px;
        }

        .huruf p {
            font-size: 7px !important;
            margin-top: 5px;
        }

        .member h1 {
            font-size: 25px;
        }

        .popular h5 {
            font-size: 15px;
        }

        .popular h1 {
            font-size: 27px !important;
        }

        .benefit p {
            font-size: 10px;
        }

        .peta h1 {
            font-size: 25px;
        }

        .manfaat p {
            font-size: 10px;
            margin-top: 15px;
        }

        .daftar-section {
            height: auto;
            /* Adjust height */
            padding: 20px 0;
            /* Space around section */
        }

        .daftar-section .row {
            flex-direction: column;
            /* Stack content vertically */
        }

        .daftar-btn {
            width: 100%;
            /* Full-width button on smaller screens */
            margin-top: 20px;
            /* Space above the button */
        }

        .daftar-img {
            width: 100%;
            /* Full-width image */
            margin-top: 20px;
            /* Reduce margin */
        }

        .card-body p {
            font-size: 18px;
            /* Adjust font sizes */
        }

        .card-body h2 {
            font-size: 40px;
            /* Adjust heading size */
        }

        .card-body {
            padding: 20px;
            /* Adjust padding for smaller screens */
        }

        .daftar-img {
            width: 100%;
            /* Full-width on mobile */
            margin-top: 20px;
            /* Space above the image */
            border-radius: 15px;
            /* Adjust rounding on smaller screens */
        }

        /* Section container */
        /* Adjust container size and padding for smaller screens */
        .container-fluid {
            width: 95% !important;
            height: auto !important;
            margin-top: 40px !important;
            padding: 20px;
        }

        /* Keep text and image side-by-side on smaller screens */
        .container-fluid .row {
            flex-direction: row !important;
        }

        /* Text section styling */
        .container-fluid .col-md-6:first-child {
            padding: 10px 20px;
            text-align: left;
        }

        .container-fluid .card-body p.h6 {
            font-size: 16px !important;
        }

        .container-fluid .card-body p:nth-of-type(2) {
            font-size: 32px !important;
        }

        .container-fluid .card-body p:nth-of-type(3) {
            font-size: 14px !important;
        }

        /* Button styling */
        .container-fluid .btn-outline-light {
            font-size: 14px !important;
            padding: 8px 16px !important;
        }

        /* Image styling */
        .container-fluid .col-md-6 img {
            width: 100% !important;
            height: auto !important;
            margin-top: 0;
        }
    }

    @media (max-width: 576px) {
        .benefit p {
            font-size: 13px;
        }

        .peta h5 {
            font-size: 20px;
        }

        .peta h1 {
            font-size: 20px;
        }

        .member h5 {
            font-size: 20px;
        }

        .member h1 {
            font-size: 20px;
        }

        .peta h1 {
            font-size: 18px;
        }

        .manfaat p {
            font-size: 15px;
        }

        .manfaat h6 {
            font-size: 18px;
        }
    }

    @media (max-width: 425px) {
        .card-member {
            width: 80%;
            height: 100%;
            position: relative;
            left: 40px;
        }
        .member h1 {
            font-size: 15px;
        }

        .member h5 {
            font-size: 15px;
        }

        .benefit h2 {
            font-size: 20px;
        }

        .benefit p {
            font-size: 12px;
        }

        .footer-custom h2 {
            font-size: 15px;
        }

        .footer-custom p {
            font-size: 15px;
        }

        .peta h5 {
            font-size: 15px;
        }

        .peta h1 {
            font-size: 15px;
        }

        .animasi h2 {
            font-size: 17px;
        }

        .animasi p {
            font-size: 15px;
            margin: 10px;
        }
    }

    @media (max-width: 375px) {
        .member h1 {
            font-size: 13px;
        }

        .member h5 {
            font-size: 13px;
        }

        .carousel-caption h5 {
            font-size: 15px;
        }

        .benefit h2 {
            font-size: 20px;
        }

        .benefit p {
            font-size: 10px;
        }

        .footer-custom h2 {
            font-size: 15px;
        }

        .footer-custom p {
            font-size: 10px;
        }

        .peta h5 {
            font-size: 13px;
        }

        .peta h1 {
            font-size: 13px;
        }
    }

    @media (max-width: 320px) {
        .carousel-caption h5 {
            font-size: 13px;
        }

        .carousel-caption p {
            font-size: 8px;
        }

        .btn-outline-light {
            font-size: 5px;
        }

        .member h5 {
            font-size: 12px;
        }

        .member h1 {
            font-size: 12px;
        }

        .garis {
            width: 35px;
        }

        .border-top2 {
            margin-left: 10px;
        }

        .kata h1 {
            margin-left: 10px;
        }

        .huruf p {
            margin-left: 10px;
            font-size: 5px;
        }

        .card-member .card {
            width: 90%;
            margin: 0 auto;

            .card-member .img-content img {
                width: 100%;
                height: auto;
            }
        }

        .benefit h2 {
            font-size: 20px;
        }

        .benefit p {
            font-size: 9px;
        }

        .background-image {
            padding-top: 30px;
        }

        .card-member img {
            margin-right: 15px;
        }

        .background-image h2 {
            font-size: 13px;
        }

        .background-image p {
            font-size: 8px;
        }

        .peta h5 {
            font-size: 12px;
        }

        .peta h1 {
            font-size: 11px;
        }

        .col-md-6 p {
            margin-right: 20px;
        }
        .col-md-6 a {
            margin-left: 10px;
        }
    }
</style>

<?php if (empty($slider)): ?>
    <div class="container">
        <div class="col-12 mt-2">
            <div class="alert alert-info text-center" role="alert">
                Masih belum ada Data Slider.
            </div>
        </div>
    </div>
<?php else: ?>
    <!-- slider -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="<?= base_url('img/' . $slider[0]['img_slider']); ?>" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-block text-light mb-3">
                    <h5><?= ($lang == 'en') ? $slider[0]['judul_slider_en'] : $slider[0]['judul_slider'] ?></h5>
                    <p><?= ($lang == 'en') ? $slider[0]['deskripsi_slider_en'] : $slider[0]['deskripsi_slider'] ?></p>
                    <a href="<?= ($lang == 'en') ? base_url('/en/registration') : base_url('/id/pendaftaran') ?>">
                        <button type="button" class="btn btn-outline-light"><?= lang('Blog.btnCarousel'); ?></button>
                    </a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item" data-bs-interval="2000">
                <img src="<?= base_url('img/' . $slider[1]['img_slider']); ?>" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-block text-light mb-3">
                    <h5><?= ($lang == 'en') ? $slider[1]['judul_slider_en'] : $slider[1]['judul_slider'] ?></h5>
                    <p><?= ($lang == 'en') ? $slider[1]['deskripsi_slider_en'] : $slider[1]['deskripsi_slider'] ?></p>
                    <a href="<?= ($lang == 'en') ? base_url('/en/registration') : base_url('/id/pendaftaran') ?>">
                        <button type="button" class="btn btn-outline-light"><?= lang('Blog.btnCarousel'); ?></button>
                    </a>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="<?= base_url('img/' . $slider[2]['img_slider']); ?>" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-block text-light mb-3">
                    <h5><?= ($lang == 'en') ? $slider[2]['judul_slider_en'] : $slider[2]['judul_slider'] ?></h5>
                    <p><?= ($lang == 'en') ? $slider[2]['deskripsi_slider_en'] : $slider[2]['deskripsi_slider'] ?></p>
                    <a href="<?= ($lang == 'en') ? base_url('/en/registration') : base_url('/id/pendaftaran') ?>">
                        <button type="button" class="btn btn-outline-light"><?= lang('Blog.btnCarousel'); ?></button>
                    </a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end -->
<?php endif; ?>


<!-- populer member -->
<section>
    <div class="member container mt-5">
        <div class="d-flex justify-content-center">
            <div class="garis d-flex justify-content-center align-items-center mb-2">
                <div class="border-top1 mx-2" style="width: 40px; height: 2px; background-color: #03AADE;"></div>
            </div>
            <h5 class="fw-lighter" data-en="ABOUT US" data-id="TENTANG KAMI"><?= lang('Blog.populerMemberTitle'); ?></h5>
            <div class="garis d-flex justify-content-center align-items-center mb-2">
                <div class="border-top1 ms-2" style="width: 40px; height: 2px; background-color: #03AADE;"></div>
            </div>
        </div>
        <h1 class="text-center" data-en="WHO WE ARE" data-id="SIAPA KAMI"><b><?= lang('Blog.topMemberSpotlightTitle'); ?><span style="color: #03AADE;"> SPOTLIGHT</span></b></h1>
    </div>
    <div class="card-member container mt-5">
        <?php if (empty($top4_member)): ?>
            <div class="col-12 mt-2">
                <div class="alert alert-info text-center" role="alert">
                    Masih belum ada Data Member.
                </div>
            </div>
        <?php else: ?>
            <div class="row justify-content-center g-4"> <!-- Use Bootstrap's grid system -->
                <?php foreach ($top4_member as $item): ?>
                    <div class="col-12 col-md-6 col-lg-3 rounded"> <!-- Responsive column sizes -->
                        <div class="card">
                            <div class="img-content" style="display: flex; justify-content: center;">
                                <img src="<?= base_url('img/' . $item['foto_profil']); ?>" class="card-img-top" style="width: 90%; height: 90%; object-fit: cover; border-radius: 10px;" alt="...">
                            </div>
                            <div class="content text-center" style="padding: 10px 0; color: #03AADE;">
                                <p class="heading" style="margin-bottom: 5px; font-weight: bold; text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff;"><?= $item['username'] ?></p>
                                <p class="heading" style="margin-bottom: 5px; font-size: 15px; text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff;"><?= $item['nama_perusahaan'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- end -->

<!-- tombol daftar -->
<section class="container-fluid text-dark rounded-5 daftar-section" style="background-color: #03AADE; max-width: 1100px; margin-top: 80px; padding: 40px;">
    <div class="row align-items-center text-center text-md-start">
        <!-- Teks Section -->
        <div class="col-md-6 mb-4 mb-md-0 d-flex flex-column align-items-center align-items-md-start">
            <div class="card-body p-3 p-md-5">
                <p class="text-light fw-lighter h6 mb-2" style="font-size: 18px;">
                    <?= lang('Blog.joinUsTitle'); ?>
                </p>
                <p class="text-light fw-bold" style="font-size: 48px; font-family: Poetsen One, sans-serif;">
                    <?= lang('Blog.communityExporterTitle'); ?>
                </p>
                <p class="text-light fw-lighter mb-4" style="font-size: 16px;">
                    <?= lang('Blog.joinUsDescription'); ?>
                </p>
                <a href="<?= ($lang == 'en') ? base_url('/en/registration') : base_url('/id/pendaftaran') ?>">
                    <button type="button" class="btn btn-outline-light btn-lg px-4 py-2" style="font-size: 16px;">
                        <?= lang('Blog.btnCarousel'); ?>
                    </button>
                </a>
            </div>
        </div>

        <!-- Gambar Section -->
        <div class="col-md-6 d-flex justify-content-center">
            <img src="/img/slider-2.jpg" class="rounded shadow" style="width: 90%; max-width: 400px; height: auto;" alt="Image Description">
        </div>
    </div>
</section>

<!-- keuntungan -->
<section>
    <div class="benefit container text-center py-5 mt-2">
        <h2 class="fw-bold mb-3" style="color: #03AADE;"><?= lang('Blog.benefitsJoinTitle'); ?></h2>
        <div class="d-flex justify-content-center align-items-center mb-2">
            <div class="border-top5" style="width: 60px; height: 3px; background-color: #03AADE;"></div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="border-top6" style="width: 30px; height: 2px; background-color: #03AADE;"></div>
        </div>
        <p class="text-muted mt-3">
            <?= lang('Blog.benefitsJoinDescription'); ?>
        </p>
    </div>
    <div class="container">
        <div class="manfaat row g-4 justify-content-center">
            <!-- Item 1 -->
            <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center">
                <div class="rounded-circle d-flex justify-content-center align-items-center" style="background-color: #03AADE; width: 100px; height: 100px;">
                    <svg class="logo text-light" xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" viewBox="0 0 32 32">
                        <path fill="currentColor" d="M16 1c-8.84 0-16 7.16-16 16s7.16 16 16 16 16-7.16 16-16S24.84 1 16 1zm0 28c-6.61 0-12-5.39-12-12S9.39 5 16 5s12 5.39 12 12-5.39 12-12 12z" />
                        <path fill="currentColor" d="<?= $manfaatjoin[0]['path_d'] ?>" />
                    </svg>
                </div>
                <div class="mt-3">
                    <h6><b><?= ($lang == 'en') ? $manfaatjoin[0]['judul_manfaat_en'] : $manfaatjoin[0]['judul_manfaat'] ?></b></h6>
                    <p><?= ($lang == 'en') ? $manfaatjoin[0]['deskripsi_manfaat_en'] : $manfaatjoin[0]['deskripsi_manfaat'] ?></p>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center">
                <div class="rounded-circle d-flex justify-content-center align-items-center" style="background-color: #03AADE; width: 100px; height: 100px;">
                    <svg class="logo text-light" xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" viewBox="0 0 32 32">
                        <path fill="currentColor" d="M16 1c-8.84 0-16 7.16-16 16s7.16 16 16 16 16-7.16 16-16S24.84 1 16 1zm0 28c-6.61 0-12-5.39-12-12S9.39 5 16 5s12 5.39 12 12-5.39 12-12 12z" />
                        <path fill="currentColor" d="<?= $manfaatjoin[1]['path_d'] ?>" />
                    </svg>
                </div>
                <div class="mt-3">
                    <h6><b><?= ($lang == 'en') ? $manfaatjoin[1]['judul_manfaat_en'] : $manfaatjoin[1]['judul_manfaat'] ?></b></h6>
                    <p><?= ($lang == 'en') ? $manfaatjoin[1]['deskripsi_manfaat_en'] : $manfaatjoin[1]['deskripsi_manfaat'] ?></p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center">
                <div class="rounded-circle d-flex justify-content-center align-items-center" style="background-color: #03AADE; width: 100px; height: 100px;">
                    <svg class="logo text-light" xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" viewBox="0 0 32 32">
                        <path fill="currentColor" d="M16 1c-8.84 0-16 7.16-16 16s7.16 16 16 16 16-7.16 16-16S24.84 1 16 1zm0 28c-6.61 0-12-5.39-12-12S9.39 5 16 5s12 5.39 12 12-5.39 12-12 12z" />
                        <path fill="currentColor" d="<?= $manfaatjoin[2]['path_d'] ?>" />
                    </svg>
                </div>
                <div class="mt-3">
                    <h6><b><?= ($lang == 'en') ? $manfaatjoin[2]['judul_manfaat_en'] : $manfaatjoin[2]['judul_manfaat'] ?></b></h6>
                    <p><?= ($lang == 'en') ? $manfaatjoin[2]['deskripsi_manfaat_en'] : $manfaatjoin[2]['deskripsi_manfaat'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end -->



<!-- ajakan -->
<section class="animasi mt-5 footer-custom" style="background-color: #03AADE; width: 100%; height: 350px;">
    <div class="background-image animated-element">
        <div class="centered-text">
            <h2 class="text-center text-light" style="padding-top: 100px; font-family: Lato, sans-serif;"><b><?= lang('Blog.joinExporterCommunityTitle'); ?></b></h2>
            <p class="text-center fw-lighter text-light"><?= lang('Blog.joinExporterCommunityDescription'); ?></p>
        </div>
        <div class="text-center centered-button pt-2">
            <a href="<?= ($lang == 'en') ? base_url('/en/registration') : base_url('/id/pendaftaran') ?>" class="btn btn-outline-light">
                <?= lang('Blog.btnCarousel'); ?>
            </a>
        </div>
    </div>
</section>
<!-- ajakan end -->

<!-- peta -->
<section class="container peta2">
    <div class="peta mt-5">
        <div class="d-flex justify-content-center">
            <div class="d-flex justify-content-center align-items-center mb-2">
                <div class="border-top6 mx-2" style="width: 40px; height: 2px; background-color: #03AADE;"></div>
            </div>
            <h5 class="fw-lighter" data-en="MEMBER MAP" data-id="PETA MEMBER"><?= lang('Blog.memberMapTitle'); ?></h5>
            <div class="d-flex justify-content-center align-items-center mb-2">
                <div class="border-top7 ms-2" style="width: 40px; height: 2px; background-color: #03AADE;"></div>
            </div>
        </div>
        <h1 class="text-center" data-en="TOP MEMBERS SPOTLIGHT" data-id="SOROTAN MEMBER UNGGUL"><b><?= lang('Blog.communityMemberSpotlightTitle'); ?><span style="color: #03AADE;"> <?= lang('Blog.communityMemberSpotlightTitle2'); ?></span></b></h1>
    </div>
    <div class="container mt-5">
        <div id="map" style="width: 100%; height: 700px;"></div>
    </div>
</section>
<!-- end -->

<script>
    var map = L.map('map').setView([-2.5489, 118.0149], 5); // Koordinat dan zoom level

    // Tambahkan layer peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Tambahkan marker cluster
    var markers = L.markerClusterGroup();

    <?php foreach ($member as $item): ?>
        <?php if (!empty($item['latitude']) && !empty($item['longitude'])): ?>
            var marker = L.marker([<?= $item['latitude'] ?>, <?= $item['longitude'] ?>]);
            marker.bindPopup(
                '<div style="width: 200px; font-family: Arial, sans-serif;">' +
                '<a href="<?= base_url($lang . '/detail-member/' . $item['slug']); ?>" style="text-decoration: none;">' +
                '<div class="card h-100 shadow-sm" style="cursor: pointer; border-radius: 12px; overflow: hidden;">' +
                '<img src="<?= base_url('img/' . $item['foto_profil']); ?>" class="card-img-top" alt="Member Image" style="height: 120px; object-fit: cover;">' +
                '<div class="card-body">' +
                '<h6 class="card-title text-center" style="font-weight: bold; word-wrap: break-word; white-space: normal;"><?= $item['username'] ?></h6>' +
                '<p class="card-text text-center text-muted" style="font-size: 0.9rem; word-wrap: break-word; white-space: normal;"><?= $item['nama_perusahaan'] ?></p>' +
                '<span class="btn btn-primary btn-sm mt-2" style="border-radius: 8px; width: 100%;"><?php echo lang('Blog.btndataMember') ?></span>' +
                '</div></div></a></div>'
            );
            markers.addLayer(marker);
        <?php endif; ?>
    <?php endforeach; ?>

    // Tambahkan marker cluster ke peta
    map.addLayer(markers);
</script>

<?= $this->endSection(); ?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta Tags -->
    <meta name="title" content="Beranda | SonicPulse: Selamat Datang di Dunia Audio Berkualitas">
    <meta name="description"
        content="Temukan pengalaman audio terbaik dengan SonicPulse. Nikmati berbagai produk audio berkualitas tinggi yang dirancang untuk memuaskan telinga Anda.">
    <title>Beranda | SonicPulse: Selamat Datang di Dunia Audio Berkualitas</title>

    <!-- Canonical URL -->
    <link rel="canonical" href="<?= current_url(); ?>">

    <!-- Hreflang Tags -->
    <link rel="alternate" hreflang="id" href="#" />
    <link rel="alternate" hreflang="en" href="#" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Marope:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .certificate-section {
            background-color: #f8f9fa;
        }

        .certificate-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .certificate-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .ribbon {
            background: #6c63ff;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            position: absolute;
            top: 15px;
            left: -25px;
            width: 100px;
            text-align: center;
            transform: rotate(-45deg);
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .certificate-image {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .btn-primary {
            background: #6c63ff;
            border: none;
        }

        .btn-primary:hover {
            background: #b84e9f;
        }


        .whatsapp-float {
            position: fixed;
            width: 50px;
            height: 50px;
            bottom: 20px;
            right: 30px;
            background-color: #25d366;
            color: white;
            /* Warna ikon */
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .whatsapp-float i {
            color: white;
            /* Warna ikon tetap putih */
        }

        .whatsapp-float:hover {
            background-color: #128c7e;
            /* Warna latar belakang saat hover */
            text-decoration: none;
        }


        #about {
            background: #f9f9f9;
            padding: 60px 0;
        }

        .image-logo {
            width: 100%;
            height: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        body {
            font-family: 'Manrope', sans-serif;
            margin: 0;
            padding: 0;
        }

        .row {
            margin-right: 0;
            margin-left: 0;
        }

        .col-md-4 {
            padding-left: 0;
            padding-right: 0;
        }

        /* Loader CSS */
        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            /* Optional: semi-transparent background */
            z-index: 9999;
            /* Make sure loader is on top */
        }

        .loader {
            width: 50px;
            aspect-ratio: 1;
            display: grid;
            border: 4px solid #0000;
            border-radius: 50%;
            border-right-color: #009EF2;
            animation: l15 1s infinite linear;
        }

        .loader::before,
        .loader::after {
            content: "";
            grid-area: 1/1;
            margin: 2px;
            border: inherit;
            border-radius: 50%;
            animation: l15 2s infinite;
        }

        .loader::after {
            margin: 8px;
            animation-duration: 3s;
        }

        @keyframes l15 {
            100% {
                transform: rotate(1turn)
            }
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffff;
            padding: 10px 75px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
            align-items: center;
        }

        .nav-item {
            margin-left: 18px;
            position: relative;
        }

        .nav-item a {
            color: #808080;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }

        .nav-item a:hover,
        .nav-item a:focus {
            color: #009EF2;
        }

        .nav-item a.active {
            color: #009EF2;
        }

        .logo {
            width: 115px;
        }

        .carousel-item img {
            width: 100%;
            height: 632px;
            object-fit: cover;
        }

        .carousel {
            max-width: 100%;
            margin: 0 auto;
        }

        .logo-sonic {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40vh;
        }



        .tentang-kami .headline p {
            font-size: 28px;
            font-weight: bold;
            color: #000;
            margin-right: 60px;
            margin-left: 6px;
        }

        .tentang-kami p {
            font-size: 18px;
            color: #555;
            text-align: justify;
            margin-right: 60px;
            margin-left: 6px;
            display: -webkit-box;
            -webkit-line-clamp: 12;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }

        .tentang-kami img {
            width: 80%;
            border-radius: 8px;
        }

        .stacked-images-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .baca-selengkapnya {
            display: inline-block;
            padding: 8px 18px;
            font-size: 18px;
            color: #009EF2;
            background-color: #ffffff;
            border: 2px solid #009EF2;
            border-radius: 18px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .baca-selengkapnya:hover {
            background-color: #009EF2;
            color: #ffffff;
        }


        .produk-kami {
            padding: 60px 0;
        }

        .card {
            width: 18rem;
            margin-bottom: 20px;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            overflow: hidden;
            border: 2px solid #009EF2;
            border-radius: 18px;
        }

        .card img {
            margin: 10px auto;
            background: #fff;
            width: 92%;
            height: 280px;
            border-radius: 14px;
        }

        .card-img-top {
            width: 100%;
            object-fit: cover;
            border-radius: 14px;
        }

        .card-title {
            color: #009EF2;
        }

        .card-text {
            color: #555;
        }

        .card-title,
        .card-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .card:hover {
            background-color: #009EF2;
            color: #ffffff;
        }

        .card:hover .card-title,
        .card:hover .card-text {
            color: #ffffff;
        }

        .kontak-kami {
            padding: 60px 0;
        }

        .kontak-kami h1 {
            font-size: 32px;
            margin-bottom: 60px;
            background: linear-gradient(to right, #009EF2, #F32323);

            -webkit-text-fill-color: transparent;
            font-weight: 500;
        }

        .kontak-kami p {
            font-size: 18px;
            color: #555;
            text-align: justify;
        }

        .map-container {
            width: 100%;
            height: 520px;
            margin-bottom: 30px;
            overflow: hidden;
            border-radius: 18px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .kontak-kami h3 {
            margin-top: 12px;
            margin-bottom: 40px;
            color: #009EF2;
        }

        .image-row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .image-row img {
            width: 180px;
            border: 2px solid #ddd;
            border-radius: 8px;
        }

        .form-group {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .form-control:focus {
            border-color: #aaa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Tablet 768px */
        @media (max-width: 768px) {
            .navbar {
                padding: 10px 40px;
            }

            .navbar-brand img.logo {
                max-width: 60%;
                /* Lebar logo lebih kecil pada layar smartphone */
            }

            .logo {
                width: 120px;
            }

            .static-image img {
                height: 400px !important;
            }

            #profile .row {
                display: flex;
                flex-direction: column;
                /* Susun elemen secara vertikal */
                align-items: center;
                /* Pusatkan elemen secara horizontal */
            }

            #profile .col-md-5,
            #profile .col-md-7 {
                width: 100%;
                /* Elemen menggunakan lebar penuh */
                text-align: center;
                /* Teks di tengah */
                margin-top: 40px;
            }

            #profile .image-logo {
                max-width: 100%;
                /* Gambar responsif */
                height: auto;
            }

            #profile h2 {
                font-size: 24px;
                /* Ukuran heading lebih kecil */
            }

            #profile p {
                font-size: 14px;
                /* Ukuran teks lebih kecil */
            }

            #profile .list-group-item {
                font-size: 14px;
                /* Ukuran teks dalam daftar */
            }

            .baca-selengkapnya {
                font-size: 18px;
            }

            .card img {
                height: 220px;
            }

            .kontak-kami {
                padding: 50px 0;
            }

            .kontak-kami p {
                font-size: 18px;
                text-align: center;
            }

            .kontak-kami h3 {
                margin-bottom: 50px;
            }

            footer {
                font-size: 18px;
            }

            .col-md-5 img {
                width: 100%;
                height: 60%;
            }

            #about .col-md-7 h2 {
                font-size: 32px;
                /* Increase font size of the heading */
            }

            #about .col-md-7 p {
                font-size: 12px;
                /* Increase font size for paragraphs */
            }

            #about .col-md-7 .list-group-item {
                font-size: 10px;
                /* Increase font size for list items */
            }
        }

        /* Responsiveness for 576px width */
        @media (max-width: 576px) {

            /* Navbar adjustments */
            .navbar-brand img.logo {
                max-width: 60%;
                /* Lebar logo lebih kecil pada layar smartphone */
            }

            .navbar-nav {
                text-align: center;
            }

            .navbar-toggler {
                margin-left: auto;
            }

            .navbar-collapse {
                text-align: center;
            }

            /* Static Image adjustments */
            .static-image img {
                height: auto;
                /* Allow image height to adjust automatically */
                max-height: 400px;
                /* Limit the height on smaller screens */
            }

            /* About Section adjustments */
            #about .col-md-5,
            #about .col-md-7 {
                text-align: center;
            }

            .about .image-logo {
                max-width: 100%;
                height: auto;
            }

            /* Produk Kami adjustments */
            .produk-kami .row {
                display: flex;
                flex-direction: column;
                align-items: center;
                /* Memusatkan kartu secara horizontal */
            }

            .produk-kami .card {
                width: 50%;
                /* Menyesuaikan ukuran kartu agar tidak terlalu besar */
                margin-bottom: 15px;
                /* Memberikan jarak antara kartu */
            }

            /* Mengatur teks agar tidak terpotong */
            .card-body {
                padding: 15px;
                /* Menambahkan padding untuk teks */
            }

            /* Sertifikat adjustments */
            .certificate-section .certificate-card {
                margin: auto;
                max-width: 100%;
            }

            .certificate-section img.certificate-image {
                width: 100%;
                height: auto;
            }

            .contact .container {
                display: flex;
                flex-direction: column;
                /* Menyusun elemen secara vertikal */
                align-items: center;
                /* Menyusun elemen di tengah secara horizontal */
                gap: 20px;
                /* Memberi jarak antar elemen */
            }

            .contact .col-md-4 {
                width: 100%;
                /* Membuat kolom lebar penuh */
                max-width: 100%;
                /* Memastikan kolom mengisi seluruh lebar container */
            }

            .form-group {
                width: 100%;
                /* Memastikan form group memiliki lebar penuh */
                padding: 10px 0;
                /* Menambah padding untuk tampilan lebih rapi */
            }

            .form-control {
                font-size: 16px;
                /* Ukuran font input */
                padding: 12px;
                /* Menambah padding agar lebih nyaman digunakan */
                text-align: center;
                /* Menyusun teks di tengah */
            }

            /* WhatsApp button adjustments */
            .whatsapp-float {
                bottom: 10px;
                right: 10px;
                width: 50px;
                height: 50px;
            }

            .whatsapp-icon {
                font-size: 24px;
            }
        }


        /* Mobile L 425px */
        @media (max-width: 425px) {
            .navbar {
                padding: 10px 20px;
            }

            .navbar-brand img.logo {
                max-width: 60%;
                /* Lebar logo lebih kecil pada layar smartphone */
            }

            .logo {
                width: 80px;
            }

            .static-image img {
                height: 250px !important;
            }

            .logo-sonic {
                height: 20vh;
            }

            .carousel-item img {
                height: 350px;
            }

            .tentang-kami h1,
            .kontak-kami h1,
            .produk-kami h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .col-md-7 h2 {
                margin-top: 30px;
            }

            .tentang-kami img {
                margin-bottom: 20px;
                width: 100%;
            }

            .tentang-kami p {
                font-size: 16px;
                margin-right: 0;
                margin-left: 0;
            }

            .baca-selengkapnya {
                font-size: 16px;
            }

            /* Produk Kami adjustments */
            .produk-kami .row {
                display: flex;
                flex-direction: column;
                align-items: center;
                /* Memusatkan kartu secara horizontal */
            }

            .produk-kami .card {
                width: 60%;
                /* Menyesuaikan ukuran kartu agar tidak terlalu besar */
                margin-bottom: 15px;
                /* Memberikan jarak antara kartu */
            }

            /* Mengatur teks agar tidak terpotong */
            .card-body {
                padding: 15px;
                /* Menambahkan padding untuk teks */
            }

            .card img {
                height: 220px;
                /* Mengatur tinggi gambar agar proporsional */
                object-fit: cover;
                /* Memastikan gambar mengisi ruang dengan baik */
            }

            .contact .container {
                display: flex;
                flex-direction: column;
                /* Menyusun elemen secara vertikal */
                align-items: center;
                /* Menyusun elemen di tengah secara horizontal */
                gap: 20px;
                /* Memberi jarak antar elemen */
            }

            .contact .col-md-4 {
                width: 100%;
                /* Membuat kolom lebar penuh */
                max-width: 100%;
                /* Memastikan kolom mengisi seluruh lebar container */
            }

            .form-group {
                width: 100%;
                /* Memastikan form group memiliki lebar penuh */
                padding: 10px 0;
                /* Menambah padding untuk tampilan lebih rapi */
            }

            .form-control {
                font-size: 16px;
                /* Ukuran font input */
                padding: 12px;
                /* Menambah padding agar lebih nyaman digunakan */
                text-align: center;
                /* Menyusun teks di tengah */
            }

            footer {
                font-size: 16px;
            }
        }


        /* Mobile M 375px */
        @media (max-width: 375px) {
            .navbar {
                padding: 10px 15px;
            }

            .navbar-brand img.logo {
                max-width: 60%;
                /* Lebar logo lebih kecil pada layar smartphone */
            }

            .logo {
                width: 70px;
            }

            .logo-sonic {
                height: 15vh;
            }

            .carousel-item img {
                height: 300px;
            }

            .tentang-kami h1,
            .kontak-kami h1,
            .produk-kami h1 {
                font-size: 24px;
                margin-bottom: 30px;
            }

            .tentang-kami img {
                margin-bottom: 20px;
                width: 100%;
            }

            .tentang-kami p {
                font-size: 14px;
                margin-right: 0;
                margin-left: 0;
            }

            .baca-selengkapnya {
                font-size: 14px;
            }

            .produk-kami {
                padding: 40px 0;
            }

            /* Produk Kami adjustments */
            .produk-kami .row {
                display: flex;
                flex-direction: column;
                align-items: center;
                /* Memusatkan kartu secara horizontal */
            }

            .produk-kami .card {
                width: 60%;
                /* Menyesuaikan ukuran kartu agar tidak terlalu besar */
            }

            /* Mengatur teks agar tidak terpotong */
            .card-body {
                padding: 15px;
                /* Menambahkan padding untuk teks */
            }

            .card img {
                height: 220px;
                /* Mengatur tinggi gambar agar proporsional */
                object-fit: cover;
                /* Memastikan gambar mengisi ruang dengan baik */
            }

            .kontak-kami {
                padding: 30px 0;
            }

            .kontak-kami p {
                font-size: 14px;
                text-align: center;
            }

            .kontak-kami h3 {
                margin-bottom: 30px;
            }

            .map-container {
                height: 300px;
            }

            footer {
                font-size: 14px;
            }
        }

        /* Mobile S 320px */
        @media (max-width: 320px) {
            .navbar {
                padding: 10px 10px;
            }

            .static-image img {
                height: auto;
                /* Allow image height to adjust automatically */
                max-height: 200px;
                /* Limit the height on smaller screens */
            }

            .navbar-brand img.logo {
                max-width: 60%;
                /* Lebar logo lebih kecil pada layar smartphone sangat kecil */
            }

            .logo {
                width: 60px;
            }

            .logo-sonic {
                height: 10vh;
            }

            .carousel-item img {
                height: 300px;
            }

            .tentang-kami h1,
            .kontak-kami h1,
            .produk-kami h1 {
                font-size: 22px;
                margin-bottom: 30px;
            }

            .tentang-kami img {
                margin-bottom: 20px;
                width: 100%;
            }

            .tentang-kami p {
                font-size: 12px;
                margin-right: 0;
                margin-left: 0;
            }

            .baca-selengkapnya {
                font-size: 12px;
            }

            /* Produk Kami adjustments */
            /* Produk Kami adjustments */
            .produk-kami .row {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .produk-kami .card {
                width: 60%;
                /* Menyesuaikan ukuran kartu agar lebih kecil dan muat pada layar */
                margin-bottom: 15px;
                /* Memberikan jarak antara kartu */
                padding: 10px;
                /* Mengurangi padding agar teks muat */
            }

            .card-body {
                padding: 10px;
                /* Mengurangi padding teks agar tidak terpotong */
            }

            .card img {
                height: 150px;
                /* Menyesuaikan tinggi gambar agar lebih kecil */
                width: 100%;
                object-fit: cover;
                /* Memastikan gambar mengisi ruang dengan baik */
            }

            .card-title {
                font-size: 17px;
                /* Mengurangi ukuran font judul card */
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                /* Memotong teks yang terlalu panjang jika perlu */
            }

            .card-text {
                font-size: 10px;
                /* Mengurangi ukuran font untuk teks deskripsi */
                height: auto;
            }

            .contact .container {
                display: flex;
                flex-direction: column;
                /* Menyusun elemen secara vertikal */
                align-items: center;
                /* Menyusun elemen di tengah secara horizontal */
                gap: 20px;
                /* Memberi jarak antar elemen */
            }

            .contact .col-md-4 {
                width: 100%;
                /* Membuat kolom lebar penuh */
                max-width: 100%;
                /* Memastikan kolom mengisi seluruh lebar container */
            }

            .form-group {
                width: 100%;
                /* Memastikan form group memiliki lebar penuh */
                padding: 10px 0;
                /* Menambah padding untuk tampilan lebih rapi */
            }

            .form-control {
                font-size: 16px;
                /* Ukuran font input */
                padding: 12px;
                /* Menambah padding agar lebih nyaman digunakan */
                text-align: center;
                /* Menyusun teks di tengah */
            }

            footer {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <!-- Loader -->
    <div class="loader-container">
        <div class="loader"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url('img/acumalaka.png') ?>" alt="Logo SonicPulse" class="logo" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color: #009EF2;" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile">Profile Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sertifikat">Sertifikat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#data-produk">Data Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#lokasi">Lokasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Bahasa
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Indonesia</a></li>
                            <li><a class="dropdown-item" href="#">English</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Static Image -->
    <div class="static-image">
        <img src="<?= base_url('img/slider-1.jpg') ?>" class="d-block w-100" style="height: 650px;" alt="Slide" loading="lazy">
    </div>

    <!-- About Section -->
    <section id="profile" class="bg-light about mt-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo Section -->
                <div class="col-md-5 text-center mb-4 mb-md-0">
                    <div class="logo-sonic">
                        <img src="<?= base_url('img/p21.jpg') ?>" alt="Logo SonicPulse" class="image-logo img-fluid" loading="lazy">
                    </div>
                </div>

                <!-- Text Section -->
                <div class="col-md-7 kata">
                    <h2 class="display-5 fw-bold">Profile Perusahaan</h2>
                    <p class="lead text-muted">
                        Welcome to SonicPulse! We are dedicated to delivering high-quality sound experiences. Our team works tirelessly to provide innovative and creative sound solutions tailored to your needs.
                    </p>
                    <p class="text-muted">
                        With years of experience in the industry, SonicPulse has grown from a small company into a trusted provider of advanced sound solutions. Our mission is to bring immersive and cutting-edge audio experiences to all our clients.
                    </p>

                    <!-- Additional Info Section -->
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Data Produk:</strong> High-Quality Audio Devices
                            </li>
                            <li class="list-group-item">
                                <strong>Kategori Produk:</strong> Speakers, Headphones, Audio Accessories
                            </li>
                            <li class="list-group-item">
                                <strong>Tahun Didirikan:</strong> 2015
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Produk Kami -->
    <div id="data-produk" class="container produk-kami">
        <h1 class="text-center">Produk Kami</h1>
        <div class="cards-container">

            <a class="row justify-content-center gap-5" href="#" style="text-decoration: none; color: #009EF2;">
                <div class="card">
                    <img src="<?= base_url('img/acumalaka.png') ?>" class="card-img-top" alt="Image Produk SonicPulse" loading="lazy">
                    <div class="card-body">
                        <h4 class="card-title">Nama Produk</h4>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('img/acumalaka.png') ?>" class="card-img-top" alt="Image Produk SonicPulse" loading="lazy">
                    <div class="card-body">
                        <h4 class="card-title">Nama Produk</h4>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('img/acumalaka.png') ?>" class="card-img-top" alt="Image Produk SonicPulse" loading="lazy">
                    <div class="card-body">
                        <h4 class="card-title">Nama Produk</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- sertifikat -->
    <section id="sertifikat" class="certificate-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="text-center">Sertifikat Kami</h1>
                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6 mb-4 mt-4">
                    <div class="certificate-card shadow">
                        <div class="ribbon">Sertifikat</div>
                        <img
                            src="<?= base_url('img/p23.png') ?>"
                            alt="Certificate"
                            class="certificate-image">
                        <div class="card-body text-center">
                            <h3 class="card-title">Nama Pemilik Sertifikat 1</h3>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-lg-4 col-md-6 mb-4 mt-4">
                    <div class="certificate-card shadow">
                        <div class="ribbon">Sertifikat</div>
                        <img
                            src="<?= base_url('img/p23.png') ?>"
                            alt="Certificate"
                            class="certificate-image">
                        <div class="card-body text-center">
                            <h3 class="card-title">Nama Pemilik Sertifikat 2</h3>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-lg-4 col-md-6 mb-4 mt-4">
                    <div class="certificate-card shadow">
                        <div class="ribbon">Sertifikat</div>
                        <img
                            src="<?= base_url('img/p23.png') ?>"
                            alt="Certificate"
                            class="certificate-image">
                        <div class="card-body text-center">
                            <h3 class="card-title">Nama Pemilik Sertifikat 3</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Kontak Kami -->
    <div id="lokasi" class="container contact">
        <h1 class="text-center mt-5">Kontak Kami</h1>
        <div class="map-container mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d151986.1181827674!2d-2.3882730515438357!3d53.472336445240664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487a4d4c5226f5db%3A0xd9be143804fe6baa!2sManchester%2C%20Britania%20Raya!5e0!3m2!1sid!2sid!4v1731554829948!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="container text-center mt-5 pt-5">
            <h1 class="text-center">Hubungi Kami Disini</h1>
            <div class="d-flex gap-2">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" id="alamat" value="Alamat" readonly class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="no_hp">Telepon:</label>
                        <a href="https://wa.me/085722715317351" class="form-control text-decoration-none"
                            target="_blank" style="background-color: #f8f9fa; color: #212529;">
                            087621735135173
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" value="Email@gmail.com" readonly class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="https://wa.me/085722715317351" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp whatsapp-icon"></i>
    </a>

    <!-- Footer -->
    <footer>
        <div class="text-center p-3 mt-5" style="background-color: #555; color:#ffff;"> &copy; 1 Januari Copyright:
            Footer123
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        // Hide loader after page loads
        window.addEventListener('load', function() {
            document.querySelector('.loader-container').style.display = 'none';
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                // Get the target element by the ID
                const targetElement = document.querySelector(this.getAttribute('href'));

                // Get the height of the navbar to account for the offset
                const navbarHeight = document.querySelector('.navbar').offsetHeight;

                // Scroll to the target element with an offset
                window.scrollTo({
                    top: targetElement.offsetTop - navbarHeight,
                    behavior: 'smooth'
                });
            });
        });

        window.scrollTo({
            top: targetElement.offsetTop - navbarHeight,
            behavior: 'smooth'
        });
    </script>
</body>

</html>
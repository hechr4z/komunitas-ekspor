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



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Marope:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
.whatsapp-float {
    position: fixed;
    width: 50px;
    height: 50px;
    bottom: 20px;
    right: 30px;
    background-color: #25d366;
    color: white; /* Warna ikon */
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
    color: white; /* Warna ikon tetap putih */
}

.whatsapp-float:hover {
    background-color: #128c7e; /* Warna latar belakang saat hover */
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

            .logo {
                width: 100px;
            }

            .logo-sonic {
                height: 25vh;
            }

            .carousel-item img {
                height: 400px;
            }

            .tentang-kami h1,
            .kontak-kami h1,
            .produk-kami h1 {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .tentang-kami p {
                font-size: 18px;
            }

            .baca-selengkapnya {
                font-size: 18px;
            }

            .produk-kami .cards-container {
                display: flex;
                justify-content: space-evenly;
                align-items: flex-start;
                flex-wrap: wrap;
                margin-top: 40px;
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
        }

        /* Mobile L 425px */
        @media (max-width: 425px) {
            .navbar {
                padding: 10px 20px;
            }

            .logo {
                width: 80px;
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
                font-size: 26px;
                margin-bottom: 30px;
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

            .produk-kami {
                padding: 50px 0;
            }

            .produk-kami .cards-container {
                display: flex;
                justify-content: space-evenly;
                align-items: flex-start;
                flex-wrap: wrap;
                margin-top: 40px;
            }

            .card img {
                height: 280px;
            }

            .kontak-kami {
                padding: 40px 0;
            }

            .kontak-kami p {
                font-size: 16px;
                text-align: center;
            }

            .kontak-kami h3 {
                margin-bottom: 40px;
            }

            .map-container {
                height: 300px;
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

            .produk-kami .cards-container {
                display: flex;
                justify-content: space-evenly;
                align-items: flex-start;
                flex-wrap: wrap;
                margin-top: 40px;
            }

            .card img {
                height: 240px;
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

            .produk-kami {
                padding: 30px 0;
            }

            .produk-kami .cards-container {
                display: flex;
                justify-content: center;
                margin-top: 40px;
            }

            .card img {
                height: 200px;
            }

            .kontak-kami {
                padding: 20px 0;
            }

            .kontak-kami p {
                font-size: 12px;
                text-align: center;
            }

            .kontak-kami h3 {
                margin-bottom: 20px;
            }

            .map-container {
                height: 300px;
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
                        <a class="nav-link" style="color: #009EF2;" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sertifikat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lokasi</a>
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
    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo Section -->
                <div class="col-md-5 text-center mb-4 mb-md-0">
                    <div class="logo-sonic">
                        <img src="<?= base_url('img/p21.jpg') ?>" alt="Logo SonicPulse" class="image-logo img-fluid" loading="lazy">
                    </div>
                </div>

                <!-- Text Section -->
                <div class="col-md-7">
                    <h2 class="display-5 fw-bold">Profile Perusahaan</h2>
                    <p class="lead text-muted">
                        Welcome to SonicPulse! We are dedicated to delivering high-quality sound experiences. Our team works tirelessly to provide innovative and creative sound solutions tailored to your needs.
                    </p>
                    <p class="text-muted">
                        With years of experience in the industry, SonicPulse has grown from a small company into a trusted provider of advanced sound solutions. Our mission is to bring immersive and cutting-edge audio experiences to all our clients.
                    </p>

                    <!-- Additional Info Section -->
                    <div class="mt-4">
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
    <div class="container-fluid produk-kami">
        <h1 class="text-center">Produk Kami</h1>
        <div class="cards-container">

            <a class="d-flex justify-content-center gap-5 mt-5" href="#" style="text-decoration: none; color: #009EF2;">
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
                <div class="card">
                    <img src="<?= base_url('img/acumalaka.png') ?>" class="card-img-top" alt="Image Produk SonicPulse" loading="lazy">
                    <div class="card-body">
                        <h4 class="card-title">Nama Produk</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Sertifikat Kami -->
    <div class="container-fluid produk-kami" style="background-color: #F5FAFF;">
        <h1 class="text-center">Sertifikat Kami</h1>
        <div class="cards-container">

            <a href="#" style="text-decoration: none; color: inherit;">
                <div class="card">
                    <img src="<?= base_url('img/acumalaka.png') ?>" class="card-img-top" alt="Image Aktivitas SonicPulse" loading="lazy">
                    <div class="card-body">
                        <h4 class="card-title">Nama Sertifikat</h4>
                        <p class="card-text">Deskripsi Sertifikat</p>
                    </div>
                </div>
            </a>

        </div>
    </div>

    <!-- Kontak Kami -->
    <div class="container kontak-kami">
        <h1 class="text-center">Kontak Kami</h1>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d151986.1181827674!2d-2.3882730515438357!3d53.472336445240664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487a4d4c5226f5db%3A0xd9be143804fe6baa!2sManchester%2C%20Britania%20Raya!5e0!3m2!1sid!2sid!4v1731554829948!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="container kontak-kami text-center">
            <h3>Hubungi Kami disini</h3>
            <div class="row mt-4">
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
        <div class="text-center p-3" style="background-color: #555; color:#ffff;"> &copy; 1 Januari Copyright:
            Footer123
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        // Hide loader after page loads
        window.addEventListener('load', function() {
            document.querySelector('.loader-container').style.display = 'none';
        });
    </script>
</body>

</html>
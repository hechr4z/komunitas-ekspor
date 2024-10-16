<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->renderSection('meta'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<style>
    .nav-link {
        color: #fff;
    }
</style>

<body>
    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg bg-primary sticky-top">
        <div class="container py-2">
            <img onclick="window.location.href='/'" style="width:160px; ;" src="/img/logokei.png" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Belajar Ekspor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Video Tutorial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Aplikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data Buyers</a>
                    </li>
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
    <footer>
        <div class="footer bg-primary text-light py-5">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-start">

                <div class="kiri mb-4">
                    <img src="/img/logokei.png" alt="logo" style="width: 180px;">
                    <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="kanan ms-md-4">
                    <h5>Kontak & Alamat Kami</h5>
                    <div class="d-flex align-items-center gap-2 my-2">
                        <img src="/img/wa.png" alt="whatsapp" style="width: 22px; height: 22px;">
                        <p class="mb-0">081357484763</p>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <img src="/img/loc.png" alt="location" style="width: 20px; height: auto;">
                        <p class="mb-0">Sawojajar 1 Kota Malang</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <div class="bg-warning py-1">
        <div class="container text-center" style="padding-top: 8px;">
            <p>&copy; 2024 Mas Tio Babang TamvVan 24. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
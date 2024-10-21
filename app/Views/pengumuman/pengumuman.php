<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<section class="container mt-4">
    <div class="text-center mt-5">
        <h2 class="animate__animated animate__fadeInDown">Pengumuman</h2>
        <p class="animate__animated animate__fadeInUp">Pengumuman special untuk anda</p>
    </div>
    
    <div class="row mt-5">
        <!-- Card Pengumuman 1 -->
        <div class="col-md-4 mb-4 animate__animated animate__zoomIn">
            <div class="card h-100 shadow-sm">
                <img src="/img/navbar1.jpg" class="card-img-top" alt="Pengumuman 1">
                <div class="card-body">
                    <h5 class="card-title">Judul Pengumuman 1</h5>
                    <p class="card-text">Ini adalah deskripsi singkat untuk pengumuman pertama. Deskripsi ini memberikan gambaran mengenai isi pengumuman.</p>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> 21 Oktober 2024</small></p>
                </div>
                <div class="card-footer text-center">
                    <a href="detail-pengumuman" class="btn btn-info text-white">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Card Pengumuman 2 -->
        <div class="col-md-4 mb-4 animate__animated animate__zoomIn animate__delay-1s">
            <div class="card h-100 shadow-sm">
                <img src="/img/navbar1.jpg" class="card-img-top" alt="Pengumuman 2">
                <div class="card-body">
                    <h5 class="card-title">Judul Pengumuman 2</h5>
                    <p class="card-text">Ini adalah deskripsi singkat untuk pengumuman kedua. Deskripsi ini memberikan gambaran mengenai isi pengumuman.</p>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> 19 Oktober 2024</small></p>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-info text-white">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Card Pengumuman 3 -->
        <div class="col-md-4 mb-4 animate__animated animate__zoomIn animate__delay-2s">
            <div class="card h-100 shadow-sm">
                <img src="/img/navbar1.jpg" class="card-img-top" alt="Pengumuman 3">
                <div class="card-body">
                    <h5 class="card-title">Judul Pengumuman 3</h5>
                    <p class="card-text">Ini adalah deskripsi singkat untuk pengumuman ketiga. Deskripsi ini memberikan gambaran mengenai isi pengumuman.</p>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> 18 Oktober 2024</small></p>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-info text-white">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
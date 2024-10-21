<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<section class="container mt-4">
    <div class="text-center mt-5">
        <h2 class="animate__animated animate__fadeInDown">Detail Pengumuman</h2>
        <p class="animate__animated animate__fadeInUp">Pengumuman yang lebih jelas</p>
    </div>

    <div class="row mt-5">
        <!-- Detail Pengumuman -->
        <div class="col-md-8">
            <div class="card shadow-sm animate__animated animate__fadeIn">
                <!-- Gambar Pengumuman -->
                <img src="/img/navbar1.jpg" class="card-img-top" alt="Judul Pengumuman">
                
                <!-- Isi Pengumuman -->
                <div class="card-body">
                    <h5 class="card-title">Judul Pengumuman</h5>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> 21 Oktober 2024</small></p>
                    <div class="card-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor urna sit amet urna malesuada, id pharetra ex tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengumuman Lainnya (Ukuran Lebih Kecil) -->
        <div class="col-md-4">
            <h5 class="mb-3">Pengumuman Lainnya</h5>
            
            <!-- Card Pengumuman Lainnya 1 -->
            <div class="card mb-3 shadow-sm animate__animated animate__fadeInRight" style="max-height: 150px;">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="/img/navbar1.jpg" class="img-fluid rounded-start" alt="Pengumuman Lain 1">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h6 class="card-title">Judul Pengumuman Lain 1</h6>
                            <p class="text-muted mb-1"><small><i class="far fa-calendar-alt"></i> 19 Oktober 2024</small></p>
                            <a href="#" class="btn btn-sm btn-info text-white">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Pengumuman Lainnya 2 -->
            <div class="card mb-3 shadow-sm animate__animated animate__fadeInRight animate__delay-1s" style="max-height: 150px;">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="/img/navbar1.jpg" class="img-fluid rounded-start" alt="Pengumuman Lain 2">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h6 class="card-title">Judul Pengumuman Lain 2</h6>
                            <p class="text-muted mb-1"><small><i class="far fa-calendar-alt"></i> 18 Oktober 2024</small></p>
                            <a href="#" class="btn btn-sm btn-info text-white">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Pengumuman Lainnya 3 -->
            <div class="card mb-3 shadow-sm animate__animated animate__fadeInRight animate__delay-2s" style="max-height: 150px;">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="/img/navbar1.jpg" class="img-fluid rounded-start" alt="Pengumuman Lain 3">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h6 class="card-title">Judul Pengumuman Lain 3</h6>
                            <p class="text-muted mb-1"><small><i class="far fa-calendar-alt"></i> 17 Oktober 2024</small></p>
                            <a href="#" class="btn btn-sm btn-info text-white">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
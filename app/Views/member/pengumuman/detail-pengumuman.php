<?= $this->extend('member/layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .btn-custom {
        text-align: center;
        color: #ffffff;
    }

    .btn-custom:hover {
        color: #fff;
        transform: scale(1.05);
        box-shadow: 0px 0px 10px #F2BF02;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #F2BF02 !important;
        /* Mengubah warna saat hover menjadi #F2BF02 */
    }
</style>

<section class="container mt-4">
    <!-- Header Pengumuman -->
    <div class="text-center mt-5">
        <h2 class="animate__animated animate__fadeInDown">Detail Pengumuman</h2>
        <p class="animate__animated animate__fadeInUp">Pengumuman yang lebih jelas</p>
    </div>

    <!-- Detail Pengumuman -->
    <div class="row mt-5 justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm animate__animated animate__fadeIn">
                <!-- Gambar Pengumuman -->
                <img src="/img/navbar1.jpg" class="card-img-top rounded-top" alt="Judul Pengumuman">

                <!-- Isi Pengumuman -->
                <div class="card-body">
                    <h5 class="card-title">Judul Pengumuman</h5>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> 21 Oktober 2024</small></p>
                    <div class="card-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor urna sit amet urna
                            malesuada, id pharetra ex tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengumuman Lainnya -->
    <div class="row mt-5">
        <h3>Pengumuman Lainnya</h3>

        <!-- Card Pengumuman 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm animate__animated animate__zoomIn">
                <img src="/img/navbar1.jpg" class="card-img-top" alt="Pengumuman 1">
                <div class="card-body">
                    <h5 class="card-title">Judul Pengumuman 1</h5>
                    <p class="card-text">Deskripsi singkat untuk pengumuman pertama. Gambaran singkat isi pengumuman.
                    </p>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> 21 Oktober 2024</small></p>
                </div>
                <div class="card-footer text-center">
                    <a href="detail-pengumuman" class="btn btn-custom" style="background-color: #03AADE;">Baca
                        Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Card Pengumuman 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm animate__animated animate__zoomIn">
                <img src="/img/navbar1.jpg" class="card-img-top" alt="Pengumuman 2">
                <div class="card-body">
                    <h5 class="card-title">Judul Pengumuman 2</h5>
                    <p class="card-text">Deskripsi singkat untuk pengumuman kedua. Gambaran singkat isi pengumuman.</p>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> 19 Oktober 2024</small></p>
                </div>
                <div class="card-footer text-center">
                    <a href="detail-pengumuman" class="btn btn-custom" style="background-color: #03AADE;">Baca
                        Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Card Pengumuman 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm animate__animated animate__zoomIn">
                <img src="/img/navbar1.jpg" class="card-img-top" alt="Pengumuman 3">
                <div class="card-body">
                    <h5 class="card-title">Judul Pengumuman 3</h5>
                    <p class="card-text">Deskripsi singkat untuk pengumuman ketiga. Gambaran singkat isi pengumuman.</p>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> 18 Oktober 2024</small></p>
                </div>
                <div class="card-footer text-center">
                    <a href="detail-pengumuman" class="btn btn-custom" style="background-color: #03AADE;">Baca
                        Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
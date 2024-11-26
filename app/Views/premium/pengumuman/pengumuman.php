<?= $this->extend('premium/layout/app'); ?>
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

    @media (max-width: 768px) {
        .row {
            margin-left: 30px;
        }
    }

    @media (max-width: 425px) {
        .row {
            margin-right: 30px;
        }
    }
</style>

<section class="container mt-4">
    <div class="text-center mt-5">
        <h2 class="animate__animated animate__fadeInDown">Pengumuman</h2>
        <p class="animate__animated animate__fadeInUp">Pengumuman special untuk anda</p>
    </div>

    <div class="row mt-5">
        <?php foreach ($pengumuman as $item): ?>
            <!-- Card Pengumuman 1 -->
            <div class="col-md-4 mb-4 animate__animated animate__zoomIn">
                <div class="card h-100 shadow-sm">
                    <img src="<?= base_url('/img/' . $item['poster_pengumuman']); ?>" style="object-fit: cover; width: 100%; height: 200px;" class="card-img-top" alt="<?= $item['judul_pengumuman']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['judul_pengumuman']; ?></h5>
                        <p class="card-text"><?= substr($item['deskripsi_pengumuman'], 0, 180) . '...'; ?></p>
                        <p class="text-muted"><small><i class="far fa-calendar-alt"> </i> <?= date('d F Y', strtotime($item['created_at'])); ?></small></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?= base_url('/detail-pengumuman-premium/' . $item['slug']); ?>" class="btn btn-custom" style="background-color: #03AADE;">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <!-- Card Pengumuman 2 -->
        <!-- <div class="col-md-4 mb-4 animate__animated animate__zoomIn animate__delay-1s">
            <div class="card h-100 shadow-sm">
                <img src="/img/navbar1.jpg" class="card-img-top" alt="Pengumuman 2">
                <div class="card-body">
                    <h5 class="card-title">Judul Pengumuman 2</h5>
                    <p class="card-text">Ini adalah deskripsi singkat untuk pengumuman kedua. Deskripsi ini memberikan
                        gambaran mengenai isi pengumuman.</p>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> 19 Oktober 2024</small></p>
                </div>
                <div class="card-footer text-center">
                    <a href="detail-pengumuman" class="btn btn-custom" style="background-color: #03AADE;">Baca
                        Selengkapnya</a>
                </div>
            </div>
        </div> -->

        <!-- Card Pengumuman 3 -->
        <!-- <div class="col-md-4 mb-4 animate__animated animate__zoomIn animate__delay-2s">
            <div class="card h-100 shadow-sm">
                <img src="/img/navbar1.jpg" class="card-img-top" alt="Pengumuman 3">
                <div class="card-body">
                    <h5 class="card-title">Judul Pengumuman 3</h5>
                    <p class="card-text">Ini adalah deskripsi singkat untuk pengumuman ketiga. Deskripsi ini memberikan
                        gambaran mengenai isi pengumuman.</p>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> 18 Oktober 2024</small></p>
                </div>
                <div class="card-footer text-center">
                    <a href="detail-pengumuman" class="btn btn-custom" style="background-color: #03AADE;">Baca
                        Selengkapnya</a>
                </div>
            </div>
        </div> -->
    </div>
</section>

<?= $this->endSection(); ?>
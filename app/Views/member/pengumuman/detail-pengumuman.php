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
                <img src="<?= base_url('/img/' . $pengumuman['poster_pengumuman']); ?>" class="card-img-top rounded-top" alt="Judul Pengumuman">
                <!-- Isi Pengumuman -->
                <div class="card-body">
                    <h5 class="card-title"><?= $pengumuman['judul_pengumuman']; ?></h5>
                    <p class="text-muted"><small><i class="far fa-calendar-alt"></i> <?= date('d F Y', strtotime($pengumuman['created_at'])); ?></small></p>
                    <div class="card-text">
                        <p><?= $pengumuman['deskripsi_pengumuman']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengumuman Lainnya -->
    <div class="row mt-5">
        <h3>Pengumuman Lainnya</h3>
        <?php foreach ($pengumuman_lainnya as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm animate__animated animate__zoomIn">
                    <img src="<?= base_url('/img/' . $item['poster_pengumuman']); ?>" class="card-img-top" alt="<?= $item['judul_pengumuman']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['judul_pengumuman']; ?></h5>
                        <p class="card-text"><?= substr($item['deskripsi_pengumuman'], 0, 100) . '...'; ?></p>
                        <p class="text-muted"><small><i class="far fa-calendar-alt"></i> <?= date('d F Y', strtotime($item['created_at'])); ?></small></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?= base_url('/detail-pengumuman/' . $item['slug']); ?>" class="btn btn-custom" style="background-color: #03AADE;">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?= $this->endSection(); ?>
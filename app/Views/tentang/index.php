<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<div class="container my-5">
    <div class="row align-items-center">
        <!-- Bagian Gambar -->
        <div class="col-md-6">
            <img src="<?= base_url('/img/logokeiwarna.png'); ?>" alt="Tentang Kami" class="img-fluid rounded shadow-sm" style="object-fit: contain; object-position: center;">
        </div>

        <!-- Bagian Teks -->
        <div class="col-md-6">
            <h1 class="fw-bold mb-4"><?= lang('Blog.tentangTitle'); ?></h1>
            <p>
                Kami adalah perusahaan yang berkomitmen untuk memberikan layanan terbaik kepada pelanggan kami. Dengan pengalaman bertahun-tahun, kami selalu berupaya menciptakan inovasi baru untuk memenuhi kebutuhan Anda.
            </p>
            <p>
                Visi kami adalah menjadi yang terdepan dalam industri ini, sementara misi kami adalah memberikan solusi terbaik, menjaga kepuasan pelanggan, dan berkontribusi pada komunitas.
            </p>
            <a href="<?= base_url('/contact'); ?>" class="btn btn-primary mt-3">Hubungi Kami</a>
        </div>
    </div>

    <!-- Bagian Tim Kami -->
    <div class="team-section mt-5">
        <h2 class="text-center fw-bold mb-4"><?= lang('Blog.timTitle'); ?></h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Anggota Tim 1 -->
            <div class="col">
                <div class="card h-100 text-center shadow-sm">
                    <img src="<?= base_url('/img/navbar1.jpg'); ?>" class="card-img-top img-fluid rounded-circle mx-auto mt-3" alt="Anggota Tim" style="width: 120px; height: 120px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Nama Tim 1</h5>
                        <p class="card-text">CEO</p>
                    </div>
                </div>
            </div>

            <!-- Anggota Tim 2 -->
            <div class="col">
                <div class="card h-100 text-center shadow-sm">
                    <img src="<?= base_url('/img/navbar2.jpg'); ?>" class="card-img-top img-fluid rounded-circle mx-auto mt-3" alt="Anggota Tim" style="width: 120px; height: 120px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Nama Tim 2</h5>
                        <p class="card-text">CTO</p>
                    </div>
                </div>
            </div>

            <!-- Anggota Tim 3 -->
            <div class="col">
                <div class="card h-100 text-center shadow-sm">
                    <img src="<?= base_url('/img/navbar3.jpg'); ?>" class="card-img-top img-fluid rounded-circle mx-auto mt-3" alt="Anggota Tim" style="width: 120px; height: 120px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Nama Tim 3</h5>
                        <p class="card-text">COO</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
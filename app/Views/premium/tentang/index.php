<?= $this->extend('premium/layout/app'); ?>
<?= $this->section('content'); ?>

<div class="container my-4">
    <div class="row align-items-center">
        <!-- Bagian Gambar -->
        <div class="col-md-5 mb-4 mb-md-0">
            <img src="<?= base_url('/img/' . $tentang_kami['gambar_perusahaan']); ?>" alt="<?= $tentang_kami['slug']; ?>"
                class="img-fluid rounded shadow-sm d-block mx-auto"
                style="object-fit: contain; max-width: 300px;">
        </div>

        <!-- Bagian Teks -->
        <div class="col-md-7 px-5 t">
            <div class="content-wrapper mx-auto" style="max-width: 600px;">
                <h1 class="fw-bold mb-3 text-center text-md-start"><?= lang('Blog.tentangTitle'); ?></h1>
                <p class="text-start text-md-justify">
                    <?= $tentang_kami['deskripsi_perusahaan']; ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Bagian Tim Kami -->
    <div class="team-section mt-5 px-4">
        <h2 class="text-center fw-bold mb-4"><?= lang('Blog.layananTitle'); ?></h2>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <!-- Loop untuk menampilkan card layanan -->
            <?php foreach ($manfaatjoin as $item): ?>
                <div class="col">
                    <div class="card h-100 text-center shadow-sm">
                        <img src="<?= base_url('/img/' . $item['gambar']); ?>" class="card-img-top img-fluid mx-auto mt-3"
                            alt="<?= $item['judul_manfaat']; ?>" style="width: 120px; height: 120px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item['judul_manfaat']; ?></h5>
                            <p class="card-text"><?= $item['deskripsi_manfaat']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
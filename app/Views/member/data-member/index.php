<?= $this->extend('member/layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .card-img-top {
        padding: 10px;
        object-fit: cover;
        object-position: center;
        border-radius: 20px;
        width: 100%;
        height: 220px;
    }

    .btn-custom {
        background-color: #03AADE;
        text-align: center;
        color: #ffffff;
        border: none;
        margin-top: auto;
        border-radius: 8px;
        width: 100%;
    }

    .btn-custom:hover {
        background-color: #F2BF02;
        color: #ffffff;
    }

    .card:hover {
        box-shadow: 0px 0px 25px #03AADE !important;
        transform: translateY(-5px) !important;
    }

    .container {
        margin: 0 auto;
    }

    .member-section {
        text-align: center;
    }
</style>

<!-- Section Member -->
<section class="member-section">
    <!-- judul -->
    <div class="py-5" style="text-align: center;">
        <h2 class="text-custom-title">Data Member</h2>
        <p class="text-custom-paragraph mt-2">Berikut adalah halaman yang menampilkan data member dari Komunitas Ekspor
            Indonesia</p>
    </div>
    <div class="container">
        <?php if (empty($member)): ?>
            <div class="col-12 mb-5">
                <div class="alert alert-info text-center" role="alert">
                    Masih belum ada Data Member.
                </div>
            </div>
        <?php else: ?>
            <!-- Card -->
            <div class="d-flex flex-wrap justify-content-center mt-5" style="gap: 10px;">
                <?php foreach ($member as $item): ?>
                    <a href="<?= base_url('/member-detail-member/' . $item['slug']); ?>" class="text-decoration-none"
                        style="color: inherit;">
                        <div class="card hover-card mx-4 mb-5 shadow-sm"
                            style="width: 18rem; cursor: pointer; transition: transform 0.2s;">
                            <img src="<?= base_url('img/' . $item['foto_profil']) ?>" class="card-img-top img-fluid member-img"
                                alt="Member Photo" style="height: 220px;">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $item['username'] ?></h5>
                                <p class="card-text"><?= $item['nama_perusahaan'] ?></p>
                                <span class="btn btn-custom mt-auto" style="border-radius: 8px;">Lihat Profil</span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="mt-2">
                <?= $pager->links('default', 'bootstrap_pagination') ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection(); ?>
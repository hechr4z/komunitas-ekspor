<?= $this->extend('premium/layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    /* Video Detail Section */
    .video-detail-section {
        padding: 0px 15px;
    }

    .card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .card:hover {
        box-shadow: 0px 0px 25px #03AADE !important;
        transform: translateY(-5px) !important;
    }

    .badge {
        font-weight: normal;
        color: #fff;
        font-size: 0.9rem;
        padding: 0.5em 1em;
        border-radius: 3px;
        background-color: #03AADE;
    }

    .btn-custom {
        background-color: #03AADE;
        text-align: center;
        color: #ffffff;
    }

    .btn-custom:hover {
        background-color: #F2BF02;
        color: #ffffff;
    }

    @media (max-width: 768px) {
        .card-text {
            display: none;
        }
    }

    .scrolling-wrapper {
        overflow-x: scroll;
        /* Allows horizontal scrolling */
        -ms-overflow-style: none;
        /* Hides scrollbar in IE and Edge */
        scrollbar-width: none;
        /* Hides scrollbar in Firefox */
    }

    .scrolling-wrapper::-webkit-scrollbar {
        display: none;
        /* Hides scrollbar in Chrome, Safari, and Opera */
    }

    .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
    }

    @media (max-width: 768px) {
        .kategori-container {
            padding: 0px 15px;
        }
    }
</style>


<!-- Halaman untuk kategori video -->
<div class="video-detail-section pt-5 pb-2 text-center">
    <h2 class="text-custom-title">Kategori Video: <?= $kategori['nama_kategori_video']; ?></h2>
</div>

<div class="container">
    <div class="row container row-cols-1 row-cols-md-3 g-4 mt-1 mb-5">
        <!-- Looping untuk setiap video tutorial dalam kategori -->
        <?php if (!empty($video_tutorial)): ?>
            <?php foreach ($video_tutorial as $video): ?>
                <div class="col">
                    <a href="<?= base_url('/premium-video-tutorial-detail/' . $video['slug']); ?>" class="text-decoration-none">
                        <div class="card h-100">
                            <img src="<?= base_url('/img/' . $video['thumbnail']); ?>" class="card-img-top img-fluid" alt="<?= $video['judul_video']; ?>" style="object-fit: cover; object-position: center; aspect-ratio: 16/9;" loading="lazy">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <?= $video['judul_video']; ?>
                                </h5>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <span class="badge"><?= $kategori['nama_kategori_video']; ?></span>
                                </div>
                                <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <?= $video['deskripsi_video']; ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    Belum ada video yang tersedia untuk kategori ini.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Back Button -->
<div class="artikel-detail-footer text-center mt-5">
    <a href="<?= base_url('premium-video-tutorial'); ?>" class="btn btn-custom">Kembali ke Video</a>
</div>



<?= $this->endSection(); ?>
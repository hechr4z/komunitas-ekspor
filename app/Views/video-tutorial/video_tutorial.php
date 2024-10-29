<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .card:hover {
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .badge {
        font-weight: normal;
        color: #fff;
        font-size: 0.9rem;
        padding: 0.5em 1em;
        border-radius: 3px;
        background-color: #03AADE;
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
</style>


<!-- judul -->
<div class="pendaftaran-section container py-5 text-center">
    <h2 class="text-custom-title"><?= lang('Blog.videoTutorialTitle') ?></h2>
    <p class="text-custom-paragraph mt-2"><?= lang('Blog.videoTutorialDescription') ?>
    </p>
</div>
<div class="container">
    <!-- Looping untuk setiap kategori -->
    <?php foreach ($kategori_vidio as $kategori) : ?>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="kategori font-weight-bold mb-0">
                <?= lang('Blog.videoCategory') ?>
                <?= ($lang === 'en') ? $kategori['nama_kategori_video_en'] : $kategori['nama_kategori_video']; ?>
            </h5>
            <a href="<?= base_url(($lang === 'en' ? 'en/video-tutorial/' : 'id/tutorial-video/') . ($lang === 'en' ? $kategori['slug_en'] : $kategori['slug'])); ?>" class="btn btn-custom">
                <?= lang('Blog.readMore') ?>
            </a>
        </div>
        <hr style="border-top: 2px solid #000;">

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-1 mb-5">
            <!-- Looping untuk setiap video tutorial dalam kategori -->
            <?php if (!empty($video_tutorial[$kategori['nama_kategori_video']])): ?>
                <?php foreach ($video_tutorial[$kategori['nama_kategori_video']] as $video): ?>
                    <!-- Hanya menampilkan video yang sesuai dengan kategori saat ini -->
                    <?php if ($video['id_kategori_video'] == $kategori['id_kategori_video']): ?>
                        <div class="col">
                            <a href="<?= base_url(($lang === 'en' ? 'en/video-tutorial/' : 'id/tutorial-video/') . ($lang === 'en' ? $video['slug_en'] : $video['slug'])); ?>" class="text-decoration-none">
                                <div class="card h-100">
                                    <img src="<?= base_url('/img/' . $video['thumbnail']); ?>" class="card-img-top img-fluid" alt="<?= ($lang === 'en') ? $video['judul_video_en'] : $video['judul_video']; ?>" style="object-fit: cover; object-position: center; aspect-ratio: 16/9;" loading="lazy">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                            <?= ($lang === 'en') ? $video['judul_video_en'] : $video['judul_video']; ?>
                                        </h5>
                                        <div class="my-2 d-flex justify-content-between align-items-center">
                                            <span class="badge"><?= ($lang === 'en') ? $kategori['nama_kategori_video_en'] : $kategori['nama_kategori_video']; ?></span>
                                        </div>
                                        <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                            <?= ($lang === 'en') ? $video['deskripsi_video_en'] : $video['deskripsi_video']; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        <?= lang('Blog.noVideosAvailable') ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>





<?= $this->endSection(); ?>
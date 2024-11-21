<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    /* Add this to your CSS file */
    .embed-responsive {
        position: relative;
        display: block;
        width: 100%;
        padding: 0;
    }

    .embed-responsive-item {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }

    .rounded {
        border-radius: 8px;
    }

    .shadow-sm {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    /* Add this to your CSS file */
    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .d-flex {
        display: flex;
    }

    .badge {
        font-weight: normal;
        color: #fff;
        font-size: 0.9rem;
        padding: 0.8em 1.5em;
        border-radius: 3px;
        background-color: #03AADE;
        width: auto;
        /* Membuat lebar badge mengikuti panjang teks */
        display: inline-block;
        /* Menjamin badge sesuai dengan teks */
    }

    .card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .card:hover {
        box-shadow: 0px 0px 25px #03AADE !important;
        transform: translateY(-5px) !important;
    }
</style>


<!-- Video Details Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="position-relative mb-3">
                    <div class="bg-white border border-top-0 p-4 rounded shadow-sm">

                        <!-- Tags Badges -->
                        <div style="display: flex;">
                            <div class="badge py-2">
                                <?= ($lang === 'en') ? $kategori['nama_kategori_video_en'] : $kategori['nama_kategori_video']; ?>
                            </div>
                        </div>

                        <!-- Video Title -->
                        <h4 class="py-3 text-uppercase font-weight-bold">
                            <?= ($lang === 'en') ? $video['judul_video_en'] : $video['judul_video']; ?>
                        </h4>

                        <!-- Video Player Start -->
                        <div class="ratio ratio-16x9 mb-3 position-relative" style="width: 100%; height: auto; cursor: pointer;" onclick="showSweetAlert()">
                            <img
                                id="my-video-thumbnail"
                                class="rounded img-fluid"
                                src="<?= base_url('/img/' . $video['thumbnail']); ?>"
                                alt="Thumbnail"
                                style="object-fit: cover;">

                            <!-- Play Icon -->
                            <div class="d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                                <i class="fas fa-play-circle" style="font-size: 64px; color: white;"></i>
                            </div>
                        </div>
                        <!-- Video Player End -->

                        <!-- Description -->
                        <div class="mb-3">
                            <h5 class="font-weight-bold py-2"> <?= lang('Blog.titleDesc') ?></h5>
                            <p>
                                <?= ($lang === 'en') ? $video['deskripsi_video_en'] : $video['deskripsi_video']; ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- video lainnya -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 py-4 font-weight-bold">
                            <?= lang('Blog.titleOther') ?>
                        </h4>
                    </div>

                    <?php foreach ($related_videos as $related_video): ?>
                        <!-- card lainnya -->
                        <div class="card bg-white border border-top-0 p-3 rounded shadow-sm mb-3">
                            <a href="<?= base_url(($lang === 'en' ? 'en/video-tutorial' : 'id/tutorial-video') . '/' . ($lang === 'en' ? $related_video['slug_en'] : $related_video['slug'])); ?>" class="text-decoration-none">

                                <div class="d-flex align-items-center bg-white rounded border border-light overflow-hidden shadow-sm">
                                    <img class="img-fluid" style="object-fit: cover; width: 100px; height: 100px;" src="<?= base_url('/img/' . $related_video['thumbnail']); ?>" alt="Thumbnail Video">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                                        <!-- Judul Video -->
                                        <h3 class="text-uppercase font-weight-bold text-dark" style="font-size: 18px; margin-bottom: 8px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                            <?= $lang === 'en' ? $related_video['judul_video_en'] : $related_video['judul_video']; ?>
                                        </h3>
                                        <!-- Deskripsi Video -->
                                        <p class="text-dark" style="font-size: 14px; margin-bottom: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                            <?= $lang === 'en' ? $related_video['deskripsi_video_en'] : $related_video['deskripsi_video']; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>
                <!-- video lainnya End -->
            </div>
        </div>
    </div>
</div>
<!-- Video Details End -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function showSweetAlert() {
        let title = "<?= $lang === 'en' ? 'Want to Watch the Video?' : 'Mau Lihat Videonya?'; ?>";
        let text = "<?= $lang === 'en' ? 'Sign up as a member first!' : 'Yuk Daftar Member Dulu!'; ?>";
        let confirmButtonText = "<?= $lang === 'en' ? 'Sign Up' : 'Daftar'; ?>";
        let cancelButtonText = "<?= $lang === 'en' ? 'Later' : 'Nanti'; ?>";
        let reminderText = "<?= $lang === 'en' ? 'Okay, don\'t forget to sign up!' : 'Oke, Jangan Lupa Daftar!'; ?>";
        let registrationUrl = "<?= base_url($lang === 'en' ? 'en/registration' : 'id/pendaftaran'); ?>";


        Swal.fire({
            title: title,
            text: text,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = registrationUrl; // Redirect to the language-specific registration page
            } else {
                Swal.fire(reminderText); // Optional message if "Later" is clicked
            }
        });
    }
</script>



<?= $this->endSection(); ?>
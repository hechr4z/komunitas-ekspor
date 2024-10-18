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
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
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
                                #Kategori
                            </div>
                        </div>

                        <!-- Video Title -->
                        <h4 class="py-3 text-uppercase font-weight-bold">VLOG DEANKT NAIK FIRSTCLASS EMIRATES KE ARAB !! BISA MANDI DI PESAWAT GG !!</h4>
                        <!-- Video Player Start -->
                        <div class="ratio ratio-16x9 mb-3">
                            <iframe
                                id="my-video"
                                class="rounded"
                                controls
                                preload="auto"
                                src="https://www.youtube.com/embed/BOpUKv-VUao"
                                sandbox="allow-scripts allow-same-origin"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <!-- Video Player End -->
                        <!-- Description -->
                        <div class="mb-3">
                            <h5 class="font-weight-bold py-2">Deskripsi</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod harum omnis fugiat repudiandae aliquid consequatur, cupiditate quaerat repellendus enim asperiores quo impedit hic cumque libero est reprehenderit non incidunt consectetur.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- video lainnya -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 py-4 font-weight-bold">
                            Video Lainnya
                        </h4>
                    </div>
                    <!-- card lainnya -->
                    <div class="card bg-white border border-top-0 p-3 rounded shadow-sm">
                        <a href="<?= base_url('/video-page-url') ?>" class="text-decoration-none">
                            <div class="d-flex align-items-center bg-white rounded border border-light overflow-hidden shadow-sm">
                                <img class="img-fluid" style="object-fit: cover; width: 100px; height: 100px;" src="<?= base_url('/img/artikel1.jpg') ?>" alt="Thumbnail Video">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                                    <!-- Judul Video -->
                                    <h3 class="text-uppercase font-weight-bold text-dark" style="font-size: 18px; margin-bottom: 8px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        Judul Video Lainnya
                                    </h3>
                                    <!-- Deskripsi Video -->
                                    <p class="text-dark" style="font-size: 14px; margin-bottom: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        Ini adalah deskripsi singkat dari video lainnya yang tersedia.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- card lainnya -->
                    <div class="card bg-white border border-top-0 p-3 rounded shadow-sm">
                        <a href="<?= base_url('/video-page-url') ?>" class="text-decoration-none">
                            <div class="d-flex align-items-center bg-white rounded border border-light overflow-hidden shadow-sm">
                                <img class="img-fluid" style="object-fit: cover; width: 100px; height: 100px;" src="<?= base_url('/img/artikel3.webp') ?>" alt="Thumbnail Video">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                                    <!-- Judul Video -->
                                    <h3 class="text-uppercase font-weight-bold text-dark" style="font-size: 18px; margin-bottom: 8px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        Judul Video Lainnya
                                    </h3>
                                    <!-- Deskripsi Video -->
                                    <p class="text-dark" style="font-size: 14px; margin-bottom: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        Ini adalah deskripsi singkat dari video lainnya yang tersedia.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- card lainnya -->
                    <div class="card bg-white border border-top-0 p-3 rounded shadow-sm">
                        <a href="<?= base_url('/video-page-url') ?>" class="text-decoration-none">
                            <div class="d-flex align-items-center bg-white rounded border border-light overflow-hidden shadow-sm">
                                <img class="img-fluid" style="object-fit: cover; width: 100px; height: 100px;" src="<?= base_url('/img/artikel2.jpeg') ?>" alt="Thumbnail Video">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                                    <!-- Judul Video -->
                                    <h3 class="text-uppercase font-weight-bold text-dark" style="font-size: 18px; margin-bottom: 8px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        Judul Video Lainnya
                                    </h3>
                                    <!-- Deskripsi Video -->
                                    <p class="text-dark" style="font-size: 14px; margin-bottom: 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        Ini adalah deskripsi singkat dari video lainnya yang tersedia.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- video lainnya End -->
            </div>
        </div>
    </div>
</div>
<!-- Video Details End -->



<?= $this->endSection(); ?>
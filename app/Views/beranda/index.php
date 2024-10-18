
<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>

<style>
    .carousel-item img {
        width: 100%;
        height: 500px;
        height: auto;
        max-height: 500px;
        object-fit: cover;
    }

    /* card popular member */
    .card-container {
        width: 300px;
        height: 300px;
        position: relative;
        border-radius: 10px;
    }

    .card-container::before {
        content: "";
        z-index: -1;
        position: absolute;
        inset: 0;
        background: linear-gradient(-25deg, #03AADE 0%, #03AADE 100%);
        transform: translate3d(0, 0, 0) scale(0.95);
        filter: blur(20px);
    }

    .card {
        width: 100%;
        height: 100%;
        border-radius: inherit;
        overflow: hidden;
    }

    .card .img-content {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(-25deg, white 0%, #03AADE 100%);
        transition: scale 0.6s, rotate 0.6s, filter 1s;
    }

    .card .img-content svg {
        width: 50px;
        height: 50px;
        fill: #e8e8e8;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .card .content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        gap: 10px;
        color: #e8e8e8;
        padding: 20px;
        line-height: 1.5;
        border-radius: 5px;
        opacity: 0;
        pointer-events: none;
        transform: translateY(50px);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .card .content .heading {
        font-size: 32px;
        font-weight: 700;
    }

    .card:hover .content {
        opacity: 1;
        transform: translateY(0);
    }

    .card:hover .img-content {
        scale: 2.5;
        rotate: 30deg;
        filter: blur(7px);
    }

    .card:hover .img-content svg {
        fill: transparent;
    }

    /* end */

    /* button daftar */
    .button-find {
        background-color: #03AADE;
        transition: background-color 0.3s ease;
    }

    .button-find:hover {
        background-color: #0288c7;
        border: 1px solid #fff;
    }

    /* end */

    @media (min-width: 768px) {
        .carousel-item img {
            max-height: 600px;
        }
    }
</style>

<!-- slider -->
<div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="/img/slider-1.jpg" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block text-light mb-3">
                <h5>Bangun Ekosistem Ekspor Bersama</h5>
                <p>Komunitas Ekspor Indonesia berperan aktif dalam memperluas peluang ekspor.</p>
                <button type="button" class="btn btn-outline-light">Daftar Sekarang</button>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item" data-bs-interval="2000">
            <img src="/img/slider-2.jpg" class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block text-light mb-3">
                <h5>Pelatihan & Pendampingan Ekspor</h5>
                <p>Ikuti program pelatihan dan pendampingan ekspor untuk meningkatkan kapasitas usaha.</p>
                <button type="button" class="btn btn-outline-light">Daftar Sekarang</button>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="/img/slider-3.jpg" class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block text-light mb-3">
                <h5>Kolaborasi & Networking Global</h5>
                <p>Komunitas ini menghubungkan Anda dengan buyer dan pelaku ekspor dari berbagai negara.</p>
                <button type="button" class="btn btn-outline-light">Daftar Sekarang</button>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- end -->

<!-- populer member -->
<section>
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <hr style="width: 40px; margin-top: 12px; margin-right: 10px;">
            <h5 class="fw-lighter" data-en="ABOUT US" data-id="TENTANG KAMI">POPULER MEMBER</h5>
            <hr style="width: 40px; margin-top: 12px; margin-left: 10px;">
        </div>
        <h1 class="text-center" data-en="WHO WE ARE" data-id="SIAPA KAMI"><b>TOP MEMBER<span style="color: #03AADE;"> SPOTLIGHT</span></b></h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-flex mt-3">
                <hr style="color: #FF9900; width: 50px;">
                <p class="fw-lighter ms-3 mt-1">Populer Member</p>
            </div>
            <h1 class="fw-lighter">Komunitas Ekspor Indonesia</h1>
            <h1 class="fw-bold" style="color: #03AADE;">Member Populer Komunitas Ekspor</h1>
            <div class="d-flex justify-content-between">
                <p>Temukan anggota populer dalam komunitas ekspor Indonesia. Setiap anggota dipilih secara
                    <br>teliti untuk memberikan kontribusi yang berguna dan berkelanjutan di bidang ekspor
                    <br>Indonesia. Masing-masing anggota membawa keunikan dalam komunitas ekspor Indonesia."
                </p>
                <a href="produk"><button type="button" class="button-find btn text-light mt-3" style="height: 40px; background-color: #03AADE;">Daftar Sekarang</button></a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center gap-5">
            <div class="card-container">
                <div class="card">
                    <div class="img-content" style="display: flex; justify-content: center;">
                        <img src="/img/navbar1.jpg" style="width: 90%; height: 90%; object-fit: cover; border-radius: 10px;" alt="...">
                    </div>
                    <div class="content" style="text-align: center; padding: 10px 0; color: #03AADE;">
                        <p class="heading" style="margin-bottom: 5px; font-weight: bold; text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff;">Rudi Hartono</p>
                        <p class="heading" style="margin-bottom: 5px; font-size: 15px; text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff;">Elecomp Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="card">
                    <div class="img-content" style="display: flex; justify-content: center;">
                        <img src="/img/navbar2.jpg" style="width: 90%; height: 90%; object-fit: cover; border-radius: 10px;" alt="...">
                    </div>
                    <div class="content" style="text-align: center; padding: 10px 0; color: #03AADE;">
                        <p class="heading" style="margin-bottom: 5px; font-weight: bold; text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff;">Rudi Hartono</p>
                        <p class="heading" style="margin-bottom: 5px; font-size: 15px; text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff;">Elecomp Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="card">
                    <div class="img-content" style="display: flex; justify-content: center;">
                        <img src="/img/navbar1.jpg" style="width: 90%; height: 90%; object-fit: cover; border-radius: 10px;" alt="...">
                    </div>
                    <div class="content" style="text-align: center; padding: 10px 0; color: #03AADE;">
                        <p class="heading" style="margin-bottom: 5px; font-weight: bold; text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff;">Rudi Hartono</p>
                        <p class="heading" style="margin-bottom: 5px; font-size: 15px; text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff;">Elecomp Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="card">
                    <div class="img-content" style="display: flex; justify-content: center;">
                        <img src="/img/navbar2.jpg" style="width: 90%; height: 90%; object-fit: cover; border-radius: 10px;" alt="...">
                    </div>
                    <div class="content" style="text-align: center; padding: 10px 0; color: #03AADE;">
                        <p class="heading" style="margin-bottom: 5px; font-weight: bold; text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff;">Rudi Hartono</p>
                        <p class="heading" style="margin-bottom: 5px; font-size: 15px; text-shadow: 2px 2px 0 #fff, -2px -2px 0 #fff, 2px -2px 0 #fff, -2px 2px 0 #fff;">Elecomp Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end -->

<!-- tombol daftar -->
<section class="container-fluid text-dark rounded-5" style="background-color: #03AADE; width: 87%; height: 600px; margin-top: 80px;">
    <div class="row d-flex justify-content-around ms-3">
        <div class="col-md-6">
            <div class="bg-transparent py-5 ms-5">
                <div class="bg-transparent py-5 ms-5">
                    <div class="card-body py-5 mb-5">
                        <p class="text-light fw-lighter h6" style="font-size: 20px">Bergabunglah Bersama Kami</p>
                        <p class="text-light" style="font-size: 57px; font-family: Poetsen One, sans-serif;">KOMUNITAS
                            <br>EKSORTIR
                        </p>
                        <p class="text-light fw-lighter" style="font-size: 18px">Ayo, bergabunglah dengan komunitas eksportir
                            kami dan tingkatkan peluang bisnis Anda. Jadilah bagian dari jaringan yang mendukung kesuksesan.
                        </p>
                        <button type="button" class="btn btn-outline-light">Daftar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <img src="/img/slider-2.jpg" class="rounded" style="width: 70%; height: 70%; margin-top: 60px;" alt="">
        </div>
    </div>
</section>
<!-- end -->

<!-- keuntungan -->
<section>
    <div class="container text-center py-5 mt-2">
        <h2 class="fw-bold mb-3" style="color: #03AADE;">MANFAAT JOIN MEMBER.</h2>
        <div class="d-flex justify-content-center align-items-center mb-2">
            <div class="border-top" style="width: 60px; height: 3px; background-color: #03AADE;"></div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="border-top" style="width: 30px; height: 2px; background-color: #03AADE;"></div>
        </div>
        <p class="text-muted mt-3">
            Menjadi anggota komunitas ekspor memberikan akses ke peluang yang lebih luas dan dukungan <br>yang berharga.
            Bergabunglah untuk meningkatkan jaringan dan keterampilan Anda.
        </p>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="rounded-3" style="background-color: #03AADE; width: 100px; height: 100px;">
                    <svg class="text-light" style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" width="80px" height="100px" viewBox="0 0 32 32">
                        <path fill="currentColor"
                            d="M16 1c-8.84 0-16 7.16-16 16s7.16 16 16 16 16-7.16 16-16S24.84 1 16 1zm0 28c-6.61 0-12-5.39-12-12S9.39 5 16 5s12 5.39 12 12-5.39 12-12 12z" />
                        <path fill="currentColor"
                            d="M16 10c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2s2-.9 2-2v-4c0-1.1-.9-2-2-2zm0 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                    </svg>
                </div>
                <div class="ms-4 mt-1">
                    <p style="font-size: 20px;"><b>Peluang Bisnis</b></p>
                    <p>Akses ke Jaringan Bisnis<br>Kesempatan Kolaborasi Internasional</p>
                </div>
            </div>
            <div class="d-flex">
                <div class="rounded-3" style="background-color: #03AADE; width: 100px; height: 100px;">
                    <svg class="text-light" style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" width="80px" height="100px" viewBox="0 0 32 32">
                        <path fill="currentColor"
                            d="M16 1c-8.84 0-16 7.16-16 16s7.16 16 16 16 16-7.16 16-16S24.84 1 16 1zm0 28c-6.61 0-12-5.39-12-12S9.39 5 16 5s12 5.39 12 12-5.39 12-12 12z" />
                        <path fill="currentColor"
                            d="M22 15h-6V9h-4v6H10l6 6 6-6z" />
                    </svg>
                </div>
                <div class="ms-4 mt-1">
                    <p style="font-size: 20px;"><b>Pelatihan dan Workshop</b></p>
                    <p>Akses Pelatihan Gratis<br>Pengembangan Keterampilan Ekspor</p>
                </div>
            </div>
            <div class="d-flex">
                <div class="rounded-3" style="background-color: #03AADE; width: 100px; height: 100px;">
                    <svg class="text-light" style="margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" width="80px" height="100px" viewBox="0 0 32 32">
                        <path fill="currentColor"
                            d="M16 1c-8.84 0-16 7.16-16 16s7.16 16 16 16 16-7.16 16-16S24.84 1 16 1zm0 28c-6.61 0-12-5.39-12-12S9.39 5 16 5s12 5.39 12 12-5.39 12-12 12z" />
                        <path fill="currentColor"
                            d="M12 18h-2l6 6 6-6h-2v-4h-8z" />
                    </svg>
                </div>
                <div class="ms-4 mt-1">
                    <p style="font-size: 20px;"><b>Sertifikat</b></p>
                    <p>Mendapatkan Sertifikat Resmi<br>Memperluas Jaringan & Relasi</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end -->

<!-- ajakan -->
<section class="animasi container-fluid mt-5 footer-custom" style="background-color: #03AADE; width: 100%; height: 350px;">
    <div class="background-image animated-element">
        <div class="centered-text">
            <h2 class="text-center text-light" style="padding-top: 100px; font-family: Lato, sans-serif;"><b>Bergabunglah dengan Komunitas Eksportir!</b></h2>
            <p class="text-center fw-lighter text-light">Jadilah bagian dari jaringan eksportir yang sukses. Dapatkan peluang, pengetahuan, dan dukungan untuk mengembangkan bisnis ekspor Anda.</p>
        </div>
        <div class="text-center centered-button pt-2">
            <a href="produk" class="btn btn-outline-light">Daftar Sekarang</a>
        </div>
    </div>
</section>
<!-- ajakan end -->

<!-- peta -->
<section class="container mt-5">
    <div class="mt-5">
        <div class="d-flex justify-content-center">
            <hr style="width: 40px; margin-top: 12px; margin-right: 10px;">
            <h5 class="fw-lighter" data-en="MEMBER MAP" data-id="PETA MEMBER">PETA MEMBER</h5>
            <hr style="width: 40px; margin-top: 12px; margin-left: 10px;">
        </div>
        <h1 class="text-center" data-en="TOP MEMBERS SPOTLIGHT" data-id="SOROTAN MEMBER UNGGUL"><b>SOROTAN MEMBER<span style="color: #03AADE;"> UNGGUL</span></b></h1>
    </div>
    <div class="container mt-5">
        <div id="map" style="width: 100%; height: 700px;"></div>
    </div>
</section>
<!-- end -->

<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

<script>
    var map = L.map('map').setView([-6.1751, 106.8650], 13); // Set koordinat lat dan long serta zoom level

    // Tambahkan layer peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Tambahkan marker
    var marker = L.marker([-6.1751, 106.8650]).addTo(map);
    marker.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
</script>

<?= $this->endSection(); ?>
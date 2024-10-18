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
</style>

<!-- Section Member -->
<section class="member-section">
    <!-- judul -->
    <div class="py-5" style="text-align: center;">
        <h2 class="text-custom-title">Data Member</h2>
        <p class="text-custom-paragraph mt-2">Berikut data member Komunitas Ekspor Indonesia</p>
    </div>
    <div class="container">
        <?php if (empty($top4_member)): ?>
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    Masih belum ada Data Member
                </div>
            </div>
        <?php else: ?>
            <div class="row mt-3">
                <!-- Card -->
                <?php foreach ($top4_member as $item): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div onclick="showSweetAlert()" class="card h-100 shadow-sm" style="cursor: pointer; border-radius: 12px; transition: box-shadow 0.3s ease, transform 0.3s ease;">
                            <img src="<?= base_url('img/' . $item['foto_profil']); ?>" class="card-img-top" alt="Sample Member 1"
                                style="height: 220px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title text-center" style="margin-bottom: 12px; font-weight: bold; word-wrap: break-word; white-space: normal;">
                                    <?= $item['username'] ?>
                                </h6>
                                <p class="card-text text-center text-muted" style="flex-grow: 1; word-wrap: break-word; white-space: normal; font-size: 0.9rem;">
                                    <?= $item['nama_perusahaan'] ?>
                                </p>
                                <span class="btn btn-primary mt-auto" style="border-radius: 8px;">Lihat Profil</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Bungkus row kedua dengan div baru untuk overlay -->
            <div class="position-relative mt-3 mb-3" style="overflow: hidden; border-radius: 12px;">
                <!-- Row kedua: Member yang di-blur -->
                <div class="row" style="filter: blur(5px); pointer-events: none;">
                    <!-- Card Member Blur -->
                    <?php foreach ($blur_member as $item): ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="card h-100 shadow-sm"
                                style="cursor: pointer; border-radius: 12px; transition: box-shadow 0.3s ease, transform 0.3s ease;">
                                <img src="<?= base_url('img/' . $item['foto_profil']); ?>" class="card-img-top" alt="Sample Member Blur"
                                    style="height: 220px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title text-center" style="margin-bottom: 12px; font-weight: bold; word-wrap: break-word; white-space: normal;">
                                        Username Blur
                                    </h6>
                                    <p class="card-text text-center text-muted" style="flex-grow: 1; word-wrap: break-word; white-space: normal; font-size: 0.9rem;">
                                        Nama Perusahaan Blur
                                    </p>
                                    <span class="btn btn-primary mt-auto" style="border-radius: 8px;">Lihat Profil</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Overlay teks hanya untuk row kedua -->
                <div class="overlay text-center" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; background-color: rgba(255, 255, 255, 0.7); z-index: 10;">
                    <p style="font-size: 1.5rem; font-weight: bold; color:#03AADE;">Daftar untuk melihat member lainnya!</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function showSweetAlert() {
        Swal.fire({
            title: "Mau Lihat Detail Member?",
            text: "Yuk Daftar Member Dulu!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Daftar",
            cancelButtonText: "Nanti"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/pendaftaran"; // Redirect to the registration page
            } else {
                Swal.fire("Oke, Jangan Lupa Daftar!"); // Optional message if "Nanti" is clicked
            }
        });
    }
</script>

<?= $this->endSection(); ?>
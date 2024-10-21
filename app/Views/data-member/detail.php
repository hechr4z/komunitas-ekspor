<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .img-fluid {
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        object-fit: cover;
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
        font-size: 28px;
        font-weight: bold;
    }

    .card p {
        margin: 5px 0;
        color: #666;
    }

    .badge-lg {
        font-size: 16px;
        padding: 10px 15px;
        border-radius: 8px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        margin-top: auto;
        border-radius: 8px;
        width: 100%;
    }

    .tab-content {
        margin-top: 20px;
    }

    .custom-tab {
        color: #000;
    }

    .custom-tab:hover {
        color: #007bff;
    }

    .nav-link.active {
        color: #007bff !important;
    }

    .section-title {
        margin-bottom: 30px;
    }

    .text-truncate-description {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-body h5 {
        font-size: 16px;
        font-weight: bold;
    }

    .product-img {
        margin: 10px;
        /* Add margin to create space around the image */
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        width: calc(100% - 20px);
        /* Adjusts width to account for the margin */
        object-fit: cover;
    }

    .hover-card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .hover-card:hover {
        box-shadow: 0px 0px 25px #03AADE !important;
        transform: translateY(-5px) !important;
    }

    .member-img {
        margin: 10px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        width: calc(100% - 20px);
        object-fit: cover;
    }

    .card .btn:hover {
        background-color: #F2BF02 !important;
        color: #fff;
        border: none;
    }
</style>

<div class="container mt-4">
    <!-- Member Details (Full Width) -->
    <div class="col-lg-12">
        <div class="card p-4 shadow-sm">
            <!-- Image at the top -->
            <div class="text-center mb-2"
                style="width: 250px; height: 250px; margin: auto; overflow: hidden; border-radius: 50%; position: relative;">
                <img src="<?= base_url('img/' . $member['foto_profil']); ?>" class="img-fluid" alt=""
                    style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            </div>

            <!-- Member Information -->
            <h2 class="text-center mb-2"><?= strtoupper($member['username']) ?></h2>

            <!-- Badge with Code Referral -->
            <div class="text-center mb-3">
                <span class="badge badge-lg bg-light text-dark p-2" style="font-size: 18px;">Kode Referral:
                    <?= $member['username'] ?></span>
            </div>


            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs justify-content-center gap-3 mt-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active custom-tab" id="personal-info-tab" data-bs-toggle="tab"
                        data-bs-target="#personal-info" type="button" role="tab" aria-controls="personal-info"
                        aria-selected="true">Profil Perusahaan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="education-job-tab" data-bs-toggle="tab"
                        data-bs-target="#education-job" type="button" role="tab" aria-controls="education-job"
                        aria-selected="false">Sertifikat</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="certification-tab" data-bs-toggle="tab"
                        data-bs-target="#certification" type="button" role="tab" aria-controls="certification"
                        aria-selected="false">Data Produk</button>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="personal-info" role="tabpanel"
                    aria-labelledby="personal-info-tab">
                    <h5 class="mb-4">Profil Perusahaan</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-building fa-lg mb-2"></i>
                                <p><strong>Nama Perusahaan:</strong> <?= $member['nama_perusahaan'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-industry fa-lg mb-2"></i>
                                <p><strong>Tipe Bisnis:</strong> <?= $member['tipe_bisnis'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="card p-3 shadow-sm bg-light d-flex flex-column">
                                <i class="fas fa-file-alt fa-lg mb-2"></i>
                                <label class="form-label"><strong>Deskripsi Perusahaan:</strong></label>
                                <p class="mb-0"><?= nl2br(htmlspecialchars($member['deskripsi_perusahaan'])) ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-box fa-lg mb-2"></i>
                                <p><strong>Produk Utama:</strong> <?= $member['produk_utama'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-calendar-alt fa-lg mb-2"></i>
                                <p><strong>Tahun Didirikan:</strong> <?= $member['tahun_dibentuk'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-chart-line fa-lg mb-2"></i>
                                <p><strong>Skala Bisnis:</strong> <?= $member['skala_bisnis'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-envelope fa-lg mb-2"></i>
                                <p><strong>Email:</strong> <?= $member['email_perusahaan'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-leaf fa-lg mb-2"></i>
                                <p><strong>Kategori Produk:</strong> <?= $member['kategori_produk'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-user-tie fa-lg mb-2"></i>
                                <p><strong>PIC:</strong> <?= $member['pic'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-phone fa-lg mb-2"></i>
                                <p><strong>No. Telp PIC:</strong> <?= $member['pic_phone'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sertifikat -->
                <div class="tab-pane fade" id="education-job" role="tabpanel" aria-labelledby="education-job-tab">
                    <h5 class="mb-4">Sertifikat</h5>
                    <div class="row">
                        <!-- Sertifikat Pendidikan -->
                        <?php if (empty($sertifikat)): ?>
                            <div class="col-md-12">
                                <div class="alert alert-info text-center" role="alert">
                                    Masih belum ada Sertifikat
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($sertifikat as $item): ?>
                                <div class="col-md-6 mb-3">
                                    <div class="card p-3 shadow-sm bg-light">
                                        <i class="fas fa-file-pdf fa-lg mb-2"></i>
                                        <p><strong>Nama File:</strong>
                                            <span class="certificate-name">
                                                <?= $item['sertifikat'] ?>
                                            </span>
                                        </p>
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#certificateModal"
                                            data-filename="<?= base_url('certificate/' . $item['sertifikat']) ?>">Lihat</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="certificateModalLabel">Sertifikat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe id="certificateFrame" src="" style="width: 100%; height: 500px;"
                                    frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Product -->
                <div class="tab-pane fade" id="certification" role="tabpanel" aria-labelledby="certification-tab">
                    <h5 class="mb-4">Data Produk</h5>
                    <div class="row">
                        <!-- Card Product -->
                        <?php if (empty($produk)): ?>
                            <div class="col-md-12">
                                <div class="alert alert-info text-center" role="alert">
                                    Masih belum ada Produk
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($produk as $item): ?>
                                <div class="col-md-4 mb-5">
                                    <a href="#" class="text-decoration-none" style="color: inherit;" data-bs-toggle="modal"
                                        data-bs-target="#productModal1" data-nama="<?= $item['nama_produk'] ?>"
                                        data-deskripsi="<?= $item['deskripsi_produk'] ?>" data-hscode="<?= $item['hs_code'] ?>"
                                        data-minorder="<?= $item['minimum_order_qty'] ?>"
                                        data-kapasitas="<?= $item['kapasitas_produksi_bln'] ?>"
                                        data-foto="<?= base_url('img/' . $item['foto_produk']) ?>">
                                        <div class="card hover-card mx-4 shadow-sm"
                                            style="cursor: pointer; transition: transform 0.2s; height: 100%;">
                                            <img src="<?= base_url('img/' . $item['foto_produk']) ?>"
                                                class="card-img-top img-fluid product-img" alt="Product Photo"
                                                style="height: 220px;">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title"><?= $item['nama_produk'] ?></h5>
                                                <p class="card-text text-truncate-description text-justify flex-grow-1">
                                                    <?= $item['deskripsi_produk'] ?>
                                                </p>
                                                <button type="button" class="btn btn-primary mt-auto">
                                                    Lihat Detail
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>


                        <!-- Modal for Product Details -->
                        <div class="modal fade" id="productModal1" tabindex="-1" aria-labelledby="productModalLabel1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productModalLabel1">Detail Produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <!-- Foto Produk -->
                                            <div class="col-md-6">
                                                <img id="productImage" src="" class="img-fluid rounded mb-3"
                                                    alt="Product Photo">
                                            </div>
                                            <!-- Detail Produk -->
                                            <div class="col-md-6">
                                                <h5 class="mb-4 fw-bold">Informasi Produk</h5>
                                                <div class="mb-3">
                                                    <label for="namaProduk" class="form-label"><strong>Nama
                                                            Produk</strong></label>
                                                    <input type="text" class="form-control" id="namaProduk" value=""
                                                        readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsiProduk" class="form-label"><strong>Deskripsi
                                                            Produk</strong></label>
                                                    <textarea class="form-control" id="deskripsiProduk" rows="6"
                                                        readonly></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="hsCode" class="form-label"><strong>Kode
                                                            HS</strong></label>
                                                    <input type="text" class="form-control" id="hsCode" value=""
                                                        readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="minOrderQty" class="form-label"><strong>Jumlah Pesanan
                                                            Minimal</strong></label>
                                                    <input type="number" class="form-control" id="minOrderQty" value=""
                                                        readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kapasitasProduksi" class="form-label"><strong>Kapasitas
                                                            Produksi Bulanan</strong></label>
                                                    <input type="number" class="form-control" id="kapasitasProduksi"
                                                        value="" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Member Lainnya Section (Placed outside of the main card) -->
    <div class="col-lg-12 mt-5">
        <div class="section-title">
            <h4 class="text-uppercase font-weight-bold text-center mb-4">Member Populer</h4>
        </div>
        <?php if (empty($members)): ?>
            <div class="d-flex flex-wrap justify-content-center">
                <div class="alert alert-info text-center" role="alert">
                    Masih belum ada Member Lainnya
                </div>
            </div>
        <?php else: ?>
            <div class="d-flex flex-wrap justify-content-center">
                <?php foreach ($members as $item): ?>
                    <a href="<?= base_url('detail-member/' . $item['slug']); ?>" class="text-decoration-none"
                        style="color: inherit;">
                        <div class="card hover-card mx-4 mb-5 shadow-sm"
                            style="width: 18rem; cursor: pointer; transition: transform 0.2s;">
                            <img src="<?= base_url('img/' . $item['foto_profil']) ?>" class="card-img-top img-fluid member-img"
                                alt="Member Photo" style="height: 220px;">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $item['username'] ?></h5>
                                <p class="card-text"><?= $item['nama_perusahaan'] ?></p>
                                <span class="btn btn-primary mt-auto" style="border-radius: 8px;">Lihat Profil</span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
</div>

<script>
    const certificateModal = document.getElementById('certificateModal');
    certificateModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const filename = button.getAttribute('data-filename');
        const iframe = document.getElementById('certificateFrame');
        iframe.src = filename; // Menetapkan src iframe ke file sertifikat
    });

    const productModal = document.getElementById('productModal1');
    productModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const productName = button.getAttribute('data-nama');
        const productDescription = button.getAttribute('data-deskripsi');
        const productHsCode = button.getAttribute('data-hscode');
        const productMinOrder = button.getAttribute('data-minorder');
        const productCapacity = button.getAttribute('data-kapasitas');
        const productImage = button.getAttribute('data-foto');

        // Update modal content
        document.getElementById('namaProduk').value = productName;
        document.getElementById('deskripsiProduk').value = productDescription;
        document.getElementById('hsCode').value = productHsCode;
        document.getElementById('minOrderQty').value = productMinOrder;
        document.getElementById('kapasitasProduksi').value = productCapacity;
        document.getElementById('productImage').src = productImage;
    });
</script>



<?= $this->endSection(); ?>
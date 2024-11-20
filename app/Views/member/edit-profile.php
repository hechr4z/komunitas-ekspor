<?= $this->extend('member/layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .lingkaran {
        margin: auto;
        overflow: hidden;
        border-radius: 50%;
        position: relative;
        width: 250px;
        height: 250px;
    }

    .lingkaran img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .btn-custom {
        text-align: center;
        color: #ffffff;
    }

    .btn-custom:hover {
        color: #fff;
        box-shadow: 0px 0px 10px #F2BF02;
        background-color: #F2BF02 !important;
        /* Mengubah warna saat hover menjadi #F2BF02 */
    }

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

    .hover-card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .hover-card:hover {
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    /* Mengatur warna teks tombol aktif */
    .nav-tabs .nav-link.active {
        color: #03AADE !important;
    }

    /* Opsional: Mengatur efek hover untuk konsistensi */
    .nav-tabs .nav-link:hover {
        color: #03AADE;
    }


    /* Animasi */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .container h2,
    .container p,
    .card h5,
    .form-label,
    .btn-warning {
        opacity: 0;
        animation: fadeIn 0.5s ease forwards;
    }

    .container h2 {
        animation-delay: 0.2s;
    }

    .container p {
        animation-delay: 0.4s;
    }

    .card h5 {
        animation-delay: 0.6s;
    }

    .form-label {
        animation-delay: 0.8s;
    }

    .btn-warning {
        animation-delay: 1s;
    }

    /* end */

    @media (max-width: 768px) {
        .card {
            margin-left: 50px;
        }

        .card-body h5 {
            font-size: 1.25rem;
            /* Adjust title size */
        }

        .card-img-top {
            height: 180px;
            /* Adjust image height */
        }

        .row .col-md-4 {
            flex-basis: 50%;
            /* Two cards per row on tablet */
        }
    }

    @media (max-width: 576px) {
        .card {
            margin-left: 40px;
        }

        .row .col-md-4 {
            flex-basis: 100%;
            /* Full width card on mobile */
        }

        .card-img-top {
            height: 150px;
            /* Smaller image height */
        }

        .card-body h5 {
            font-size: 1rem;
            /* Smaller title on mobile */
        }
    }

    @media (max-width: 425px) {
        .card {
            margin-right: 40px;
        }
    }

    @media (max-width: 375px) {
        .card {
            margin-right: 40px;
        }
    }

    @media (max-width: 320px) {
        .lingkaran {
            width: 200px;
            height: 200px;
            right: 5px;
        }
    }
</style>

<div class="container mt-4">
    <div class="judul text-center mt-5">
        <h2>Edit Profile</h2>
        <p>Anda Dapat mengubah data diri anda</p>
    </div>
    <div class="card p-4 shadow-sm mt-5">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= is_array(session()->getFlashdata('error')) ? implode('<br>', session()->getFlashdata('error')) : session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk upload foto -->
        <form action="<?= base_url('/update-foto-profil'); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="text-center mb-3 shadow lingkaran">
                <!-- Image Preview -->
                <img id="profileImage"
                    src="<?= base_url('img/' . ($member['foto_profil'] ?? 'default.jpg')); ?>"
                    alt="Foto Profil">
            </div>

            <!-- Upload Button -->
            <div>
                <div class="text-center" style="position: relative; top: -40px;">
                    <button type="button" class="btn btn-custom" onclick="document.getElementById('fileInput').click()"
                        style="width: 45px; height: 45px; display: inline-flex; align-items: center; justify-content: center; background-color: #03AADE;">
                        <i class="fas fa-edit" style="font-size: 17px; color: #fff;"></i>
                    </button>
                </div>

                <!-- Hidden File Input -->
                <input type="file" id="fileInput" name="foto_profil" accept="image/*"
                    style="display: none;" onchange="previewImage(event)">
            </div>

            <!-- Submit Button -->
            <div class="text-center mb-3">
                <button type="submit" class="btn btn-custom"
                    style="width: 100px; background-color: #03AADE; color: #fff;">Submit</button>
            </div>
        </form>
        <h4 class="text-center mt-1"><?= $member['username'] ?></h4>
        <?php if (session()->get('errors')) : ?>
            <div class="alert alert-danger">
                <?php foreach (session()->get('errors') as $error) : ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs justify-content-center gap-3 mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active custom-tab" id="informasi-tab" data-bs-toggle="tab" data-bs-target="#informasi" type="button" role="tab" aria-controls="informasi" aria-selected="true">Informasi Akun</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link custom-tab" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab" aria-controls="profil" aria-selected="false">Profil Perusahaan</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link custom-tab" id="sertifikat-tab" data-bs-toggle="tab" data-bs-target="#sertifikatTab" type="button" role="tab" aria-controls="sertifikat" aria-selected="false">Sertifikat</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link custom-tab" id="produk-tab" data-bs-toggle="tab" data-bs-target="#produk" type="button" role="tab" aria-controls="produk" aria-selected="false">Data Produk</button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content mt-4" id="myTabContent">
            <!-- Informasi Perusahaan -->
            <div class="tab-pane fade show active" id="informasi" role="tabpanel" aria-labelledby="informasi-tab">
                <h5 class="mb-4">Informasi Akun</h5>
                <form action="<?= base_url('/ubah-informasi-akun'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $member['email'] ?>" placeholder="Masukkan Email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                        </div>
                        <button type="submit" class="btn btn-custom" style="background-color: #03AADE;">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Profil Perusahaan -->
            <div class="tab-pane fade" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                <h5 class="mb-4">Profil Perusahaan</h5>
                <form action="<?= base_url('/ubah-profil-perusahaan'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $member['nama_perusahaan'] ?>" placeholder="Masukkan Nama Perusahaan">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tipe_bisnis" class="form-label">Tipe Bisnis</label>
                            <input type="text" class="form-control" id="tipe_bisnis" name="tipe_bisnis" value="<?= $member['tipe_bisnis'] ?>" placeholder="Masukkan Tipe Bisnis">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="deskripsi_perusahaan" class="form-label">Deskripsi Perusahaan</label>
                            <textarea class="form-control" id="deskripsi_perusahaan" name="deskripsi_perusahaan" placeholder="Masukkan Deskripsi Perusahaan"><?= $member['deskripsi_perusahaan'] ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="produk_utama" class="form-label">Produk Utama</label>
                            <input type="text" class="form-control" id="produk_utama" name="produk_utama" value="<?= $member['produk_utama'] ?>" placeholder="Masukkan Produk Utama">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tahun_dibentuk" class="form-label">Tahun Didirikan</label>
                            <input type="number" class="form-control" id="tahun_dibentuk" name="tahun_dibentuk" value="<?= $member['tahun_dibentuk'] ?>" placeholder="Masukkan Tahun Didirikan" min="1900" max="2099">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="skala_bisnis" class="form-label">Skala Bisnis</label>
                            <input type="text" class="form-control" id="skala_bisnis" name="skala_bisnis" value="<?= $member['skala_bisnis'] ?>" placeholder="Masukkan Skala Bisnis">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kategori_produk" class="form-label">Kategori Produk</label>
                            <input type="text" class="form-control" id="kategori_produk" name="kategori_produk" value="<?= $member['kategori_produk'] ?>" placeholder="Masukkan Kategori Produk">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pic" class="form-label">PIC</label>
                            <input type="text" class="form-control" id="pic" name="pic" value="<?= $member['pic'] ?>" placeholder="Masukkan PIC">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pic_phone" class="form-label">No.Telp PIC</label>
                            <input type="text" class="form-control" id="pic_phone" name="pic_phone" value="<?= $member['pic_phone'] ?>" placeholder="Masukkan No.Telp PIC">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $member['latitude'] ?>" placeholder="Masukkan Latitude">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" value="<?= $member['longitude'] ?>" placeholder="Masukkan Longitude">
                        </div>
                        <button type="submit" class="btn btn-custom" style="background-color: #03AADE;">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Sertifikat -->
            <div class="tab-pane fade" id="sertifikatTab" role="tabpanel" aria-labelledby="produk-tab">
                <h5 class="mb-4">Masukan Sertifikat</h5>
                <form action="<?= base_url('/add-sertifikat'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <label for="sertifikat" class="form-label">Masukkan Sertifikat</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="sertifikat" name="sertifikat">
                        </div>
                        <button type="submit" class="btn btn-custom mt-3" style="background-color: #03AADE;">Submit</button>
                    </div>
                </form>
                <div class="container mt-4">
                    <div class="p-4 mt-5">
                        <div class="text-center">
                            <h2>Sertifikat Anda</h2>
                            <p>Semua Sertifikat anda ada disini</p>
                        </div>

                        <div class="row mt-4">
                            <?php if (empty($sertifikat)): ?>
                                <div class="col-12 mb-5">
                                    <div class="alert alert-info text-center" role="alert">
                                        Masih belum ada Sertifikat.
                                    </div>
                                </div>
                            <?php else: ?>
                                <!-- Card 1 -->
                                <?php foreach ($sertifikat as $item): ?>
                                    <div class="col-md-6 mb-3">
                                        <div class="card p-3 shadow-sm bg-light">
                                            <a href="<?= base_url('/delete-sertifikat/' . $item['id_sertifikat']) ?>">
                                                <i class="fas fa-trash text-danger position-absolute"
                                                    style="top: 10px; right: 10px; cursor: pointer;"></i>
                                            </a>
                                            <i class="fas fa-file-pdf fa-lg mb-2"></i>
                                            <p>
                                                <strong>
                                                    Nama File:
                                                </strong>
                                                <span class="certificate-name">
                                                    <?= $item['sertifikat'] ?>
                                                </span>
                                            </p>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#certificateModal" data-filename="<?= base_url('certificate/' . $item['sertifikat']) ?>">
                                                Lihat
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
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

            <!-- Data Produk -->
            <div class="tab-pane fade" id="produk" role="tabpanel" aria-labelledby="produk-tab">
                <h5 class="mb-4">Data Produk</h5>
                <form action="<?= base_url('/add-produk'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="foto_produk" class="form-label">Foto Produk</label>
                            <input type="file" class="form-control" id="foto_produk" name="foto_produk">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                            <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="hs_code" class="form-label">HS Code</label>
                            <input type="text" class="form-control" id="hs_code" name="hs_code">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="minimum_order_qty" class="form-label">Minimum Order</label>
                            <input type="text" class="form-control" id="minimum_order_qty" name="minimum_order_qty">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kapasitas_produksi_bln" class="form-label">Kapasitas Produk</label>
                            <input type="text" class="form-control" id="kapasitas_produksi_bln" name="kapasitas_produksi_bln">
                        </div>
                        <button type="submit" class="btn btn-custom" style="background-color: #03AADE;">Submit</button>
                    </div>
                </form>
                <div class="container mt-4">
                    <div class="p-4 mt-5">
                        <div class="text-center">
                            <h2>Data Produk</h2>
                            <p>Semua produk anda ada disini</p>
                        </div>

                        <div class="row mt-4">
                            <?php if (empty($produk)): ?>
                                <div class="col-12 mb-5">
                                    <div class="alert alert-info text-center" role="alert">
                                        Masih belum ada Data Produk.
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php foreach ($produk as $item): ?>
                                    <!-- Card 1 -->
                                    <div class="col-md-4 mb-5 animate__animated animate__zoomIn">
                                        <a href="#" class="text-decoration-none" style="color: inherit;" data-bs-toggle="modal"
                                            data-bs-target="#productModal1" data-nama="<?= $item['nama_produk'] ?>"
                                            data-deskripsi="<?= $item['deskripsi_produk'] ?>" data-hscode="<?= $item['hs_code'] ?>"
                                            data-minorder="<?= $item['minimum_order_qty'] ?>" data-kapasitas="<?= $item['kapasitas_produksi_bln'] ?>"
                                            data-foto="<?= base_url('img/' . $item['foto_produk']) ?>">
                                            <div class="card hover-card mx-4 shadow-sm"
                                                style="cursor: pointer; transition: transform 0.2s; height: 100%;">
                                                <img src="<?= base_url('img/' . $item['foto_produk']); ?>" class="card-img-top img-fluid product-img" alt="Product Photo"
                                                    style="height: 220px;">
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title"><?= $item['nama_produk']; ?></h5>
                                                    <p class="card-text text-truncate-description text-justify flex-grow-1">
                                                        <?= $item['deskripsi_produk']; ?>
                                                    </p>
                                                    <button type="button" class="btn btn-info text-light mt-auto">
                                                        Lihat Detail
                                                    </button>
                                                </div>
                                                <a href="<?= base_url('/delete-produk/' . $item['id_produk']) ?>">
                                                    <button type="submit" class="btn btn-danger position-absolute top-0 end-0 m-3" style="border-radius: 50%;">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

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
<script>
    const certificateModal = document.getElementById('certificateModal');
    certificateModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const filename = button.getAttribute('data-filename');
        const iframe = document.getElementById('certificateFrame');
        iframe.src = filename; // Menetapkan src iframe ke file sertifikat
    });

    const productModal = document.getElementById('productModal1');
    productModal.addEventListener('show.bs.modal', function(event) {
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

    function previewImage(event) {
        const image = document.getElementById('profileImage');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result; // Update pratinjau gambar
            };
            reader.readAsDataURL(file);
        }
    }
</script>

<?= $this->endSection(); ?>
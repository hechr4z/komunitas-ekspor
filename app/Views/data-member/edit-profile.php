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

    .hover-card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .hover-card:hover {
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
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
</style>

<div class="container mt-4">
    <div class="text-center mt-5">
        <h2>Edit Profile</h2>
        <p>Anda Dapat mengubah data diri anda</p>
    </div>
    <div class="card p-4 shadow-sm mt-5">
        <!-- Image at the top -->
        <div class="text-center mb-2" style="width: 250px; height: 250px; margin: auto; overflow: hidden; border-radius: 50%; position: relative;">
            <img src="/img/slider-1.jpg" class="img-fluid" alt="" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        </div>
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs justify-content-center gap-3 mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active custom-tab" id="informasi-tab" data-bs-toggle="tab" data-bs-target="#informasi" type="button" role="tab" aria-controls="informasi" aria-selected="true">Informasi Akun</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link custom-tab" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab" aria-controls="profil" aria-selected="false">Profil Perusahaan</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link custom-tab" id="sertifikat-tab" data-bs-toggle="tab" data-bs-target="#sertifikat" type="button" role="tab" aria-controls="sertifikat" aria-selected="false">Sertifikat</button>
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
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="namaPerusahaan" class="form-label">Username</label>
                        <input type="text" class="form-control" id="namaPerusahaan" value="Username" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nomerPIC" class="form-label">Email</label>
                        <input type="text" class="form-control" id="nomerPIC" value="Email" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="nomerPIC" class="form-label">Password</label>
                        <input type="text" class="form-control" id="nomerPIC" value="Password" readonly>
                    </div>
                    <button type="button" class="btn btn-warning mt-3">Submit</button>
                </div>
            </div>

            <!-- Profil Perusahaan -->
            <div class="tab-pane fade" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                <h5 class="mb-4">Profil Perusahaan</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="namaPerusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="alamatPerusahaan" value="Nama Perusahaan" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="PIC" class="form-label">PIC (Person In Charge)</label>
                        <input type="text" class="form-control" id="namaPIC" value="PIC" readonly>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="nomerPIC" class="form-label">Nomer PIC</label>
                        <input type="text" class="form-control" id="alamatPerusahaan" value="Nomer PIC" readonly>
                    </div>
                    <button type="button" class="btn btn-warning mt-3">Submit</button>
                </div>
            </div>

            <!-- Sertifikat -->
            <div class="tab-pane fade" id="sertifikat" role="tabpanel" aria-labelledby="sertifikat-tab">
                <h5 class="mb-4 text-center">Sertifikat</h5>
                <div class="row justify-content-center">
                    <div class="col-md-6 mb-3">
                        <div class="card p-4 shadow-sm">
                            <label for="fileSertifikat" class="form-label">Masukkan Sertifikat</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="namaSertifikat">
                                <button type="button" class="btn btn-danger" id="hapusGambar">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </div>
                            <button type="button" class="btn btn-warning mt-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Produk -->
            <div class="tab-pane fade" id="produk" role="tabpanel" aria-labelledby="produk-tab">
                <h5 class="mb-4">Data Produk</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fotoProduk" class="form-label">Foto Produk</label>
                        <input type="text" class="form-control" id="deskripsiProduk" value="Foto Produk" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="namaProduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="namaProduk" value="Nama Produk" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="deskripsiProduk" class="form-label">Deskripsi Produk</label>
                        <input type="text" class="form-control" id="namaProduk" value="Deskripsi Produk" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="hsCode" class="form-label">HS Code</label>
                        <input type="text" class="form-control" id="deskripsiProduk" value="HS Code" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="minimumOrder" class="form-label">Minimum Order</label>
                        <input type="text" class="form-control" id="namaProduk" value="Minimum Order" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kapasitasProduk" class="form-label">Kapasitas Produk</label>
                        <input type="text" class="form-control" id="deskripsiProduk" value="Kapasitas produk" readonly>
                    </div>
                    <button type="button" class="btn btn-warning mt-3">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
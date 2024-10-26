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

    @media (max-width: 768px) {
        .card-body h5 {
            font-size: 1.25rem; /* Adjust title size */
        }

        .card-img-top {
            height: 180px; /* Adjust image height */
        }

        .row .col-md-4 {
            flex-basis: 50%; /* Two cards per row on tablet */
        }
    }

    @media (max-width: 576px) {
        .row .col-md-4 {
            flex-basis: 100%; /* Full width card on mobile */
        }

        .card-img-top {
            height: 150px; /* Smaller image height */
        }

        .card-body h5 {
            font-size: 1rem; /* Smaller title on mobile */
        }
    }

    @media (max-width: 320px) {
    
}

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
        <h4 class="text-center mt-1">Username</h4>
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
                        <label for="nomerPIC" class="form-label">Email</label>
                        <input type="text" class="form-control" id="nomerPIC" value="Email" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="namaPerusahaan" value="Username" readonly>
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
                        <label for="PIC" class="form-label">Tipe Bisnis</label>
                        <input type="text" class="form-control" id="namaPIC" value="Tipe Bisnis" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nomerPIC" class="form-label">Deskripsi Perusahaan</label>
                        <input type="text" class="form-control" id="alamatPerusahaan" value="Deskripsi Perusahaan" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="namaPerusahaan" class="form-label">Produk Utama</label>
                        <input type="text" class="form-control" id="alamatPerusahaan" value="Produk Utama" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="PIC" class="form-label">Tahun Didirikan</label>
                        <input type="text" class="form-control" id="namaPIC" value="Tahun Didirikan" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nomerPIC" class="form-label">Skala Perusahaan</label>
                        <input type="text" class="form-control" id="alamatPerusahaan" value="Skala Perusahaan" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="namaPerusahaan" class="form-label">Email</label>
                        <input type="text" class="form-control" id="alamatPerusahaan" value="Email" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="PIC" class="form-label">Kategori Produk</label>
                        <input type="text" class="form-control" id="namaPIC" value="Kategori Produk" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nomerPIC" class="form-label">PIC</label>
                        <input type="text" class="form-control" id="alamatPerusahaan" value="PIC" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nomerPIC" class="form-label">No.Telp PIC</label>
                        <input type="text" class="form-control" id="alamatPerusahaan" value="No.Telp PIC" readonly>
                    </div>
                    <button type="button" class="btn btn-warning mt-3">Submit</button>
                </div>
            </div>

            <!-- Sertifikat -->
            <div class="tab-pane fade" id="sertifikat" role="tabpanel" aria-labelledby="produk-tab">
                <h5 class="mb-4">Masukan Sertifikat</h5>
                <div class="row">
                <label for="fileSertifikat" class="form-label">Masukkan Sertifikat</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="namaSertifikat">
                                <button type="button" class="btn btn-danger" id="hapusGambar">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </div>
                    <button type="button" class="btn btn-warning mt-3">Submit</button>
                </div>
                <div class="container mt-4">
                    <div class="p-4 mt-5">
                        <div class="text-center">
                            <h2>Sertifikat Anda</h2>
                            <p>Semua Sertifikat anda ada disini</p>
                        </div>

                        <div class="row mt-4">
                            <!-- Card 1 -->
                            <div class="col-md-4 mb-5 animate__animated animate__zoomIn">
                                <a href="#" class="text-decoration-none" style="color: inherit;" data-bs-toggle="modal"
                                    data-bs-target="#productModal1">
                                    <div class="card hover-card mx-4 shadow-sm"
                                        style="cursor: pointer; transition: transform 0.2s; height: 100%;">
                                        <img src="img/p5.jpg" class="card-img-top img-fluid product-img" alt="Product Photo"
                                            style="height: 220px;">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-center mt-2">Sertifikat A</h5>
                                        </div>
                                        <button type="button" class="btn btn-danger position-absolute top-0 end-0 m-3" style="border-radius: 50%;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </a>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-md-4 mb-5 animate__animated animate__zoomIn">
                                <a href="#" class="text-decoration-none" style="color: inherit;" data-bs-toggle="modal"
                                    data-bs-target="#productModal2">
                                    <div class="card hover-card mx-4 shadow-sm"
                                        style="cursor: pointer; transition: transform 0.2s; height: 100%;">
                                        <img src="img/p5.jpg" class="card-img-top img-fluid product-img" alt="Product Photo"
                                            style="height: 220px;">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-center mt-2">Sertifikat B</h5>
                                        </div>
                                        <button type="button" class="btn btn-danger position-absolute top-0 end-0 m-3" style="border-radius: 50%;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </a>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-md-4 mb-5 animate__animated animate__zoomIn">
                                <a href="#" class="text-decoration-none" style="color: inherit;" data-bs-toggle="modal"
                                    data-bs-target="#productModal3">
                                    <div class="card hover-card mx-4 shadow-sm"
                                        style="cursor: pointer; transition: transform 0.2s; height: 100%;">
                                        <img src="img/p5.jpg" class="card-img-top img-fluid product-img" alt="Product Photo"
                                            style="height: 220px;">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-center mt-2">Sertifikat C</h5>
                                        </div>
                                        <button type="button" class="btn btn-danger position-absolute top-0 end-0 m-3" style="border-radius: 50%;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 1 -->
                <div class="modal fade" id="productModal1" tabindex="-1" aria-labelledby="productModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel1">Produk A</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="img/product1.jpg" class="img-fluid mb-3" alt="Product A">
                                <p>Deskripsi lengkap produk A.</p>
                                <p>HS Code: 123456</p>
                                <p>Min. Order: 100 pcs</p>
                                <p>Kapasitas Produksi: 1000 pcs/bulan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 2 -->
                <div class="modal fade" id="productModal2" tabindex="-1" aria-labelledby="productModalLabel2" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel2">Produk B</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="img/product2.jpg" class="img-fluid mb-3" alt="Product B">
                                <p>Deskripsi lengkap produk B.</p>
                                <p>HS Code: 654321</p>
                                <p>Min. Order: 200 pcs</p>
                                <p>Kapasitas Produksi: 2000 pcs/bulan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 3 -->
                <div class="modal fade" id="productModal3" tabindex="-1" aria-labelledby="productModalLabel3" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel3">Produk C</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="img/product3.jpg" class="img-fluid mb-3" alt="Product C">
                                <p>Deskripsi lengkap produk C.</p>
                                <p>HS Code: 987654</p>
                                <p>Min. Order: 300 pcs</p>
                                <p>Kapasitas Produksi: 3000 pcs/bulan</p>
                            </div>
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
                <div class="container mt-4">
                    <div class="p-4 mt-5">
                        <div class="text-center">
                            <h2>Data Produk</h2>
                            <p>Semua produk anda ada disini</p>
                        </div>

                        <div class="row mt-4">
                            <!-- Card 1 -->
                            <div class="col-md-4 mb-5 animate__animated animate__zoomIn">
                                <a href="#" class="text-decoration-none" style="color: inherit;" data-bs-toggle="modal"
                                    data-bs-target="#productModal1">
                                    <div class="card hover-card mx-4 shadow-sm"
                                        style="cursor: pointer; transition: transform 0.2s; height: 100%;">
                                        <img src="img/p5.jpg" class="card-img-top img-fluid product-img" alt="Product Photo"
                                            style="height: 220px;">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">Produk A</h5>
                                            <p class="card-text text-truncate-description text-justify flex-grow-1">
                                                Deskripsi singkat produk A.
                                            </p>
                                            <button type="button" class="btn btn-info text-light mt-auto">
                                                Lihat Detail
                                            </button>
                                        </div>
                                        <button type="button" class="btn btn-danger position-absolute top-0 end-0 m-3" style="border-radius: 50%;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </a>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-md-4 mb-5 animate__animated animate__zoomIn">
                                <a href="#" class="text-decoration-none" style="color: inherit;" data-bs-toggle="modal"
                                    data-bs-target="#productModal2">
                                    <div class="card hover-card mx-4 shadow-sm"
                                        style="cursor: pointer; transition: transform 0.2s; height: 100%;">
                                        <img src="img/p5.jpg" class="card-img-top img-fluid product-img" alt="Product Photo"
                                            style="height: 220px;">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">Produk B</h5>
                                            <p class="card-text text-truncate-description text-justify flex-grow-1">
                                                Deskripsi singkat produk B.
                                            </p>
                                            <button type="button" class="btn btn-info text-light mt-auto">
                                                Lihat Detail
                                            </button>
                                        </div>
                                        <button type="button" class="btn btn-danger position-absolute top-0 end-0 m-3" style="border-radius: 50%;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </a>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-md-4 mb-5 animate__animated animate__zoomIn">
                                <a href="#" class="text-decoration-none" style="color: inherit;" data-bs-toggle="modal"
                                    data-bs-target="#productModal3">
                                    <div class="card hover-card mx-4 shadow-sm"
                                        style="cursor: pointer; transition: transform 0.2s; height: 100%;">
                                        <img src="img/p5.jpg" class="card-img-top img-fluid product-img" alt="Product Photo"
                                            style="height: 220px;">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">Produk C</h5>
                                            <p class="card-text text-truncate-description text-justify flex-grow-1">
                                                Deskripsi singkat produk C.
                                            </p>
                                            <button type="button" class="btn btn-info text-light mt-auto">
                                                Lihat Detail
                                            </button>
                                        </div>
                                        <button type="button" class="btn btn-danger position-absolute top-0 end-0 m-3" style="border-radius: 50%;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 1 -->
                <div class="modal fade" id="productModal1" tabindex="-1" aria-labelledby="productModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel1">Produk A</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="img/product1.jpg" class="img-fluid mb-3" alt="Product A">
                                <p>Deskripsi lengkap produk A.</p>
                                <p>HS Code: 123456</p>
                                <p>Min. Order: 100 pcs</p>
                                <p>Kapasitas Produksi: 1000 pcs/bulan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 2 -->
                <div class="modal fade" id="productModal2" tabindex="-1" aria-labelledby="productModalLabel2" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel2">Produk B</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="img/product2.jpg" class="img-fluid mb-3" alt="Product B">
                                <p>Deskripsi lengkap produk B.</p>
                                <p>HS Code: 654321</p>
                                <p>Min. Order: 200 pcs</p>
                                <p>Kapasitas Produksi: 2000 pcs/bulan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal 3 -->
                <div class="modal fade" id="productModal3" tabindex="-1" aria-labelledby="productModalLabel3" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel3">Produk C</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="img/product3.jpg" class="img-fluid mb-3" alt="Product C">
                                <p>Deskripsi lengkap produk C.</p>
                                <p>HS Code: 987654</p>
                                <p>Min. Order: 300 pcs</p>
                                <p>Kapasitas Produksi: 3000 pcs/bulan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>


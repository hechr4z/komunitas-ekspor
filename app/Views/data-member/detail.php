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
    }

    .tab-content {
        margin-top: 20px;
    }

    .section-title {
        margin-bottom: 30px;
    }

    .card-body h5 {
        font-size: 16px;
        font-weight: bold;
    }
</style>

<div class="container mt-4">
    <!-- Member Details (Full Width) -->
    <div class="col-lg-12">
        <div class="card p-4 shadow-sm">
            <!-- Image at the top -->
            <div class="text-center mb-3">
                <img src="<?= base_url('img/member1.jpeg') ?>" class="img-fluid rounded-circle" alt="John Doe"
                    style="max-height: 350px; width: 250px; object-fit: cover;">
            </div>

            <!-- Member Information -->
            <h2 class="text-center mb-4"><?= strtoupper('John Doe') ?></h2>

            <!-- Badge with city/region -->
            <div class="text-center mb-2">
                <span class="badge badge-lg bg-light text-dark p-2" style="font-size: 18px;">New York</span>
            </div>

            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs justify-content-center gap-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="personal-info-tab" data-bs-toggle="tab"
                        data-bs-target="#personal-info" type="button" role="tab" aria-controls="personal-info"
                        aria-selected="true">Company Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="education-job-tab" data-bs-toggle="tab" data-bs-target="#education-job"
                        type="button" role="tab" aria-controls="education-job"
                        aria-selected="false">Certificate</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="certification-tab" data-bs-toggle="tab" data-bs-target="#certification"
                        type="button" role="tab" aria-controls="certification" aria-selected="false">Data
                        Product</button>
                </li>
            </ul>


            <!-- Tabs Content -->
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="personal-info" role="tabpanel"
                    aria-labelledby="personal-info-tab">
                    <h5 class="mb-4">Company Profile</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-user-circle fa-lg mb-2"></i>
                                <p><strong>Username:</strong> Manager</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-map-marker-alt fa-lg mb-2"></i>
                                <p><strong>Alamat:</strong> 123 Main St, New York</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-phone fa-lg mb-2"></i>
                                <p><strong>No. HP:</strong> (123) 456-7890</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-envelope fa-lg mb-2"></i>
                                <p><strong>Email:</strong> john.doe@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certificate -->
                <div class="tab-pane fade" id="education-job" role="tabpanel" aria-labelledby="education-job-tab">
                    <h5 class="mb-4">Certificate</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-graduation-cap fa-lg mb-2"></i>
                                <p><strong>Pendidikan:</strong> Bachelor of Science</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-briefcase fa-lg mb-2"></i>
                                <p><strong>Pekerjaan:</strong> Software Engineer</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Product -->
                <div class="tab-pane fade" id="certification" role="tabpanel" aria-labelledby="certification-tab">
                    <h5 class="mb-4">Data Product</h5>
                    <div class="row">
                        <!-- Card Product -->
                        <div class="col-md-4 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <img src="<?= base_url('img/member1.jpeg') ?>" class="card-img-top img-fluid"
                                    alt="Product Photo">
                                <div class="card-body">
                                    <h5 class="card-title">Product Name</h5>
                                    <p class="card-text">Brief description of the product.</p>
                                    <p><strong>HS Code:</strong> 12345678</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#productModal1">
                                        Lihat Detail
                                    </button>
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
                                                <img src="<?= base_url('img/member1.jpeg') ?>"
                                                    class="img-fluid rounded mb-3" alt="Product Photo">
                                            </div>
                                            <!-- Detail Produk -->
                                            <div class="col-md-6">
                                                <h5 class="mb-4 fw-bold">Informasi Produk</h5>
                                                <div class="mb-3">
                                                    <label for="namaProduk" class="form-label"><strong>Nama
                                                            Produk</strong></label>
                                                    <input type="text" class="form-control" id="namaProduk"
                                                        value="Product Name" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsiProduk" class="form-label"><strong>Deskripsi
                                                            Produk</strong></label>
                                                    <textarea class="form-control" id="deskripsiProduk" rows="3"
                                                        readonly>Full description of the product with additional information.</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="hsCode" class="form-label"><strong>HS
                                                            Code</strong></label>
                                                    <input type="text" class="form-control" id="hsCode" value="12345678"
                                                        readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="minOrderQty" class="form-label"><strong>Min Order
                                                            Quantity</strong></label>
                                                    <input type="number" class="form-control" id="minOrderQty"
                                                        value="100" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kapasitasProduksi" class="form-label"><strong>Kapasitas
                                                            Produksi Bulanan</strong></label>
                                                    <input type="number" class="form-control" id="kapasitasProduksi"
                                                        value="5000" readonly>
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
    <div class="col-lg-12 mt-4">
        <div class="section-title">
            <h4 class="text-uppercase font-weight-bold text-center mb-4">Member Lainnya</h4>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
            <!-- Example of Other Members -->
            <div class="card mx-2 mb-4 shadow-sm" style="width: 18rem; cursor: pointer; transition: transform 0.2s;">
                <img src="<?= base_url('img/member1.jpeg') ?>" class="card-img-top img-fluid" alt="Member Photo">
                <div class="card-body text-center">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">Location: Los Angeles</p>
                    <a href="#" class="btn btn-primary">View Profile</a>
                </div>
            </div>
            <!-- Add more members here -->
        </div>



    </div>
</div>


<?= $this->endSection(); ?>
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
</style>

<div class="container mt-4">
    <!-- Member Details (Full Width) -->
    <div class="col-lg-12">
        <div class="card p-4 shadow-sm">
            <!-- Image at the top -->
            <div class="text-center mb-2">
                <img src="<?= base_url('img/member1.jpeg') ?>" class="img-fluid rounded-circle" alt="John Doe"
                    style="max-height: 350px; width: 250px; object-fit: cover;">
            </div>

            <!-- Member Information -->
            <h2 class="text-center mb-2"><?= strtoupper('John Doe') ?></h2>

            <!-- Badge with Code Referral -->
            <div class="text-center mb-3">
                <span class="badge badge-lg bg-light text-dark p-2" style="font-size: 18px;">Code Referral:
                    satudua</span>
            </div>


            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs justify-content-center gap-3 mt-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active custom-tab" id="personal-info-tab" data-bs-toggle="tab"
                        data-bs-target="#personal-info" type="button" role="tab" aria-controls="personal-info"
                        aria-selected="true">Company Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="education-job-tab" data-bs-toggle="tab"
                        data-bs-target="#education-job" type="button" role="tab" aria-controls="education-job"
                        aria-selected="false">Certificate</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="certification-tab" data-bs-toggle="tab"
                        data-bs-target="#certification" type="button" role="tab" aria-controls="certification"
                        aria-selected="false">Data Product</button>
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
                                <i class="fas fa-building fa-lg mb-2"></i>
                                <p><strong>Nama Perusahaan:</strong> PT. Teyo Gaming 24</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-industry fa-lg mb-2"></i>
                                <p><strong>Business Type:</strong> Eksportir</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-file-alt fa-lg mb-2"></i>
                                <label for="deskripsiPerusahaan" class="form-label"><strong>Deskripsi
                                        Perusahaan:</strong></label>
                                <textarea class="form-control" id="deskripsiPerusahaan" rows="3"
                                    readonly>Elecomp Indonesia merupakan salah satu Perusahaan di bidang Teknologi Informasi (IT) yang ada di Indonesia. Kami sudah berdiri sejak tahun 2014. Bisnis utama kami adalah menyediakan Jasa Pembuatan Website Company Profile Profesional, Aplikasi Mobile (Android & IOS), Toko Online / E-Commerce, Website Sistem Informasi Geografis (WebGIS), Pengembangan Sistem Informasi (Customize), serta Pelatihan dan Pendampingan Digital Marketing.</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-box fa-lg mb-2"></i>
                                <p><strong>Main Product:</strong> Gula</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-calendar-alt fa-lg mb-2"></i>
                                <p><strong>Year of Establishment:</strong> 2024</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-chart-line fa-lg mb-2"></i>
                                <p><strong>Scale of Business:</strong> Small</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-envelope fa-lg mb-2"></i>
                                <p><strong>Email:</strong> saut@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-leaf fa-lg mb-2"></i>
                                <p><strong>Kategori Produk:</strong> Agriculture</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-user-tie fa-lg mb-2"></i>
                                <p><strong>PIC:</strong> TEYOK</p>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Certificate -->
                <div class="tab-pane fade" id="education-job" role="tabpanel" aria-labelledby="education-job-tab">
                    <h5 class="mb-4">Certificate</h5>
                    <div class="row">
                        <!-- Sertifikat Pendidikan -->
                        <div class="col-md-6 mb-3">
                            <div class="card p-3 shadow-sm bg-light">
                                <i class="fas fa-file-pdf fa-lg mb-2"></i>
                                <p><strong>Certificate:</strong>
                                    <span class="certificate-name"
                                        data-filename="<?= base_url('certificate/sertif.pdf') ?>">
                                        Certificate Name
                                    </span>
                                </p>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#certificateModal"
                                    data-filename="<?= base_url('certificate/sertif.pdf') ?>">Lihat</button>
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
                                <h5 class="modal-title" id="certificateModalLabel">Certificate</h5>
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
                    <h5 class="mb-4">Data Product</h5>
                    <div class="row">
                        <!-- Card Product -->
                        <div class="col-md-4 mb-5">
                            <div class="card hover-card mx-4 shadow-sm"
                                style="cursor: pointer; transition: transform 0.2s;">
                                <img src="<?= base_url('img/member3.png') ?>" class="card-img-top img-fluid"
                                    alt="Product Photo" style="height: 220px;">
                                <div class="card-body">
                                    <h5 class="card-title">Product Name</h5>
                                    <p class="card-text text-truncate-description text-justify">Elecomp Indonesia
                                        merupakan salah satu Perusahaan di bidang Teknologi Informasi (IT) yang ada di
                                        Indonesia. Kami sudah berdiri sejak tahun 2014. Bisnis utama kami adalah
                                        menyediakan Jasa Pembuatan Website Company Profile Profesional, Aplikasi Mobile
                                        (Android & IOS), Toko Online / E-Commerce, Website Sistem Informasi Geografis
                                        (WebGIS), Pengembangan Sistem Informasi (Customize), serta Pelatihan dan
                                        Pendampingan Digital Marketing.</p>
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
                                                <img src="<?= base_url('img/member4.png') ?>"
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
                                                        readonly>Elecomp Indonesia merupakan salah satu Perusahaan di bidang Teknologi Informasi (IT) yang ada di Indonesia. Kami sudah berdiri sejak tahun 2014. Bisnis utama kami adalah menyediakan Jasa Pembuatan Website Company Profile Profesional, Aplikasi Mobile (Android & IOS), Toko Online / E-Commerce, Website Sistem Informasi Geografis (WebGIS), Pengembangan Sistem Informasi (Customize), serta Pelatihan dan Pendampingan Digital Marketing.</textarea>
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
    <div class="col-lg-12 mt-5">
        <div class="section-title">
            <h4 class="text-uppercase font-weight-bold text-center mb-4">Member Popular Lainnya</h4>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
            <!-- Example of Other Members -->
            <div class="card hover-card mx-4 mb-5 shadow-sm"
                style="width: 18rem; cursor: pointer; transition: transform 0.2s;">
                <img src="<?= base_url('img/member4.png') ?>" class="card-img-top img-fluid" alt="Member Photo"
                    style="height: 220px;">
                <div class="card-body text-center">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">Los Angeles</p>
                    <a href="#" class="btn btn-primary">Lihat Profil</a>
                </div>
            </div>

            <div class="card hover-card mx-4 mb-5 shadow-sm"
                style="width: 18rem; cursor: pointer; transition: transform 0.2s;">
                <img src="<?= base_url('img/member4.png') ?>" class="card-img-top img-fluid" alt="Member Photo"
                    style="height: 220px;">
                <div class="card-body text-center">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">Los Angeles</p>
                    <a href="#" class="btn btn-primary">Lihat Profil</a>
                </div>
            </div>

            <div class="card hover-card mx-4 mb-5 shadow-sm"
                style="width: 18rem; cursor: pointer; transition: transform 0.2s;">
                <img src="<?= base_url('img/member4.png') ?>" class="card-img-top img-fluid" alt="Member Photo"
                    style="height: 220px;">
                <div class="card-body text-center">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">Los Angeles</p>
                    <a href="#" class="btn btn-primary">Lihat Profil</a>
                </div>
            </div>

            <div class="card hover-card mx-4 mb-5 shadow-sm"
                style="width: 18rem; cursor: pointer; transition: transform 0.2s;">
                <img src="<?= base_url('img/member4.png') ?>" class="card-img-top img-fluid" alt="Member Photo"
                    style="height: 220px;">
                <div class="card-body text-center">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">Los Angeles</p>
                    <a href="#" class="btn btn-primary">Lihat Profil</a>
                </div>
            </div>


        </div>
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
</script>



<?= $this->endSection(); ?>
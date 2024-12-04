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
                        <div class="col-md-12 mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $member['nama_perusahaan'] ?>" placeholder="Masukkan Nama Perusahaan">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deskripsi_perusahaan" class="form-label">Deskripsi Perusahaan</label>
                            <textarea class="form-control" id="deskripsi_perusahaan" name="deskripsi_perusahaan" placeholder="Masukkan Deskripsi Perusahaan"><?= $member['deskripsi_perusahaan'] ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deskripsi_perusahaan_en" class="form-label">Deskripsi Perusahaan (Inggris)</label>
                            <textarea class="form-control" id="deskripsi_perusahaan_en" name="deskripsi_perusahaan_en" placeholder="Masukkan Deskripsi Perusahaan (Inggris)"><?= $member['deskripsi_perusahaan_en'] ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="produk_utama" class="form-label">Produk Utama</label>
                            <textarea class="form-control" id="produk_utama" name="produk_utama" placeholder="Masukkan Produk Utama"><?= $member['produk_utama'] ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="produk_utama_en" class="form-label">Produk Utama (Inggris)</label>
                            <textarea class="form-control" id="produk_utama_en" name="produk_utama_en" placeholder="Masukkan Produk Utama (Inggris)"><?= $member['produk_utama_en'] ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pic" class="form-label">PIC</label>
                            <input type="text" class="form-control" id="pic" name="pic" value="<?= $member['pic'] ?>" placeholder="Masukkan PIC">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pic_phone" class="form-label">No.Telp PIC</label>
                            <input type="text" class="form-control" id="pic_phone" name="pic_phone" value="<?= $member['pic_phone'] ?>" placeholder="Masukkan No.Telp PIC">
                        </div>
                        <button type="submit" class="btn btn-custom" style="background-color: #03AADE;">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>
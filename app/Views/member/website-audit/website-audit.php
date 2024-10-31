<?= $this->extend('member/layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .btn-custom {
        text-align: center;
        color: #ffffff;
    }

    .btn-custom:hover {
        color: #fff;
        transform: scale(1.05);
        box-shadow: 0px 0px 10px #F2BF02;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #F2BF02 !important;
    }

    .icon {
        font-size: 50px;
    }

    .icon-circle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
    }

    .icon-check {
        background-color: #28a745;
        color: #ffffff;
    }

    .icon-times {
        background-color: #dc3545;
        color: #ffffff;
    }

    .audit-result {
        margin-top: 20px;
    }

    .text-custom-title {
        font-weight: 700;
    }

    .note-list {
        padding-left: 0;
        max-width: 680px;
        margin: 0 auto;
    }

    .note-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .note-icon {
        font-size: 20px;
        margin-right: 10px;
        color: #ffc107;
    }

    .note-text {
        color: #6c757d;
        text-align: justify;
    }
</style>

<!-- Judul -->
<div class="container py-5 text-center">
    <h2 class="text-custom-title">Website Audit</h2>
    <p class="text-custom-paragraph mt-2">Ini Merupakan Halaman Website Audit Bagi Member</p>
</div>

<div class="container">
    <!-- Input Link Website -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="<?= base_url('/add-website-audit'); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="link_website" class="form-label">Masukkan Link Website:</label>
                    <div class="input-group">
                        <input type="url" class="form-control" id="link_website" name="link_website"
                            placeholder="https://contoh.com" value="<?= ($webaudit) ? $webaudit['link_website'] : '' ?>" required>
                        <?php if ($webaudit): ?>
                            <span class="input-group-text bg-danger" style="cursor: pointer;">
                                <i class="fas fa-times text-white"></i>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!$webaudit): ?>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-custom" style="background-color: #03AADE;">Submit</button>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>


    <!-- Garis Pemisah -->
    <hr class="my-4 mt-5">

    <?php if (isset($webaudit) && $webaudit['status_verifikasi'] == 'waiting'): ?>
        <!-- Informasi Verifikasi -->
        <div class="text-center">
            <h5 class="text-info">Website Sedang Diverifikasi...</h5>
            <p class="text-muted">Silakan tunggu beberapa saat sambil kami memproses permintaan Anda.</p>
        </div>
    <?php elseif (isset($webaudit) && $webaudit['status_verifikasi'] == 'true'): ?>
        <div class="text-center audit-result">
            <div class="icon-circle icon-check"><i class="icon fas fa-check-circle"></i></div>
            <h5 class="text-success">Website Sudah Sesuai</h5>
            <p class="text-muted">Selamat! Website Anda telah memenuhi semua kriteria yang diperlukan.</p>
        </div>
    <?php elseif (isset($webaudit) && $webaudit['status_verifikasi'] == 'false'): ?>
        <div class="text-center audit-result">
            <div class="icon-circle icon-times"><i class="icon fas fa-times-circle"></i></div>
            <h5 class="text-danger">Website Tidak Sesuai</h5>
            <h6>Catatan:</h6>
            <ul class="note-list list-unstyled">
                <?php if (!empty($webaudit['catatan_fitur'])): ?>
                    <li class="note-item">
                        <i class="fas fa-exclamation-circle note-icon"></i>
                        <span class="note-text">
                            <?= $webaudit['catatan_fitur'] ?>
                        </span>
                    </li>
                <?php endif; ?>
                <?php if (!empty($webaudit['catatan_bahasa'])): ?>
                    <li class="note-item">
                        <i class="fas fa-exclamation-circle note-icon"></i>
                        <span class="note-text">
                            <?= $webaudit['catatan_bahasa'] ?>
                        </span>
                    </li>
                <?php endif; ?>
                <?php if (!empty($webaudit['catatan_seo'])): ?>
                    <li class="note-item">
                        <i class="fas fa-exclamation-circle note-icon"></i>
                        <span class="note-text">
                            <?= $webaudit['catatan_seo'] ?>
                        </span>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    <?php else: ?>
        <!-- Nothing -->
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>
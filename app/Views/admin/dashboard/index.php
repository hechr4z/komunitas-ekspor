<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Dashboard</h1>
        <div class="row g-4 mb-4">
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Member</h4>
                        <div class="stats-figure"><?= $member; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-member') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Buyers</h4>
                        <div class="stats-figure"><?= $buyers; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-buyers') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Produk</h4>
                        <div class="stats-figure"><?= $produk; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-produk') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Sertifikat</h4>
                        <div class="stats-figure"><?= $sertifikat; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-sertifikat') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Belajar Ekspor</h4>
                        <div class="stats-figure"><?= $belajarekspor; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-belajar-ekspor') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Kategori Belajar Ekspor</h4>
                        <div class="stats-figure"><?= $kategoribelajarekspor; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-kategori-belajar-ekspor') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Video Tutorial</h4>
                        <div class="stats-figure"><?= $videotutorial; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-video-tutorial') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Kategori Video</h4>
                        <div class="stats-figure"><?= $kategorivideo; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-kategori-video-tutorial') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Exwork</h4>
                        <div class="stats-figure"><?= $exwork; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-exwork') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">FOB</h4>
                        <div class="stats-figure"><?= $fob; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-fob') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">CFR</h4>
                        <div class="stats-figure"><?= $cfr; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-cfr') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">CIF</h4>
                        <div class="stats-figure"><?= $cif; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-cif') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Satuan</h4>
                        <div class="stats-figure"><?= $satuan; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-satuan') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">MPM</h4>
                        <div class="stats-figure"><?= $mpm; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-mpm') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Website Audit</h4>
                        <div class="stats-figure"><?= $websiteaudit; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-website-audit') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Pengumuman</h4>
                        <div class="stats-figure"><?= $pengumuman; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-pengumuman') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Manfaat Join</h4>
                        <div class="stats-figure"><?= $manfaatjoin; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-manfaat-join') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Slider</h4>
                        <div class="stats-figure"><?= $slider; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-slider') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Web Profile</h4>
                        <div class="stats-figure"><?= $webprofile; ?></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin-web-profile') ?>"></a>
                </div>
            </div>

        </div>
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content') ?>
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
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/member/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Total Provinsi</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/dpd/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Total Kabupaten / Kota</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/dpc/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Pengumuman</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/pengumuman/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Kategori Video</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/kategori_videos/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Video Pembelajaran</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/video_pembelajaran/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Keuntungan</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/keuntungan/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Kontak</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/kontak/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Artikel</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/artikel/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Kategori</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/kategori/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Media Sosial</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/social_media/index') ?>"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Berita</h4>
                        <div class="stats-figure"></div>
                    </div>
                    <a class="app-card-link-mask" href="<?= base_url('admin/berita/index') ?>"></a>
                </div>
            </div>

        </div>
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content') ?>
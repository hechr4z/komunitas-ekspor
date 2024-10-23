<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .card {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .card-img-top {
        padding: 10px;
        object-fit: cover;
        object-position: center;
        border-radius: 20px;
        width: 100%;
        height: 220px;
    }

    .card .btn:hover {
        background-color: #F2BF02 !important;
        color: #fff;
        border: none;
    }

    .card:hover {
        box-shadow: 0px 0px 25px #03AADE !important;
        transform: translateY(-5px) !important;
    }
</style>

<!-- Section Member -->
<section class="member-section">
    <!-- judul -->
    <div class="py-5" style="text-align: center;">
        <h2 class="text-custom-title">  <?php echo lang('Blog.dataMemberTitle') ?></h2>
        <p class="text-custom-paragraph mt-2">  <?php echo lang('Blog.dataMemberSubtitle') ?></p>
    </div>
    <div class="container">
        <?php if (empty($member)): ?>
            <div class="col-12 mb-5">
                <div class="alert alert-info text-center" role="alert">
                    Masih belum ada Data Member.
                </div>
            </div>
        <?php else: ?>
            <div class="row mt-3">
                <!-- Card -->
                <?php foreach ($member as $item): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <a href="<?= base_url($lang . '/detail-member/' . $item['slug']); ?>" style="text-decoration: none;">
                            <div class="card h-100 shadow-sm" style="cursor: pointer; border-radius: 12px;">
                                <img src="<?= base_url('img/' . $item['foto_profil']); ?>" class="card-img-top"
                                    alt="Sample Member 1">
                                <div class=" card-body d-flex flex-column">
                                    <h6 class="card-title text-center"
                                        style="margin-bottom: 12px; font-weight: bold; word-wrap: break-word; white-space: normal;">
                                        <?= $item['username'] ?>
                                    </h6>
                                    <p class="card-text text-center text-muted"
                                        style="flex-grow: 1; word-wrap: break-word; white-space: normal; font-size: 0.9rem;">
                                        <?= $item['nama_perusahaan'] ?>
                                    </p>
                                    <span class="btn btn-primary mt-auto">  <?php echo lang('Blog.btndataMember') ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-2">
                <?= $pager->links('default', 'bootstrap_pagination') ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection(); ?>
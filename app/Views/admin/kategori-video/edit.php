<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Kategori Video Tutorial</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('/admin-kategori-video-tutorial-update/' . $kategori_video['id_kategori_video']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label class="form-label">Kategori Video</label>
                                <input type="text" class="form-control" name="kategori_video" value="<?= esc($kategori_video['nama_kategori_video']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori Video</label>
                                <input type="text" class="form-control" name="slug" value="<?= esc($kategori_video['slug']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-kategori-video-tutorial') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection(); ?>
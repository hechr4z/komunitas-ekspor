<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Slider</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('/admin-update-slider/' . $slider['id_slider']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label class="form-label">Judul Slider</label>
                                <input type="text" class="form-control" name="judul_slider" value="<?= esc($slider['judul_slider']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gambar Slider</label>
                                <input type="file" class="form-control" name="img_slider">
                                <img src="<?= base_url('/img/' . $slider['img_slider']) ?>" alt="<?= esc($slider['judul_slider']); ?>" class="img-thumbnail mt-2" style="max-width: 100px;">
                                <input type="hidden" name="old_thumbnail" value="#">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Slider</label>
                                <textarea class="form-control" id="deskripsi_video" name="deskripsi_slider"><?= esc($slider['deskripsi_slider']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-video-tutorial') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi_video'))
        .catch(error => {
            console.error(error);
        });
</script>

<?= $this->endSection(); ?>
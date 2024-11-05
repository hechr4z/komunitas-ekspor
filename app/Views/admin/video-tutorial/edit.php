<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Video Tutorial</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('#') ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Judul Video</label>
                                <input type="text" class="form-control" name="judul_video" value="#" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori Video</label>
                                <select class="form-select" name="id_katvideo" required>
                                    <option value="#"></option>
                                    <option value="Tutorial"></option>
                                    <option value="Z"></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">URL Video</label>
                                <input type="url" class="form-control" name="video_url" value="#" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail">
                                <img src="<?= base_url('img/acumalaka.png') ?>" alt="Thumbnail" class="img-thumbnail mt-2" style="max-width: 100px;">
                                <input type="hidden" name="old_thumbnail" value="#">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Video</label>
                                <textarea class="form-control" id="deskripsi_video" name="deskripsi_video">#</textarea>
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
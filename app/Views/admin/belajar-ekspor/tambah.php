<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Materi</h1>
        <hr class="mb-4">

        <!-- Menampilkan pesan sukses -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Menampilkan pesan error -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin/artikel/store') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label class="form-label">Judul In</label>
                                <input type="text" class="form-control" name="judul_artikel_in" value="<?= old('judul_artikel_in') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul En</label>
                                <input type="text" class="form-control" name="judul_artikel_en" value="<?= old('judul_artikel_en') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Artikel</label>
                                <input type="file" class="form-control" name="foto_artikel" accept="image/*" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori In</label>
                                <select class="form-control" name="kategori_in" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value=#></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori En</label>
                                <select class="form-control" name="kategori_en" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value=#></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi In</label>
                                <textarea class="form-control tiny" id="deskripsi_artikel_in" name="deskripsi_artikel_in" row="5"><?= old('deskripsi_artikel_in') ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi En</label>
                                <textarea class="form-control tiny" id="deskripsi_artikel_en" name="deskripsi_artikel_en" row="5"><?= old('deskripsi_artikel_en') ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug In</label>
                                <input type="text" class="form-control" name="slug_in" value="<?= old('slug_in') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug En</label>
                                <input type="text" class="form-control" name="slug_en" value="<?= old('slug_en') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Title In</label>
                                <input type="text" class="form-control" name="meta_title_in" value="<?= old('meta_title_in') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Title En</label>
                                <input type="text" class="form-control" name="meta_title_en" value="<?= old('meta_title_en') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Description In</label>
                                <input type="text" class="form-control" name="meta_description_in" value="<?= old('meta_description_in') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Description En</label>
                                <input type="text" class="form-control" name="meta_description_en" value="<?= old('meta_description_en') ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin-belajar-ekspor') ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->
</div><!--//app-content-->

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi_artikel_in'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#deskripsi_artikel_en'))
        .catch(error => {
            console.error(error);
        });
</script>

<?= $this->endSection('content'); ?>
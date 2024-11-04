<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Artikel</h1>
        <hr class="mb-4">

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('/admin-belajar-ekspor-ubah/' . $belajar_ekspor['id_belajar_ekspor']); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label for="belajar-ekspor_in" class="form-label">Judul Artikel In</label>
                                <input type="text" class="form-control" id="belajar-ekspor_in" name="belajar-ekspor_in" value="<?= esc($belajar_ekspor['judul_belajar_ekspor']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="belajar-ekspor_en" class="form-label">Judul Artikel En</label>
                                <input type="text" class="form-control" id="belajar-ekspor_en" name="belajar-ekspor_en" value="<?= esc($belajar_ekspor['judul_belajar_ekspor_en']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="foto_artikel" class="form-label">Foto Artikel</label>
                                <input type="file" class="form-control" id="foto_artikel" name="foto_artikel" accept="image/*" onchange="previewImage(event)">
                                <div class="mt-2">
                                    <?php if (!empty($belajar_ekspor['foto_belajar_ekspor'])) : ?>
                                        <img id="preview" src="<?= base_url('/img/' . $belajar_ekspor['foto_belajar_ekspor']); ?>" class="img-fluid" alt="Foto Artikel" style="max-width: 200px;">
                                    <?php else : ?>
                                        <p>Belum ada foto yang diunggah.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="id_kategori_in" class="form-label">Kategori In</label>
                                <select class="form-control" id="id_kategori_in" name="id_kategori_in" required>
                                    <option value="" disabled>Pilih Kategori</option>
                                    <?php foreach ($kategori_belajar_ekspor as $kategori): ?>
                                        <option value="<?= $kategori['id_kategori_belajar_ekspor'] ?>" <?= ($kategori['id_kategori_belajar_ekspor'] == $belajar_ekspor['id_kategori_belajar_ekspor']) ? 'selected' : '' ?>>
                                            <?= esc($kategori['nama_kategori']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_kategori_en" class="form-label">Kategori En</label>
                                <select class="form-control" id="id_kategori_en" name="id_kategori_en" required>
                                    <option value="" disabled>Pilih Kategori</option>
                                    <?php foreach ($kategori_belajar_ekspor as $kategori): ?>
                                        <option value="<?= $kategori['id_kategori_belajar_ekspor'] ?>" <?= ($kategori['id_kategori_belajar_ekspor'] == $belajar_ekspor['id_kategori_belajar_ekspor']) ? 'selected' : '' ?>>
                                            <?= esc($kategori['nama_kategori_en']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_artikel_in" class="form-label">Deskripsi In</label>
                                <textarea class="form-control tiny" id="deskripsi_artikel_in" name="deskripsi_artikel_in" rows="4" required><?= esc($belajar_ekspor['deskripsi_belajar_ekspor']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_artikel_en" class="form-label">Deskripsi En</label>
                                <textarea class="form-control tiny" id="deskripsi_artikel_en" name="deskripsi_artikel_en" rows="4" required><?= esc($belajar_ekspor['deskripsi_belajar_ekspor_en']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="slug_in" class="form-label">Slug In</label>
                                <input type="text" class="form-control" id="slug_in" name="slug_in" value="<?= esc($belajar_ekspor['slug']); ?>" placeholder="Pisahkan dengan koma" required>
                            </div>

                            <div class="mb-3">
                                <label for="slug_en" class="form-label">Slug En</label>
                                <input type="text" class="form-control" id="slug_en" name="slug_en" value="<?= esc($belajar_ekspor['slug_en']); ?>" placeholder="Pisahkan dengan koma" required>
                            </div>

                            <div class="mb-3">
                                <label for="meta_title_in" class="form-label">Meta Title In</label>
                                <input type="text" class="form-control" id="meta_title_in" name="meta_title_in" value="<?= esc($belajar_ekspor['meta_title']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="meta_title_en" class="form-label">Meta Title En</label>
                                <input type="text" class="form-control" id="meta_title_en" name="meta_title_en" value="<?= esc($belajar_ekspor['meta_title_en']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="meta_description_in" class="form-label">Meta Description In</label>
                                <input type="text" class="form-control" id="meta_description_in" name="meta_description_in" value="<?= esc($belajar_ekspor['meta_deskripsi']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="meta_description_en" class="form-label">Meta Description En</label>
                                <input type="text" class="form-control" id="meta_description_en" name="meta_description_en" value="<?= esc($belajar_ekspor['meta_deskripsi_en']); ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="<?= base_url('admin-belajar-ekspor') ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-xl-->
</div><!--//app-content-->

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('preview');
            preview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
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

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?= $this->endSection('content') ?>
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
                        <form action="<?= base_url('/admin-belajar-ekspor-update/' . $belajar_ekspor['id_belajar_ekspor']); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label for="belajar-ekspor_in" class="form-label">Judul Materi Indonesia</label>
                                <input type="text" class="form-control" id="belajar-ekspor_in" name="judul_belajar_ekspor" value="<?= esc($belajar_ekspor['judul_belajar_ekspor']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="belajar-ekspor_in" class="form-label">Judul Materi English</label>
                                <input type="text" class="form-control" id="belajar-ekspor_in" name="judul_belajar_ekspor_en" value="<?= esc($belajar_ekspor['judul_belajar_ekspor_en']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="foto_artikel" class="form-label">Foto Materi</label>
                                <input type="file" class="form-control" id="foto_artikel" name="foto_belajar_ekspor" accept="image/*" onchange="previewImage(event)">
                                <div class="mt-2">
                                    <?php if (!empty($belajar_ekspor['foto_belajar_ekspor'])) : ?>
                                        <img id="preview" src="<?= base_url('/img/' . $belajar_ekspor['foto_belajar_ekspor']); ?>" class="img-fluid" alt="Foto Artikel" style="max-width: 200px;">
                                    <?php else : ?>
                                        <p>Belum ada foto yang diunggah.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="id_kategori_in" class="form-label">Kategori</label>
                                <select class="form-control" id="id_kategori_in" name="id_kategori" required>
                                    <option value="" disabled>Pilih Kategori</option>
                                    <?php foreach ($kategori_belajar_ekspor as $kategori): ?>
                                        <option value="<?= $kategori['id_kategori_belajar_ekspor'] ?>" <?= ($kategori['id_kategori_belajar_ekspor'] == $belajar_ekspor['id_kategori_belajar_ekspor']) ? 'selected' : '' ?>>
                                            <?= esc($kategori['nama_kategori']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_artikel_in" class="form-label">Deskripsi Indonesia</label>
                                <textarea class="form-control tiny" id="deskripsi_artikel_in" name="deskripsi_belajar_ekspor" rows="4" required><?= esc($belajar_ekspor['deskripsi_belajar_ekspor']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_artikel_in" class="form-label">Deskripsi English</label>
                                <textarea class="form-control tiny" id="deskripsi_artikel_en" name="deskripsi_belajar_ekspor_en" rows="4" required><?= esc($belajar_ekspor['deskripsi_belajar_ekspor_en']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="slug_in" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug_in" name="slug" value="<?= esc($belajar_ekspor['slug']); ?>" placeholder="Pisahkan dengan koma" required>
                            </div>

                            <div class="mb-3">
                                <label for="meta_title_in" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title_in" name="meta_title" value="<?= esc($belajar_ekspor['meta_title']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="meta_description_in" class="form-label">Meta Description</label>
                                <input type="text" class="form-control" id="meta_description_in" name="meta_deskripsi" value="<?= esc($belajar_ekspor['meta_deskripsi']); ?>" required>
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
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi_artikel_en'))
        .catch(error => {
            console.error(error);
        });
</script>

<?= $this->endSection('content') ?>
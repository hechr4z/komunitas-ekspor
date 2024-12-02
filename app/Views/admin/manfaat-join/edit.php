<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Manfaat</h1>
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
                        <form action="<?= base_url('/admin-manfaat-join-update/' . $manfaatjoin['id_manfaatjoin']); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label for="belajar-ekspor_in" class="form-label">Judul Manfaat</label>
                                <input type="text" class="form-control" id="belajar-ekspor_in" name="judul_manfaat" value="<?= esc($manfaatjoin['judul_manfaat']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="foto_artikel" class="form-label">Icon Manfaat</label>
                                <input type="file" class="form-control" id="foto_artikel" name="gambar" accept="image/*" onchange="previewImage(event)">
                                <div class="mt-2">
                                    <?php if (!empty($belajar_ekspor['foto_belajar_ekspor'])) : ?>
                                        <img id="preview" src="<?= base_url('/img/' . $manfaatjoin['gambar']); ?>" class="img-fluid" alt="<?= esc($manfaatjoin['judul_manfaat']); ?>" style="max-width: 200px;">
                                    <?php else : ?>
                                        <p>Belum ada foto yang diunggah.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_artikel_in" class="form-label">Deskripsi</label>
                                <textarea class="form-control tiny" id="deskripsi_artikel_in" name="deskripsi_manfaat" rows="4" required><?= esc($manfaatjoin['deskripsi_manfaat']); ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="<?= base_url('/admin-manfaat-join') ?>" class="btn btn-secondary">Kembali</a>
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


<?= $this->endSection('content') ?>
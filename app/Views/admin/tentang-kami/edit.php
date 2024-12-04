<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Edit Tentang Komunitas Ekspor Indonesia</h1>
        <hr class=" mb-4">

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
                        <form action="<?= base_url('/admin-update-tentang-kami/' . $tentang_kami['id']); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label for="foto_artikel" class="form-label">Gambar Perusahaan</label>
                                <input type="file" class="form-control" id="foto_artikel" name="gambar_perusahaan" accept="image/*" onchange="previewImage(event)">
                                <div class="mt-2">
                                    <?php if (!empty($tentang_kami['gambar_perusahaan'])) : ?>
                                        <img id="preview" src="<?= base_url('/img/' . $tentang_kami['gambar_perusahaan']); ?>" class="img-fluid" alt="gambar perusahaan" style="max-width: 200px;">
                                    <?php else : ?>
                                        <p>Belum ada foto yang diunggah.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_perusahaan" class="form-label">Deskripsi Indonesia</label>
                                <textarea class="form-control" id="deskripsi_artikel_in" name="deskripsi_perusahaan" rows="4" required><?= esc($tentang_kami['deskripsi_perusahaan']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_perusahaan" class="form-label">Deskripsi English</label>
                                <textarea class="form-control" id="deskripsi_artikel_en" name="deskripsi_perusahaan_en" rows="4" required><?= esc($tentang_kami['deskripsi_perusahaan_en']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug Indonesia</label>
                                <input type="text" class="form-control" name="slug" placeholder="ex. cara-ekspor-barang" value="<?= esc($tentang_kami['slug']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug English</label>
                                <input type="text" class="form-control" name="slug_en" placeholder="ex. cara-ekspor-barang" value="<?= esc($tentang_kami['slug_en']); ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="<?= base_url('/admin-tentang-kami') ?>" class="btn btn-secondary">Kembali</a>
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
            // Menampilkan preview gambar yang diupload
            const preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.style.display = 'block'; // Menampilkan gambar preview
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<script>
    // Ensure the editor is initialized after the DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#deskripsi_artikel_in'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
<script>
    // Ensure the editor is initialized after the DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#deskripsi_artikel_en'))
            .catch(error => {
                console.error(error);
            });
    });
</script>


<?= $this->endSection('content') ?>
<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Pengumuman</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('/admin-update-pengumuman/' . $pengumuman['id_pengumuman']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label class="form-label">Judul Pengumuman</label>
                                <input type="text" class="form-control" name="judul_pengumuman" value="<?= esc($pengumuman['judul_pengumuman']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Poster Pengumuman</label>
                                <input type="file" class="form-control" name="poster_pengumuman">

                                <!-- Menampilkan gambar lama -->
                                <?php if (!empty($pengumuman['poster_pengumuman']) && file_exists(FCPATH . 'img/' . $pengumuman['poster_pengumuman'])): ?>
                                    <img src="<?= base_url('/img/' . $pengumuman['poster_pengumuman']) ?>" alt="<?= esc($pengumuman['judul_pengumuman']); ?>" class="img-thumbnail mt-2" style="max-width: 100px;">
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Pengumuman</label>
                                <textarea class="form-control" id="deskripsi_video" name="deskripsi_pengumuman"><?= esc($pengumuman['deskripsi_pengumuman']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="ex. cara-ekspor-barang" value="<?= esc($pengumuman['slug']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('/admin-pengumuman') ?>" class="btn btn-secondary">Kembali</a>
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
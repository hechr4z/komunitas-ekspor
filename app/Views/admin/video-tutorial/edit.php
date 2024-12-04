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
                        <form action="<?= base_url('/admin-video-tutorial-update/' . $video_tutorial['id_video']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label class="form-label">Judul Video Indonesia</label>
                                <input type="text" class="form-control" name="judul_video" value="<?= esc($video_tutorial['judul_video']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul Video English</label>
                                <input type="text" class="form-control" name="judul_video_en" value="<?= esc($video_tutorial['judul_video_en']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori Video</label>
                                <select class="form-select" name="id_kategori" required>
                                    <option value="" disabled>Pilih Kategori</option>
                                    <?php foreach ($kategori_video as $item): ?>
                                        <option value="<?= $item['id_kategori_video']; ?>">
                                            <?= $item['nama_kategori_video']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">URL Video</label>
                                <input type="text" class="form-control" name="video_url" value="<?= esc($video_tutorial['video_url']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail">
                                <img src="<?= base_url('/img/' . $video_tutorial['thumbnail']) ?>" alt="<?= esc($video_tutorial['judul_video']); ?>" class="img-thumbnail mt-2" style="max-width: 100px;">
                                <input type="hidden" name="old_thumbnail" value="#">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Video Indonesia</label>
                                <textarea class="form-control" id="deskripsi_video" name="deskripsi_video"><?= esc($video_tutorial['deskripsi_video']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Video English</label>
                                <textarea class="form-control" id="deskripsi_video_en" name="deskripsi_video_en"><?= esc($video_tutorial['deskripsi_video_en']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug Indonesia</label>
                                <input type="text" class="form-control" name="slug" placeholder="ex. cara-ekspor-barang" value="<?= esc($video_tutorial['slug']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug English</label>
                                <input type="text" class="form-control" name="slug_en" placeholder="ex. cara-ekspor-barang" value="<?= esc($video_tutorial['slug_en']); ?>" required>
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
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi_video_en'))
        .catch(error => {
            console.error(error);
        });
</script>
<?= $this->endSection(); ?>
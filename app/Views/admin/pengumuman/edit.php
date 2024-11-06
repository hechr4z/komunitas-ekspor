<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Kategori Belajar Ekspor</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            
            <!-- Input Nomor (Readonly) -->
            <div class="mb-3">
                <label class="form-label">No</label>
                <input type="text" class="form-control" name="no" value="1" readonly>
            </div>

            <!-- Input Poster Pengumuman -->
            <div class="mb-3">
                <label class="form-label">Poster Pengumuman</label>
                <input type="file" class="form-control" name="poster_pengumuman" accept="image/*" required>
            </div>
            
            <!-- Input Deskripsi Pengumuman -->
            <div class="mb-3">
                <label class="form-label">Deskripsi Pengumuman</label>
                <textarea class="form-control" name="deskripsi_pengumuman" rows="4" required>Deskripsi singkat pengumuman</textarea>
            </div>
            
            <!-- Input Slug -->
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" value="slug-pengumuman" required>
            </div>
            
            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>
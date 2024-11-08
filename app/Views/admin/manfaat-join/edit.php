<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Manfaat Join</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- CSRF Field (untuk keamanan) -->
            <?= csrf_field(); ?>
            
            <!-- Input Nomor (Readonly) -->
            <div class="mb-3">
                <label class="form-label">No</label>
                <input type="text" class="form-control" id="no" name="no" value="1" readonly>
            </div>

            <!-- Input Path d (Poster Pengumuman) -->
            <div class="mb-3">
                <label class="form-label">Path d</label>
                <input type="file" class="form-control" name="path_d" accept="image/*">
                <div class="mt-3">
                    <img id="preview" src="img/be3.jpg" alt="Pratinjau Poster" style="max-width: 100%; height: auto; border: 1px solid #ddd; border-radius: 5px; padding: 5px;">
                </div>
            </div>
            
            <!-- Input Judul Manfaat -->
            <div class="mb-3">
                <label class="form-label">Judul Manfaat</label>
                <input type="text" class="form-control" id="judul_manfaat" name="judul_manfaat" value="Peluang Bisnis" required>
            </div>
            
            <!-- Input Judul Manfaat En -->
            <div class="mb-3">
                <label class="form-label">Judul Manfaat En</label>
                <input type="text" class="form-control" id="judul_manfaat_en" name="judul_manfaat_en" value="Business Opportunities" required>
            </div>
            
            <!-- Input Deskripsi Manfaat -->
            <div class="mb-3">
                <label class="form-label">Deskripsi Manfaat</label>
                <textarea class="form-control" id="deskripsi_manfaat" name="deskripsi_manfaat" required>Akses Jaringan Bisnis</textarea>
            </div>

            <!-- Input Deskripsi Manfaat En -->
            <div class="mb-3">
                <label class="form-label">Deskripsi Manfaat En</label>
                <textarea class="form-control" id="deskripsi_manfaat_en" name="deskripsi_manfaat_en" required>Access to Business Networks. International Collaboration Opportunities</textarea>
            </div>
            
            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection('content'); ?>

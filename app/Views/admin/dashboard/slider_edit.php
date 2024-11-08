<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Manfaat Join</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            
            <!-- Input Nomor (Readonly) -->
            <div class="mb-3">
                <label class="form-label">No</label>
                <input type="text" class="form-control" name="no" value="1" readonly>
            </div>

            <!-- Input Img Slider (Path d) -->
            <div class="mb-3">
                <label class="form-label">Img Slider</label>
                <input type="file" class="form-control" name="path_d" accept="image/*">
                <div class="mt-3">
                    <img id="preview" src="img/be3.jpg" alt="Pratinjau Poster" style="max-width: 100%; height: auto; border: 1px solid #ddd; border-radius: 5px; padding: 5px;">
                </div>
            </div>
            
            <!-- Input Judul Slider En -->
            <div class="mb-3">
                <label class="form-label">Judul Slider En</label>
                <input type="text" class="form-control" name="judul_slider_en" value="Business Opportunities" required>
            </div>
            
            <!-- Input Deskripsi Slider -->
            <div class="mb-3">
                <label class="form-label">Deskripsi Slider</label>
                <textarea class="form-control" name="deskripsi_slider" required>Akses Jaringan Bisnis</textarea>
            </div>

            <!-- Input Deskripsi Slider En -->
            <div class="mb-3">
                <label class="form-label">Deskripsi Slider En</label>
                <textarea class="form-control" name="deskripsi_slider_en" required>Access to Business Networks.<br>International Collaboration Opportunities</textarea>
            </div>
            
            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection('content'); ?>

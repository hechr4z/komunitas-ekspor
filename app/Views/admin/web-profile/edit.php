<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<style>
    .custom-thumbnail {
        background-color: #03AADE;
        border: none;
        /* Optional: Remove border if desired */
    }
</style>

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

            <!-- Input Nama Web -->
            <div class="mb-3">
                <label class="form-label">Nama Web</label>
                <input type="text" class="form-control" name="nama_web" value="My Website" required>
            </div>

            <!-- Input Nama Web En -->
            <div class="mb-3">
                <label class="form-label">Nama Web En</label>
                <input type="text" class="form-control" name="nama_web_en" value="My Website EN" required>
            </div>

            <!-- Input Deskripsi Web -->
            <div class="mb-3">
                <label class="form-label">Deskripsi Web</label>
                <textarea class="form-control" name="deskripsi_web" required>Deskripsi singkat tentang website dalam bahasa Indonesia.</textarea>
            </div>

            <!-- Input Deskripsi Web En -->
            <div class="mb-3">
                <label class="form-label">Deskripsi Web En</label>
                <textarea class="form-control" name="deskripsi_web_en" required>Short description about the website in English.</textarea>
            </div>

            <!-- Input Logo Web (Path d) -->
            <div class="mb-3">
                <label class="form-label">Logo Web</label>
                <input type="file" class="form-control" name="logo_web" accept="image/*">
                <div class="mt-3">
                    <img id="preview" src="<?= base_url('img/logokei.png') ?>" alt="Logo Web" class="img-thumbnail custom-thumbnail">
                </div>
            </div>

            <!-- Input Lokasi Web -->
            <div class="mb-3">
                <label class="form-label">Lokasi Web</label>
                <input type="text" class="form-control" name="lokasi_web" value="Jl. Contoh No. 123, Jakarta" required>
            </div>

            <!-- Input Email Web -->
            <div class="mb-3">
                <label class="form-label">Email Web</label>
                <input type="email" class="form-control" name="email_web" value="info@mywebsite.com" required>
            </div>

            <!-- Input Link Instagram Web -->
            <div class="mb-3">
                <label class="form-label">Link IG Web</label>
                <input type="url" class="form-control" name="link_ig_web" value="https://instagram.com/mywebsite" required>
            </div>

            <!-- Input Link YouTube Web -->
            <div class="mb-3">
                <label class="form-label">Link YT Web</label>
                <input type="url" class="form-control" name="link_yt_web" value="https://youtube.com/mywebsite" required>
            </div>

            <!-- Input Link Facebook Web -->
            <div class="mb-3">
                <label class="form-label">Link FB Web</label>
                <input type="url" class="form-control" name="link_fb_web" value="https://facebook.com/mywebsite" required>
            </div>

            <!-- Input Footer Text -->
            <div class="mb-3">
                <label class="form-label">Footer Text</label>
                <textarea class="form-control" name="footer_text" required>All rights reserved © My Website</textarea>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection('content'); ?>
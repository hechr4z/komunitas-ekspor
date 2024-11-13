<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambah Manfaat Join</h1> <!-- Mengubah judul halaman menjadi sesuai dengan halaman index -->

        <hr class="mb-4">

        <!-- Menampilkan pesan sukses -->
        <div class="alert alert-success" style="display: none;">
            Pesan sukses akan ditampilkan di sini.
        </div>

        <!-- Menampilkan pesan error -->
        <div class="alert alert-danger" style="display: none;">
            Pesan error akan ditampilkan di sini.
        </div>

        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Path D</label>
                                <input type="file" class="form-control" name="poster_manfaat" accept="image/*">
                                <div class="mt-3">
                                    <!-- Menampilkan gambar yang sudah ada -->
                                    <img id="preview" src="img/be3.jpg" alt="Pratinjau Poster" style="max-width: 100%; height: auto; border: 1px solid #ddd; border-radius: 5px; padding: 5px;">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul Manfaat</label>
                                <input type="text" class="form-control" name="judul_manfaat" value="Peluang Bisnis" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul Manfaat (EN)</label>
                                <input type="text" class="form-control" name="judul_manfaat_en" value="Business Opportunities" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Manfaat</label>
                                <textarea class="form-control" name="deskripsi_manfaat" rows="4" required>Akses Jaringan Bisnis</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Manfaat (EN)</label>
                                <textarea class="form-control" name="deskripsi_manfaat_en" rows="4" required>Access to Business Networks. International Collaboration Opportunities</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="add.php" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->
</div><!--//app-content-->

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?= $this->endSection(); ?>

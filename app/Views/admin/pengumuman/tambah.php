<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambahkan Materi</h1>
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
                                <label class="form-label">Judul In</label>
                                <input type="text" class="form-control" name="judul_artikel_in" value="" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul Pengumuman</label>
                                <input type="text" class="form-control" name="Judul_Pengumuman" value="" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Poster Pengumuman</label>
                                <input type="file" class="form-control" name="Poster_Pengumuman" accept="image/*" required>
                                <div class="mt-3">
                                    <img id="preview" src="#" alt="Pratinjau Poster" style="display: none; max-width: 100%; height: auto; border: 1px solid #ddd; border-radius: 5px; padding: 5px;">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Pengumuman</label>
                                <textarea class="form-control" name="deskripsi_pengumuman" rows="4" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="type" class="form-control" name="Slug" accept="image/*" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="#" class="btn btn-secondary">Kembali</a>
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

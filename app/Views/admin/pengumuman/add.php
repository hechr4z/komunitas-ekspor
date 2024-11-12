<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Tambahkan Pengumuman</h1>
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
                        <form action="<?= base_url('/admin-add-pengumuman-create') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label class="form-label">Judul Pengumuman</label>
                                <input type="text" class="form-control" name="judul_pengumuman" placeholder="Masukkan Judul Pengumuman" required>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Poster Pengumuman</label>
                                <input type="file" class="form-control" name="poster_pengumuman" accept="image/*" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control tiny" id="deskripsi_pengumuman" name="deskripsi_pengumuman" row="5" placeholder="Masukkan Deskripsi Video"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="ex. jadwal-pengumuman-ekspor" required>
                            </div>

                            <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                            <a href="<?= base_url('/admin-pengumuman') ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->
</div><!--//app-content-->

<script>
    // Preview Image function
    document.getElementById("preview").addEventListener("change", function(e) {
        const reader = new FileReader();
        reader.onload = function(event) {
            const image = document.getElementById("image-preview");
            image.src = event.target.result;
            image.style.display = "block";
        };
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi_pengumuman'))
        .catch(error => {
            console.error(error);
        });
</script>

<?= $this->endSection(); ?>
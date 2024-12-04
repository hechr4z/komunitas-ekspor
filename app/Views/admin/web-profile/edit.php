<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Web Profile</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('/admin-update-webprofile/' . esc($webprofile['id_webprofile'])); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label for="nama_web" class="form-label">Judul Web Profile Indonesia</label>
                                <input type="text" class="form-control" id="nama_web" name="nama_web" value="<?= esc($webprofile['nama_web']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_web" class="form-label">Judul Web Profile English</label>
                                <input type="text" class="form-control" id="nama_web" name="nama_web_en" value="<?= esc($webprofile['nama_web_en']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="logo_web" class="form-label">Logo Web Profile</label>
                                <input type="file" class="form-control" id="logo_web" name="logo_web" accept="image/*">

                                <!-- Gambar Preview -->
                                <img id="image-preview"
                                    src="<?= !empty($webprofile['logo_web']) && file_exists(FCPATH . 'img/' . $webprofile['logo_web'])
                                                ? base_url('/img/' . esc($webprofile['logo_web'])) : ''; ?>" alt="Preview Gambar" class="img-thumbnail mt-2"
                                    style="max-width: 200px; <?= empty($webprofile['logo_web']) ? 'display: none;' : ''; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_webprofile" class="form-label">Deskripsi Web Profile Indonesia</label>
                                <textarea class="form-control" id="deskripsi_webprofile" name="deskripsi_webprofile"><?= esc($webprofile['deskripsi_web']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_webprofile" class="form-label">Deskripsi Web Profile English</label>
                                <textarea class="form-control" id="deskripsi_webprofile_en" name="deskripsi_webprofile_en"><?= esc($webprofile['deskripsi_web_en']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="lokasi_web" class="form-label">Lokasi Web</label>
                                <input type="text" class="form-control" id="lokasi_web" name="lokasi_web" value="<?= esc($webprofile['lokasi_web']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="email_web" class="form-label">Email Web</label>
                                <input type="email" class="form-control" id="email_web" name="email_web" value="<?= esc($webprofile['email_web']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="link_ig_web" class="form-label">Link IG Web</label>
                                <input type="url" class="form-control" id="link_ig_web" name="link_ig_web" value="<?= esc($webprofile['link_ig_web']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="link_yt_web" class="form-label">Link YouTube Web</label>
                                <input type="url" class="form-control" id="link_yt_web" name="link_yt_web" value="<?= esc($webprofile['link_yt_web']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="link_fb_web" class="form-label">Link Facebook Web</label>
                                <input type="url" class="form-control" id="link_fb_web" name="link_fb_web" value="<?= esc($webprofile['link_fb_web']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="footer_text" class="form-label">Footer Text</label>
                                <textarea class="form-control" id="footer_text" name="footer_text" required><?= esc($webprofile['footer_text']); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('/admin-webprofile'); ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-xl-->
</div><!--//app-content-->

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // Fungsi Preview Gambar
    document.getElementById('logo_web').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.getElementById('image-preview');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    // CKEditor
    ClassicEditor
        .create(document.querySelector('#deskripsi_webprofile'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    // Ensure the editor is initialized after the DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#footer_text'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
<script>
    // CKEditor
    ClassicEditor
        .create(document.querySelector('#deskripsi_webprofile_en'))
        .catch(error => {
            console.error(error);
        });
</script>

<?= $this->endSection(); ?>
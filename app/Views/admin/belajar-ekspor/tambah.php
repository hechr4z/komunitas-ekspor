<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Tambahkan Materi</h1>
        <hr class="mb-4">

        <!-- Menampilkan pesan sukses -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Menampilkan pesan error -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('/admin-belajar-ekspor-create') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label class="form-label">Judul Materi Indonesia</label>
                                <input type="text" class="form-control" name="judul_belajar_ekspor" placeholder="Masukkan Judul Materi" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul Materi English</label>
                                <input type="text" class="form-control" name="judul_belajar_ekspor_en" placeholder="Masukkan Judul Materi" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Materi</label>
                                <input type="file" class="form-control" name="foto_belajar_ekspor" accept="image/*" required>
                            </div>

                            <div class="mb-3">
                                <label for="id_kategori_in" class="form-label">Kategori</label>
                                <select class="form-control" id="id_kategori_in" name="id_kategori" required>
                                    <option value="" disabled>Pilih Kategori</option>
                                    <?php foreach ($nama_kategori as $kategori): ?>
                                        <option value="<?= $kategori['id_kategori_belajar_ekspor'] ?>">
                                            <?= esc($kategori['nama_kategori']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Indonesia</label>
                                <textarea class="form-control tiny" id="deskripsi_artikel" name="deskripsi_belajar_ekspor" row="5" placeholder="Masukkan Deskripsi Materi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi English</label>
                                <textarea class="form-control tiny" id="deskripsi_artikel_en" name="deskripsi_belajar_ekspor_en" row="5" placeholder="Masukkan Deskripsi Materi"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug Indonesia</label>
                                <input type="text" class="form-control" name="slug" placeholder="ex. cara-ekspor-barang" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug English</label>
                                <input type="text" class="form-control" name="slug_en" placeholder="ex. cara-ekspor-barang" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Title Indonesia</label>
                                <input type="text" class="form-control" name="meta_title" placeholder="Masukkan Meta Title Materi" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Title English</label>
                                <input type="text" class="form-control" name="meta_title_en" placeholder="Masukkan Meta Title Materi" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Deskripsi Indonesia</label>
                                <input type="text" class="form-control" name="meta_deskripsi" placeholder="Masukkan Meta Deskripsi Materi" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meta Deskripsi English</label>
                                <input type="text" class="form-control" name="meta_deskripsi_en" placeholder="Masukkan Meta Deskripsi Materi" required>
                            </div>

                            <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                            <a href="<?= base_url('admin-belajar-ekspor') ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->
</div><!--//app-content-->

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi_artikel'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi_artikel_en'))
        .catch(error => {
            console.error(error);
        });
</script>
<?= $this->endSection('content'); ?>
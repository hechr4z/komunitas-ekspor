<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Tambah Kategori Belajar Ekspor</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('/admin-kategori-belajar-ekspor-create') ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori Indonesia</label>
                                <input type="text" class="form-control" name="nama_kategori" placeholder="Masukkan Kategori Materi" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Kategori English</label>
                                <input type="text" class="form-control" name="nama_kategori_en" placeholder="Masukkan Kategori Materi" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug Indonesia</label>
                                <input type="text" class="form-control" name="slug" placeholder="ex. cara-ekspor-barang" value="" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Slug English</label>
                                <input type="text" class="form-control" name="slug_en" placeholder="ex. cara-ekspor-barang" value="" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-kategori-belajar-ekspor') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->


<?= $this->endSection(); ?>
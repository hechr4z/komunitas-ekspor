<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Edit Kategori Belajar Ekspor</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('/admin-kategori-belajar-ekspor-update/' . $kategori_belajar_ekspor['id_kategori_belajar_ekspor']); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" value="<?= esc($kategori_belajar_ekspor['nama_kategori']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="<?= esc($kategori_belajar_ekspor['slug']); ?>" required>
                            </div>
                            <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan Perubahan</button>
                            <a href="<?= base_url('admin-kategori-belajar-ekspor') ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection(); ?>
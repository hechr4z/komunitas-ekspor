<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Edit Kategori Belajar Ekspor</h1>
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
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?= base_url('admin-kategori-belajar-ekspor') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
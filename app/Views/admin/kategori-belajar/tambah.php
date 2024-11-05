<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambah Kategori Belajar Ekspor</h1>
        <form action="<?= base_url('admin/kategori/proses_tambah') ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label">Nama Kategori In</label>
                <input type="text" class="form-control" name="nama_kategori" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Kategori En</label>
                <input type="text" class="form-control" name="nama_kategori" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?= base_url('admin-kategori-belajar-ekspor') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
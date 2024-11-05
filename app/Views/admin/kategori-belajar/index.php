<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Kategori Belajar Ekspor</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a href="<?= base_url('admin-kategori-belajar-ekspor-tambah') ?>" class="btn btn-primary">+ Tambah Kategori</a>
        </div>
        <table class="table app-table-hover mb-0 text-left">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Kategori</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($kategori_belajar_ekspor as $item): ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $item['nama_kategori']; ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('/admin-kategori-belajar-ekspor-ubah/' . $item['id_kategori_belajar_ekspor']); ?>" class="btn btn-primary">Ubah</a>
                            <a href="<?= base_url('/admin-kategori-belajar-ekspor-delete/' . $item['id_kategori_belajar_ekspor']); ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>
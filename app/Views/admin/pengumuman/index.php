<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Pengumuman</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a href="<?= base_url('admin-add-pengumuman') ?>" class="btn btn-primary">+ Tambah Pengumuman</a>
        </div>
        <table class="table app-table-hover mb-0 text-left">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Judul Pengumuman</th>
                    <th class="text-center">Poster Pengumuman</th>
                    <th class="text-center">Deskripsi Pengumuman</th>
                    <th class="text-center">Slug</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">Pengumuman baru</td>
                    <td class="text-center"> 
                        <img src="img/be1.jpg" alt="Poster Pengumuman" style="width: 50px;">
                    </td>
                    <td class="text-center">Deskripsi singkat pengumuman</td>
                    <td class="text-center">pengumuman-baru</td>
                    <td class="text-center">
                        <a href="<?= base_url('admin-edit-pengumuman') ?>" class="btn btn-primary">Ubah</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection('content'); ?>
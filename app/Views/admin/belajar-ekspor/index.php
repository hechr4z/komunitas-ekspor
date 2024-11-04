<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Belajar Ekspor</h1>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <a href="<?= base_url('admin-belajar-ekspor-tambah') ?>" class="btn btn-primary me-md-2"> + Tambah Materi</a>
            </div>
        </div>
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle">Judul In</th>
                                        <th class="text-center align-middle">Judul En</th>
                                        <th class="text-center align-middle">Foto</th>
                                        <th class="text-center align-middle">Kategori In</th>
                                        <th class="text-center align-middle">Kategori En</th>
                                        <th class="text-center align-middle" style="width: 150px;">Deskripsi In</th>
                                        <th class="text-center align-middle" style="width: 150px;">Deskripsi En</th>
                                        <th class="text-center align-middle" style="width: 60px;">Slug In</th>
                                        <th class="text-center align-middle" style="width: 60px;">Slug En</th>
                                        <th class="text-center align-middle" style="width: 60px;">Meta Title In</th>
                                        <th class="text-center align-middle" style="width: 60px;">Meta Title En</th>
                                        <th class="text-center align-middle" style="width: 60px;">Meta Description In</th>
                                        <th class="text-center align-middle" style="width: 60px;">Meta Description En</th>
                                        <th class="text-center align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($belajar_ekspor as $item): ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $no++; ?></td>
                                            <td class="text-center align-middle"><?= $item['judul_belajar_ekspor']; ?></td>
                                            <td class="text-center align-middle"><?= $item['judul_belajar_ekspor_en']; ?></td>
                                            <td class="text-center align-middle">
                                                <img src="<?= base_url('/img/' . $item['foto_belajar_ekspor']) ?>" alt="<?= $item['judul_belajar_ekspor']; ?>" class="img-fluid" style="max-width: 80px;">
                                            </td>
                                            <td class="text-center align-middle"><?= $item['nama_kategori']; ?></td>
                                            <td class="text-center align-middle"><?= $item['nama_kategori_en']; ?></td>
                                            <td class="text-center align-middle" style="width: 120px;">
                                                <div style="max-height: 100px; overflow-y: auto;">
                                                    <?= $item['deskripsi_belajar_ekspor']; ?>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle" style="width: 120px;">
                                                <div style="max-height: 100px; overflow-y: auto;">
                                                    <?= $item['deskripsi_belajar_ekspor_en']; ?>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle"><?= $item['slug']; ?></td>
                                            <td class="text-center align-middle"><?= $item['slug_en']; ?></td>
                                            <td class="text-center align-middle"><?= $item['meta_title']; ?></td>
                                            <td class="text-center align-middle"><?= $item['meta_title_en']; ?></td>
                                            <td class="text-center align-middle"><?= $item['meta_deskripsi']; ?></td>
                                            <td class="text-center align-middle"><?= $item['meta_deskripsi_en']; ?></td>

                                            <td class="text-center align-middle">
                                                <div class="d-grid gap-2">
                                                    <a class="btn btn-primary" href="<?= base_url('/admin-belajar-ekspor-edit/' . $item['id_belajar_ekspor']) ?>">Ubah</a>
                                                    <a class="btn btn-danger" href="#">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

<?= $this->endSection('content'); ?>
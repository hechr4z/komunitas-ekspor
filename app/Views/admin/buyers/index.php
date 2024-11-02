<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Daftar Buyers</h1>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url('admin-add-buyers') ?>" class="btn btn-primary me-md-2"> + Tambah Data Buyers</a>
            </div>
        </div>
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover table-bordered mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center" valign="middle">No</th>
                                        <th class="text-center" valign="middle">Nama Perusahaan</th>
                                        <th class="text-center" valign="middle">Email Perusahaan</th>
                                        <th class="text-center" valign="middle">Website Perusahaan</th>
                                        <th class="text-center" valign="middle">HS Code</th>
                                        <th class="text-center" valign="middle">Negara Perusahaan</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>

                                <?php if (empty($buyers)): ?>
                                    <tbody>
                                        <tr>
                                            <td colspan="7" class="text-center">Masih belum ada Data Buyers.</td>
                                        </tr>
                                    </tbody>
                            </table>
                        <?php else: ?>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($buyers as $item) : ?>
                                    <tr>
                                        <td class="text-center" valign="middle"><?= $i++ ?></td>
                                        <td class="text-center" valign="middle"><?= $item['nama_perusahaan'] ?></td>
                                        <td class="text-center" valign="middle"><?= $item['email_perusahaan'] ?></td>
                                        <td class="text-center" valign="middle"><?= $item['website_perusahaan'] ?></td>
                                        <td class="text-center" valign="middle"><?= $item['hs_code'] ?></td>
                                        <td class="text-center" valign="middle"><?= $item['negara_perusahaan'] ?></td>
                                        <td valign="middle">
                                            <div class="text-center">
                                                <a href="<?= base_url('admin') ?>" class="btn btn-danger">Hapus</a>
                                                <a href="<?= base_url('admin-edit-buyers') ?>" class="btn btn-primary">Ubah</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                            <div class="mt-2">
                                <?= $pager->links('default', 'bootstrap_pagination') ?>
                            </div>
                        <?php endif; ?>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

<?= $this->endSection('content') ?>
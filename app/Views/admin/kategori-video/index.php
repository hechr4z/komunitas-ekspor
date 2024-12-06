<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<style>
    .table-hover tbody tr:hover {
        background-color: #f2f2f2;
    }

    .table thead th {
        background-color: #f8f9fa;
        font-weight: bold;
        border-bottom: 2px solid #dee2e6;
        text-align: center;
        white-space: nowrap;
    }

    .table tbody td {
        padding: 12px;
        vertical-align: middle;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Tooltip for long content */
    .tooltip-text {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Adding fixed width for certain columns */
    .col-fixed {
        width: 150px;
    }

    .text-wrap {
        white-space: normal;
        max-height: 100px;
        overflow-y: auto;
    }

    .btn-sm {
        font-size: 0.8rem;
        padding: 4px 8px;
    }
</style>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0" style="color: #03AADE;">List Kategori Video Tutorial</h1>
            </div>

            <div class="col-auto">
                <a href="<?= base_url('admin-kategori-video-tutorial-tambah') ?>" class="btn text-white" style="background-color: #03AADE;"> + Tambah Video</a>
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
                                        <th class="text-center" valign="middle">Kategori Video Indonesia</th>
                                        <th class="text-center" valign="middle">Kategori Video English</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>



                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kategori_video as $item): ?>
                                        <tr>
                                            <td class="text-center" valign="middle"><?= $no++; ?></td>
                                            <td class="text-center" valign="middle"><?= $item['nama_kategori_video']; ?></td>
                                            <td class="text-center" valign="middle"><?= $item['nama_kategori_video_en']; ?></td>
                                            <td class="text-center align-middle">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="<?= base_url('/admin-kategori-video-tutorial-delete/' . $item['id_kategori_video']) ?>" class="btn btn-sm text-white me-2" style="background-color: #F2BF02;">Hapus</a>
                                                    <a href="<?= base_url('/admin-kategori-video-tutorial-ubah/' . $item['id_kategori_video']) ?>" class="btn btn-sm text-white" style="background-color: #03AADE;">Ubah</a>
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

<?= $this->endSection(); ?>
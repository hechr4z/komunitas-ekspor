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
                                    <tr>
                                        <td class="text-center align-middle">1</td>
                                        <td class="text-center align-middle">Tio Membeli Bakso</td>
                                        <td class="text-center align-middle">Tio Buy Bakso</td>
                                        <td class="text-center align-middle">
                                            <img src="<?= base_url('img/acumalaka.png') ?>" alt="Foto Artikel" class="img-fluid" style="max-width: 80px;">
                                        </td>
                                        <td class="text-center align-middle">Cara Membeli</td>
                                        <td class="text-center align-middle">Buy Tutorial</td>
                                        <td class="text-center align-middle" style="width: 120px;">
                                            <div style="max-height: 100px; overflow-y: auto;">
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos eaque, sunt dolores exercitationem enim dolore tempora, veritatis tenetur ipsum asperiores distinctio repellendus quae cupiditate, hic nostrum cumque quisquam soluta vero.
                                            </div>
                                        </td>
                                        <td class="text-center align-middle" style="width: 120px;">
                                            <div style="max-height: 100px; overflow-y: auto;">
                                                adipisicing elit. Dignissimos eaque, sunt dolores exercitationem enim dolore tempora, veritatis tenetur ipsum asperiores distinctio repellendus quae cupiditate, hic nostrum cumque quisquam soluta vero. Lorem ipsum dolor sit amet consectetur,
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">tio-membeli-bakso-091024</td>
                                        <td class="text-center align-middle">tio-buy-bakso-091024</td>
                                        <td class="text-center align-middle">Tio Membeli Bakso | KEI</td>
                                        <td class="text-center align-middle">Tio Buy Bakso | KEI</td>
                                        <td class="text-center align-middle">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                        <td class="text-center align-middle">dolor sit amet consectetur adipisicing elit Lorem ipsum .</td>

                                        <td class="text-center align-middle">
                                            <div class="d-grid gap-2">

                                                <a class="btn btn-primary" href="<?= base_url('admin-belajar-ekspor-ubah') ?>">Ubah</a>
                                                <a class="btn btn-danger" href="#">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
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
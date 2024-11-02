<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Daftar Member</h1>
        <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>
        <hr class="mb-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a href="#" class="btn btn-primary me-md-2"> + Tambah Member</a>
        </div>
        <div class="row g-4 settings-section">
            <div class="col-12">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle">Username & Kode Referal</th>
                                        <th class="text-center align-middle">Email</th>
                                        <th class="text-center align-middle">Popular Point</th>
                                        <th class="text-center align-middle">Nama Perusahaan</th>
                                        <th class="text-center align-middle" style="width: 300px;">Deskripsi Perusahaan
                                        </th>
                                        <th class="text-center align-middle">Tipe Bisnis</th>
                                        <th class="text-center align-middle">Produk Utama</th>
                                        <th class="text-center align-middle">Tahun Didirikan</th>
                                        <th class="text-center align-middle">Skala Bisnis</th>
                                        <th class="text-center align-middle">PIC</th>
                                        <th class="text-center align-middle">No. Telepon PIC</th>
                                        <th class="text-center align-middle">Foto Member</th>
                                        <th class="text-center align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">1</td>
                                        <td class="text-center align-middle">johnsmith</td>
                                        <td class="text-center align-middle">johnsmith@example.com</td>
                                        <td class="text-center align-middle">150</td>
                                        <td class="text-center align-middle">PT. Contoh Perusahaan</td>
                                        <td class="text-center align-middle" style="width: 300px;">
                                            <div style="max-height: 100px; overflow-y: auto;">
                                                Penjelasan lebih panjang mengenai perusahaan dapat ditampilkan di sini.
                                                Anda bisa menyesuaikan lebar kolom sesuai kebutuhan agar seluruh teks
                                                dapat ditampilkan dengan lebih nyaman.
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">Teknologi</td>
                                        <td class="text-center align-middle">Software A</td>
                                        <td class="text-center align-middle">2015</td>
                                        <td class="text-center align-middle">Besar</td>
                                        <td class="text-center align-middle">John Smith</td>
                                        <td class="text-center align-middle">081234567890</td>
                                        <td>
                                            <img src="/img/acumalaka.png" alt="Foto John" class="img-thumbnail"
                                                style="max-width: 50px;">
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center">
                                                <a href="admin-edit-data-member"
                                                    class="btn btn-warning btn-sm me-1">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center align-middle">1</td>
                                        <td class="text-center align-middle">johnsmith</td>
                                        <td class="text-center align-middle">johnsmith@example.com</td>
                                        <td class="text-center align-middle">150</td>
                                        <td class="text-center align-middle">PT. Contoh Perusahaan</td>
                                        <td class="text-center align-middle" style="width: 300px;">
                                            <div style="max-height: 100px; overflow-y: auto;">
                                                Penjelasan lebih panjang mengenai perusahaan dapat ditampilkan di sini.
                                                Anda bisa menyesuaikan lebar kolom sesuai kebutuhan agar seluruh teks
                                                dapat ditampilkan dengan lebih nyaman.
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">Teknologi</td>
                                        <td class="text-center align-middle">Software A</td>
                                        <td class="text-center align-middle">2015</td>
                                        <td class="text-center align-middle">Besar</td>
                                        <td class="text-center align-middle">John Smith</td>
                                        <td class="text-center align-middle">081234567890</td>
                                        <td>
                                            <img src="/img/acumalaka.png" alt="Foto John" class="img-thumbnail"
                                                style="max-width: 50px;">
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center">
                                                <a href="admin-edit-data-member"
                                                    class="btn btn-warning btn-sm me-1">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content') ?>
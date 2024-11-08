<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Manfaat Join</h1>
        <table class="table app-table-hover mb-0 text-left">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Path d</th>
                    <th class="text-center">Judul Manfaat</th>
                    <th class="text-center">Judul Manfaat En</th>
                    <th class="text-center">Deskripsi Manfaat</th>
                    <th class="text-center">Deskripsi Manfaat En</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data 1 -->
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center"> 
                        <img src="img/be3.jpg" alt="Poster Pengumuman" style="width: 50px;">
                    </td>
                    <td class="text-center">Peluang Bisnis</td>
                    <td class="text-center">Business Opportunities</td>
                    <td class="text-center">Akses Jaringan Bisnis</td>
                    <td class="text-center">Access to Business Networks.<br>International Collaboration Opportunities</td>
                    <td class="text-center">
                        <a href="<?= base_url('admin-edit-manfaat-join') ?>" class="btn btn-primary">Ubah</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <!-- Data 2 -->
                <tr>
                    <td class="text-center">2</td>
                    <td class="text-center"> 
                        <img src="img/be2.jpg" alt="Poster Pengumuman" style="width: 50px;">
                    </td>
                    <td class="text-center">Pelatihan</td>
                    <td class="text-center">Training and Workshops</td>
                    <td class="text-center">Akses Pelatihan Gratis</td>
                    <td class="text-center">Access to Free Training.<br>Export Skills Development</td>
                    <td class="text-center">
                        <a href="<?= base_url('admin-edit-manfaat-join') ?>" class="btn btn-primary">Ubah</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <!-- Data 3 -->
                <tr>
                    <td class="text-center">3</td>
                    <td class="text-center"> 
                        <img src="img/be1.jpg" alt="Poster Pengumuman" style="width: 50px;">
                    </td>
                    <td class="text-center">Sertifikat</td>
                    <td class="text-center">Certificates</td>
                    <td class="text-center">Mendapatkan Sertifikat Resmi</td>
                    <td class="text-center">Receive Official Certificate.<br>Expand Your Network & Relationships</td>
                    <td class="text-center">
                        <a href="<?= base_url('admin-edit-manfaat-join') ?>" class="btn btn-primary">Ubah</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection('content'); ?>

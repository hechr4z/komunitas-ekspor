<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Manfaat Join</h1>
        <table class="table app-table-hover mb-0 text-left">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Web</th>
                    <th class="text-center">Nama Web En</th>
                    <th class="text-center">Deskripsi Web</th>
                    <th class="text-center">Deskripsi Web En</th>
                    <th class="text-center">Logo Web</th>
                    <th class="text-center">Lokasi Web</th>
                    <th class="text-center">Email Web</th>
                    <th class="text-center">Link Ig Web</th>
                    <th class="text-center">Link Yt Web</th>
                    <th class="text-center">Link Fb Web</th>
                    <th class="text-center">Footer Text</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data 1 -->
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">My Website</td>
                    <td class="text-center">My Website EN</td>
                    <td class="text-center">Deskripsi singkat tentang website dalam bahasa Indonesia.</td>
                    <td class="text-center">Short description about the website in English.</td>
                    <td class="text-center">
                        <img src="img/logo_web.jpg" alt="Logo Web" style="width: 50px;">
                    </td>
                    <td class="text-center">Jl. Contoh No. 123, Jakarta</td>
                    <td class="text-center">info@mywebsite.com</td>
                    <td class="text-center">
                        <a href="https://instagram.com/mywebsite" target="_blank">Instagram</a>
                    </td>
                    <td class="text-center">
                        <a href="https://youtube.com/mywebsite" target="_blank">YouTube</a>
                    </td>
                    <td class="text-center">
                        <a href="https://facebook.com/mywebsite" target="_blank">Facebook</a>
                    </td>
                    <td class="text-center">All rights reserved © My Website</td>
                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <a href="<?= base_url('admin-profile-edit') ?>" class="btn btn-primary">Ubah</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection('content'); ?>

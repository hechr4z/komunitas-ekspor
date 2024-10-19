<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .custom-table {
        border-collapse: collapse;
        border-radius: 15px;
        overflow: hidden;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .custom-table thead th {
        background-color: #007bff;
        color: white;
        text-align: center;
    }

    .custom-table tbody td {
        border-top: 1px solid #ddd;
        padding: 10px;
        vertical-align: middle;
    }

    /* Responsiveness for smaller screens */
    @media (max-width: 576px) {
        .btn {
            width: 100%;
            margin-bottom: 15px;
        }

        .nav-tabs {
            flex-direction: column;
        }
    }
</style>

<!-- judul -->
<div class="py-5" style="text-align: center;">
    <h2 class="text-custom-title">Data Buyers</h2>
    <p class="text-custom-paragraph mt-2">Berikut data buyers Komunitas Ekspor Indonesia</p>
</div>
<div class="container mt-3 mb-5">
    <!-- Table Content -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped custom-table">
            <thead class="thead-blue">
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Kode HS</th>
                    <th>Negara</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($new4_buyers)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Masih belum ada Data Buyers.</td>
                    </tr>
                <?php else: ?>
                    <?php $i = 1; ?>
                    <!-- Menampilkan data yang tidak di-blur -->
                    <?php foreach ($new4_buyers as $item): ?>
                        <tr class="text-center">
                            <td><?= $i++ ?></td>
                            <td><?= $item['nama_perusahaan'] ?></td>
                            <td><?= $item['email_perusahaan'] ?></td>
                            <td><a href="https://<?= $item['website_perusahaan'] ?>" target="_blank"
                                    style="text-decoration: none;"><?= $item['website_perusahaan'] ?></a></td>
                            <td><?= $item['hs_code'] ?></td>
                            <td><?= $item['negara_perusahaan'] ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <!-- Menampilkan data yang di-blur -->
                    <tr class="position-relative">
                        <td colspan="6" class="p-0">
                            <!-- Overlay container untuk bagian yang blur -->
                            <div class="position-relative" style="overflow: hidden; width: 100%;">
                                <div class="table-blur-container" style="width: 100%;">
                                    <table class="table table-bordered table-striped custom-table" style="width: 100%;">
                                        <?php foreach ($blur_buyers as $item): ?>
                                            <tr class="text-center" style="filter: blur(5px); pointer-events: none;">
                                                <td><?= $i++ ?></td>
                                                <td><?= $item['nama_perusahaan'] ?></td>
                                                <td><?= $item['email_perusahaan'] ?></td>
                                                <td><a href="https://<?= $item['website_perusahaan'] ?>" target="_blank"
                                                        style="text-decoration: none;"><?= $item['website_perusahaan'] ?></a>
                                                </td>
                                                <td><?= $item['hs_code'] ?></td>
                                                <td><?= $item['negara_perusahaan'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>

                                <!-- Overlay teks hanya untuk row kedua -->
                                <div class="overlay text-center"
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; background-color: rgba(255, 255, 255, 0.7); z-index: 10;">
                                    <p
                                        style="font-size: 1.5rem; font-weight: bold; color: white; text-shadow: 2px 2px 0 #03AADE, -2px -2px 0 #03AADE, 2px -2px 0 #03AADE, -2px 2px 0 #03AADE;">
                                        Daftar untuk melihat buyers lainnya!
                                    </p>
                                    <button
                                        style="margin-top: 10px; padding: 10px 20px; background-color: #03AADE; color: white; border: none; border-radius: 5px; font-size: 1rem; cursor: pointer;">
                                        Daftar Buyers
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</div>


<?= $this->endSection(); ?>
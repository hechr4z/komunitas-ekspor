<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .tab-content {
        margin-top: 20px;
    }

    .custom-tab {
        color: #000;
    }

    .custom-tab:hover {
        color: #007bff;
    }

    .nav-link.active {
        color: #007bff !important;
    }

    .custom-table {
        border-collapse: collapse;
        border-radius: 15px;
        overflow: hidden;
        border: 1px solid #ddd;
    }

    .custom-table thead th {
        background-color: #03AADE;
        color: white;
        text-align: center;
    }

    .table.custom-table td {
        vertical-align: middle;
    }

    .table.custom-table td:nth-child(6) {
        word-wrap: break-word;
        /* Agar teks panjang dapat terbungkus */
        white-space: normal;
        min-width: 150px;
        /* Menambah lebar minimum untuk progress */
    }

    .modal-dialog {
        max-width: 600px;
    }


    .btn-custom {
        background-color: #03AADE;
        text-align: center;
        color: #ffffff;
    }

    .btn-custom:hover {
        color: #fff;
        transform: scale(1.05);
        box-shadow: 0px 0px 10px #F2BF02;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #F2BF02 !important;
        /* Mengubah warna saat hover menjadi #F2BF02 */
    }

    /* Rekapitulasi */
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .card h6 {
        font-weight: bold;
    }

    .total-kirim-email {
        text-align: center;
        font-size: 16px;
        margin-top: 20px;
    }

    #filter-form .form-control {
        width: 100%;
    }
</style>

<!-- judul -->
<div class="py-5" style="text-align: center;">
    <h2 class="text-custom-title">MPM</h2>
    <p class="text-custom-paragraph mt-2">Berikut Fitur MPM untuk Cek Progress Emial yang Terkirim</p>
</div>

<div class="container mt-4">
    <!-- Member Details (Full Width) -->
    <div class="col-lg-12">
        <div class="card p-4 shadow-sm">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs justify-content-center gap-3 mt-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active custom-tab" id="tambah-progress-tab" data-bs-toggle="tab"
                        data-bs-target="#tambah-progress" type="button" role="tab" aria-controls="tambah-progress"
                        aria-selected="true">Tambah Progress</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="daftar-progress-tab" data-bs-toggle="tab"
                        data-bs-target="#daftar-progress" type="button" role="tab" aria-controls="daftar-progress"
                        aria-selected="false">Daftar Progress</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="rekapitulasi-tab" data-bs-toggle="tab"
                        data-bs-target="#rekapitulasi" type="button" role="tab" aria-controls="rekapitulasi"
                        aria-selected="false">Rekapitulasi</button>
                </li>
            </ul>

            <!-- Tambah Progress -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Tambah Progress Form -->
                <div class="tab-pane fade show active" id="tambah-progress" role="tabpanel"
                    aria-labelledby="tambah-progress-tab">
                    <form action="your-action-url" method="POST" class="col-md-6 mx-auto">
                        <!-- Tanggal Kirim Email -->
                        <div class="mb-3">
                            <label for="tanggalKirimEmail" class="form-label">Tanggal Kirim Email</label>
                            <input type="date" class="form-control" id="tanggalKirimEmail" name="tanggal_kirim_email"
                                required>
                        </div>

                        <!-- Nama Perusahaan -->
                        <div class="mb-3">
                            <label for="namaPerusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="namaPerusahaan" name="nama_perusahaan" required>
                        </div>

                        <!-- Negara Perusahaan Dropdown -->
                        <div class="mb-3">
                            <label for="negaraPerusahaan" class="form-label">Negara Perusahaan</label>
                            <select class="form-select" id="negaraPerusahaan" name="negara_perusahaan" required>
                                <option value="" selected disabled>Pilih Negara</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Singapura">Singapura</option>
                                <option value="Amerika Serikat">Amerika Serikat</option>
                                <!-- Add more countries as needed -->
                            </select>
                        </div>

                        <!-- Status Terkirim Dropdown -->
                        <div class="mb-3">
                            <label for="statusTerkirim" class="form-label">Status Terkirim</label>
                            <select class="form-select" id="statusTerkirim" name="status_terkirim" required>
                                <option value="" selected disabled>Pilih Status</option>
                                <option value="Terkirim">Terkirim</option>
                                <option value="Belum Terkirim">Belum Terkirim</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-custom">Submit</button>
                        </div>
                    </form>
                </div>

                <!-- Daftar Progress Table -->
                <div class="tab-pane fade" id="daftar-progress" role="tabpanel" aria-labelledby="daftar-progress-tab">
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Kirim Email</th>
                                    <th>Update Terakhir</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Negara Perusahaan</th>
                                    <th>Status Terkirim</th>
                                    <th style="min-width: 150px;">Progress</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>2024-10-01</td>
                                    <td>2024-10-24</td>
                                    <td>PT. ABC Indonesia</td>
                                    <td>Indonesia</td>
                                    <td><span style="color: green;">Terkirim</span></td>
                                    <td>50% dgsdhgsdahsdcasbfecfe cfgesjhgcfsehfgcsdbfmzxckajyr ertyetraldsadkxzmcmxn
                                        fsduusldaksmfmxnvnbxjfgsd fzhckjxzn</td>
                                    <td>
                                        <button class="btn btn-custom" data-bs-toggle="modal"
                                            data-bs-target="#editModal" style="background-color:#FFA500">Edit</button>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>2024-10-01</td>
                                    <td>2024-10-24</td>
                                    <td>PT. ABC Indonesia</td>
                                    <td>Indonesia</td>
                                    <td><span style="color: red;">Gagal</span></td>
                                    <td>sabdsbadh basb b hcwhgrybcgruadhakjdnjks chsgfcjasfshbfshfgeh hfsgchfsgcbfgshfgs
                                        cgfsgfjhsfgshdfg sgfcsjhfgcsfg</td>
                                    <td>
                                        <button class="btn btn-custom" data-bs-toggle="modal"
                                            data-bs-target="#editModal" style="background-color:#FFA500">Edit</button>
                                    </td>
                                </tr>
                                <!-- Tambahkan data lainnya di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal untuk Edit -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Progress</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm">
                                    <!-- Tanggal Kirim Email -->
                                    <div class="mb-3">
                                        <label for="tanggal-email" class="form-label">Tanggal Kirim Email</label>
                                        <input type="date" id="tanggal-email" name="tanggal-email" class="form-control"
                                            required>
                                    </div>

                                    <!-- Nama Perusahaan -->
                                    <div class="mb-3">
                                        <label for="nama-perusahaan" class="form-label">Nama Perusahaan</label>
                                        <input type="text" id="nama-perusahaan" name="nama-perusahaan"
                                            class="form-control" required>
                                    </div>

                                    <!-- Negara Perusahaan -->
                                    <div class="mb-3">
                                        <label for="negaraPerusahaan" class="form-label">Negara Perusahaan</label>
                                        <select class="form-select" id="negaraPerusahaan" name="negara_perusahaan"
                                            required>
                                            <option value="" selected disabled>Pilih Negara</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Singapura">Singapura</option>
                                            <option value="Amerika Serikat">Amerika Serikat</option>
                                        </select>
                                    </div>

                                    <!-- Status Terkirim -->
                                    <div class="mb-3">
                                        <label for="status-terkirim" class="form-label">Status Terkirim</label>
                                        <select id="status-terkirim" name="status-terkirim" class="form-select"
                                            required>
                                            <option value="Terkirim">Terkirim</option>
                                            <option value="Gagal">Gagal</option>
                                        </select>
                                    </div>

                                    <!-- Progress -->
                                    <div class="mb-3">
                                        <label for="progress-editor" class="form-label">Progress</label>
                                        <textarea id="progress-editor" name="progress"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-custom" style="background-color:#C62E2E;"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-custom" style="background-color:#77DD77;">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rekapitulasi -->
                <div class="tab-pane fade" id="rekapitulasi" role="tabpanel" aria-labelledby="rekapitulasi-tab">
                    <div class="filter-container mt-4">
                        <form id="filter-form" class="row g-3">
                            <div class="col-md-6 col-lg-4">
                                <label for="filter-bulan" class="form-label">Bulan:</label>
                                <select id="filter-bulan" class="form-select">
                                    <option value="" selected disabled>Pilih Bulan</option>
                                    <?php
                                    $current_month = date('n'); // Mendapatkan bulan saat ini (1-12)
                                    $months = [
                                        1 => 'Januari',
                                        2 => 'Februari',
                                        3 => 'Maret',
                                        4 => 'April',
                                        5 => 'Mei',
                                        6 => 'Juni',
                                        7 => 'Juli',
                                        8 => 'Agustus',
                                        9 => 'September',
                                        10 => 'Oktober',
                                        11 => 'November',
                                        12 => 'Desember'
                                    ];
                                    foreach ($months as $key => $month): ?>
                                        <option value="<?= $key; ?>" <?= ($key == $current_month) ? 'selected' : ''; ?>>
                                            <?= $month; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <label for="filter-tahun" class="form-label">Tahun:</label>
                                <select id="filter-tahun" class="form-select">
                                    <option value="" selected disabled>Pilih Tahun</option>
                                    <?php
                                    $current_year = date('Y'); // Mendapatkan tahun saat ini
                                    foreach ($years as $item): ?>
                                        <option value="<?= $item; ?>" <?= ($item == $current_year) ? 'selected' : ''; ?>>
                                            <?= $item; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-12 col-lg-4 d-flex align-items-end">
                                <button type="button" id="filter-button" class="btn btn-custom w-100">Filter</button>
                            </div>
                        </form>
                    </div>

                    <div class="date-container mt-4">
                        <div id="dates" class="row g-2">
                            <!-- Tanggal-tanggal akan diisi di sini secara dinamis -->
                        </div>

                        <div class="total-kirim-email mt-4">
                            <h5>Total Kirim Email dalam Bulan: <span id="total-email-bulan">0</span></h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const monthSelect = document.getElementById('filter-bulan');
        const yearSelect = document.getElementById('filter-tahun');
        const filterButton = document.getElementById('filter-button');
        const datesContainer = document.getElementById('dates');

        // Fungsi untuk menambahkan tanggal
        function generateDates(month, year) {
            const daysInMonth = new Date(year, month, 0).getDate();

            // Kosongkan kontainer sebelum mengisi ulang
            datesContainer.innerHTML = '';

            for (let day = 1; day <= daysInMonth; day++) {
                const dateCard = `
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card text-center p-3">
                        <h6>${day} ${monthSelect.options[month].text} ${year}</h6>
                        <p>0 Email</p>
                    </div>
                </div>`;
                datesContainer.innerHTML += dateCard;
            }
        }

        // Ambil nilai default yang sudah dipilih (bulan & tahun saat ini)
        const selectedMonth = parseInt(monthSelect.value || <?= $current_month; ?>);
        const selectedYear = parseInt(yearSelect.value || <?= $current_year; ?>);

        // Generate tanggal berdasarkan default bulan dan tahun
        generateDates(selectedMonth, selectedYear);

        // Event listener ketika tombol filter diklik
        filterButton.addEventListener('click', function () {
            const selectedMonth = parseInt(monthSelect.value);
            const selectedYear = parseInt(yearSelect.value);

            if (!selectedMonth || !selectedYear) {
                alert('Pilih bulan dan tahun terlebih dahulu!');
                return;
            }

            generateDates(selectedMonth, selectedYear);
        });
    });
</script>

<?= $this->endSection(); ?>
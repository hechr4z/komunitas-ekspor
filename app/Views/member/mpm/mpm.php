<?= $this->extend('member/layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .has-emails {
        background-color: #03AADE;
        color: #fff;
        /* Contoh warna hijau untuk yang ada email */
    }

    .no-emails {
        background-color: #fff;
        /* Contoh warna merah untuk yang tidak ada email */
    }

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
        /* Menambah lebar minimum untuk progres */
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
    <p class="text-custom-paragraph mt-2">Berikut Fitur MPM untuk Cek Progres Email yang Terkirim</p>
</div>

<div class="container mt-4">
    <?php if (session()->get('errors')) : ?>
        <div class="alert alert-danger">
            <?php foreach (session()->get('errors') as $error) : ?>
                <p><?= esc($error) ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <!-- Member Details (Full Width) -->
    <div class="col-lg-12">
        <div class="card p-4 shadow-sm">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs justify-content-center gap-3 mt-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active custom-tab" id="tambah-progres-tab" data-bs-toggle="tab"
                        data-bs-target="#tambah-progres" type="button" role="tab" aria-controls="tambah-progres"
                        aria-selected="true">Tambah Progres</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="daftar-progres-tab" data-bs-toggle="tab"
                        data-bs-target="#daftar-progres" type="button" role="tab" aria-controls="daftar-progres"
                        aria-selected="false">Daftar Progres</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="rekapitulasi-tab" data-bs-toggle="tab"
                        data-bs-target="#rekapitulasi" type="button" role="tab" aria-controls="rekapitulasi"
                        aria-selected="false">Rekapitulasi</button>
                </li>
            </ul>

            <!-- Tambah Progres -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Tambah Progres Form -->
                <div class="tab-pane fade show active" id="tambah-progres" role="tabpanel"
                    aria-labelledby="tambah-progres-tab">
                    <form action="<?= base_url('/mpm-add'); ?>" method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">
                        <!-- Tanggal Kirim Email -->
                        <div class="mb-3">
                            <label for="tgl_kirim_email" class="form-label">Tanggal Kirim Email</label>
                            <input type="date" class="form-control" id="tgl_kirim_email" name="tgl_kirim_email"
                                required>
                        </div>

                        <!-- Nama Perusahaan -->
                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
                        </div>

                        <!-- Negara Perusahaan Dropdown -->
                        <div class="mb-3">
                            <label for="negara_perusahaan" class="form-label">Negara Perusahaan</label>
                            <select class="form-select" id="negara_perusahaan" name="negara_perusahaan" required>
                                <option value="" selected disabled>Pilih Negara Perusahaan</option>
                            </select>
                        </div>

                        <!-- Status Progres Dropdown -->
                        <div class="mb-3">
                            <label for="status_progres" class="form-label">Status Progres</label>
                            <select class="form-select" id="status_progres" name="status_progres" required>
                                <option value="" selected disabled>Pilih Status</option>
                                <option value="Terkirim">Terkirim</option>
                                <option value="Gagal">Gagal</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-custom">Submit</button>
                        </div>
                    </form>
                </div>

                <!-- Daftar Progres Table -->
                <div class="tab-pane fade" id="daftar-progres" role="tabpanel" aria-labelledby="daftar-progres-tab">
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Kirim Email</th>
                                    <th>Update Terakhir</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Negara Perusahaan</th>
                                    <th>Status Progres</th>
                                    <th style="min-width: 150px;">Progres</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($mpmtable)): ?>
                            <tbody>
                                <tr>
                                    <td colspan="8" class="text-center">Masih belum ada Progres.</td>
                                </tr>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <tbody>
                            <?php $start = ($page - 1) * $perPage + 1; ?>
                            <?php foreach ($mpmtable as $item) : ?>
                                <tr class="text-center">
                                    <td><?= $start++ ?></td>
                                    <td><?= $item['tgl_kirim_email'] ?></td>
                                    <td><?= $item['update_terakhir'] ?></td>
                                    <td><?= $item['nama_perusahaan'] ?></td>
                                    <td><?= $item['negara_perusahaan'] ?></td>
                                    <td>
                                        <span style="color: <?= $item['status_progres'] === 'Terkirim' ? 'green' : 'red' ?>;">
                                            <?= $item['status_progres'] ?>
                                        </span>
                                    </td>
                                    <td><?= $item['progres'] ?></td>
                                    <td>
                                        <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#editModal" style="background-color:#FFA500"
                                            data-kirim="<?= $item['tgl_kirim_email'] ?>" data-perusahaan="<?= $item['nama_perusahaan'] ?>"
                                            data-negara="<?= $item['negara_perusahaan'] ?>" data-status="<?= $item['status_progres'] ?>"
                                            data-progres="<?= $item['progres'] ?>" data-id="<?= $item['id_mpm'] ?>">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>
                        <div class="mt-2">
                            <?= $pager->links('default', 'bootstrap_pagination') ?>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>

                <!-- Modal untuk Edit -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Progres</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="editForm" action="<?= base_url('/mpm-edit'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <!-- ID MPM -->
                                    <input type="hidden" id="id_mpm" name="id_mpm">

                                    <!-- Tanggal Kirim Email -->
                                    <div class="mb-3">
                                        <label for="tgl_kirim_email_edit" class="form-label">Tanggal Kirim Email</label>
                                        <input type="text" id="tgl_kirim_email_edit" name="tgl_kirim_email" class="form-control" disabled>
                                    </div>

                                    <!-- Nama Perusahaan -->
                                    <div class="mb-3">
                                        <label for="nama_perusahaan_edit" class="form-label">Nama Perusahaan</label>
                                        <input type="text" id="nama_perusahaan_edit" name="nama_perusahaan" class="form-control" disabled>
                                    </div>

                                    <!-- Negara Perusahaan -->
                                    <div class="mb-3">
                                        <label for="negara_perusahaan_edit" class="form-label">Negara Perusahaan</label>
                                        <select class="form-select" id="negara_perusahaan_edit" name="negara_perusahaan" disabled>
                                            <option value="" selected disabled>Pilih Negara Perusahaan</option>
                                        </select>
                                    </div>

                                    <!-- Status Progres -->
                                    <div class="mb-3">
                                        <label for="status_progres_edit" class="form-label">Status Progres</label>
                                        <select id="status_progres_edit" name="status_progres" class="form-select" disabled>
                                            <option value="Terkirim">Terkirim</option>
                                            <option value="Gagal">Gagal</option>
                                        </select>
                                    </div>

                                    <!-- Progres -->
                                    <div class="mb-3">
                                        <label for="progres-editor" class="form-label">Progres</label>
                                        <textarea id="progres-editor" name="progres"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-custom" style="background-color:#C62E2E;" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-custom" style="background-color:#77DD77;">
                                        Save changes
                                    </button>
                                </div>
                            </form>
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
                            <h5><span id="total-email-bulan"></span></h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    // Fungsi untuk mengambil data negara dan mengisi elemen dropdown
    function populateCountryDropdown(selectElementId) {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                const selectElement = document.getElementById(selectElementId);

                // Kosongkan dropdown sebelum mengisi
                selectElement.innerHTML = '<option value="" selected disabled>Pilih Negara Perusahaan</option>';

                // Urutkan nama negara secara alfabetis
                data.sort((a, b) => a.name.common.localeCompare(b.name.common));

                // Tambahkan negara ke dalam dropdown
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.name.common;
                    option.textContent = country.name.common;
                    selectElement.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching country data:', error));
    }

    // Panggil fungsi untuk setiap dropdown yang memerlukan data negara
    document.addEventListener('DOMContentLoaded', function() {
        populateCountryDropdown('negara_perusahaan'); // Untuk form tambah progres
        populateCountryDropdown('negara_perusahaan_edit'); // Untuk form lain
    });

    let editorInstance; // Variabel untuk menyimpan instance CKEditor

    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const tglKirimEmail = button.getAttribute('data-kirim');
        const namaPerusahaan = button.getAttribute('data-perusahaan');
        const negaraPerusahaan = button.getAttribute('data-negara');
        const statusProgres = button.getAttribute('data-status');
        const progres = button.getAttribute('data-progres'); // Ambil nilai progres dari atribut data
        const idmpm = button.getAttribute('data-id');

        // Update modal content untuk field input
        document.getElementById('tgl_kirim_email_edit').value = tglKirimEmail;
        document.getElementById('nama_perusahaan_edit').value = namaPerusahaan;
        document.getElementById('negara_perusahaan_edit').value = negaraPerusahaan;
        document.getElementById('status_progres_edit').value = statusProgres;
        document.getElementById('id_mpm').value = idmpm;

        // Hancurkan instance CKEditor jika sudah ada
        if (editorInstance) {
            editorInstance.destroy().then(() => {
                // Inisialisasi CKEditor kembali setelah dihancurkan
                ClassicEditor
                    .create(document.querySelector('#progres-editor'))
                    .then(editor => {
                        editorInstance = editor; // Simpan instance baru

                        // Hapus penomoran otomatis seperti "1. " di awal data progres
                        const contentWithoutNumbering = progres.replace(/^\d+\.\s*/, '');

                        editor.setData(contentWithoutNumbering); // Set nilai konten editor tanpa penomoran

                        // Jika ingin langsung diubah ke numbered list, bisa jalankan eksekusi 'numberedList'
                        const isNumberedList = progres.trim().startsWith('1.');
                        if (isNumberedList) {
                            editor.execute('numberedList'); // Jalankan mode numbered list
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        } else {
            // Jika belum ada instance, langsung inisialisasi CKEditor
            ClassicEditor
                .create(document.querySelector('#progres-editor'))
                .then(editor => {
                    editorInstance = editor; // Simpan instance baru

                    // Hapus penomoran otomatis seperti "1. " di awal data progres
                    const contentWithoutNumbering = progres.replace(/^\d+\.\s*/, '');

                    editor.setData(contentWithoutNumbering); // Set nilai konten editor tanpa penomoran

                    // Jika ingin langsung diubah ke numbered list, bisa jalankan eksekusi 'numberedList'
                    const isNumberedList = progres.trim().startsWith('1.');
                    if (isNumberedList) {
                        editor.execute('numberedList'); // Jalankan mode numbered list
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });

    // Hancurkan CKEditor saat modal ditutup
    editModal.addEventListener('hide.bs.modal', function() {
        if (editorInstance) {
            editorInstance.destroy()
                .then(() => {
                    editorInstance = null; // Reset instance setelah dihancurkan
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const monthSelect = document.getElementById('filter-bulan');
        const yearSelect = document.getElementById('filter-tahun');
        const filterButton = document.getElementById('filter-button');
        const datesContainer = document.getElementById('dates');
        const totalEmailText = document.querySelector('.total-kirim-email h5');

        // Fungsi untuk menambahkan tanggal
        function generateDates(month, year) {
            // Buat permintaan AJAX untuk mendapatkan jumlah email berdasarkan bulan dan tahun
            fetch(`/mpm/getEmailsByDate/${month}/${year}`)
                .then(response => response.json())
                .then(data => {
                    const daysInMonth = new Date(year, month, 0).getDate();
                    let totalEmails = 0; // Variabel untuk menghitung total email

                    // Kosongkan kontainer sebelum mengisi ulang
                    datesContainer.innerHTML = '';

                    for (let day = 1; day <= daysInMonth; day++) {
                        // Ambil jumlah email dari data atau default 0 jika tidak ada
                        const emailCount = parseInt(data[day] || 0); // Pastikan `emailCount` adalah angka
                        totalEmails += emailCount; // Tambahkan jumlah email ke total

                        const dateCard = `
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card text-center p-3 ${emailCount > 0 ? 'has-emails' : 'no-emails'}">
                            <h6>${day} ${monthSelect.options[month].text} ${year}</h6>
                            <p>${emailCount} Email</p>
                        </div>
                    </div>`;

                        datesContainer.innerHTML += dateCard;
                    }

                    // Update total email dan teks bulan-tahun
                    totalEmailText.innerHTML = `Total Kirim Email pada ${monthSelect.options[month].text} ${year}: ${totalEmails}`;
                })
                .catch(error => console.error('Error:', error));
        }

        // Ambil nilai default yang sudah dipilih (bulan & tahun saat ini)
        const selectedMonth = parseInt(monthSelect.value || <?= $current_month; ?>);
        const selectedYear = parseInt(yearSelect.value || <?= $current_year; ?>);

        // Generate tanggal berdasarkan default bulan dan tahun
        generateDates(selectedMonth, selectedYear);

        // Event listener ketika tombol filter diklik
        filterButton.addEventListener('click', function() {
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
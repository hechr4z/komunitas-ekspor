<?= $this->extend('member/layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .has-emails {
        background-color: #03AADE;
        color: #fff;
    }

    .no-emails {
        background-color: #fff;
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
        white-space: normal;
        min-width: 150px;
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
    }

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

<!-- Title Section -->
<div class="py-5" style="text-align: center;">
    <h2 class="text-custom-title">Invesment</h2>
    <p class="text-custom-paragraph mt-2">Berikut Fitur Invesment untuk Investasi</p>
</div>

<div class="container mt-4">
    <!-- Member Details (Full Width) -->
    <div class="col-lg-12">
        <div class="card p-4 shadow-sm">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs justify-content-center gap-3 mt-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active custom-tab" id="tambah-progres-tab" data-bs-toggle="tab"
                        data-bs-target="#tambah-progres" type="button" role="tab" aria-controls="tambah-progres"
                        aria-selected="true">Data Finansial Investasi</button>
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

            <!-- Tab Contents -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Data Finansial Investasi -->
                <div class="tab-pane fade show active" id="tambah-progres" role="tabpanel"
                    aria-labelledby="tambah-progres-tab">
                    <div class="col-md-10 mx-auto p-4 rounded shadow bg-light">

                        <!-- Title for the section -->
                        <h3 class="text-center mb-4 text-primary">Investasi</h3>

                        <!-- Form Fields -->
                        <div class="mb-3">
                            <label for="pembelian_aktiva_tetap" class="form-label fw-bold">Pembelian Aktiva
                                Tetap</label>
                            <input type="text" class="form-control border-primary" id="pembelian_aktiva_tetap"
                                name="pembelian_aktiva_tetap" placeholder="Masukkan jumlah pembelian aktiva tetap">
                        </div>

                        <div class="mb-3">
                            <label for="kebutuhan_modal_kerja" class="form-label fw-bold">Kebutuhan Modal Kerja</label>
                            <input type="text" class="form-control border-primary" id="kebutuhan_modal_kerja"
                                name="kebutuhan_modal_kerja" placeholder="Masukkan kebutuhan modal kerja">
                        </div>

                        <div class="mb-3">
                            <label for="usia_ekonomis" class="form-label fw-bold">Usia Ekonomis</label>
                            <select class="form-select border-primary" id="usia_ekonomis" name="usia_ekonomis">
                                <option value="" selected disabled>Pilih Usia Ekonomis</option>
                                <option value="5 tahun">5 tahun</option>
                                <option value="10 tahun">10 tahun</option>
                                <option value="15 tahun">15 tahun</option>
                                <option value="20 tahun">20 tahun</option>
                            </select>
                        </div>

                        <!-- Title for the table section -->
                        <h4 class="text-center mt-5 mb-4 text-primary">Prediksi Laba Setelah Pajak (EAT)</h4>

                        <!-- Editable Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Tahun Ke-1</th>
                                        <th>Tahun Ke-2</th>
                                        <th>Tahun Ke-3</th>
                                        <th>Tahun Ke-4</th>
                                        <th>Tahun Ke-5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" name="tahun1[]"
                                                placeholder="Masukkan prediksi"></td>
                                        <td><input type="text" class="form-control" name="tahun2[]"
                                                placeholder="Masukkan prediksi"></td>
                                        <td><input type="text" class="form-control" name="tahun3[]"
                                                placeholder="Masukkan prediksi"></td>
                                        <td><input type="text" class="form-control" name="tahun4[]"
                                                placeholder="Masukkan prediksi"></td>
                                        <td><input type="text" class="form-control" name="tahun5[]"
                                                placeholder="Masukkan prediksi"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Title and Read-only Input for "Tingkat Suku Bunga" -->
                        <h3 class="text-center mt-5 mb-3 text-primary">Tingkat Suku Bunga</h3>
                        <div class="mb-3">
                            <div class="mb-3 d-flex justify-content-center" style="width: 50%; margin: 0 auto;">
                                <input type="text" class="form-control-plaintext text-center" id="tingkat_suku_bunga"
                                    name="tingkat_suku_bunga" placeholder="20%" readonly>
                            </div>
                        </div>


                        <!-- Aktiva Tetap and Kelayakan Investasi Section -->
                        <div class="d-flex justify-content-between mt-5 gap-4">
                            <!-- Aktiva Tetap Form -->
                            <div class="col-md-6 p-4 rounded shadow-sm bg-white">
                                <h5 class="text-center mb-3 text-primary">Aktiva Tetap</h5>
                                <div class="mb-3">
                                    <label for="harga_perolehan" class="form-label fw-bold">Harga Perolehan
                                        (Cost)</label>
                                    <input type="text" class="form-control border-primary" id="harga_perolehan"
                                        name="harga_perolehan" placeholder="Masukkan harga perolehan">
                                </div>
                                <div class="mb-3">
                                    <label for="nilai_sisa" class="form-label fw-bold">Nilai Sisa (Salvage)</label>
                                    <input type="text" class="form-control border-primary" id="nilai_sisa"
                                        name="nilai_sisa" placeholder="Masukkan nilai sisa">
                                </div>
                                <div class="mb-3">
                                    <label for="umur_ekonomis" class="form-label fw-bold">Umur Ekonomis (Life)</label>
                                    <input type="text" class="form-control border-primary" id="umur_ekonomis"
                                        name="umur_ekonomis" placeholder="Masukkan umur ekonomis">
                                </div>
                            </div>

                            <!-- Kelayakan Investasi Table -->
                            <div class="col-md-5 p-4 rounded shadow-sm bg-white">
                                <h5 class="text-center mb-3 text-primary">Kelayakan Investasi</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered border-primary">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>ARR</th>
                                                <th>Payback</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Baris pertama untuk input ARR dan Payback -->
                                            <tr>
                                                <td><input type="text" class="form-control" name="arr"
                                                        placeholder="Masukkan ARR"></td>
                                                <td><input type="text" class="form-control" name="payback"
                                                        placeholder="Masukkan Payback"></td>
                                            </tr>
                                            <!-- Baris kedua untuk input tambahan ARR -->
                                            <tr>
                                                <td><input type="text" class="form-control" name="arr_2"
                                                        placeholder="Masukkan ARR (Baris 2)"></td>
                                                <td></td> <!-- Kosongkan kolom kedua untuk baris kedua -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- Progress List Table -->
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
                                    <th>Progres</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="8" class="text-center">Masih belum ada Progres.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal for Editing (View Only) -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Progres</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Editable Fields (View Only) -->
                                <div class="mb-3">
                                    <label for="tgl_kirim_email_edit" class="form-label">Tanggal Kirim Email</label>
                                    <input type="text" id="tgl_kirim_email_edit" name="tgl_kirim_email"
                                        class="form-control" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_perusahaan_edit" class="form-label">Nama Perusahaan</label>
                                    <input type="text" id="nama_perusahaan_edit" name="nama_perusahaan"
                                        class="form-control" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="negara_perusahaan_edit" class="form-label">Negara Perusahaan</label>
                                    <select class="form-select" id="negara_perusahaan_edit" name="negara_perusahaan"
                                        disabled>
                                        <option value="" selected disabled>Pilih Negara Perusahaan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status_progres_edit" class="form-label">Status Progres</label>
                                    <select id="status_progres_edit" name="status_progres" class="form-select" disabled>
                                        <option value="Terkirim">Terkirim</option>
                                        <option value="Gagal">Gagal</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="progres-editor" class="form-label">Progres</label>
                                    <textarea id="progres-editor" name="progres" disabled></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-custom" style="background-color:#C62E2E;"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-custom">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End of Tab Content -->
        </div>
    </div> <!-- End of Member Details -->
</div> <!-- End of Container -->

<?= $this->endSection(); ?>
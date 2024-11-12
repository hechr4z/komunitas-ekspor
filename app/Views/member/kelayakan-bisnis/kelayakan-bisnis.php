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
    <h2 class="text-custom-title">Kelayakan Bisnis</h2>
    <p class="text-custom-paragraph mt-2">Berikut Fitur Kelayakan Bisnis untuk Menilai Potensi Bisnis Anda</p>
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
                    <button class="nav-link custom-tab" id="penyusutan-tab" data-bs-toggle="tab"
                        data-bs-target="#penyusutan" type="button" role="tab" aria-controls="penyusutan"
                        aria-selected="false">Penyusutan Aktiva Tetap</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="average-tab" data-bs-toggle="tab" data-bs-target="#average"
                        type="button" role="tab" aria-controls="average" aria-selected="false">Average Rate of
                        Return</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="metode-payback-tab" data-bs-toggle="tab"
                        data-bs-target="#metode-payback" type="button" role="tab" aria-controls="metode-payback"
                        aria-selected="false">Metode Payback Period</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="internal-ror-tab" data-bs-toggle="tab"
                        data-bs-target="#internal-ror" type="button" role="tab" aria-controls="internal-ror"
                        aria-selected="false">Internal Rate of Return</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-tab" id="modified-irr-tab" data-bs-toggle="tab"
                        data-bs-target="#modified-irr" type="button" role="tab" aria-controls="modified-irr"
                        aria-selected="false">Modified Internal Rate of Return</button>
                </li>
            </ul>

            <!-- Tab Contents -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Data Finansial Investasi -->
                <div class="tab-pane fade show active" id="tambah-progres" role="tabpanel"
                    aria-labelledby="tambah-progres-tab">

                    <!-- Title for the section -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm bg-white">
                        <h4 class="text-center text-primary mb-3">Investasi</h4>

                        <!-- Form Fields -->
                        <div class="mb-3">
                            <label for="pembelian_aktiva_tetap" class="form-label fw-bold">Pembelian Aktiva
                                Tetap</label>
                            <input type="text" class="form-control" id="pembelian_aktiva_tetap"
                                name="pembelian_aktiva_tetap" placeholder="Masukkan Jumlah Pembelian Aktiva Tetap"
                                oninput="formatPembelianAktivaTetap(this); updateInvestmentTotal();">
                        </div>

                        <div class="mb-3">
                            <label for="kebutuhan_modal_kerja" class="form-label fw-bold">Kebutuhan Modal Kerja</label>
                            <input type="text" class="form-control" id="kebutuhan_modal_kerja"
                                name="kebutuhan_modal_kerja" placeholder="Masukkan Kebutuhan Modal Kerja"
                                oninput="formatNumber(this); updateInvestmentTotal();">
                        </div>

                        <div class="mb-3">
                            <label for="usia_ekonomis" class="form-label fw-bold">Usia Ekonomis</label>
                            <input type="text" class="form-control" id="usia_ekonomis" name="usia_ekonomis"
                                value="5 Tahun" disabled>
                        </div>
                    </div>

                    <!-- Title for the table section -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm bg-white">
                        <h4 class="text-center text-primary mb-3">Prediksi Laba Setelah Pajak (EAT)</h4>

                        <!-- Editable Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
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
                                        <td>
                                            <input type="text" class="form-control" id="eat_1" placeholder="Masukkan Prediksi" oninput="eat(this, 1)">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="eat_2" placeholder="Masukkan Prediksi" oninput="eat(this, 2)">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="eat_3" placeholder="Masukkan Prediksi" oninput="eat(this, 3)">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="eat_4" placeholder="Masukkan Prediksi" oninput="eat(this, 4)">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="eat_5" placeholder="Masukkan Prediksi" oninput="eat(this, 5)">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Title and Read-only Input for "Tingkat Suku Bunga" -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm bg-white">
                        <h4 class="text-center text-primary mb-3">Tingkat Suku Bunga</h4>
                        <div class="mb-3">
                            <div class="mb-3 d-flex justify-content-center" style="width: 50%; margin: 0 auto;">
                                <input type="text" class="form-control-plaintext text-center" id="tingkat_suku_bunga"
                                    name="tingkat_suku_bunga" placeholder="20%" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Aktiva Tetap and Kelayakan Investasi Section -->
                    <div class="d-flex justify-content-between mt-4 gap-4">
                        <!-- Aktiva Tetap Form -->
                        <div class="col-md-5 mx-auto mt-4 p-4 rounded shadow-sm bg-white">
                            <h4 class="text-center text-primary mb-3">Tingkat Suku Bunga</h4>
                            <div class="mb-3">
                                <label for="dfi_harga_perolehan" class="form-label fw-bold">Harga Perolehan
                                    (Cost)</label>
                                <input type="text" class="form-control" id="dfi_harga_perolehan"
                                    name="dfi_harga_perolehan" disabled placeholder="Mengikuti Pembelian Aktiva Tetap">
                            </div>
                            <div class="mb-3">
                                <label for="dfi_nilai_sisa" class="form-label fw-bold">Nilai Sisa (Salvage)</label>
                                <input type="text" class="form-control" id="dfi_nilai_sisa" name="dfi_nilai_sisa"
                                    placeholder="Masukkan Nilai Sisa" oninput="formatNilaiSisa(this)">
                            </div>
                            <div class="mb-3">
                                <label for="dfi_umur_ekonomis" class="form-label fw-bold">Umur Ekonomis (Life)</label>
                                <input type="text" class="form-control" id="dfi_umur_ekonomis" name="dfi_umur_ekonomis"
                                    value="5 Tahun" disabled>
                            </div>
                        </div>

                        <!-- Kelayakan Investasi Table -->
                        <div class="col-md-5 mx-auto mt-4 p-4 rounded shadow-sm bg-white">
                            <h4 class="text-center text-primary mb-3">Tingkat Suku Bunga</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>ARR</th>
                                            <th>Payback</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Baris pertama untuk input ARR dan Payback -->
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="arr"
                                                        placeholder="Masukkan ARR">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="payback"
                                                        placeholder="Masukkan Payback">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Tahun</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Baris kedua untuk input tambahan ARR -->
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="arr_2"
                                                        placeholder="Masukkan ARR (Baris 2)">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td> <!-- Kosongkan kolom kedua untuk baris kedua -->
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Penyusutan Aktiva Tetap -->
                <div class="tab-pane fade" id="penyusutan" role="tabpanel" aria-labelledby="penyusutan-tab">
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm bg-white">
                        <h4 class="text-center text-primary mb-3">Penyusutan Aktiva Tetap</h4>

                        <!-- Dropdown for Penyusutan Aktiva Tetap -->
                        <div class="mb-3">
                            <label for="metode_penyusutan" class="form-label fw-bold">Pilih salah satu metode
                                penyusutan:</label>
                            <select class="form-select" id="metode_penyusutan" name="metode_penyusutan"
                                onchange="calculateDepreciation()">
                                <option value="" selected disabled>Pilih Metode Penyusutan</option>
                                <option value="garis_lurus">1. Garis Lurus</option>
                                <option value="angka_tahun">2. Angka Tahun</option>
                                <option value="saldo_menurun">3. Saldo Menurun</option>
                            </select>
                        </div>
                    </div>

                    <!-- Data Aktiva -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm bg-white">
                        <h4 class="text-center text-primary mb-3">Data Aktiva</h4>

                        <!-- Input Fields for Data Aktiva -->
                        <div class="mb-3">
                            <label for="pat_harga_perolehan" class="form-label fw-bold">Harga Perolehan (Cost)</label>
                            <input type="text" class="form-control" id="pat_harga_perolehan" name="pat_harga_perolehan"
                                disabled placeholder="Mengikuti Pembelian Aktiva Tetap">
                        </div>

                        <div class="mb-3">
                            <label for="pat_nilai_sisa" class="form-label fw-bold">Nilai Sisa (Salvage)</label>
                            <input type="text" class="form-control" id="pat_nilai_sisa" name="pat_nilai_sisa" disabled
                                placeholder="Mengikuti Nilai Sisa Di Data Finansial Investasi">
                        </div>

                        <div class="mb-3">
                            <label for="pat_umur_ekonomis" class="form-label fw-bold">Umur Ekonomis (Life)</label>
                            <input type="text" class="form-control" id="pat_umur_ekonomis" name="pat_umur_ekonomis"
                                value="5 Tahun" disabled>
                        </div>
                    </div>

                    <!-- Tabel Penyusutan Aktiva Tetap -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm text-center">
                        <h4 class="text-center text-primary mb-4">Tabel Penyusutan Aktiva Tetap</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Akhir Tahun</th>
                                        <th>Debet Penyusutan</th>
                                        <th>Kredit AKM Penyusutan</th>
                                        <th>Total AKM Penyusutan</th>
                                        <th>Nilai Buku Aktiva</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="0_akhir_tahun">0</td>
                                        <td id="0_debet_penyusutan">0</td>
                                        <td id="0_kredit_akm_penyusutan">0</td>
                                        <td id="0_total_akm_penyusutan">0</td>
                                        <td id="0_nilai_buku_aktiva"></td>
                                    </tr>
                                    <tr>
                                        <td id="1_akhir_tahun">1</td>
                                        <td id="1_debet_penyusutan"></td>
                                        <td id="1_kredit_akm_penyusutan"></td>
                                        <td id="1_total_akm_penyusutan"></td>
                                        <td id="1_nilai_buku_aktiva"></td>
                                    </tr>
                                    <tr>
                                        <td id="2_akhir_tahun">2</td>
                                        <td id="2_debet_penyusutan"></td>
                                        <td id="2_kredit_akm_penyusutan"></td>
                                        <td id="2_total_akm_penyusutan"></td>
                                        <td id="2_nilai_buku_aktiva"></td>
                                    </tr>
                                    <tr>
                                        <td id="3_akhir_tahun">3</td>
                                        <td id="3_debet_penyusutan"></td>
                                        <td id="3_kredit_akm_penyusutan"></td>
                                        <td id="3_total_akm_penyusutan"></td>
                                        <td id="3_nilai_buku_aktiva"></td>
                                    </tr>
                                    <tr>
                                        <td id="4_akhir_tahun">4</td>
                                        <td id="4_debet_penyusutan"></td>
                                        <td id="4_kredit_akm_penyusutan"></td>
                                        <td id="4_total_akm_penyusutan"></td>
                                        <td id="4_nilai_buku_aktiva"></td>
                                    </tr>
                                    <tr>
                                        <td id="5_akhir_tahun">5</td>
                                        <td id="5_debet_penyusutan"></td>
                                        <td id="5_kredit_akm_penyusutan"></td>
                                        <td id="5_total_akm_penyusutan"></td>
                                        <td id="5_nilai_buku_aktiva"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Average Rate of Return -->
                <div class="tab-pane fade" id="average" role="tabpanel" aria-labelledby="average-tab">

                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">
                        <h4 class="text-center text-primary mb-4">Average Rate of Return</h4>
                        <!-- Input Fields -->
                        <div class="mb-3">
                            <label for="aror_investasi" class="form-label fw-bold">Investasi</label>
                            <input type="text" class="form-control" id="aror_investasi" name="aror_investasi" placeholder="Hasil Penjumlahan Pembelian Aktiva Tetap Dan Kebutuhan Modal Kerja" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="aror_usia_ekonomis" class="form-label fw-bold">Usia Ekonomis</label>
                            <input type="text" class="form-control" id="aror_usia_ekonomis" name="aror_usia_ekonomis"
                                value="5 Tahun" disabled>
                        </div>
                    </div>

                    <!-- Tabel Penyusutan Aktiva Tetap -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm text-center">
                        <h4 class="text-center text-primary mb-4">Aliran Kas</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>Laba Set. Pajak</th>
                                        <th>Penyusutan</th>
                                        <th>Aliran Kas Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="1_aror_keterangan">Tahun ke-1</td>
                                        <td id="1_aror_laba_set_pajak"></td>
                                        <td id="1_aror_penyusutan"></td>
                                        <td id="1_aror_aliran_kas_masuk"></td>
                                    </tr>
                                    <tr>
                                        <td id="2_aror_keterangan">Tahun ke-2</td>
                                        <td id="2_aror_laba_set_pajak"></td>
                                        <td id="2_aror_penyusutan"></td>
                                        <td id="2_aror_aliran_kas_masuk"></td>
                                    </tr>
                                    <tr>
                                        <td id="3_aror_keterangan">Tahun ke-3</td>
                                        <td id="3_aror_laba_set_pajak"></td>
                                        <td id="3_aror_penyusutan"></td>
                                        <td id="3_aror_aliran_kas_masuk"></td>
                                    </tr>
                                    <tr>
                                        <td id="4_aror_keterangan">Tahun ke-4</td>
                                        <td id="4_aror_laba_set_pajak"></td>
                                        <td id="4_aror_penyusutan"></td>
                                        <td id="4_aror_aliran_kas_masuk"></td>
                                    </tr>
                                    <tr>
                                        <td id="5_aror_keterangan">Tahun ke-5</td>
                                        <td id="5_aror_laba_set_pajak"></td>
                                        <td id="5_aror_penyusutan"></td>
                                        <td id="5_aror_aliran_kas_masuk"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- View Investasi -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">

                        <div class="mb-3">
                            <label for="rata_laba_setelah_pajak" class="form-label fw-bold">Rata-Rata Laba Setelah Pajak (EAT)</label>
                            <input type="text" class="form-control" id="rata_laba_setelah_pajak" name="rata_laba_setelah_pajak" disabled placeholder="Belum Ada Nilai">
                        </div>
                        <div class="mb-3">
                            <label for="investasi_awal" class="form-label fw-bold">Investasi Awal</label>
                            <input type="text" class="form-control" id="investasi_awal" name="investasi_awal" disabled placeholder="Belum Ada Nilai">
                        </div>
                        <div class="mb-3">
                            <label for="rata_investasi" class="form-label fw-bold">Rata-Rata Investasi</label>
                            <input type="text" class="form-control" id="rata_investasi" name="rata_investasi" disabled placeholder="Belum Ada Nilai">
                        </div>
                        <div class="mb-3">
                            <label for="arr_initial_investment" class="form-label fw-bold">ARR - Initial Investment</label>
                            <input type="text" class="form-control" id="arr_initial_investment" name="arr_initial_investment" disabled placeholder="Belum Ada Nilai">
                        </div>
                        <div class="mb-3">
                            <label for="arr_average_investment" class="form-label fw-bold">ARR - Average Investment</label>
                            <input type="text" class="form-control" id="arr_average_investment" name="arr_average_investment" disabled placeholder="Belum Ada Nilai">
                        </div>
                    </div>

                    <!-- Kesimpulan -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">
                        <h4 class="text-center text-primary mb-4">Kesimpulan Investasi</h4>

                        <div class="mb-3">
                            <input type="text" class="form-control text-center text-uppercase fw-bold"
                                id="aror_kesimpulan_investasi" name="aror_kesimpulan_investasi" disabled
                                placeholder="Investasi Layak / Investasi Tidak Layak">
                        </div>
                    </div>
                </div>

                <!-- Metode Payback Period -->
                <div class="tab-pane fade" id="metode-payback" role="tabpanel" aria-labelledby="metode-payback-tab">

                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">
                        <h4 class="text-center text-primary mb-4">Metode Payback Period</h4>

                        <div class="mb-3">
                            <label for="mpp_investasi" class="form-label fw-bold">Investasi</label>
                            <input type="text" class="form-control" id="mpp_investasi" name="mpp_investasi"
                                placeholder="Masukkan Nilai Investasi">
                        </div>

                        <div class="mb-3">
                            <label for="mpp_usia_ekonomis" class="form-label fw-bold">Usia Ekonomis</label>
                            <input type="text" class="form-control" id="mpp_usia_ekonomis" name="mpp_usia_ekonomis"
                                value="5 Tahun" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="mpp_suku_bunga" class="form-label fw-bold">Suku Bunga</label>
                            <input type="text" class="form-control" id="mpp_suku_bunga" name="mpp_suku_bunga"
                                placeholder="Masukkan Suku Bunga (%)">
                        </div>
                    </div>

                    <!-- Tabel Penyusutan Aktiva Tetap -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm text-center">
                        <h4 class="text-center text-primary mb-4">Aliran Kas</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>Laba Set. Pajak</th>
                                        <th>Penyusutan</th>
                                        <th>Aliran Kas Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="0_akhir_tahun">0</td>
                                        <td id="0_debet_penyusutan">0</td>
                                        <td id="0_kredit_akm_penyusutan">0</td>
                                        <td id="0_total_akm_penyusutan">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- View Metode Payback -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">

                        <div class="mb-3">
                            <label for="periode-payback" class="form-label fw-bold">Periode Payback</label>
                            <input type="text" class="form-control" id="periode-payback" name="periode-payback" disabled
                                placeholder="2 Tahun 10 Bulan">
                        </div>
                    </div>

                    <!-- Kesimpulan -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">
                        <h4 class="text-center text-primary mb-4">Kesimpulan Investasi</h4>

                        <div class="mb-3">
                            <input type="text" class="form-control text-center text-uppercase fw-bold"
                                id="mpp_kesimpulan_investasi" name="mpp_kesimpulan_investasi" disabled
                                placeholder="Investasi Layak Dijalankan / Investasi Tidak Layak Dijalankan">
                        </div>
                    </div>
                </div>

                <!-- Internal Rate of Return -->
                <div class="tab-pane fade" id="internal-ror-tab" role="tabpanel" aria-labelledby="internal-ror-tab">

                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">
                        <h4 class="text-center text-primary mb-4">Internal Rate of Return</h4>

                        <div class="mb-3">
                            <label for="iror_investasi" class="form-label fw-bold">Investasi</label>
                            <input type="text" class="form-control" id="iror_investasi" name="iror_investasi"
                                placeholder="Masukkan Nilai Investasi">
                        </div>

                        <div class="mb-3">
                            <label for="iror_usia_ekonomis" class="form-label fw-bold">Usia Ekonomis</label>
                            <input type="text" class="form-control" id="iror_usia_ekonomis" name="iror_usia_ekonomis"
                                value="5 Tahun" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="iror_suku_bunga" class="form-label fw-bold">Suku Bunga</label>
                            <input type="text" class="form-control" id="iror_suku_bunga" name="iror_suku_bunga"
                                placeholder="Masukkan Suku Bunga (%)">
                        </div>
                    </div>

                    <!-- Aliran Kas -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm text-center">
                        <h4 class="text-center text-primary mb-4">Aliran Kas</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>Laba Set. Pajak</th>
                                        <th>Penyusutan</th>
                                        <th>Aliran Kas Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="0_akhir_tahun">0</td>
                                        <td id="0_debet_penyusutan">0</td>
                                        <td id="0_kredit_akm_penyusutan">0</td>
                                        <td id="0_total_akm_penyusutan">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- View IRR -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">

                        <div class="mb-3">
                            <label for="internal_ror" class="form-label fw-bold">Internal Rate of Return (IRR)</label>
                            <input type="text" class="form-control" id="internal_ror" name="internal_ror" disabled
                                placeholder="26.36%">
                        </div>
                    </div>

                    <!-- Kesimpulan -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">
                        <h4 class="text-center text-primary mb-4">Kesimpulan Investasi</h4>

                        <div class="mb-3">
                            <input type="text" class="form-control text-center text-uppercase fw-bold"
                                id="iror_kesimpulan_investasi" name="iror_kesimpulan_investasi" disabled
                                placeholder="Investasi Layak Dijalankan / Investasi Tidak Layak Dijalankan">
                        </div>
                    </div>
                </div>

                <!-- Modified Internal Rate of Return -->
                <div class="tab-pane fade" id="modified-irr" role="tabpanel" aria-labelledby="modified-irr-tab">

                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">
                        <h4 class="text-center text-primary mb-4">Modified Internal Rate of Return</h4>

                        <div class="mb-3">
                            <label for="miror_investasi" class="form-label fw-bold">Investasi</label>
                            <input type="text" class="form-control" id="miror_investasi" name="miror_investasi"
                                placeholder="Masukkan Nilai Investasi">
                        </div>

                        <div class="mb-3">
                            <label for="miror_usia_ekonomis" class="form-label fw-bold">Usia Ekonomis</label>
                            <input type="text" class="form-control" id="miror_usia_ekonomis" name="miror_usia_ekonomis"
                                value="5 Tahun" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="miror_suku_bunga" class="form-label fw-bold">Suku Bunga</label>
                            <input type="text" class="form-control" id="miror_suku_bunga" name="miror_suku_bunga"
                                placeholder="Masukkan Suku Bunga (%)">
                        </div>
                    </div>

                    <!-- Aliran Kas -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm text-center">
                        <h4 class="text-center text-primary mb-4">Aliran Kas</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>Laba Set. Pajak</th>
                                        <th>Penyusutan</th>
                                        <th>Aliran Kas Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="0_akhir_tahun">0</td>
                                        <td id="0_debet_penyusutan">0</td>
                                        <td id="0_kredit_akm_penyusutan">0</td>
                                        <td id="0_total_akm_penyusutan">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- View MIRR -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">
                        <div class="mb-3">
                            <label for="reinvest" class="form-label fw-bold">Re-investment Rate</label>
                            <input type="text" class="form-control" id="reinvest" name="reinvest" disabled
                                placeholder="12.50%">
                        </div>

                        <div class="mb-3">
                            <label for="mirr" class="form-label fw-bold">Modified Internal Rate of Return/MIRR</label>
                            <input type="text" class="form-control" id="mirr" name="mirr" disabled placeholder="19.88%">
                        </div>
                    </div>

                    <!-- Kesimpulan -->
                    <div class="col-md-10 mx-auto mt-4 p-4 rounded shadow-sm">
                        <h4 class="text-center text-primary mb-4">Kesimpulan Investasi</h4>

                        <div class="mb-3">
                            <input type="text" class="form-control text-center text-uppercase fw-bold"
                                id="miror_kesimpulan_investasi" name="miror_kesimpulan_investasi" disabled
                                placeholder="Investasi Layak / Investasi Tidak Layak">
                        </div>
                    </div>
                </div>


            </div> <!-- End of Tab Content -->
        </div>
    </div> <!-- End of Member Details -->
</div> <!-- End of Container -->

<script>
    function formatNumber(input) {
        let value = input.value.replace(/\./g, '');
        value = value.replace(/\D/g, '');
        input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    function formatPembelianAktivaTetap(input) {
        formatNumber(input);
        document.getElementById('dfi_harga_perolehan').value = input.value;
        document.getElementById('pat_harga_perolehan').value = input.value;
        document.getElementById('0_nilai_buku_aktiva').innerText = input.value;
    }

    function formatNilaiSisa(input) {
        formatNumber(input);
        document.getElementById('pat_nilai_sisa').value = input.value;
    }

    function updateInvestmentTotal() {
        const aktivaTetap = parseFloat(document.getElementById('pembelian_aktiva_tetap').value.replace(/\./g, '')) || 0;
        const modalKerja = parseFloat(document.getElementById('kebutuhan_modal_kerja').value.replace(/\./g, '')) || 0;

        // Calculate the sum
        const total = aktivaTetap + modalKerja;

        // Display formatted result in `aror_investasi`
        document.getElementById('aror_investasi').value = total.toLocaleString("id-ID");
        document.getElementById('investasi_awal').value = total.toLocaleString("id-ID");

        const totalAverage = total / 2;

        document.getElementById('rata_investasi').value = totalAverage.toLocaleString("id-ID");
    }

    function eat(input, year) {
        formatNumber(input);
        document.getElementById(`${year}_aror_laba_set_pajak`).innerText = input.value;
    }

    function calculateDepreciation() {
        const metode = document.getElementById('metode_penyusutan').value;
        const hargaPerolehan = parseFloat(document.getElementById('pat_harga_perolehan').value.replace(/\./g, ''));
        const nilaiSisa = parseFloat(document.getElementById('pat_nilai_sisa').value.replace(/\./g, ''));

        if (metode === "garis_lurus" && !isNaN(hargaPerolehan) && !isNaN(nilaiSisa)) {
            // Menghitung depresiasi tahunan dengan metode garis lurus
            const depresiasiTahunan = Math.round((hargaPerolehan - nilaiSisa) / 5);
            let totalEatValue = 0; // Variabel untuk menyimpan total EAT

            // Loop untuk menghitung dan menampilkan depresiasi, akumulasi penyusutan, dan nilai buku aktiva tiap tahun
            for (let tahun = 1; tahun <= 5; tahun++) {
                // Mendapatkan nilai EAT (Earnings After Tax) dari input dan menghitung aliran kas masuk
                const eatValue = parseFloat(document.getElementById(`eat_${tahun}`).value.replace(/\./g, '')) || 0;
                totalEatValue += eatValue; // Menambahkan eatValue ke total

                const aliranKasMasuk = (tahun === 5) ? eatValue + depresiasiTahunan + nilaiSisa : eatValue + depresiasiTahunan;

                // Menampilkan nilai aliran kas masuk
                document.getElementById(`${tahun}_aror_aliran_kas_masuk`).innerText = aliranKasMasuk.toLocaleString("id-ID");

                // Menampilkan nilai depresiasi tahunan
                document.getElementById(`${tahun}_debet_penyusutan`).innerText = depresiasiTahunan.toLocaleString("id-ID");
                document.getElementById(`${tahun}_kredit_akm_penyusutan`).innerText = depresiasiTahunan.toLocaleString("id-ID");
                document.getElementById(`${tahun}_aror_penyusutan`).innerText = depresiasiTahunan.toLocaleString("id-ID");

                // Menghitung dan menampilkan akumulasi penyusutan
                const totalAkumulasiPenyusutan = depresiasiTahunan * tahun;
                document.getElementById(`${tahun}_total_akm_penyusutan`).innerText = totalAkumulasiPenyusutan.toLocaleString("id-ID");

                // Menghitung dan menampilkan nilai buku aktiva
                const nilaiBukuAktiva = hargaPerolehan - totalAkumulasiPenyusutan;
                document.getElementById(`${tahun}_nilai_buku_aktiva`).innerText = nilaiBukuAktiva.toLocaleString("id-ID");
            }
            // Menghitung rata-rata EAT
            const averageEatValue = totalEatValue / 5;
            // Menampilkan rata-rata EAT di elemen dengan id "rata_laba_setelah_pajak"
            document.getElementById("rata_laba_setelah_pajak").value = averageEatValue.toLocaleString("id-ID");

            const aktivaTetap = parseFloat(document.getElementById('pembelian_aktiva_tetap').value.replace(/\./g, '')) || 0;
            const modalKerja = parseFloat(document.getElementById('kebutuhan_modal_kerja').value.replace(/\./g, '')) || 0;
            const total = aktivaTetap + modalKerja;
            const initialInvestment = (averageEatValue / total) * 100; // Mengubah ke persentase
            const roundedInvestment = initialInvestment.toFixed(2); // Membulatkan ke dua desimal
            document.getElementById("arr_initial_investment").value = parseFloat(roundedInvestment).toLocaleString("id-ID") + "%";

            const totalAverage = total / 2;
            const averageInvestment = (averageEatValue / totalAverage) * 100;
            const roundedAverage = averageInvestment.toFixed(2);
            document.getElementById('arr_average_investment').value = parseFloat(roundedAverage).toLocaleString("id-ID") + "%";
        } else if (metode === "angka_tahun" && !isNaN(hargaPerolehan) && !isNaN(nilaiSisa)) {
            // Faktor depresiasi berdasarkan tahun (metode angka tahun)
            const depreciationFactors = [5, 4, 3, 2, 1];
            const totalDepreciableValue = hargaPerolehan - nilaiSisa;

            // Loop untuk menghitung dan menampilkan nilai depresiasi, akumulasi penyusutan, dan nilai buku aktiva tiap tahun
            let accumulatedDepreciation = 0;
            let bookValue = hargaPerolehan;
            let totalEatValue = 0;

            depreciationFactors.forEach((factor, index) => {
                const tahun = index + 1;

                // Menghitung nilai depresiasi berdasarkan faktor tahun
                const depreciation = Math.round((factor / 15) * totalDepreciableValue);

                // Mendapatkan nilai EAT (Earnings After Tax) dari input dan menghitung aliran kas masuk
                const eatValue = parseFloat(document.getElementById(`eat_${tahun}`).value.replace(/\./g, '')) || 0;
                totalEatValue += eatValue;
                const aliranKasMasuk = (tahun === 5) ? eatValue + depreciation + nilaiSisa : eatValue + depreciation;

                // Menampilkan nilai aliran kas masuk
                document.getElementById(`${tahun}_aror_aliran_kas_masuk`).innerText = aliranKasMasuk.toLocaleString("id-ID");

                // Menampilkan nilai depresiasi untuk tahun tertentu
                document.getElementById(`${tahun}_debet_penyusutan`).innerText = depreciation.toLocaleString("id-ID");
                document.getElementById(`${tahun}_kredit_akm_penyusutan`).innerText = depreciation.toLocaleString("id-ID");
                document.getElementById(`${tahun}_aror_penyusutan`).innerText = depreciation.toLocaleString("id-ID");

                // Mengupdate akumulasi penyusutan
                accumulatedDepreciation += depreciation;
                document.getElementById(`${tahun}_total_akm_penyusutan`).innerText = accumulatedDepreciation.toLocaleString("id-ID");

                // Menghitung dan menampilkan nilai buku aktiva setelah penyusutan
                bookValue -= depreciation;
                document.getElementById(`${tahun}_nilai_buku_aktiva`).innerText = bookValue.toLocaleString("id-ID");
            });
            const averageEatValue = totalEatValue / 5;
            document.getElementById("rata_laba_setelah_pajak").value = averageEatValue.toLocaleString("id-ID");

            const aktivaTetap = parseFloat(document.getElementById('pembelian_aktiva_tetap').value.replace(/\./g, '')) || 0;
            const modalKerja = parseFloat(document.getElementById('kebutuhan_modal_kerja').value.replace(/\./g, '')) || 0;
            const total = aktivaTetap + modalKerja;
            const initialInvestment = (averageEatValue / total) * 100;
            const roundedInvestment = initialInvestment.toFixed(2);
            document.getElementById("arr_initial_investment").value = parseFloat(roundedInvestment).toLocaleString("id-ID") + "%";

            const totalAverage = total / 2;
            const averageInvestment = (averageEatValue / totalAverage) * 100;
            const roundedAverage = averageInvestment.toFixed(2);
            document.getElementById('arr_average_investment').value = parseFloat(roundedAverage).toLocaleString("id-ID") + "%";
        } else if (metode === "saldo_menurun" && !isNaN(hargaPerolehan) && !isNaN(nilaiSisa)) {
            // Faktor depresiasi per tahun menggunakan metode saldo menurun
            const depreciationRate = 0.369;
            const years = 5; // Jumlah tahun depresiasi
            let accumulatedDepreciation = 0;
            let bookValue = hargaPerolehan;
            let totalEatValue = 0;

            // Loop untuk menghitung dan menampilkan nilai depresiasi, akumulasi penyusutan, dan nilai buku aktiva tiap tahun
            for (let i = 1; i <= years; i++) {
                // Menghitung nilai depresiasi untuk tahun ke-i
                const depreciation = Math.round(bookValue * depreciationRate);

                // Mendapatkan nilai EAT (Earnings After Tax) dari input dan menghitung aliran kas masuk
                const eatValue = parseFloat(document.getElementById(`eat_${i}`).value.replace(/\./g, '')) || 0;
                totalEatValue += eatValue;
                const aliranKasMasuk = (i === years) ? eatValue + depreciation + nilaiSisa : eatValue + depreciation;

                // Menampilkan nilai aliran kas masuk
                document.getElementById(`${i}_aror_aliran_kas_masuk`).innerText = aliranKasMasuk.toLocaleString("id-ID");

                // Menampilkan nilai depresiasi untuk tahun ke-i
                document.getElementById(`${i}_debet_penyusutan`).innerText = depreciation.toLocaleString("id-ID");
                document.getElementById(`${i}_kredit_akm_penyusutan`).innerText = depreciation.toLocaleString("id-ID");
                document.getElementById(`${i}_aror_penyusutan`).innerText = depreciation.toLocaleString("id-ID");

                // Mengupdate akumulasi penyusutan
                accumulatedDepreciation += depreciation;
                document.getElementById(`${i}_total_akm_penyusutan`).innerText = accumulatedDepreciation.toLocaleString("id-ID");

                // Menghitung dan menampilkan nilai buku aktiva setelah penyusutan
                bookValue -= depreciation;
                document.getElementById(`${i}_nilai_buku_aktiva`).innerText = bookValue.toLocaleString("id-ID");
            }
            const averageEatValue = totalEatValue / 5;
            document.getElementById("rata_laba_setelah_pajak").value = averageEatValue.toLocaleString("id-ID");

            const aktivaTetap = parseFloat(document.getElementById('pembelian_aktiva_tetap').value.replace(/\./g, '')) || 0;
            const modalKerja = parseFloat(document.getElementById('kebutuhan_modal_kerja').value.replace(/\./g, '')) || 0;
            const total = aktivaTetap + modalKerja;
            const initialInvestment = (averageEatValue / total) * 100;
            const roundedInvestment = initialInvestment.toFixed(2);
            document.getElementById("arr_initial_investment").value = parseFloat(roundedInvestment).toLocaleString("id-ID") + "%";

            const totalAverage = total / 2;
            const averageInvestment = (averageEatValue / totalAverage) * 100;
            const roundedAverage = averageInvestment.toFixed(2);
            document.getElementById('arr_average_investment').value = parseFloat(roundedAverage).toLocaleString("id-ID") + "%";
        }
    }
</script>

<?= $this->endSection(); ?>
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
                            <label for="pembelian_aktiva_tetap" class="form-label fw-bold">Pembelian Aktiva Tetap</label>
                            <input type="text" class="form-control" id="pembelian_aktiva_tetap" name="pembelian_aktiva_tetap" placeholder="Masukkan Jumlah Pembelian Aktiva Tetap" oninput="formatPembelianAktivaTetap(this)">
                        </div>

                        <div class="mb-3">
                            <label for="kebutuhan_modal_kerja" class="form-label fw-bold">Kebutuhan Modal Kerja</label>
                            <input type="text" class="form-control" id="kebutuhan_modal_kerja" name="kebutuhan_modal_kerja" placeholder="Masukkan Kebutuhan Modal Kerja" oninput="formatNumber(this)">
                        </div>

                        <div class="mb-3">
                            <label for="usia_ekonomis" class="form-label fw-bold">Usia Ekonomis</label>
                            <input type="text" class="form-control" id="usia_ekonomis" name="usia_ekonomis" value="5 Tahun" disabled>
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
                                            <input type="text" class="form-control" name="tahun1[]" placeholder="Masukkan Prediksi" oninput="formatNumber(this)">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="tahun2[]" placeholder="Masukkan Prediksi" oninput="formatNumber(this)">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="tahun3[]" placeholder="Masukkan Prediksi" oninput="formatNumber(this)">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="tahun4[]" placeholder="Masukkan Prediksi" oninput="formatNumber(this)">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="tahun5[]" placeholder="Masukkan Prediksi" oninput="formatNumber(this)">
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
                                <label for="dfi_harga_perolehan" class="form-label fw-bold">Harga Perolehan (Cost)</label>
                                <input type="text" class="form-control" id="dfi_harga_perolehan" name="dfi_harga_perolehan" disabled placeholder="Mengikuti Pembelian Aktiva Tetap">
                            </div>
                            <div class="mb-3">
                                <label for="dfi_nilai_sisa" class="form-label fw-bold">Nilai Sisa (Salvage)</label>
                                <input type="text" class="form-control" id="dfi_nilai_sisa" name="dfi_nilai_sisa" placeholder="Masukkan Nilai Sisa" oninput="formatNilaiSisa(this)">
                            </div>
                            <div class="mb-3">
                                <label for="dfi_umur_ekonomis" class="form-label fw-bold">Umur Ekonomis (Life)</label>
                                <input type="text" class="form-control" id="dfi_umur_ekonomis" name="dfi_umur_ekonomis" value="5 Tahun" disabled>
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
                                                    <input type="text" class="form-control" name="arr" placeholder="Masukkan ARR">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="payback" placeholder="Masukkan Payback">
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
                                                    <input type="text" class="form-control" name="arr_2" placeholder="Masukkan ARR (Baris 2)">
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
                            <select class="form-select" id="metode_penyusutan" name="metode_penyusutan" onchange="calculateDepreciation()">
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
                            <input type="text" class="form-control" id="pat_harga_perolehan" name="pat_harga_perolehan" disabled placeholder="Mengikuti Pembelian Aktiva Tetap">
                        </div>

                        <div class="mb-3">
                            <label for="pat_nilai_sisa" class="form-label fw-bold">Nilai Sisa (Salvage)</label>
                            <input type="text" class="form-control" id="pat_nilai_sisa" name="pat_nilai_sisa" disabled placeholder="Mengikuti Nilai Sisa Di Data Finansial Investasi">
                        </div>

                        <div class="mb-3">
                            <label for="pat_umur_ekonomis" class="form-label fw-bold">Umur Ekonomis (Life)</label>
                            <input type="text" class="form-control" id="pat_umur_ekonomis" name="pat_umur_ekonomis" value="5 Tahun" disabled>
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

    function calculateDepreciation() {
        const metode = document.getElementById('metode_penyusutan').value;
        const hargaPerolehan = parseFloat(document.getElementById('pat_harga_perolehan').value.replace(/\./g, ''));
        const nilaiSisa = parseFloat(document.getElementById('pat_nilai_sisa').value.replace(/\./g, ''));

        if (metode === "garis_lurus" && !isNaN(hargaPerolehan) && !isNaN(nilaiSisa)) {
            // Menghitung nilai depresiasi tahunan dengan metode garis lurus
            const depreciationPerYear = (hargaPerolehan - nilaiSisa) / 5;

            // Loop untuk menghitung dan menampilkan nilai depresiasi, akumulasi penyusutan, dan nilai buku aktiva tiap tahun
            for (let year = 1; year <= 5; year++) {
                // Membulatkan nilai depresiasi tahunan
                const roundedDepreciation = Math.round(depreciationPerYear);

                // Menampilkan nilai depresiasi tahunan
                document.getElementById(`${year}_debet_penyusutan`).innerText = roundedDepreciation.toLocaleString("id-ID");
                document.getElementById(`${year}_kredit_akm_penyusutan`).innerText = roundedDepreciation.toLocaleString("id-ID");

                // Menghitung dan menampilkan akumulasi penyusutan sampai tahun berjalan
                const accumulatedDepreciation = Math.round(depreciationPerYear * year);
                document.getElementById(`${year}_total_akm_penyusutan`).innerText = accumulatedDepreciation.toLocaleString("id-ID");

                // Menghitung dan menampilkan nilai buku aktiva setelah penyusutan
                const bookValue = Math.round(hargaPerolehan - accumulatedDepreciation);
                document.getElementById(`${year}_nilai_buku_aktiva`).innerText = bookValue.toLocaleString("id-ID");
            }
        } else if (metode === "angka_tahun" && !isNaN(hargaPerolehan) && !isNaN(nilaiSisa)) {
            // Faktor depresiasi berdasarkan tahun (metode angka tahun)
            const depreciationFactors = [5, 4, 3, 2, 1];
            const totalDepreciableValue = hargaPerolehan - nilaiSisa;

            // Loop untuk menghitung dan menampilkan nilai depresiasi, akumulasi penyusutan, dan nilai buku aktiva tiap tahun
            let accumulatedDepreciation = 0;
            let bookValue = hargaPerolehan;

            depreciationFactors.forEach((factor, index) => {
                // Menghitung nilai depresiasi berdasarkan faktor tahun
                const depreciation = Math.round((factor / 15) * totalDepreciableValue);

                // Menampilkan nilai depresiasi untuk tahun tertentu
                document.getElementById(`${index + 1}_debet_penyusutan`).innerText = depreciation.toLocaleString("id-ID");
                document.getElementById(`${index + 1}_kredit_akm_penyusutan`).innerText = depreciation.toLocaleString("id-ID");

                // Mengupdate akumulasi penyusutan
                accumulatedDepreciation += depreciation;
                document.getElementById(`${index + 1}_total_akm_penyusutan`).innerText = accumulatedDepreciation.toLocaleString("id-ID");

                // Menghitung dan menampilkan nilai buku aktiva setelah penyusutan
                bookValue -= depreciation;
                document.getElementById(`${index + 1}_nilai_buku_aktiva`).innerText = bookValue.toLocaleString("id-ID");
            });
        } else if (metode === "saldo_menurun" && !isNaN(hargaPerolehan) && !isNaN(nilaiSisa)) {
            // Faktor depresiasi per tahun menggunakan metode saldo menurun
            const depreciationRate = 0.369;
            const years = 5; // Jumlah tahun depresiasi
            let accumulatedDepreciation = 0;
            let bookValue = hargaPerolehan;

            // Loop untuk menghitung dan menampilkan nilai depresiasi, akumulasi penyusutan, dan nilai buku aktiva tiap tahun
            for (let i = 1; i <= years; i++) {
                // Menghitung nilai depresiasi untuk tahun ke-i
                const depreciation = Math.round(bookValue * depreciationRate);

                // Menampilkan nilai depresiasi untuk tahun ke-i
                document.getElementById(`${i}_debet_penyusutan`).innerText = depreciation.toLocaleString("id-ID");
                document.getElementById(`${i}_kredit_akm_penyusutan`).innerText = depreciation.toLocaleString("id-ID");

                // Mengupdate akumulasi penyusutan
                accumulatedDepreciation += depreciation;
                document.getElementById(`${i}_total_akm_penyusutan`).innerText = accumulatedDepreciation.toLocaleString("id-ID");

                // Menghitung dan menampilkan nilai buku aktiva setelah penyusutan
                bookValue -= depreciation;
                document.getElementById(`${i}_nilai_buku_aktiva`).innerText = bookValue.toLocaleString("id-ID");
            }
        }
    }
</script>

<?= $this->endSection(); ?>
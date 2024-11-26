<?= $this->extend('premium/layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    /* Custom style for the result */
    .result-harga-exwork,
    .result-harga-fob,
    .result-harga-cfr,
    .result-harga-cif {
        color: red;
        /* Set text color to red */
        font-size: 1.5em;
        /* Increase font size */
    }


    /* Initially hide the submit button and komponen container */
    #komponenExworkContainer,
    #komponenFOBContainer,
    #komponenCFRContainer,
    #komponenCIFContainer,
    #submitKomponenExworkButton,
    #submitKomponenFOBButton,
    #submitKomponenCFRButton,
    #submitKomponenCIFButton {
        display: none;
    }

    /* Membuat tabel bisa digeser ke kanan jika kolomnya terlalu panjang */
    .table-responsive {
        overflow-x: auto;
        width: 100%;
    }

    .table {
        min-width: 500px;
        /* Menjaga agar tabel tetap panjang */
    }

    .nav-link {
        font-weight: 600;
    }

    .form-group {
        margin-bottom: 20px;
        /* Menambah jarak antar field */
    }

    .btn-custom {
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
</style>

<!-- judul -->
<div class="py-5" style="text-align: center;">
    <h2 class="text-custom-title">Kalkulator Ekspor</h2>
    <p class="text-custom-paragraph mt-2">Berikut aplikasi Kalkulator Ekspor Indonesia</p>
</div>

<div class="container py-2 mt-3">
    <div class="form-group mb-3">
        <label for="ukuran_kontainer">Ukuran Kontainer:</label>
        <div class="input-group">
            <select required class="form-control" id="ukuran_kontainer" name="ukuran_kontainer">
                <option value="">Pilih Ukuran Kontainer</option>
                <option value="20 Feet">20 Feet</option>
                <option value="40 Feet">40 Feet</option>
                <option value="40 Feet HC">40 Feet HC</option>
                <option value="45 Feet HC">45 Feet HC</option>
            </select>
        </div>
    </div>

    <form action="<?= base_url('/ganti-satuan-premium/' . $satuan[0]['id_satuan']); ?>" method="post"
        enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="satuan">Satuan:</label>
            <div class="input-group">
                <input required type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan"
                    value="<?= $satuan[0]['satuan']; ?>" autocomplete="off" disabled>
                <div class="input-group-prepend">
                    <button id="editButton" type="button" class="btn btn-custom"
                        style="margin-left: 20px; background-color:#FFA500">Edit
                        Satuan</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Exwork Form -->
    <div class="card shadow p-4">
        <h1 class="text-center mb-4" id="exwork">Exwork Form</h1>

        <!-- Input Jumlah Barang -->
        <div class="form-group">
            <div class="col-md-6">
                <label id="jumlahBarangLabel" for="jumlahBarang">Jumlah Barang Dalam 1 Kontainer:</label>
                <div class="input-group">
                    <input required type="text" class="form-control" id="jumlahBarang" name="jumlahBarang"
                        placeholder="Masukkan Jumlah Barang" autocomplete="off">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?= $satuan[0]['satuan']; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input HPP -->
        <div class="form-group">
            <div class="col-md-6">
                <label for="hpp">Harga Pokok Produksi (HPP):</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input required type="text" class="form-control" id="hpp" name="hpp"
                        placeholder="Masukkan Biaya HPP" autocomplete="off">
                    <div class="input-group-prepend">
                        <span class="input-group-text">/ <?= $satuan[0]['satuan']; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Keuntungan -->
        <div class="form-group">
            <div class="col-md-6">
                <label for="keuntungan">Keuntungan:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input required type="text" class="form-control" id="keuntungan" name="keuntungan"
                        placeholder="Masukkan Biaya Keuntungan" autocomplete="off">
                    <div class="input-group-prepend">
                        <span class="input-group-text">/ <?= $satuan[0]['satuan']; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel untuk menampilkan komponen Exwork -->
        <p class="text-danger mt-2">*<i>Komponen Exwork (Sesuaikan dengan kebutuhan)</i></p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center w-25">Komponen</th>
                        <th>Biaya (Rp.)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($exwork)): ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada Komponen Exwork yang ditambahkan.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($exwork as $index => $item): ?>
                            <tr>
                                <td class="text-center"><?= $index + 1 ?></td>
                                <td><?= $item['komponen_exwork'] ?></td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input required type="text" class="form-control" id="exwork_<?= $item['id_exwork'] ?>"
                                            name="exwork_<?= $item['id_exwork'] ?>"
                                            placeholder="Masukkan <?= $item['komponen_exwork'] ?>" autocomplete="off">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('/komponen-exwork-premium/delete/' . $item['id_exwork']) ?>"
                                        class="btn btn-outline-danger btn-sm align-center">
                                        <i class="bi bi-x-lg"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <tr>
                        <td colspan="4" class="text-center">
                            <form action="<?= base_url('/komponen-exwork-premium/add'); ?>" method="post"
                                enctype="multipart/form-data">
                                <button type="button" class="btn btn-custom mb-2" style="background-color: #03AADE;"
                                    id="tambahKolomExwork">Tambah
                                    Komponen Baru</button>
                                <div id="komponenExworkContainer"></div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-custom" style="background-color: #77DD77;"
                                        id="submitKomponenExworkButton">Simpan
                                        Komponen (0)</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between">
            <h3 class="result-harga-exwork mt-2">Harga Exwork: <?php if (session()->getFlashdata('harga_exwork')): ?>
                    <?= session()->getFlashdata('harga_exwork') ?> <?php endif; ?>
            </h3>
        </div>

        <hr class="mt-2" style="border: 1px solid black; background-color: black;">
    </div>

    <!-- FOB -->
    <div class="card shadow p-4 mt-4" id="fob">
        <h1 class="text-center mb-4">FOB Form</h1>

        <div class="form-group">
            <div class="col-md-6">
                <label for="hargaExwork">Harga Exwork:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input required type="text" class="form-control" id="hargaExwork" name="hargaExwork"
                        placeholder="Masukkan Harga Exwork" autocomplete="off">
                    <div class="input-group-prepend">
                        <span class="input-group-text">/ <?= $satuan[0]['satuan']; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel untuk menampilkan komponen FOB -->
        <p class="text-danger">*<i>Komponen FOB (Sesuaikan dengan kebutuhan)</i></p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-light">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center w-25">Komponen</th>
                        <th>Biaya (Rp.)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($fob)): ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada Komponen FOB yang ditambahkan.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($fob as $index => $item): ?>
                            <tr>
                                <td class="text-center"><?= $index + 1 ?></td>
                                <td><?= $item['komponen_fob'] ?></td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input required type="text" class="form-control" id="fob_<?= $item['id_fob'] ?>"
                                            name="fob_<?= $item['id_fob'] ?>"
                                            placeholder="Masukkan <?= $item['komponen_fob'] ?>" autocomplete="off">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('/komponen-fob-premium/delete/' . $item['id_fob']) ?>"
                                        class="btn btn-outline-danger btn-sm align-center">
                                        <i class="bi bi-x-lg"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <tr>
                        <td colspan="4" class="text-center">
                            <form action="<?= base_url('/komponen-fob-premium/add'); ?>" method="post"
                                enctype="multipart/form-data">
                                <button type="button" class="btn btn-custom mb-2" style="background-color: #03AADE;"
                                    id="tambahKolomFOB">Tambah Komponen
                                    Baru</button>
                                <div id="komponenFOBContainer"></div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-custom" style="background-color: #77DD77;"
                                        id="submitKomponenFOBButton">Simpan
                                        Komponen (0)</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between">
            <h3 class="result-harga-fob mt-2">Harga FOB: </h3>
        </div>

        <!-- Divider -->
        <hr class="mt-2" style="border: 1px solid black; background-color: black;">
    </div>

    <div class="mt-4">
        <!-- CFR Form -->
        <div class="card shadow p-4 mb-4" id="cfr">
            <h1 class="text-center mb-4">CFR Form</h1>

            <div class="form-group">
                <div class="col-md-6">
                    <label for="hargaFOB">Harga FOB:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input required type="text" class="form-control" id="hargaFOB" name="hargaFOB"
                            placeholder="Masukkan Harga FOB" autocomplete="off">
                        <div class="input-group-prepend">
                            <span class="input-group-text">/ <?= $satuan[0]['satuan']; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel untuk menampilkan komponen CFR -->
            <p class="text-danger">*<i>Komponen CFR (Sesuaikan dengan kebutuhan)</i></p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center w-25">Komponen</th>
                            <th>Biaya (Rp.)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($cfr)): ?>
                            <tr>
                                <td colspan="4" class="text-center">Belum ada Komponen CFR yang ditambahkan.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($cfr as $index => $item): ?>
                                <tr>
                                    <td class="text-center"><?= $index + 1 ?></td>
                                    <td><?= $item['komponen_cfr'] ?></td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input required type="text" class="form-control" id="cfr_<?= $item['id_cfr'] ?>"
                                                name="cfr_<?= $item['id_cfr'] ?>"
                                                placeholder="Masukkan <?= $item['komponen_cfr'] ?>" autocomplete="off">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('/komponen-cfr-premium/delete/' . $item['id_cfr']) ?>"
                                            class="btn btn-outline-danger btn-sm align-center">
                                            <i class="bi bi-x-lg"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                            <td colspan="4" class="text-center">
                                <form action="<?= base_url('/komponen-cfr-premium/add'); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <button type="button" class="btn btn-custom mb-2" style="background-color:#03AADE;"
                                        id="tambahKolomCFR">Tambah
                                        Komponen Baru</button>
                                    <div id="komponenCFRContainer"></div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-custom" style="background-color:#77DD77;"
                                            id="submitKomponenCFRButton">Simpan
                                            Komponen (0)</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between">
                <h3 class="result-harga-cfr mt-2">Harga CFR: </h3>
            </div>

            <hr class="mt-2" style="border: 1px solid black; background-color: black;">
        </div>
    </div>

    <!-- CIF Form -->
    <div class="mt-4">
        <div class="card shadow p-4 mb-4" id="cif">
            <h1 class="text-center mb-4">CIF Form</h1>

            <div class="form-group">
                <div class="col-md-6">
                    <label for="hargaCFR">Harga CFR:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input required type="text" class="form-control" id="hargaCFR" name="hargaCFR"
                            placeholder="Masukkan Harga CFR" autocomplete="off">
                        <div class="input-group-prepend">
                            <span class="input-group-text">/ <?= $satuan[0]['satuan']; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel untuk menampilkan komponen CIF -->
            <p class="text-danger">*<i>Komponen CIF (Sesuaikan dengan kebutuhan)</i></p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center w-25">Komponen</th>
                            <th>Biaya (Rp.)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($cif)): ?>
                            <tr>
                                <td colspan="4" class="text-center">Belum ada Komponen CIF yang ditambahkan.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($cif as $index => $item): ?>
                                <tr>
                                    <td class="text-center"><?= $index + 1 ?></td>
                                    <td><?= $item['komponen_cif'] ?></td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input required type="text" class="form-control" id="cif_<?= $item['id_cif'] ?>"
                                                name="cif_<?= $item['id_cif'] ?>"
                                                placeholder="Masukkan <?= $item['komponen_cif'] ?>" autocomplete="off">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('/komponen-cif-premium/delete/' . $item['id_cif']) ?>"
                                            class="btn btn-outline-danger btn-sm align-center">
                                            <i class="bi bi-x-lg"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                            <td colspan="4" class="text-center">
                                <form action="<?= base_url('/komponen-cif-premium/add'); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <button type="button" class="btn btn-custom mb-2" style="background-color:#03AADE;"
                                        id="tambahKolomCIF">Tambah
                                        Komponen Baru</button>
                                    <div id="komponenCIFContainer"></div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-custom" style="background-color:#77DD77;"
                                            id="submitKomponenCIFButton">Simpan
                                            Komponen (0)</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between">
                <h3 class="result-harga-cif mt-2">Harga CIF: </h3>
            </div>

            <hr class="mt-2" style="border: 1px solid black; background-color: black;">
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Ketika dropdown berubah
    document.getElementById('ukuran_kontainer').addEventListener('change', function () {
        var selectedUkuran = this.value; // Ambil ukuran kontainer yang dipilih
        var label = document.getElementById('jumlahBarangLabel'); // Ambil elemen label

        // Jika ada ukuran yang dipilih, ubah label
        if (selectedUkuran) {
            label.textContent = 'Jumlah Barang Dalam 1 Kontainer ' + selectedUkuran + ':';
        } else {
            // Jika tidak ada ukuran yang dipilih, kembalikan ke teks awal
            label.textContent = 'Jumlah Barang Dalam 1 Kontainer:';
        }
    });

    document.getElementById('editButton').addEventListener('click', function () {
        // Enable the input field
        document.getElementById('satuan').disabled = false;

        // Change the button to a "Submit" button
        this.outerHTML = '<button type="submit" class="btn btn-custom" style="margin-left: 20px; background-color: #8FD14F">Simpan Satuan</button>';
    });

    // Format number to rupiah format (1.000.000)
    function formatRupiah(angka) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah;
    }

    // Dynamic Exwork price calculation
    function hitungExwork() {
        let jumlahBarang = document.getElementById('jumlahBarang').value.replace(/\./g, '');
        let hpp = document.getElementById('hpp').value.replace(/\./g, '');
        let keuntungan = document.getElementById('keuntungan').value.replace(/\./g, '');

        if (!jumlahBarang || !hpp || !keuntungan) {
            document.querySelector('.result-harga-exwork').innerText = 'Harga Exwork: ';
            return;
        }

        jumlahBarang = parseFloat(jumlahBarang);
        hpp = parseFloat(hpp);
        keuntungan = parseFloat(keuntungan);

        let jb_hpp_keuntungan = (hpp + keuntungan) * jumlahBarang;

        // Initialize exwork components sum
        let exworkLainnya = 0;

        <?php foreach ($exwork as $item): ?>
            let exworkValue<?= $item['id_exwork'] ?> = document.getElementById('exwork_<?= $item['id_exwork'] ?>').value.replace(/\./g, '');
            if (exworkValue<?= $item['id_exwork'] ?>) {
                exworkLainnya += parseFloat(exworkValue<?= $item['id_exwork'] ?>);
            }
        <?php endforeach; ?>

        // Calculate final exwork price
        let hargaExwork = (jb_hpp_keuntungan + exworkLainnya) / jumlahBarang;

        // Display formatted result
        document.querySelector('.result-harga-exwork').innerText = 'Harga Exwork: Rp. ' + formatRupiah(hargaExwork.toFixed(0)) + ' / <?= $satuan[0]['satuan']; ?>';
        document.getElementById('hargaExwork').value = formatRupiah(hargaExwork.toFixed(0)); // Set nilai ke input field
    }

    function hitungFOB() {
        let jumlahBarang = document.getElementById('jumlahBarang').value.replace(/\./g, '');
        let hargaExwork = document.getElementById('hargaExwork').value.replace(/\./g, '');

        if (!jumlahBarang || !hargaExwork) {
            document.querySelector('.result-harga-fob').innerText = 'Harga FOB: ';
            return;
        }

        jumlahBarang = parseFloat(jumlahBarang);
        hargaExwork = parseFloat(hargaExwork);

        let jb_he = hargaExwork * jumlahBarang;

        let fobLainnya = 0;

        <?php foreach ($fob as $item): ?>
            let fobValue<?= $item['id_fob'] ?> = document.getElementById('fob_<?= $item['id_fob'] ?>').value.replace(/\./g, '');
            if (fobValue<?= $item['id_fob'] ?>) {
                fobLainnya += parseFloat(fobValue<?= $item['id_fob'] ?>);
            }
        <?php endforeach; ?>

        let hargaFOB = (jb_he + fobLainnya) / jumlahBarang;

        document.querySelector('.result-harga-fob').innerText = 'Harga FOB: Rp. ' + formatRupiah(hargaFOB.toFixed(0)) + ' / <?= $satuan[0]['satuan']; ?>';
        document.getElementById('hargaFOB').value = formatRupiah(hargaFOB.toFixed(0));
    }

    function hitungCFR() {
        let jumlahBarang = document.getElementById('jumlahBarang').value.replace(/\./g, '');
        let hargaFOB = document.getElementById('hargaFOB').value.replace(/\./g, '');

        if (!jumlahBarang || !hargaFOB) {
            document.querySelector('.result-harga-cfr').innerText = 'Harga CFR: ';
            return;
        }

        jumlahBarang = parseFloat(jumlahBarang);
        hargaFOB = parseFloat(hargaFOB);

        let jb_hfob = hargaFOB * jumlahBarang;

        let cfrLainnya = 0;

        <?php foreach ($cfr as $item): ?>
            let cfrValue<?= $item['id_cfr'] ?> = document.getElementById('cfr_<?= $item['id_cfr'] ?>').value.replace(/\./g, '');
            if (cfrValue<?= $item['id_cfr'] ?>) {
                cfrLainnya += parseFloat(cfrValue<?= $item['id_cfr'] ?>);
            }
        <?php endforeach; ?>

        let hargaCFR = (jb_hfob + cfrLainnya) / jumlahBarang;

        document.querySelector('.result-harga-cfr').innerText = 'Harga CFR: Rp. ' + formatRupiah(hargaCFR.toFixed(0)) + ' / <?= $satuan[0]['satuan']; ?>';
        document.getElementById('hargaCFR').value = formatRupiah(hargaCFR.toFixed(0));
    }

    function hitungCIF() {
        let jumlahBarang = document.getElementById('jumlahBarang').value.replace(/\./g, '');
        let hargaCFR = document.getElementById('hargaCFR').value.replace(/\./g, '');

        if (!jumlahBarang || !hargaCFR) {
            document.querySelector('.result-harga-cif').innerText = 'Harga CIF: ';
            return;
        }

        jumlahBarang = parseFloat(jumlahBarang);
        hargaCFR = parseFloat(hargaCFR);

        let jb_hcfr = hargaCFR * jumlahBarang;

        let cifLainnya = 0;

        <?php foreach ($cif as $item): ?>
            let cifValue<?= $item['id_cif'] ?> = document.getElementById('cif_<?= $item['id_cif'] ?>').value.replace(/\./g, '');
            if (cifValue<?= $item['id_cif'] ?>) {
                cifLainnya += parseFloat(cifValue<?= $item['id_cif'] ?>);
            }
        <?php endforeach; ?>

        let hargaCIF = (jb_hcfr + cifLainnya) / jumlahBarang;

        document.querySelector('.result-harga-cif').innerText = 'Harga CIF: Rp. ' + formatRupiah(hargaCIF.toFixed(0)) + ' / <?= $satuan[0]['satuan']; ?>';
    }

    // Add listeners to inputs for dynamic calculation
    document.querySelectorAll('#jumlahBarang, #hpp, #keuntungan, #hargaExwork, #hargaFOB, #hargaCFR').forEach(function (element) {
        element.addEventListener('keyup', function (e) {
            e.target.value = formatRupiah(e.target.value); // Format as rupiah
            hitungExwork(); // Calculate Exwork
            hitungFOB();
            hitungCFR();
            hitungCIF();
        });
    });

    // Add event listeners to exwork component inputs
    <?php foreach ($exwork as $item): ?>
        document.getElementById('exwork_<?= $item['id_exwork'] ?>').addEventListener('keyup', function (e) {
            e.target.value = formatRupiah(e.target.value); // Format as rupiah
            hitungExwork(); // Calculate Exwork
            hitungFOB();
            hitungCFR();
            hitungCIF();
        });
    <?php endforeach; ?>

    <?php foreach ($fob as $item): ?>
        document.getElementById('fob_<?= $item['id_fob'] ?>').addEventListener('keyup', function (e) {
            e.target.value = formatRupiah(e.target.value);
            hitungFOB();
            hitungCFR();
            hitungCIF();
        });
    <?php endforeach; ?>

    <?php foreach ($cfr as $item): ?>
        document.getElementById('cfr_<?= $item['id_cfr'] ?>').addEventListener('keyup', function (e) {
            e.target.value = formatRupiah(e.target.value);
            hitungCFR();
            hitungCIF();
        });
    <?php endforeach; ?>

    <?php foreach ($cif as $item): ?>
        document.getElementById('cif_<?= $item['id_cif'] ?>').addEventListener('keyup', function (e) {
            e.target.value = formatRupiah(e.target.value);
            hitungCIF();
        });
    <?php endforeach; ?>

    function tambahKolomKomponen(idTambahKolom, idContainer, idSubmitButton, placeholderText, inputName) {
        document.getElementById(idTambahKolom).addEventListener('click', function () {
            // Tampilkan container dan tombol submit jika belum tampil
            document.getElementById(idContainer).style.display = 'block';
            document.getElementById(idSubmitButton).style.display = 'inline-block';

            // Buat elemen baru
            var newField = document.createElement('div');
            newField.classList.add('form-group');
            newField.classList.add('komponenRow');

            // Buat input field baru dengan tombol hapus
            newField.innerHTML = `
                    <div class="input-group">
                        <input required type="text" class="form-control" name="` + inputName + `[]" placeholder="Masukkan Komponen ` + placeholderText + `" autocomplete="off">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger btn-remove-komponen"><i class="bi bi-x-lg"></i></button>
                        </div>
                    </div>
                `;

            // Tambahkan ke container form
            document.getElementById(idContainer).appendChild(newField);

            // Update jumlah kolom
            updateJumlahKolom(idContainer, idSubmitButton);

            // Tambahkan event listener ke tombol hapus yang baru
            newField.querySelector('.btn-remove-komponen').addEventListener('click', function () {
                newField.remove();

                // Jika semua field dihapus, sembunyikan tombol submit dan container
                if (document.querySelectorAll('#' + idContainer + ' .komponenRow').length === 0) {
                    document.getElementById(idContainer).style.display = 'none';
                    document.getElementById(idSubmitButton).style.display = 'none';
                }

                // Update jumlah kolom
                updateJumlahKolom(idContainer, idSubmitButton);
            });
        });
    }

    // Function untuk update jumlah kolom komponen
    function updateJumlahKolom(idContainer, idSubmitButton) {
        var jumlahKolom = document.querySelectorAll('#' + idContainer + ' .komponenRow').length;

        // Update teks pada tombol Simpan Komponen
        document.getElementById(idSubmitButton).textContent = 'Simpan Komponen (' + jumlahKolom + ')';
    }

    // Panggil fungsi untuk Exwork dan FOB
    tambahKolomKomponen('tambahKolomExwork', 'komponenExworkContainer', 'submitKomponenExworkButton', 'Exwork', 'komponenExwork');
    tambahKolomKomponen('tambahKolomFOB', 'komponenFOBContainer', 'submitKomponenFOBButton', 'FOB', 'komponenFOB');
    tambahKolomKomponen('tambahKolomCFR', 'komponenCFRContainer', 'submitKomponenCFRButton', 'CFR', 'komponenCFR');
    tambahKolomKomponen('tambahKolomCIF', 'komponenCIFContainer', 'submitKomponenCIFButton', 'CIF', 'komponenCIF');
</script>

<?= $this->endSection(); ?>
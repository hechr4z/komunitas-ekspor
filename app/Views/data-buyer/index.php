<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    .custom-tab {
        color: #000;
    }

    .custom-tab:hover {
        color: #007bff;
    }

    .nav-link.active {
        color: #007bff !important;
    }

    .nav-tabs {
        justify-content: center;
    }

    .tab-content {
        margin-top: 20px;
    }

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

<div class="container mt-5">
    <h2 class="text-start">Data Buyer</h2>

    <!-- Tabs Navigation -->
    <ul class="nav nav-tabs justify-content-center gap-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active custom-tab" id="buyer-tab" data-bs-toggle="tab" data-bs-target="#buyer"
                type="button" role="tab" aria-controls="buyer" aria-selected="true">Data Buyer</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link custom-tab" id="riwayat-tab" data-bs-toggle="tab" data-bs-target="#riwayat"
                type="button" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4 mb-4" id="myTabContent">
        <!-- Data Buyer Tab -->
        <div class="tab-pane fade show active" id="buyer" role="tabpanel" aria-labelledby="buyer-tab">
            <!-- Add Data Buyer Button (only in Buyer tab) -->
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">Add Data
                    Buyer</button>
            </div>

            <!-- Table Content -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped custom-table">
                    <thead class="thead-blue">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>HS Code</th>
                            <th>Negara</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PT Maju Jaya</td>
                            <td>info@majujaya.com</td>
                            <td><a href="https://majujaya.com" target="_blank"
                                    style="text-decoration: none;">majujaya.com</a></td>
                            <td>12345678</td>
                            <td>Indonesia</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Global Exports Ltd</td>
                            <td>contact@globalexports.com</td>
                            <td><a href="https://majujaya.com" target="_blank"
                                    style="text-decoration: none;">majujaya.com</a></td>
                            <td>87654321</td>
                            <td>USA</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Export Solutions</td>
                            <td>sales@exportsolutions.com</td>
                            <td><a href="https://majujaya.com" target="_blank"
                                    style="text-decoration: none;">majujaya.com</a></td>
                            <td>11223344</td>
                            <td>Germany</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Asia Trading Co.</td>
                            <td>support@asiatrading.co</td>
                            <td><a href="https://majujaya.com" target="_blank"
                                    style="text-decoration: none;">majujaya.com</a></td>
                            <td>99887766</td>
                            <td>Japan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Riwayat Tab -->
        <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab">
            <h5 class="mb-3">Riwayat Data</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped custom-table">
                    <thead class="thead-blue">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>HS Code</th>
                            <th>Negara</th>
                            <th>Verifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PT Maju Jaya</td>
                            <td>info@majujaya.com</td>
                            <td><a href="https://majujaya.com" target="_blank"
                                    style="text-decoration: none;">majujaya.com</a></td>
                            <td>12345678</td>
                            <td>Indonesia</td>
                            <td class="text-success">Sudah Disetujui</td>
                            <td><button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editDataModal1">Perbaiki</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Global Exports Ltd</td>
                            <td>contact@globalexports.com</td>
                            <td><a href="https://majujaya.com" target="_blank"
                                    style="text-decoration: none;">majujaya.com</a></td>
                            <td>87654321</td>
                            <td>USA</td>
                            <td class="text-danger">Tidak Disetujui</td>
                            <td><button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editDataModal2">Perbaiki</button></td> <!-- Edit Button -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>

<!-- Modal Edit Data Buyer 1 -->
<div class="modal fade" id="editDataModal1" tabindex="-1" aria-labelledby="editDataModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModalLabel1">Edit Data Buyer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="edit-nama-perusahaan1" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="edit-nama-perusahaan1" value="PT Maju Jaya">
                    </div>
                    <div class="mb-3">
                        <label for="edit-email1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit-email1" value="info@majujaya.com">
                    </div>
                    <div class="mb-3">
                        <label for="edit-website1" class="form-label">Website</label>
                        <input type="url" class="form-control" id="edit-website1" value="https://majujaya.com">
                    </div>
                    <div class="mb-3">
                        <label for="edit-hs-code1" class="form-label">HS Code</label>
                        <input type="text" class="form-control" id="edit-hs-code1" value="12345678">
                    </div>
                    <div class="mb-3">
                        <label for="edit-negara1" class="form-label">Negara</label>
                        <input type="text" class="form-control" id="edit-negara1" value="Indonesia">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data Buyer 2 -->
<div class="modal fade" id="editDataModal2" tabindex="-1" aria-labelledby="editDataModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModalLabel2">Edit Data Buyer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="edit-nama-perusahaan2" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="edit-nama-perusahaan2" value="Global Exports Ltd">
                    </div>
                    <div class="mb-3">
                        <label for="edit-email2" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit-email2" value="contact@globalexports.com">
                    </div>
                    <div class="mb-3">
                        <label for="edit-website2" class="form-label">Website</label>
                        <input type="url" class="form-control" id="edit-website2" value="https://globalexports.com">
                    </div>
                    <div class="mb-3">
                        <label for="edit-hs-code2" class="form-label">HS Code</label>
                        <input type="text" class="form-control" id="edit-hs-code2" value="87654321">
                    </div>
                    <div class="mb-3">
                        <label for="edit-negara2" class="form-label">Negara</label>
                        <input type="text" class="form-control" id="edit-negara2" value="USA">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Data Buyer Modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Add Data Buyer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama-perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama-perusahaan">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" class="form-control" id="website">
                    </div>
                    <div class="mb-3">
                        <label for="hs-code" class="form-label">HS Code</label>
                        <input type="text" class="form-control" id="hs-code">
                    </div>
                    <div class="mb-3">
                        <label for="negara" class="form-label">Negara</label>
                        <input type="text" class="form-control" id="negara">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Data Buyer</button>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
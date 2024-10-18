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

<div class="container mt-5">
    <h2 class="text-start">Data Buyers</h2>
    <!-- Tab Content -->
    <div class="tab-content mt-4 mb-4" id="myTabContent">

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
</div>
</div>


<?= $this->endSection(); ?>
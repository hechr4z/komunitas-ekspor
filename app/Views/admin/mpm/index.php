<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<style>
    /* Styling untuk search tampilan B */
    .form {
        --input-bg: #FFF;
        --padding: 1.5em;
        --rotate: 80deg;
        --gap: 2em;
        --icon-change-color: #F2BF02;
        --height: 50px;
        width: 600px;
        /* Sesuaikan dengan tampilan A */
        padding-inline-end: 1em;
        background: var(--input-bg);
        position: relative;
        border-radius: 30px;
        /* Sesuaikan border-radius dari tampilan A */
        margin: 0 auto;
    }

    .form label {
        display: flex;
        align-items: center;
        width: 100%;
        height: var(--height);
    }

    .form input {
        width: 100%;
        padding-inline-start: calc(var(--padding) + var(--gap));
        outline: none;
        background: none;
        border: 0;
        font-size: 0.9rem;
    }

    .form svg {
        color: #111;
        transition: 0.3s cubic-bezier(.4, 0, .2, 1);
        position: absolute;
        height: 17px;
        /* Sesuaikan ukuran icon */
    }

    .icon {
        position: absolute;
        left: var(--padding);
        transition: 0.3s cubic-bezier(.4, 0, .2, 1);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swap-off {
        transform: rotate(-80deg);
        opacity: 0;
        visibility: hidden;
    }

    .close-btn {
        background: none;
        border: none;
        right: calc(var(--padding) - var(--gap));
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #111;
        padding: 0.1em;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        transition: 0.3s;
        opacity: 0;
        transform: scale(0);
        visibility: hidden;
    }

    .form input:focus~.icon {
        transform: rotate(var(--rotate)) scale(1.3);
    }

    .form input:focus~.icon .swap-off {
        opacity: 1;
        transform: rotate(-80deg);
        visibility: visible;
        color: var(--icon-change-color);
    }

    .form input:focus~.icon .swap-on {
        opacity: 0;
        visibility: visible;
    }

    .form input:valid~.icon {
        transform: scale(1.3) rotate(var(--rotate))
    }

    .form input:valid~.icon .swap-off {
        opacity: 1;
        visibility: visible;
        color: var(--icon-change-color);
    }

    .form input:valid~.icon .swap-on {
        opacity: 0;
        visibility: visible;
    }

    .form input:valid~.close-btn {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
        transition: 0s;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form {
            width: 250px;
            --height: 45px;
        }
    }

    .table-hover tbody tr:hover {
        background-color: #f2f2f2;
    }

    .table thead th {
        background-color: #f8f9fa;
        font-weight: bold;
        border-bottom: 2px solid #dee2e6;
        text-align: center;
        white-space: nowrap;
    }

    .table tbody td {
        padding: 12px;
        vertical-align: middle;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Tooltip for long content */
    .tooltip-text {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Adding fixed width for certain columns */
    .col-fixed {
        width: 150px;
    }

    .text-wrap {
        white-space: normal;
        max-height: 100px;
        overflow-y: auto;
    }

    .btn-sm {
        font-size: 0.8rem;
        padding: 4px 8px;
    }

    /* Adding fixed width for certain columns */
    .col-fixed {
        width: 300px;
    }

    .text-truncate-multiline {
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.2;
        /* Sesuaikan jarak antar-baris */
    }
</style>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0" style="color: #03AADE;">Marketing Progress Monitoring</h1>
            </div>

            <div class="col-auto">
                <a href="/admin-add-mpm" class="btn text-white" style="background-color: #03AADE;">
                    + Tambah MPM

                </a>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover table-bordered mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center" valign="middle">No</th>
                                        <th class="text-center" valign="middle">Nama Member</th>
                                        <th class="text-center" valign="middle">Tanggal Kirim Email</th>
                                        <th class="text-center" valign="middle">Update Terakhir</th>
                                        <th class="text-center" valign="middle">Nama Perusahaan</th>
                                        <th class="text-center" valign="middle">Negara Perusahaan</th>
                                        <th class="text-center" valign="middle">Status Progress</th>
                                        <th class="text-center" valign="middle col-fixed">Progress</th>
                                        <th class="text-center" valign="middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" valign="middle">1</td>
                                        <td class="text-center" valign="middle">Tio</td>
                                        <td class="text-center" valign="middle">2024-11-05 00:00:00</td>
                                        <td class="text-center" valign="middle">2024-11-05 07:19:31</td>
                                        <td class="text-center" valign="middle">PT Contoh Abadi</td>
                                        <td class="text-center" valign="middle">Indonesia</td>
                                        <td class="text-center" style="color:green" valign="middle">Terkirim</td>
                                        <td class="text-center align-middle col-fixed">
                                            <div class="text-truncate-multiline" data-bs-toggle="tooltip" title="Deskripsi progress yang panjang, menjelaskan tahapan pekerjaan,
                                                pencapaian,
                                                dan rencana berikutnya yang harus dilakukan dalam waktu dekat.">
                                                Deskripsi progress yang panjang, menjelaskan tahapan pekerjaan,
                                                pencapaian,
                                                dan rencana berikutnya yang harus dilakukan dalam waktu dekat.
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="#" class="btn btn-sm text-white me-2"
                                                    style="background-color: #F2BF02;">
                                                    Hapus
                                                </a>
                                                <a href="/admin-edit-mpm" class="btn btn-sm text-white"
                                                    style="background-color: #03AADE;">
                                                    Ubah
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//tab-content-->
    </div><!--//container-xl-->
</div><!--//app-content-->

<script>
    // Initialize tooltips
    document.addEventListener("DOMContentLoaded", function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>


<?= $this->endSection('content') ?>
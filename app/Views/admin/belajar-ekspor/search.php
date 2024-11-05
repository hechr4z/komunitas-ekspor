<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

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
</style>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0" style="color: #03AADE;">Belajar Ekspor</h1>
            </div>

            <!-- Tengahkan form search -->
            <div class="col d-flex justify-content-center">
                <form class="form" action="<?= base_url('admin-belajar-ekspor-search') ?>" method="GET">
                    <label for="search">
                        <input required="" autocomplete="off" placeholder="cari materi" name="keyword" id="keyword" type="text">
                        <div class="icon">
                            <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="swap-on">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round" stroke-linecap="round"></path>
                            </svg>
                            <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="swap-off">
                                <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linejoin="round" stroke-linecap="round"></path>
                            </svg>
                        </div>
                        <button type="reset" class="close-btn">
                            <svg viewBox="0 0 20 20" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </label>
                </form>
            </div>

            <div class="col-auto">
                <a href="<?= base_url('admin-belajar-ekspor-tambah') ?>" class="btn text-white" style="background-color: #03AADE;"> + Tambah Materi</a>
            </div>
        </div>

        <!-- Row for search result message, centered under the search form -->
        <div class="row justify-content-center">
            <div class="col-auto">
                <?php if (!empty($keyword)): ?>
                    <p>Menampilkan hasil pencarian untuk: <strong><?= esc($keyword) ?></strong></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle">Judul</th>
                                        <th class="text-center align-middle">Foto</th>
                                        <th class="text-center align-middle">Kategori</th>
                                        <th class="text-center align-middle" style="width: 150px;">Deskripsi</th>
                                        <th class="text-center align-middle" style="width: 60px;">Slug</th>
                                        <th class="text-center align-middle" style="width: 60px;">Meta Title</th>
                                        <th class="text-center align-middle" style="width: 60px;">Meta Description</th>
                                        <th class="text-center align-middle">Aksi</th>
                                    </tr>
                                </thead>

                                <?php if (empty($hasilPencarian)): ?>
                                    <tbody>
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada buyers yang ditemukan.</td>
                                        </tr>
                                    </tbody>
                            </table>
                        <?php else: ?>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($hasilPencarian as $item): ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= $no++; ?></td>
                                        <td class="text-center align-middle"><?= $item['judul_belajar_ekspor']; ?></td>
                                        <td class="text-center align-middle">
                                            <img src="<?= base_url('/img/' . $item['foto_belajar_ekspor']) ?>" alt="<?= $item['judul_belajar_ekspor']; ?>" class="img-fluid" style="max-width: 80px;">
                                        </td>
                                        <td class="text-center align-middle"><?= $item['nama_kategori']; ?></td>
                                        <td class="text-center align-middle" style="width: 120px;">
                                            <div style="max-height: 100px; overflow-y: auto;">
                                                <?= $item['deskripsi_belajar_ekspor']; ?>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle"><?= $item['slug']; ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title']; ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_deskripsi']; ?></td>

                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="<?= base_url('/admin-belajar-ekspor-delete/' . $item['id_belajar_ekspor']); ?>" class="btn btn-sm text-white me-2" style="background-color: #F2BF02;">Hapus</a>
                                                <a href="<?= base_url('/admin-belajar-ekspor-ubah/' . $item['id_belajar_ekspor']) ?>" class="btn btn-sm text-white" style="background-color: #03AADE;">Ubah</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        <?php endif; ?>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

<?= $this->endSection('content') ?>
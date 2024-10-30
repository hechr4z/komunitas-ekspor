<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<style>
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

    .custom-table tbody td {
        border-top: 1px solid #ddd;
        padding: 10px;
        vertical-align: middle;
    }

    .btn-custom {
        background-color: #03AADE;
        text-align: center;
        color: #ffffff;
    }

    .btn-custom:hover {
        background-color: #F2BF02;
        color: #ffffff;
    }

    .badgepanjang {
        font-weight: normal;
        color: #000;
        font-size: 0.9rem;
        padding: 0.8em 1.5em;
        border-radius: 5px;
        background-color: #fff;
        width: 100%;
        border: 1px solid #cccccc;
        /* Membuat lebar badge mengikuti panjang teks */
        display: inline-block;
        /* Menjamin badge sesuai dengan teks */
    }

    /* start css search */
    .form button {
        border: none;
        background: none;
        color: #fff;
    }

    /* styling of whole input container */
    .form {
        --timing: 0.3s;
        --width-of-input: 600px;
        --height-of-input: 50px;
        --border-height: 4px;
        --input-bg: #03AADE;
        --border-color: #F2BF02;
        --border-radius: 30px;
        --after-border-radius: 1px;
        position: relative;
        width: var(--width-of-input);
        height: var(--height-of-input);
        display: flex;
        align-items: center;
        padding-inline: 0.8em;
        border-radius: var(--border-radius);
        transition: border-radius 0.5s ease;
        background: var(--input-bg, #fff);
        margin: 0 auto;
    }

    /* styling of Input */
    .input {
        font-size: 0.9rem;
        background-color: transparent;
        width: 100%;
        height: 100%;
        padding-inline: 0.5em;
        padding-block: 0.7em;
        border: none;
        color: #fff;
    }

    .input::placeholder {
        color: #fff;
    }

    /* styling of animated border */
    .form:before {
        content: "";
        position: absolute;
        background: var(--border-color);
        transform: scaleX(0);
        transform-origin: center;
        width: 100%;
        height: var(--border-height);
        left: 0;
        bottom: 0;
        border-radius: 1px;
        transition: transform var(--timing) ease;
    }

    /* Hover on Input */
    .form:focus-within {
        border-radius: var(--after-border-radius);
    }

    input:focus {
        outline: none;
    }

    /* here is code of animated border */
    .form:focus-within:before {
        transform: scale(1);
    }

    /* styling of close button */
    /* == you can click the close button to remove text == */
    .reset {
        border: none;
        background: none;
        opacity: 0;
        visibility: hidden;
    }

    /* close button shown when typing */
    input:not(:placeholder-shown)~.reset {
        opacity: 1;
        visibility: visible;
    }

    /* sizing svg icons */
    .form svg {
        width: 17px;
        margin-top: 3px;
    }

    /* end search css */

    /*responsive mobile*/
    @media (max-width: 768px) {
        .form {
            --width-of-input: 250px;
            --height-of-input: 45px;
        }
    }
</style>

<div class="container">
    <!-- judul -->
    <div class="py-5" style="text-align: center;">
        <h2 class="text-custom-title"><?= lang('Blog.buyersDataTitle') ?></h2>
        <p class="text-custom-paragraph mt-2"><?= lang('Blog.buyersDataDescription') ?></p>
    </div>

    <!-- Search Bar Start -->
    <form class="form" action="<?= base_url($lang . '/data-buyers/search') ?>" method="GET">
        <button>
            <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                aria-labelledby="search">
                <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                    stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
        <input class="input" autocomplete="off" placeholder="<?= lang('Blog.searchArticlePlaceholder') ?>"
            name="keyword" required="" type="text" value="<?= isset($keyword) ? esc($keyword) : '' ?>">
        <button class="reset" type="reset">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </form>
    <!-- Search Bar End -->
</div>

<div class="container mt-5 mb-5">
    <!-- Table Content -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped custom-table">
            <thead class="thead-blue">
                <tr>
                    <th>No</th>
                    <th><?= lang('Blog.tableCompanyName') ?></th>
                    <th><?= lang('Blog.tableCountry') ?></th>
                    <th><?= lang('Blog.tableHsCode') ?></th>
                    <th><?= lang('Blog.tableEmail') ?></th>
                    <th><?= lang('Blog.tableWebsite') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($buyers)): ?>
                    <tr>
                        <td colspan="6" class="text-center"> <?= lang('Blog.noBuyersDataYet') ?></td>
                    </tr>
                <?php else: ?>
                    <?php $i = 1; ?>
                    <!-- Menampilkan data yang tidak di-blur -->
                    <?php foreach ($buyers as $item): ?>
                        <tr class="text-center">
                            <td><?= $i++ ?></td>
                            <td><?= $item['nama_perusahaan'] ?></td>
                            <td><?= $item['negara_perusahaan'] ?></td>
                            <td><?= $item['hs_code'] ?></td>
                            <td>
                                <span style="filter: blur(5px); user-select: none;">perusahaan@email.com</span>
                            </td>
                            <td>
                                <span
                                    style="text-decoration: none; color:#03AADE; filter: blur(5px); user-select: none;">perusahaan.com</span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="mt-2">
                <?= $pager->links('default', 'bootstrap_pagination') ?>
            </div>
        <?php endif; ?>
        <!-- Tombol Hilangi Blur -->
        <div class="badgepanjang p-3 mt-3">
            <div class="d-flex justify-content-between align-items-center mt-3 mb-3 flex-md-row flex-column">
                <h5 class="kategori font-weight-bold mb-0 text-left text-md-left">
                    <?= lang('Blog.joinMemberTitle') ?>
                </h5>
                <a href="<?= ($lang == 'en') ? base_url('/en/registration') : base_url('/id/pendaftaran') ?>"
                    class="btn btn-custom mt-md-0"><?= lang('Blog.memberRegistration') ?></a>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
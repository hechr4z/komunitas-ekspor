<?= $this->extend('member/layout/app'); ?>
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

<!-- judul -->
<div class="py-4" style="text-align: center;">
    <h2 class="text-custom-title"><?= lang('Blog.buyersDataTitle') ?></h2>
    <p class="text-custom-paragraph mt-2"><?= lang('Blog.buyersDataDescription') ?></p>
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
                            <td><?= $item['email_perusahaan'] ?></td>
                            <td><?= $item['website_perusahaan'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection(); ?>
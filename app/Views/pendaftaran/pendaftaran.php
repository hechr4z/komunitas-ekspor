<?= $this->extend('layout/app'); ?>
<?= $this->section('content'); ?>

<style>
    /*css*/
    .card {
        margin-top: 20px;
    }

    .custom-card {
        background-color: #F5F5F7;
        color: #333;
        border: 1px solid #ccc;
    }

    .h3 {
        text-align: left;
    }

    .line-separator {
        width: 65%;
        height: 2px;
        background-color: #000;
        margin: 20px 0;
    }

    .textcontent {
        margin-top: 20px;
        position: relative;
        padding-bottom: 10px;
    }

    .line-separatorkecil {
        width: 100%;
        height: 2px;
        background-color: #000;
        margin: 10px 0;
    }

    .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .form-group label {
        width: 150px;
        margin-right: 10px;
        text-align: left;
        font-weight: normal;
    }

    .form-group input,
    .form-group select {
        flex: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .showpw {
        margin-left: 160px;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    .required {
        color: red;
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

    /*responsive mobile*/
    @media (max-width: 768px) {
        .form-group {
            display: block;
        }

        .form-group label {
            width: 100%;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
        }

        .showpw {
            margin-left: 10px;
        }
    }
</style>


<!-- judul -->
<div class="pendaftaran-section py-5" style="text-align: center;">
    <h2 class="text-custom-title"><?= lang('Blog.pendaftaranJudul'); ?></h2>
    <p class="text-custom-paragraph mt-2"><?= lang('Blog.pendaftaranDeskripsi'); ?></p>
</div>

<!-- Form Pendaftaran -->
<div class="container py-5">
    <div class="row gx-4">
        <div class="col-md-6 left-section">
            <h3><?= lang('Blog.keuntunganMember'); ?></h3>
            <hr class="line-separator">

            <p><?= lang('Blog.keuntunganDeskripsi'); ?></p>

            <p><strong><?= lang('Blog.keuntungan1Judul'); ?></strong><br>
                <?= lang('Blog.keuntungan1Deskripsi'); ?></p>

            <p><strong><?= lang('Blog.keuntungan2Judul'); ?></strong><br>
                <?= lang('Blog.keuntungan2Deskripsi'); ?></p>

            <p><strong><?= lang('Blog.keuntungan3Judul'); ?></strong><br>
                <?= lang('Blog.keuntungan3Deskripsi'); ?></p>

            <p><strong><?= lang('Blog.keuntungan4Judul'); ?></strong><br>
                <?= lang('Blog.keuntungan4Deskripsi'); ?></p>

            <p><strong><?= lang('Blog.keuntungan5Judul'); ?></strong><br>
                <?= lang('Blog.keuntungan5Deskripsi'); ?></p>

            <p><strong><?= lang('Blog.keuntungan6Judul'); ?></strong><br>
                <?= lang('Blog.keuntungan6Deskripsi'); ?></p>

            <p><strong><?= lang('Blog.keuntungan7Judul'); ?></strong><br>
                <?= lang('Blog.keuntungan7Deskripsi'); ?></p>
        </div>

        <div class="col-md-6 right-section">
            <h3 class="h3"><?= lang('Blog.daftarJudul'); ?></h3>
            <hr class="line-separator">

            <!-- Card untuk Form Pendaftaran -->
            <div class="card p-3 custom-card">
                <!-- Menampilkan pesan error jika username atau email sudah ada -->
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('daftar-member') ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- Hidden field for role -->
                    <input type="hidden" name="role" value="user">

                    <div class="textcontent mt-2">
                        <h5><?= lang('Blog.infoAkun'); ?></h5>
                        <hr class="line-separatorkecil">
                    </div>

                    <!-- Username -->
                    <span id="username-status" class="form-text" style="margin-bottom: 10px; display: block; margin-left: 160px;"></span>
                    <div class="form-group">
                        <label for="username"><?= lang('Blog.username'); ?><span class="required">*</span></label>
                        <input type="text" id="username" name="username" required placeholder="<?= lang('Blog.placeholderUsername'); ?>" value="<?= old('username') ?>">
                    </div>

                    <!-- Email -->
                    <span id="email-status" class="form-text" style="margin-bottom: 10px; display: block; margin-left: 160px;"></span> <!-- Status pengecekan email di bawah input -->
                    <div class="form-group">
                        <label for="email"><?= lang('Blog.emailPendaftaran'); ?><span class="required">*</span></label>
                        <input type="email" id="email" name="email" required placeholder="<?= lang('Blog.placeholderEmail'); ?>" value="<?= old('email') ?>">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password"><?= lang('Blog.password'); ?><span class="required">*</span></label>
                        <input type="password" id="password" name="password" required placeholder="<?= lang('Blog.placeholderPassword'); ?>">
                    </div>

                    <!-- Checkbox untuk Show Password -->
                    <div class="showpw">
                        <input type="checkbox" id="show-password" onclick="togglePassword()"> <?= lang('Blog.showPassword'); ?>
                    </div>

                    <!-- Referral -->
                    <span id="referral-status" class="form-text" style="margin-bottom: 10px; display: block; margin-left: 160px;"></span> <!-- Status pengecekan referral -->
                    <div class="form-group">
                        <label for="referral"><?= lang('Blog.referral'); ?></label>
                        <input type="text" id="referral" name="referral" placeholder="<?= lang('Blog.placeholderReferral'); ?>" value="<?= old('referral') ?>">
                    </div>

                    <div class="textcontent mt-5">
                        <h5><?= lang('Blog.profilPerusahaan'); ?></h5>
                        <hr class="line-separatorkecil">
                    </div>

                    <!-- Nama Perusahaan -->
                    <div class="form-group">
                        <label for="nama_perusahaan"><?= lang('Blog.namaPerusahaan'); ?><span class="required">*</span></label>
                        <input type="text" id="nama_perusahaan" name="nama_perusahaan" required placeholder="<?= lang('Blog.placeholderNamaPerusahaan'); ?>" value="<?= old('nama_perusahaan') ?>">
                    </div>

                    <!-- Nama PIC -->
                    <div class="form-group">
                        <label for="pic"><?= lang('Blog.pic'); ?><span class="required">*</span></label>
                        <input type="text" id="pic" name="pic" required placeholder="<?= lang('Blog.placeholderPIC'); ?>" value="<?= old('pic') ?>">
                    </div>

                    <!-- No HP Perusahaan -->
                    <div class="form-group">
                        <label for="nomor_pic"><?= lang('Blog.noPIC'); ?><span class="required">*</span></label>
                        <input type="tel" id="nomor_pic" name="nomor_pic" required placeholder="<?= lang('Blog.placeholderNoPIC'); ?>" value="<?= old('nomor_pic') ?>">
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-custom mt-3" style="width: 100%;"><?= lang('Blog.submitButton'); ?></button>
                </form>
            </div>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Flag untuk mengecek status validasi input
        var isUsernameValid = false;
        var isEmailValid = false;
        var isReferralValid = true; // Default true karena referral bersifat opsional

        // Fungsi untuk mengecek form valid atau tidak sebelum submit
        function checkFormValidity() {
            return isUsernameValid && isEmailValid && isReferralValid;
        }

        // Pengecekan di sisi client ketika form akan disubmit
        $('form').on('submit', function(event) {
            var username = $('#username').val();
            var referral = $('#referral').val();

            // Cek kode referral tidak boleh sama dengan username
            if (referral && username === referral) {
                event.preventDefault();
                Swal.fire({
                    title: "Pastikan Input Sesuai Dengan Ketentuan!",
                    icon: "warning",
                    confirmButtonText: "Oke",
                });
                isReferralValid = false;
                return;
            }

            // Cek apakah semua input sudah valid
            if (!checkFormValidity()) {
                event.preventDefault();
                Swal.fire({
                    title: "Pastikan Input Sesuai Dengan Ketentuan!",
                    icon: "warning",
                    confirmButtonText: "Oke",
                });
            }
        });

        // Pengecekan username dari server
        $('#username').on('input', function() {
            var username = $(this).val();
            var referral = $('#referral').val();

            if (username.length > 0) {
                $.ajax({
                    url: '/user/checkAvailability',
                    type: 'POST',
                    data: {
                        username: username
                    },
                    success: function(response) {
                        if (response.status === 'exists') {
                            $('#username-status').html('<span style="color: red;">Username sudah terdaftar</span>');
                            isUsernameValid = false;
                        } else {
                            $('#username-status').html('<span style="color: green;">Username tersedia</span>');
                            isUsernameValid = true;
                        }
                    }
                });
            } else {
                $('#username-status').html('');
                isUsernameValid = false;
            }

            // Cek jika referral tidak boleh sama dengan username
            if (referral && username === referral) {
                $('#referral-status').html('<span style="color: red;">Kode referral tidak boleh sama dengan username</span>');
                isReferralValid = false;
            } else {
                $('#referral-status').html('');
                isReferralValid = true;
            }
        });

        // Pengecekan email dari server
        $('#email').on('input', function() {
            var email = $(this).val();
            if (email.length > 0) {
                $.ajax({
                    url: '/user/checkAvailability',
                    type: 'POST',
                    data: {
                        email: email
                    },
                    success: function(response) {
                        if (response.status === 'exists') {
                            $('#email-status').html('<span style="color: red;">Email sudah terdaftar</span>');
                            isEmailValid = false;
                        } else {
                            $('#email-status').html('<span style="color: green;">Email tersedia</span>');
                            isEmailValid = true;
                        }
                    }
                });
            } else {
                $('#email-status').html('');
                isEmailValid = false;
            }
        });

        // Pengecekan referral di sisi client
        $('#referral').on('input', function() {
            var referral = $(this).val();
            var username = $('#username').val();

            // Cek jika referral tidak boleh sama dengan username
            if (referral && username === referral) {
                $('#referral-status').html('<span style="color: red;">Kode referral tidak boleh sama dengan username</span>');
                isReferralValid = false;
            } else {
                $('#referral-status').html('');
                isReferralValid = true;
            }
        });
    });
</script>


<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var showPassword = document.getElementById("show-password");
        if (showPassword.checked) {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>

<?= $this->endSection(); ?>
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
    <h2 class="text-custom-title">Pendaftaran</h2>
    <p class="text-custom-paragraph">Ayo gabung dengan Komunitas Ekspor Indonesia dan jadi sukses bersama kami</p>
</div>

<!-- Form Pendaftaran -->
<div class="container py-5">
    <div class="row gx-4">
        <div class="col-md-6 left-section">
            <h3>Keuntungan Menjadi Member</h3>
            <hr class="line-separator">

            <p>Berikut adalah beberapa keuntungan yang dapat diberikan kepada anggota yang bergabung dengan Komunitas Ekspor Indonesia:</p>
            <p><strong>1. Akses Pelatihan Ekspor Eksklusif</strong><br>
                Sebagai member, Anda akan mendapatkan akses ke berbagai pelatihan eksklusif mengenai ekspor dan perdagangan internasional, yang dirancang untuk meningkatkan keterampilan dan pengetahuan Anda dalam menjalankan bisnis ekspor.</p>

            <p><strong>2. Jaringan Luas dengan Pelaku Usaha</strong><br>
                Anda akan memiliki kesempatan untuk berjejaring dengan pelaku usaha lainnya di bidang ekspor. Ini memberikan peluang kolaborasi dan kemitraan yang dapat membantu mengembangkan bisnis Anda lebih jauh.</p>

            <p><strong>3. Informasi Terbaru tentang Perdagangan Internasional</strong><br>
                Tetap up-to-date dengan berita dan tren terbaru mengenai pasar internasional, kebijakan perdagangan, serta regulasi ekspor-impor yang bisa berdampak pada bisnis Anda.</p>

            <p><strong>4. Akses ke Acara dan Webinar Khusus</strong><br>
                Member komunitas akan mendapatkan undangan eksklusif ke berbagai acara, seminar, dan webinar yang diselenggarakan oleh Komunitas Ekspor Indonesia. Ini mencakup topik-topik menarik seperti strategi ekspor, regulasi internasional, dan peluang pasar global.</p>

            <p><strong>5. Peluang Promosi dan Eksposur Bisnis</strong><br>
                Komunitas akan memberikan kesempatan kepada member untuk mempromosikan produk dan layanan mereka di platform yang dikelola oleh komunitas, baik melalui website, acara offline, maupun jejaring sosial.</p>

            <p><strong>6. Panduan Mendapatkan Sertifikasi Ekspor</strong><br>
                Anda akan mendapatkan panduan lengkap tentang bagaimana mendapatkan berbagai sertifikasi ekspor yang diperlukan untuk bisnis Anda, seperti sertifikasi produk halal, organik, dan lainnya yang sesuai dengan standar pasar internasional.</p>

            <p><strong>7. Layanan Konsultasi Ekspor</strong><br>
                Sebagai member, Anda akan mendapatkan akses ke layanan konsultasi dengan para pakar ekspor yang bisa membantu dalam perencanaan strategi, penyelesaian masalah, hingga optimalisasi kinerja bisnis Anda.</p>
        </div>

        <div class="col-md-6 right-section">
            <h3 class="h3">Ayo Daftar Sebagai Member!</h3>
            <hr class="line-separator">

            <!-- Card untuk Form Pendaftaran -->
            <div class="card p-3 custom-card">
                <form action="<?= base_url('daftar-member') ?>" method="post">
                    <?= csrf_field() ?>
                    <!-- Hidden field for role -->
                    <input type="hidden" name="role" value="user">

                    <div class="textcontent mt-2">
                        <h5>Informasi Akun</h5>
                        <hr class="line-separatorkecil">
                    </div>

                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username<span class="required">*</span></label>
                        <input type="text" id="username" name="username" required placeholder="Masukkan Username">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email_member">Email<span class="required">*</span></label>
                        <input type="email" id="email_member" name="email_member" required placeholder="Masukkan Email">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password<span class="required">*</span></label>
                        <input type="password" id="password" name="password" required placeholder="Masukkan Password">
                    </div>
                    <!-- Checkbox untuk Show Password -->
                    <div class="showpw">
                        <input type="checkbox" id="show-password" onclick="togglePassword()"> Lihat Password
                    </div>

                    <!-- Reveral -->
                    <div class="form-group">
                        <label for="username">Kode Reveral (Opsional)</label>
                        <input type="text" id="reveral" name="reveral" placeholder="Masukkan Kode Reveral">
                    </div>

                    <div class="textcontent mt-5">
                        <h5>Profil Perusahaan</h5>
                        <hr class="line-separatorkecil">
                    </div>

                    <!-- Nama Perusahaan -->
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan<span class="required">*</span></label>
                        <input type="text" id="nama_perusahaan" name="nama_perusahaan" required placeholder="Masukkan Nama Perusahaan">
                    </div>

                    <!-- Nama PIC -->
                    <div class="form-group">
                        <label for="pic">PIC<span class="required">*</span></label>
                        <input type="text" id="pic" name="pic" required placeholder="Masukkan Nama PIC">
                    </div>

                    <!-- No HP Perusahaan -->
                    <div class="form-group">
                        <label for="pic">Nomor PIC<span class="required">*</span></label>
                        <input type="tel" id="nomor_pic" name="nomor_pic" required placeholder="Masukkan Nomor PIC">
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-primary mt-3">Daftar Member</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
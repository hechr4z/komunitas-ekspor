<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Data Member</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin-update-member/' . $member['id_member']) ?>" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>Jenis Member</label>
                                <div class="form-check d-flex align-items-start">
                                    <input class="form-check-input" type="radio" name="role" id="memberPremium" value="premium" required <?= $member['role'] == 'premium' ? 'checked' : '' ?>>
                                    <label class="form-check-label ms-2" for="memberPremium">
                                        Member Premium
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-start">
                                    <input class="form-check-input" type="radio" name="role" id="memberFree" value="member" required <?= $member['role'] == 'member' ? 'checked' : '' ?>>
                                    <label class="form-check-label ms-2" for="memberFree">
                                        Member Free
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Username & Kode Referral</label>
                                <input type="text" class="form-control" value="<?= $member['username'] ?>" name="username_referral" placeholder="Masukkan Username & Kode Referral" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Profil</label>
                                <input type="file" class="form-control" name="foto_profil" id="foto_profil" onchange="previewImage()">
                                <img id="preview" src="<?= base_url('img/' . $member['foto_profil']) ?>" alt="Foto Member"
                                    class="img-thumbnail mt-2" style="max-width: 100px;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Popular Point</label>
                                <input type="text" class="form-control" value="<?= $member['popular_point'] ?>" name="popular_point" placeholder="Masukkan Popular Point" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" value="<?= $member['nama_perusahaan'] ?>" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Perusahaan</label>
                                <textarea class="form-control" name="deskripsi_perusahaan" style="height: 120px;" placeholder="Masukkan Deskripsi Perusahaan"><?= $member['deskripsi_perusahaan'] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tipe Bisnis</label>
                                <input type="text" class="form-control" value="<?= $member['tipe_bisnis'] ?>" name="tipe_bisnis" placeholder="Masukkan Tipe Bisnis">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Produk Utama</label>
                                <input type="text" class="form-control" value="<?= $member['produk_utama'] ?>" name="produk_utama" placeholder="Masukkan Produk Utama">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tahun Dibentuk</label>
                                <input type="text" class="form-control" value="<?= $member['tahun_dibentuk'] ?>" name="tahun_dibentuk" placeholder="Masukkan Tahun Dibentuk">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Skala Bisnis</label>
                                <input type="text" class="form-control" value="<?= $member['skala_bisnis'] ?>" name="skala_bisnis" placeholder="Masukkan Skala Bisnis">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="<?= $member['email'] ?>" name="email" placeholder="Masukkan Email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">PIC</label>
                                <input type="text" class="form-control" value="<?= $member['pic'] ?>" name="pic" placeholder="Masukkan PIC">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">PIC Phone</label>
                                <input type="text" class="form-control" value="<?= $member['pic_phone'] ?>" name="pic_phone" placeholder="Masukkan PIC Phone">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori Produk</label>
                                <input type="text" class="form-control" value="<?= $member['kategori_produk'] ?>" name="kategori_produk" placeholder="Masukkan Kategori Produk">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Latitude</label>
                                <input type="text" class="form-control" value="<?= $member['latitude'] ?>" name="latitude" placeholder="Masukkan Latitude">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Longitude</label>
                                <input type="text" class="form-control" value="<?= $member['longitude'] ?>" name="longitude" placeholder="Masukkan Longitude">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-member') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->


<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        this.querySelector("i").classList.toggle("fa-eye");
        this.querySelector("i").classList.toggle("fa-eye-slash");
    });

    function previewImage() {
        const file = document.getElementById('foto_profil').files[0];
        const preview = document.getElementById('preview');
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "<?= base_url('img/' . $member['foto_profil']) ?>";
        }
    }
</script>

<?= $this->endSection('content') ?>
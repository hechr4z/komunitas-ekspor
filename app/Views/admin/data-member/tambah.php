<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambah Member</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Username & Kode Referal</label>
                                <input type="text" class="form-control" name="username"
                                    placeholder="Masukkan Username & Kode Referal" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Masukkan Password">
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukkan Email"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Popular Point</label>
                                <input type="text" class="form-control" name="popular_point"
                                    placeholder="Masukkan Popular Point" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan"
                                    placeholder="Masukkan Nama Perusahaan">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Perusahaan</label>
                                <textarea class="form-control" name="deskripsi_perusahaan" style="height: 120px;"
                                    placeholder="Masukkan deskripsi perusahaan secara detail"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tipe Bisnis</label>
                                <input type="text" class="form-control" name="tipe_bisnis"
                                    placeholder="Masukkan Tipe Bisnis">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Produk Utama</label>
                                <input type="text" class="form-control" name="produk_utama"
                                    placeholder="Masukkan Produk Utama">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tahun Didirikan</label>
                                <input type="text" class="form-control" name="tahun_didirikan"
                                    placeholder="Masukkan Tahun Didirikan">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Skala Bisnis</label>
                                <input type="text" class="form-control" name="skala_bisnis"
                                    placeholder="Masukkan Skala Bisnis">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">PIC</label>
                                <input type="text" class="form-control" name="pic" placeholder="Masukkan PIC">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No. Telepon PIC</label>
                                <input type="text" class="form-control" name="no_telepon_pic"
                                    placeholder="Masukkan No. Telepon PIC">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Member</label>
                                <input type="file" class="form-control" name="foto_member" id="foto_member"
                                    onchange="previewImage()">
                                <img id="preview" src="https://via.placeholder.com/100" alt="Foto Member"
                                    class="img-thumbnail mt-2" style="max-width: 100px;">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="/admin-data-member" class="btn btn-secondary">Kembali</a>
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

    togglePassword.addEventListener("click", function () {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        this.querySelector("i").classList.toggle("fa-eye");
        this.querySelector("i").classList.toggle("fa-eye-slash");
    });

    function previewImage() {
        const file = document.getElementById('foto_member').files[0];
        const preview = document.getElementById('preview');
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "https://via.placeholder.com/100";
        }
    }
</script>

<?= $this->endSection('content') ?>
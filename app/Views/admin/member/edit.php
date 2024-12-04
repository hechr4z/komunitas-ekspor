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
                        <form action="<?= base_url('admin-update-member/' . $member['id_member']) ?>" method="post"
                            enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>Jenis Member</label>
                                <div class="form-check d-flex align-items-start">
                                    <input class="form-check-input" type="radio" name="role" id="memberPremium"
                                        value="premium" required <?= $member['role'] == 'premium' ? 'checked' : '' ?>>
                                    <label class="form-check-label ms-2" for="memberPremium">
                                        Member Premium
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-start">
                                    <input class="form-check-input" type="radio" name="role" id="memberFree"
                                        value="member" required <?= $member['role'] == 'member' ? 'checked' : '' ?>>
                                    <label class="form-check-label ms-2" for="memberFree">
                                        Member Free
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Username & Kode Referral</label>
                                <input type="text" class="form-control" value="<?= $member['username'] ?>"
                                    name="username_referral" placeholder="Masukkan Username & Kode Referral" required>
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
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Profil</label>
                                <input type="file" class="form-control" name="foto_profil" id="foto_profil"
                                    onchange="previewImage()">
                                <img id="preview" src="<?= base_url('img/' . $member['foto_profil']) ?>"
                                    alt="Foto Member" class="img-thumbnail mt-2" style="max-width: 100px;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Popular Point</label>
                                <input type="text" class="form-control" value="<?= $member['popular_point'] ?>"
                                    name="popular_point" placeholder="Masukkan Popular Point" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" value="<?= $member['nama_perusahaan'] ?>"
                                    name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Perusahaan</label>
                                <textarea class="form-control" name="deskripsi_perusahaan" style="height: 120px;"
                                    placeholder="Masukkan Deskripsi Perusahaan"><?= $member['deskripsi_perusahaan'] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Perusahaan En</label>
                                <textarea class="form-control" name="deskripsi_perusahaan_en" style="height: 120px;"
                                    placeholder="Masukkan Deskripsi Perusahaan Versi Bahasa Inggris"><?= $member['deskripsi_perusahaan_en'] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tipe Bisnis</label>
                                <input type="text" class="form-control" value="<?= $member['tipe_bisnis'] ?>"
                                    name="tipe_bisnis" placeholder="Masukkan Tipe Bisnis">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tipe Bisnis En</label>
                                <input type="text" class="form-control" value="<?= $member['tipe_bisnis_en'] ?>"
                                    name="tipe_bisnis_en" placeholder="Masukkan Tipe Bisnis Versi Bahasa Inggris">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Produk Utama</label>
                                <input type="text" class="form-control" value="<?= $member['produk_utama'] ?>"
                                    name="produk_utama" placeholder="Masukkan Produk Utama">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Produk Utama En</label>
                                <input type="text" class="form-control" value="<?= $member['produk_utama_en'] ?>"
                                    name="produk_utama_en" placeholder="Masukkan Produk Utama Versi Bahasa Inggris">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tahun Dibentuk</label>
                                <input type="text" class="form-control" value="<?= $member['tahun_dibentuk'] ?>"
                                    name="tahun_dibentuk" placeholder="Masukkan Tahun Dibentuk">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Skala Bisnis</label>
                                <select class="form-control" id="skala_bisnis" name="skala_bisnis">
                                    <option value="">Pilih Skala Bisnis</option>
                                    <option value="Kecil">Kecil</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Besar">Besar</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Skala Bisnis En</label>
                                <select class="form-control" id="skala_bisnis_en" name="skala_bisnis_en">
                                    <option value="">Pilih Skala Bisnis</option>
                                    <option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="<?= $member['email'] ?>" name="email"
                                    placeholder="Masukkan Email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">PIC</label>
                                <input type="text" class="form-control" value="<?= $member['pic'] ?>" name="pic"
                                    placeholder="Masukkan PIC">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">PIC Phone</label>
                                <input type="text" class="form-control" value="<?= $member['pic_phone'] ?>"
                                    name="pic_phone" placeholder="Masukkan PIC Phone">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori Produk</label>
                                <select class="form-control" id="kategori_produk" name="kategori_produk" required>
                                    <option value="">Pilih Kategori Produk</option>
                                    <option value="Agrikultur">Agrikultur</option>
                                    <option value="Perkebunan">Perkebunan</option>
                                    <option value="Perikanan">Perikanan</option>
                                    <option value="Peternakan">Peternakan</option>
                                    <option value="Makanan dan Minuman">Makanan dan Minuman</option>
                                    <option value="Tekstil dan Pakaian">Tekstil dan Pakaian</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Otomotif">Otomotif</option>
                                    <option value="Kerajinan Tangan">Kerajinan Tangan</option>
                                    <option value="Perhiasan">Perhiasan</option>
                                    <option value="Furnitur">Furnitur</option>
                                    <option value="Kosmetik dan Kesehatan">Kosmetik dan Kesehatan</option>
                                    <option value="Bahan Bangunan">Bahan Bangunan</option>
                                    <option value="Alat Berat">Alat Berat</option>
                                    <option value="Produk Kimia">Produk Kimia</option>
                                    <option value="Energi dan Pertambangan">Energi dan Pertambangan</option>
                                    <option value="Logam dan Mineral">Logam dan Mineral</option>
                                    <option value="Kertas dan Percetakan">Kertas dan Percetakan</option>
                                    <option value="Mainan dan Hiburan">Mainan dan Hiburan</option>
                                    <option value="Produk Digital dan IT">Produk Digital dan IT</option>
                                    <option value="Produk Ramah Lingkungan">Produk Ramah Lingkungan</option>
                                    <option value="Alat Tulis dan Kantor">Alat Tulis dan Kantor</option>
                                    <option value="Peralatan Rumah Tangga">>Peralatan Rumah Tangga</option>
                                    <option value="Alat Olahraga">Alat Olahraga</option>
                                    <option value="Produk Fashion dan Aksesoris">Produk Fashion dan Aksesoris</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori Produk En</label>
                                <select class="form-control" id="kategori_produk_en" name="kategori_produk_en" required>
                                    <option value="">Pilih Kategori Produk</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Plantation">Plantation</option>
                                    <option value="Fisheries">Fisheries</option>
                                    <option value="Livestock">Livestock</option>
                                    <option value="Food and Beverages">Food and Beverages</option>
                                    <option value="Textiles and Apparel">Textiles and Apparel</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Automotive">Automotive</option>
                                    <option value="Handicrafts">Handicrafts</option>
                                    <option value="Jewelry">Jewelry</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Cosmetics and Health">Cosmetics and Health</option>
                                    <option value="Building Materials">Building Materials</option>
                                    <option value="Heavy Equipment">Heavy Equipment</option>
                                    <option value="Chemical Products">Chemical Products</option>
                                    <option value="Energy and Mining">Energy and Mining</option>
                                    <option value="Metals and Minerals">Metals and Minerals</option>
                                    <option value="Paper and Printing">Paper and Printing</option>
                                    <option value="Toys and Entertainment">Toys and Entertainment</option>
                                    <option value="Digital and IT Products">Digital and IT Products</option>
                                    <option value="Eco-friendly Products">Eco-friendly Products</option>
                                    <option value="Stationery and Office Supplies">Stationery and Office Supplies
                                    </option>
                                    <option value="Household Appliances">Household Appliances</option>
                                    <option value="Sports Equipment">Sports Equipment</option>
                                    <option value="Fashion and Accessories">Fashion and Accessories</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Latitude</label>
                                <input type="text" class="form-control" value="<?= $member['latitude'] ?>"
                                    name="latitude" placeholder="Masukkan Latitude">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Longitude</label>
                                <input type="text" class="form-control" value="<?= $member['longitude'] ?>"
                                    name="longitude" placeholder="Masukkan Longitude">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white"
                                    style="background-color: #03AADE;">Simpan</button>
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

    togglePassword.addEventListener("click", function () {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        this.querySelector("i").classList.toggle("fa-eye");
        this.querySelector("i").classList.toggle("fa-eye-slash");
    });

    function previewImage() {
        const file = document.getElementById('foto_profil').files[0];
        const preview = document.getElementById('preview');
        const reader = new FileReader();

        reader.onload = function (e) {
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
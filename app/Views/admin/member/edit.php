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
                                <label class="form-label">Jenis Member</label>
                                <div class="form-check d-flex align-items-start">
                                    <input class="form-check-input" type="radio" name="role" id="memberPremium"
                                        value="premium" <?= $member['role'] == 'premium' ? 'checked' : '' ?>>
                                    <label class="form-check-label ms-2" for="memberPremium">
                                        Member Premium
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-start">
                                    <input class="form-check-input" type="radio" name="role" id="memberFree"
                                        value="member" <?= $member['role'] == 'member' ? 'checked' : '' ?>>
                                    <label class="form-check-label ms-2" for="memberFree">
                                        Member Free
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Premium</label>
                                <div class="form-check d-flex align-items-start">
                                    <input class="form-check-input" type="radio" name="status_premium" id="verified"
                                        value="verified" <?= $member['status_premium'] == 'verified' ? 'checked' : '' ?>>
                                    <label class="form-check-label ms-2" for="verified">
                                        Verified
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-start">
                                    <input class="form-check-input" type="radio" name="status_premium" id="pending"
                                        value="pending" <?= $member['status_premium'] == 'pending' ? 'checked' : '' ?>>
                                    <label class="form-check-label ms-2" for="pending">
                                        Pending
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Username & Kode Referral</label>
                                <input type="text" class="form-control" value="<?= $member['username'] ?>"
                                    name="username_referral" placeholder="Masukkan Username & Kode Referral">
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
                                <?php if (empty($member['foto_profil'])): ?>
                                    <img id="preview" src="https://via.placeholder.com/100" alt="Foto Member" class="img-thumbnail mt-2" style="max-width: 100px;">
                                <?php else: ?>
                                    <img id="preview" src="<?= base_url('img/' . $member['foto_profil']) ?>" alt="Foto Member" class="img-thumbnail mt-2" style="max-width: 100px;">
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Popular Point</label>
                                <input type="text" class="form-control" value="<?= $member['popular_point'] ?>"
                                    name="popular_point" placeholder="Masukkan Popular Point">
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
                                    <option value="" disabled <?= ($member['skala_bisnis'] == null) ? 'selected' : '' ?>>Pilih Skala Bisnis</option>
                                    <option value="Kecil" <?= ($member['skala_bisnis'] == 'Kecil') ? 'selected' : '' ?>>Kecil</option>
                                    <option value="Sedang" <?= ($member['skala_bisnis'] == 'Sedang') ? 'selected' : '' ?>>Sedang</option>
                                    <option value="Besar" <?= ($member['skala_bisnis'] == 'Besar') ? 'selected' : '' ?>>Besar</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Skala Bisnis En</label>
                                <select class="form-control" id="skala_bisnis_en" name="skala_bisnis_en">
                                    <option value="" disabled <?= ($member['skala_bisnis_en'] == null) ? 'selected' : '' ?>>Pilih Skala Bisnis</option>
                                    <option value="Small" <?= ($member['skala_bisnis_en'] == 'Small') ? 'selected' : '' ?>>Small</option>
                                    <option value="Medium" <?= ($member['skala_bisnis_en'] == 'Medium') ? 'selected' : '' ?>>Medium</option>
                                    <option value="Large" <?= ($member['skala_bisnis_en'] == 'Large') ? 'selected' : '' ?>>Large</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="<?= $member['email'] ?>" name="email"
                                    placeholder="Masukkan Email">
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
                                <select class="form-control" id="kategori_produk" name="kategori_produk">
                                    <option value="" disabled <?= ($member['kategori_produk'] == null) ? 'selected' : '' ?>>Pilih Kategori Produk</option>
                                    <option value="Agrikultur" <?= ($member['kategori_produk'] == 'Agrikultur') ? 'selected' : '' ?>>Agrikultur</option>
                                    <option value="Perkebunan" <?= ($member['kategori_produk'] == 'Perkebunan') ? 'selected' : '' ?>>Perkebunan</option>
                                    <option value="Perikanan" <?= ($member['kategori_produk'] == 'Perikanan') ? 'selected' : '' ?>>Perikanan</option>
                                    <option value="Peternakan" <?= ($member['kategori_produk'] == 'Peternakan') ? 'selected' : '' ?>>Peternakan</option>
                                    <option value="Makanan dan Minuman" <?= ($member['kategori_produk'] == 'Makanan dan Minuman') ? 'selected' : '' ?>>Makanan dan Minuman</option>
                                    <option value="Tekstil dan Pakaian" <?= ($member['kategori_produk'] == 'Tekstil dan Pakaian') ? 'selected' : '' ?>>Tekstil dan Pakaian</option>
                                    <option value="Elektronik" <?= ($member['kategori_produk'] == 'Elektronik') ? 'selected' : '' ?>>Elektronik</option>
                                    <option value="Otomotif" <?= ($member['kategori_produk'] == 'Otomotif') ? 'selected' : '' ?>>Otomotif</option>
                                    <option value="Kerajinan Tangan" <?= ($member['kategori_produk'] == 'Kerajinan Tangan') ? 'selected' : '' ?>>Kerajinan Tangan</option>
                                    <option value="Perhiasan" <?= ($member['kategori_produk'] == 'Perhiasan') ? 'selected' : '' ?>>Perhiasan</option>
                                    <option value="Furnitur" <?= ($member['kategori_produk'] == 'Furnitur') ? 'selected' : '' ?>>Furnitur</option>
                                    <option value="Kosmetik dan Kesehatan" <?= ($member['kategori_produk'] == 'Kosmetik dan Kesehatan') ? 'selected' : '' ?>>Kosmetik dan Kesehatan</option>
                                    <option value="Bahan Bangunan" <?= ($member['kategori_produk'] == 'Bahan Bangunan') ? 'selected' : '' ?>>Bahan Bangunan</option>
                                    <option value="Alat Berat" <?= ($member['kategori_produk'] == 'Alat Berat') ? 'selected' : '' ?>>Alat Berat</option>
                                    <option value="Produk Kimia" <?= ($member['kategori_produk'] == 'Produk Kimia') ? 'selected' : '' ?>>Produk Kimia</option>
                                    <option value="Energi dan Pertambangan" <?= ($member['kategori_produk'] == 'Energi dan Pertambangan') ? 'selected' : '' ?>>Energi dan Pertambangan</option>
                                    <option value="Logam dan Mineral" <?= ($member['kategori_produk'] == 'Logam dan Mineral') ? 'selected' : '' ?>>Logam dan Mineral</option>
                                    <option value="Kertas dan Percetakan" <?= ($member['kategori_produk'] == 'Kertas dan Percetakan') ? 'selected' : '' ?>>Kertas dan Percetakan</option>
                                    <option value="Mainan dan Hiburan" <?= ($member['kategori_produk'] == 'Mainan dan Hiburan') ? 'selected' : '' ?>>Mainan dan Hiburan</option>
                                    <option value="Produk Digital dan IT" <?= ($member['kategori_produk'] == 'Produk Digital dan IT') ? 'selected' : '' ?>>Produk Digital dan IT</option>
                                    <option value="Produk Ramah Lingkungan" <?= ($member['kategori_produk'] == 'Produk Ramah Lingkungan') ? 'selected' : '' ?>>Produk Ramah Lingkungan</option>
                                    <option value="Alat Tulis dan Kantor" <?= ($member['kategori_produk'] == 'Alat Tulis dan Kantor') ? 'selected' : '' ?>>Alat Tulis dan Kantor</option>
                                    <option value="Peralatan Rumah Tangga" <?= ($member['kategori_produk'] == 'Peralatan Rumah Tangga') ? 'selected' : '' ?>>Peralatan Rumah Tangga</option>
                                    <option value="Alat Olahraga" <?= ($member['kategori_produk'] == 'Alat Olahraga') ? 'selected' : '' ?>>Alat Olahraga</option>
                                    <option value="Produk Fashion dan Aksesoris" <?= ($member['kategori_produk'] == 'Produk Fashion dan Aksesoris') ? 'selected' : '' ?>>Produk Fashion dan Aksesoris</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori Produk En</label>
                                <select class="form-control" id="kategori_produk_en" name="kategori_produk_en">
                                    <option value="" disabled <?= ($member['kategori_produk_en'] == null) ? 'selected' : '' ?>>Pilih Kategori Produk</option>
                                    <option value="Agriculture" <?= ($member['kategori_produk_en'] == 'Agriculture') ? 'selected' : '' ?>>Agriculture</option>
                                    <option value="Plantation" <?= ($member['kategori_produk_en'] == 'Plantation') ? 'selected' : '' ?>>Plantation</option>
                                    <option value="Fisheries" <?= ($member['kategori_produk_en'] == 'Fisheries') ? 'selected' : '' ?>>Fisheries</option>
                                    <option value="Livestock" <?= ($member['kategori_produk_en'] == 'Livestock') ? 'selected' : '' ?>>Livestock</option>
                                    <option value="Food and Beverages" <?= ($member['kategori_produk_en'] == 'Food and Beverages') ? 'selected' : '' ?>>Food and Beverages</option>
                                    <option value="Textiles and Apparel" <?= ($member['kategori_produk_en'] == 'Textiles and Apparel') ? 'selected' : '' ?>>Textiles and Apparel</option>
                                    <option value="Electronics" <?= ($member['kategori_produk_en'] == 'Electronics') ? 'selected' : '' ?>>Electronics</option>
                                    <option value="Automotive" <?= ($member['kategori_produk_en'] == 'Automotive') ? 'selected' : '' ?>>Automotive</option>
                                    <option value="Handicrafts" <?= ($member['kategori_produk_en'] == 'Handicrafts') ? 'selected' : '' ?>>Handicrafts</option>
                                    <option value="Jewelry" <?= ($member['kategori_produk_en'] == 'Jewelry') ? 'selected' : '' ?>>Jewelry</option>
                                    <option value="Furniture" <?= ($member['kategori_produk_en'] == 'Furniture') ? 'selected' : '' ?>>Furniture</option>
                                    <option value="Cosmetics and Health" <?= ($member['kategori_produk_en'] == 'Cosmetics and Health') ? 'selected' : '' ?>>Cosmetics and Health</option>
                                    <option value="Building Materials" <?= ($member['kategori_produk_en'] == 'Building Materials') ? 'selected' : '' ?>>Building Materials</option>
                                    <option value="Heavy Equipment" <?= ($member['kategori_produk_en'] == 'Heavy Equipment') ? 'selected' : '' ?>>Heavy Equipment</option>
                                    <option value="Chemical Products" <?= ($member['kategori_produk_en'] == 'Chemical Products') ? 'selected' : '' ?>>Chemical Products</option>
                                    <option value="Energy and Mining" <?= ($member['kategori_produk_en'] == 'Energy and Mining') ? 'selected' : '' ?>>Energy and Mining</option>
                                    <option value="Metals and Minerals" <?= ($member['kategori_produk_en'] == 'Metals and Minerals') ? 'selected' : '' ?>>Metals and Minerals</option>
                                    <option value="Paper and Printing" <?= ($member['kategori_produk_en'] == 'Paper and Printing') ? 'selected' : '' ?>>Paper and Printing</option>
                                    <option value="Toys and Entertainment" <?= ($member['kategori_produk_en'] == 'Toys and Entertainment') ? 'selected' : '' ?>>Toys and Entertainment</option>
                                    <option value="Digital and IT Products" <?= ($member['kategori_produk_en'] == 'Digital and IT Products') ? 'selected' : '' ?>>Digital and IT Products</option>
                                    <option value="Eco-friendly Products" <?= ($member['kategori_produk_en'] == 'Eco-friendly Products') ? 'selected' : '' ?>>Eco-friendly Products</option>
                                    <option value="Stationery and Office Supplies" <?= ($member['kategori_produk_en'] == 'Stationery and Office Supplies') ? 'selected' : '' ?>>Stationery and Office Supplies</option>
                                    <option value="Household Appliances" <?= ($member['kategori_produk_en'] == 'Household Appliances') ? 'selected' : '' ?>>Household Appliances</option>
                                    <option value="Sports Equipment" <?= ($member['kategori_produk_en'] == 'Sports Equipment') ? 'selected' : '' ?>>Sports Equipment</option>
                                    <option value="Fashion and Accessories" <?= ($member['kategori_produk_en'] == 'Fashion and Accessories') ? 'selected' : '' ?>>Fashion and Accessories</option>
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
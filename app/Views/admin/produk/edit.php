<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Data Produk</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin-update-produk/' . $produk['id_produk']) ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Username Member</label>
                                <select class="form-select" id="id_member" name="id_member" required>
                                    <option value="" disabled>Pilih Username Member</option>
                                    <?php foreach ($member as $item) : ?>
                                        <option value="<?= $item['id_member'] ?>" <?= ($item['id_member'] == $produk['id_member']) ? 'selected' : '' ?>>
                                            <?= $item['username'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Produk</label>
                                <input type="file" class="form-control" name="foto_produk" id="foto_produk" onchange="previewImage()">
                                <img id="preview" src="<?= base_url('img/' . $produk['foto_produk']) ?>" alt="Foto Produk" class="img-thumbnail mt-2" style="max-width: 100px;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" value="<?= $produk['nama_produk'] ?>" name="nama_produk" value="Masukkan Nama Produk" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                <textarea class="form-control" style="height: 200px;" id="deskripsi_produk" name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk"><?= $produk['deskripsi_produk'] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">HS Code</label>
                                <input type="text" class="form-control" value="<?= $produk['hs_code'] ?>" name="hs_code" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Minimum Order</label>
                                <input type="number" class="form-control" value="<?= $produk['minimum_order_qty'] ?>" name="minimum_order_qty" value="100" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kapasitas Produksi Per Bulan</label>
                                <input type="number" class="form-control" value="<?= $produk['kapasitas_produksi_bln'] ?>" name="kapasitas_produksi_bln" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-produk') ?>" class="btn btn-secondary">Kembali</a>
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
    // Preview Image
    function previewImage() {
        const file = document.getElementById('foto_produk').files[0];
        const preview = document.getElementById('preview');
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "/img/p1.jpg";
        }
    }
</script>

<?= $this->endSection('content') ?>
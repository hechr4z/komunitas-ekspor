<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Tambah Data Produk</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin-create-produk') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Username Member</label>
                                <select class="form-select" id="id_member" name="id_member" required>
                                    <option value="" selected disabled>Pilih Username Member</option>
                                    <?php foreach ($member as $item): ?>
                                        <option value="<?= $item['id_member'] ?>"><?= $item['username'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Foto Produk</label>
                                <input type="file" class="form-control" name="foto_produk" id="foto_produk"
                                    onchange="previewImage()">
                                <img id="preview" src="https://via.placeholder.com/100" alt="Foto Produk"
                                    class="img-thumbnail mt-2" style="max-width: 100px;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk"
                                    placeholder="Masukkan Nama Produk" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Produk En</label>
                                <input type="text" class="form-control" name="nama_produk_en"
                                    placeholder="Masukkan Nama Produk Versi Bahasa Inggris" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                <textarea class="form-control" style="height: 200px;" id="deskripsi_produk"
                                    name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_produk_en" class="form-label">Deskripsi Produk En</label>
                                <textarea class="form-control" style="height: 200px;" id="deskripsi_produk_en"
                                    name="deskripsi_produk_en"
                                    placeholder="Masukkan Deskripsi Produk Versi Bahasa Inggris"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">HS Code</label>
                                <input type="text" class="form-control" name="hs_code" placeholder="Masukkan HS Code"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Minimum Order Quantity</label>
                                <input type="number" class="form-control" name="minimum_order_qty"
                                    placeholder="Masukkan Minimum Order Quantity" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kapasitas Produksi Bulanan</label>
                                <input type="number" class="form-control" name="kapasitas_produksi_bln"
                                    placeholder="Masukkan Kapasitas Produksi Bulanan" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white"
                                    style="background-color: #03AADE;">Tambah</button>
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

        reader.onload = function (e) {
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
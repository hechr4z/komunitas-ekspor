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
                                <label for="deskripsi-editor" class="form-label">Deskripsi Produk</label>
                                <textarea id="deskripsi-editor" name="deskripsi_produk" placeholder="Masukkan Deskripsi Produk"><?= $produk['deskripsi_produk'] ?></textarea>
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

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    let editorInstance;

    // Initialize CKEditor on page load
    ClassicEditor
        .create(document.querySelector('#deskripsi-editor'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    // Event listener for modal show
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const progres = button.getAttribute('data-progres'); // Get progres data from button attribute

        if (editorInstance) {
            // Remove numbering if it starts with "1. "
            const contentWithoutNumbering = progres.replace(/^\d+\.\s*/, '');
            editorInstance.setData(contentWithoutNumbering); // Set data to CKEditor
        }
    });

    // Optional: Clear CKEditor content when the modal is closed
    editModal.addEventListener('hidden.bs.modal', function() {
        if (editorInstance) {
            editorInstance.setData(''); // Clear the editor content
        }
    });

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
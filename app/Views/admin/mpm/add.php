<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Tambah MPM</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nama Member</label>
                                <select class="form-select" id="nama_member" name="nama_member" required>
                                    <option value="" disabled selected>Pilih Nama Member</option>
                                    <option value="1">Member 1</option>
                                    <option value="2">Member 2</option>
                                    <option value="3">Member 3</option>
                                    <!-- Tambahkan opsi lainnya jika diperlukan -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Kirim Email</label>
                                <input type="date" class="form-control" name="tanggal_kirim_email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Update Terakhir</label>
                                <input type="date" class="form-control" name="update_terakhir" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan"
                                    placeholder="Masukkan Nama Perusahaan" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Negara Perusahaan</label>
                                <select class="form-select" id="negara_perusahaan" name="negara_perusahaan" required>
                                    <option value="" disabled selected>Pilih Negara Perusahaan</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Thailand">Thailand</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Progress</label>
                                <select class="form-select" id="status_progress" name="status_progress" required>
                                    <option value="" disabled selected>Pilih Status Progress</option>
                                    <option value="Terkirim">Terkirim</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="progres-editor" class="form-label">Progres</label>
                                <textarea id="progres-editor" name="progres" rows="3"
                                    placeholder="Deskripsikan progres yang telah dilakukan" required></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white"
                                    style="background-color: #03AADE;">Simpan</button>
                                <a href="/admin-mpm" class="btn btn-secondary">Kembali</a>
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
        .create(document.querySelector('#progres-editor'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    // Event listener for modal show
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const progres = button.getAttribute('data-progres'); // Get progres data from button attribute

        if (editorInstance) {
            // Remove numbering if it starts with "1. "
            const contentWithoutNumbering = progres.replace(/^\d+\.\s*/, '');
            editorInstance.setData(contentWithoutNumbering); // Set data to CKEditor
        }
    });

    // Optional: Clear CKEditor content when the modal is closed
    editModal.addEventListener('hidden.bs.modal', function () {
        if (editorInstance) {
            editorInstance.setData(''); // Clear the editor content
        }
    });
</script>

<?= $this->endSection('content') ?>
<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Tambah Data MPM</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin-create-mpm') ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Username Member</label>
                                <select class="form-select" id="id_member" name="id_member" required>
                                    <option value="" selected disabled>Pilih Username Member</option>
                                    <?php foreach ($member as $item) : ?>
                                        <option value="<?= $item['id_member'] ?>"><?= $item['username'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Kirim Email</label>
                                <input type="date" class="form-control" name="tgl_kirim_email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Update Terakhir</label>
                                <input type="date" class="form-control" name="update_terakhir" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Negara Perusahaan</label>
                                <select class="form-select" id="negara_perusahaan" name="negara_perusahaan" required>
                                    <option value="" selected disabled>Pilih Negara Perusahaan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status Progres</label>
                                <select class="form-select" id="status_progres" name="status_progres" required>
                                    <option value="" disabled selected>Pilih Status Progres</option>
                                    <option value="Terkirim">Terkirim</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="progres-editor" class="form-label">Progres</label>
                                <textarea id="progres-editor" name="progres"></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Tambah</button>
                                <a href="<?= base_url('admin-mpm') ?>" class="btn btn-secondary">Kembali</a>
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

    function populateCountryDropdown(selectElementId) {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                const selectElement = document.getElementById(selectElementId);

                // Kosongkan dropdown sebelum mengisi
                selectElement.innerHTML = '<option value="" selected disabled>Pilih Negara Perusahaan</option>';

                // Urutkan nama negara secara alfabetis
                data.sort((a, b) => a.name.common.localeCompare(b.name.common));

                // Tambahkan negara ke dalam dropdown
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.name.common;
                    option.textContent = country.name.common;
                    selectElement.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching country data:', error));
    }

    document.addEventListener('DOMContentLoaded', function() {
        populateCountryDropdown('negara_perusahaan');
    });
</script>

<?= $this->endSection('content') ?>
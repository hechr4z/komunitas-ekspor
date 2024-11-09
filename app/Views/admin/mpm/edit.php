<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Data MPM</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin-update-mpm/' . $mpm['id_mpm']) ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Username Member</label>
                                <select class="form-select" id="id_member" name="id_member" required>
                                    <option value="" disabled>Pilih Username Member</option>
                                    <?php foreach ($member as $item) : ?>
                                        <option value="<?= $item['id_member'] ?>" <?= ($item['id_member'] == $mpm['id_member']) ? 'selected' : '' ?>>
                                            <?= $item['username'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Kirim Email</label>
                                <input type="date" class="form-control" name="tgl_kirim_email" value="<?= date('Y-m-d', strtotime($mpm['tgl_kirim_email'])) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Update Terakhir</label>
                                <input type="date" class="form-control" name="update_terakhir" value="<?= is_null($mpm['update_terakhir']) ? null : date('Y-m-d', strtotime($mpm['update_terakhir'])) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan" value="<?= $mpm['nama_perusahaan'] ?>" required>
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
                                    <option value="" disabled <?= empty($mpm['status_progres']) ? 'selected' : '' ?>>Pilih Status Progres</option>
                                    <option value="Terkirim" <?= $mpm['status_progres'] === 'Terkirim' ? 'selected' : '' ?>>Terkirim</option>
                                    <option value="Gagal" <?= $mpm['status_progres'] === 'Gagal' ? 'selected' : '' ?>>Gagal</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="progres-editor" class="form-label">Progres</label>
                                <textarea id="progres-editor" name="progres"><?= $mpm['progres'] ?></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
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

    // Set the country from PHP as a JavaScript variable
    const selectedCountry = "<?php echo $mpm['negara_perusahaan']; ?>";

    // Function to fetch and populate country dropdown
    function populateCountryDropdown(selectElementId) {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                const selectElement = document.getElementById(selectElementId);

                // Clear existing options and add the default option
                selectElement.innerHTML = '<option value="" selected disabled>Pilih Negara Perusahaan</option>';

                // Sort countries alphabetically
                data.sort((a, b) => a.name.common.localeCompare(b.name.common));

                // Add countries to dropdown and set selected if it matches
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.name.common;
                    option.textContent = country.name.common;
                    if (country.name.common === selectedCountry) {
                        option.selected = true;
                    }
                    selectElement.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching country data:', error));
    }

    // Call function on page load
    document.addEventListener('DOMContentLoaded', function() {
        populateCountryDropdown('negara_perusahaan');
    });
</script>

<?= $this->endSection('content') ?>
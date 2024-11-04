<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Tambah Data Buyers</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin-create-buyers') ?>" method="post" enctype="multipart/form-data">
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
                                <label class="form-label">HS Code</label>
                                <input type="text" class="form-control" name="hs_code" placeholder="Masukkan HS Code" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Perusahaan</label>
                                <input type="email" class="form-control" name="email_perusahaan" placeholder="Masukkan Email Perusahaan" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Website Perusahaan</label>
                                <input type="text" class="form-control" name="website_perusahaan" placeholder="Masukkan Website Perusahaan" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-buyers') ?>" class="btn btn-secondary">Kembali</a>
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
<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Tambah Data Buyers</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan"
                                    placeholder="Masukkan Nama Perusahaan" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Negara</label>
                                <input type="text" class="form-control" name="negara" placeholder="Masukkan Negara"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kode HS</label>
                                <input type="text" class="form-control" name="kode_hs" placeholder="Masukkan Kode HS"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukkan Email"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control" name="website" placeholder="Masukkan Website"
                                    required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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

<?= $this->endSection('content') ?>
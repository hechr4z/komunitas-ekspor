<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Satuan</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nama Member</label>
                                <select class="form-select" id="nama_member" name="nama_member" required>
                                    <option value="" disabled>Pilih Nama Member</option>
                                    <option value="1" selected>Member 1</option>
                                    <option value="2">Member 2</option>
                                    <option value="3">Member 3</option>
                                    <!-- Tambahkan opsi lainnya jika diperlukan -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Satuan</label>
                                <input type="text" class="form-control" name="satuan" value="PCS" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white"
                                    style="background-color: #03AADE;">Simpan</button>
                                <a href="/admin-satuan" class="btn btn-secondary">Kembali</a>
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
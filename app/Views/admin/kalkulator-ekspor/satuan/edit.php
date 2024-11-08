<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Data Satuan</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin-update-satuan/' . $satuan['id_satuan']) ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Username Member</label>
                                <input type="text" class="form-control" id="id_member" name="id_member" value="<?= $satuan['id_member'] ? $member[array_search($satuan['id_member'], array_column($member, 'id_member'))]['username'] : '' ?>" disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Satuan</label>
                                <input type="text" class="form-control" name="satuan" value="<?= $satuan['satuan'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-satuan') ?>" class="btn btn-secondary">Kembali</a>
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
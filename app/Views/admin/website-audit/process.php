<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Audit Website</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin-done-website-audit/' . $webaudit['id_webaudit']) ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Username Member</label>
                                <input type="text" class="form-control" id="id_member" name="id_member" value="<?= $webaudit['id_member'] ? $member[array_search($webaudit['id_member'], array_column($member, 'id_member'))]['username'] : '' ?>" disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Link Website</label>
                                <input type="text" class="form-control" id="link_website" name="link_website" value="<?= $webaudit['link_website'] ?>" disabled>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Fitur</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="profil_perusahaan" name="fitur[]" value="Profil Perusahaan">
                                    <label class="form-check-label" for="profil_perusahaan">Profil Perusahaan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="katalog_produk" name="fitur[]" value="Katalog Produk">
                                    <label class="form-check-label" for="katalog_produk">Katalog Produk</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kontak" name="fitur[]" value="Kontak">
                                    <label class="form-check-label" for="kontak">Kontak</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="blog_artikel" name="fitur[]" value="Blog / Artikel Edukasi">
                                    <label class="form-check-label" for="blog_artikel">Blog / Artikel Edukasi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="aktivitas_perusahaan" name="fitur[]" value="Aktivitas Perusahaan / Berita">
                                    <label class="form-check-label" for="aktivitas_perusahaan">Aktivitas Perusahaan / Berita</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="integrasi_social" name="fitur[]" value="Integrasi Ke Social Media / Marketplace">
                                    <label class="form-check-label" for="integrasi_social">Integrasi Ke Social Media / Marketplace</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Bahasa</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bahasa_inggris" name="bahasa[]" value="Inggris">
                                    <label class="form-check-label" for="bahasa_inggris">Inggris</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="bahasa_indonesia" name="bahasa[]" value="Indonesia">
                                    <label class="form-check-label" for="bahasa_indonesia">Indonesia</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">SEO On Page</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="meta_tags" name="seo[]" value="Meta Tags Optimalisasi">
                                    <label class="form-check-label" for="meta_tags">Meta Tags Optimalisasi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="struktur_data" name="seo[]" value="Struktur Data">
                                    <label class="form-check-label" for="struktur_data">Struktur Data</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="keyword_research" name="seo[]" value="Keyword Research">
                                    <label class="form-check-label" for="keyword_research">Keyword Research</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-website-audit') ?>" class="btn btn-secondary">Kembali</a>
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
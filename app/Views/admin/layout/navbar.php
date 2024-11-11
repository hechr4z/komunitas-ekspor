<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="<?= base_url('/') ?>"></a>
            <h1 class="m-0 display-6 text-uppercase text-primary1 font-weight-bold" style="font-size: 30px;">
                KEI<span class="text-white font-weight-normal">-Admin</span>
            </h1>
            </a>
        </div>

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-dashboard')) ? 'active' : '' ?>" href="<?= base_url('admin-dashboard') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-gauge"></i>
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?=
                                        (current_url() == base_url('admin-member')) ? 'active' : ((current_url() == base_url('admin-search-member')) ? 'active' : ((current_url() == base_url('admin-add-member')) ? 'active' : ((strpos(current_url(), base_url('admin-edit-member')) === 0) ? 'active' : '')))
                                        ?>" href="<?= base_url('admin-member') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span class="nav-link-text">Member</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?=
                                        (current_url() == base_url('admin-buyers')) ? 'active' : ((current_url() == base_url('admin-search-buyers')) ? 'active' : ((current_url() == base_url('admin-add-buyers')) ? 'active' : ((strpos(current_url(), base_url('admin-edit-buyers')) === 0) ? 'active' : '')))
                                        ?>" href="<?= base_url('admin-buyers') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                        <span class="nav-link-text">Buyers</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?=
                                        (current_url() == base_url('admin-produk')) ? 'active' : ((current_url() == base_url('admin-search-produk')) ? 'active' : ((current_url() == base_url('admin-add-produk')) ? 'active' : ((strpos(current_url(), base_url('admin-edit-produk')) === 0) ? 'active' : '')))
                                        ?>" href="<?= base_url('admin-produk') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-box"></i>
                        </span>
                        <span class="nav-link-text">Produk</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?=
                                        (current_url() == base_url('admin-sertifikat')) ? 'active' : ((current_url() == base_url('admin-search-sertifikat')) ? 'active' : ((current_url() == base_url('admin-add-sertifikat')) ? 'active' : ((strpos(current_url(), base_url('admin-edit-sertifikat')) === 0) ? 'active' : '')))
                                        ?>" href="<?= base_url('admin-sertifikat') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-certificate"></i>
                        </span>
                        <span class="nav-link-text">Sertifikat</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-belajar-ekspor')) ? 'active' : '' ?>" href="<?= base_url('admin-belajar-ekspor') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-book"></i>
                        </span>
                        <span class="nav-link-text">Belajar Ekspor</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-kategori-belajar-ekspor')) ? 'active' : '' ?>" href="<?= base_url('admin-kategori-belajar-ekspor') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-list"></i>
                        </span>
                        <span class="nav-link-text">Kategori Belajar Ekspor</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-video-tutorial')) ? 'active' : '' ?>" href="<?= base_url('admin-video-tutorial') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-video"></i>
                        </span>
                        <span class="nav-link-text">Video Tutorial</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-kategori-video-tutorial')) ? 'active' : '' ?>" href="<?= base_url('admin-kategori-video-tutorial') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-list"></i>
                        </span>
                        <span class="nav-link-text">Kategori Video Tutorial</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?=
                                        (current_url() == base_url('admin-exwork')) ? 'active' : ((current_url() == base_url('admin-search-exwork')) ? 'active' : ((current_url() == base_url('admin-add-exwork')) ? 'active' : ((strpos(current_url(), base_url('admin-edit-exwork')) === 0) ? 'active' : '')))
                                        ?>" href="<?= base_url('admin-exwork') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-calculator"></i>
                        </span>
                        <span class="nav-link-text">Exwork</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?=
                                        (current_url() == base_url('admin-fob')) ? 'active' : ((current_url() == base_url('admin-search-fob')) ? 'active' : ((current_url() == base_url('admin-add-fob')) ? 'active' : ((strpos(current_url(), base_url('admin-edit-fob')) === 0) ? 'active' : '')))
                                        ?>" href="<?= base_url('admin-fob') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-calculator"></i>
                        </span>
                        <span class="nav-link-text">FOB</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?=
                                        (current_url() == base_url('admin-cfr')) ? 'active' : ((current_url() == base_url('admin-search-cfr')) ? 'active' : ((current_url() == base_url('admin-add-cfr')) ? 'active' : ((strpos(current_url(), base_url('admin-edit-cfr')) === 0) ? 'active' : '')))
                                        ?>" href="<?= base_url('admin-cfr') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-calculator"></i>
                        </span>
                        <span class="nav-link-text">CFR</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?=
                                        (current_url() == base_url('admin-cif')) ? 'active' : ((current_url() == base_url('admin-search-cif')) ? 'active' : ((current_url() == base_url('admin-add-cif')) ? 'active' : ((strpos(current_url(), base_url('admin-edit-cif')) === 0) ? 'active' : '')))
                                        ?>" href="<?= base_url('admin-cif') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-calculator"></i>
                        </span>
                        <span class="nav-link-text">CIF</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?=
                                        (current_url() == base_url('admin-satuan')) ? 'active' : ((current_url() == base_url('admin-search-satuan')) ? 'active' : ((strpos(current_url(), base_url('admin-edit-satuan')) === 0) ? 'active' : ''))
                                        ?>" href="<?= base_url('admin-satuan') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-calculator"></i>
                        </span>
                        <span class="nav-link-text">Satuan</span>
                    </a>
                </li>

                <li class="nav`-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-mpm') || current_url() == base_url('admin-search-mpm')) ? 'active' : '' ?>" href="<?= base_url('admin-mpm') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <span class="nav-link-text">MPM</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-website-audit') || current_url() == base_url('admin-search-website-audit')) ? 'active' : '' ?>" href="<?= base_url('admin-website-audit') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-globe"></i>
                        </span>
                        <span class="nav-link-text">Website Audit</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-pengumuman')) ? 'active' : '' ?>" href="<?= base_url('admin-pengumuman') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </span>
                        <span class="nav-link-text">Pengumuman</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-manfaat-join')) ? 'active' : '' ?>" href="<?= base_url('admin-manfaat-join') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-gift"></i>
                        </span>
                        <span class="nav-link-text">Manfaat Join</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-slider')) ? 'active' : '' ?>" href="<?= base_url('admin-slider') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-image"></i>
                        </span>
                        <span class="nav-link-text">Slider</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-web-profile')) ? 'active' : '' ?>" href="<?= base_url('admin-web-profile') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-star"></i>
                        </span>
                        <span class="nav-link-text">Web Profile</span>
                    </a>
                </li>

                </li>
            </ul>
        </nav>
    </div>
</div>
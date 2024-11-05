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
        </div><!--//app-branding-->

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
                    <a class="nav-link <?= (current_url() == base_url('admin-member')) ? 'active' : '' ?>" href="<?= base_url('admin-member') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <span class="nav-link-text">Member</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-buyers')) ? 'active' : '' ?>" href="<?= base_url('admin-buyers') ?>">
                        <span class="nav-icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                        <span class="nav-link-text">Buyers</span>
                    </a>
                </li>

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('/admin/provinsi/index')) ? 'active' : '' ?>" href="<?= base_url('/admin/provinsi/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Data Provinsi</span>
                    </a>
                </li>

                <li class="nav`-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('/admin/kabkota/index')) ? 'active' : '' ?>" href="<?= base_url('/admin/kabkota/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Data Kabupaten / kota</span>
                    </a>
                </li>

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin/member/index')) ? 'active' : '' ?>" href="<?= base_url('admin/member/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Data Member</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin/video_pembelajaran/index')) ? 'active' : '' ?>" href="<?= base_url('admin/video_pembelajaran/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fas fa-video bi bi-activity" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 1a1 1 0 0 0 1 1v12a1 1 0 0 0 1-1H1a1 1 0 0 0-1-1V2zm3 1h6v2H6V3zm6 3H2v2h12V6zm0-3H2V3h12v2zm-6 3H2v2h12V9zm0-3H2V6h12v2z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Video Tutorial</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin/kategori_videos/index')) ? 'active' : '' ?>" href="<?= base_url('admin/kategori_videos/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fas fa-folder bi bi-activity" viewBox="0 0 16 16">
                                <path d="M.5 3.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5a.5.5 0 0 0 0-1zm2-2h3.5a.5.5 0 0 0 0 1H3a.5.5 0 1 0 0-1zm0 7a.5.5 0 0 0 0 1h12a.5.5 0 0 0 0-1H3a.5.5 0 0 0 0 1zm0 7a.5.5 0 0 0 0 1h12a.5.5 0 0 0 0-1H3a.5.5 0 0 0 0 1z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Kategori Video Tutorial</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin/keuntungan/index')) ? 'active' : '' ?>" href="<?= base_url('admin/keuntungan/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v1h-2V1a1 1 0 0 1 1-1zm4 1a1 1 0 0 1 1 1v1h-2V2a1 1 0 0 1 1-1zm-8 0a1 1 0 0 1 1 1v1H2V2a1 1 0 0 1 1-1zm0 4a1 1 0 0 1 1 1v1H2V6a1 1 0 0 1 1-1zm8 0a1 1 0 0 1 1 1v1h-2V6a1 1 0 0 1 1-1zm-4 0a1 1 0 0 1 1 1v1H6V6a1 1 0 0 1 1-1zm-4 4a1 1 0 0 1 1 1v1H2v-1a1 1 0 0 1 1-1zm8 0a1 1 0 0 1 1 1v1h-2v-1a1 1 0 0 1 1-1zm-4 0a1 1 0 0 1 1 1v1H6v-1a1 1 0 0 1 1-1z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Keuntungan</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin/pengumuman/index')) ? 'active' : '' ?>" href="<?= base_url('admin/pengumuman/index') ?>">
                        <span class="nav-icon">
                            <svg width="16" height="16" fill="currentColor" class="fas fa-bullhorn bi bi-activity" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Pengumuman</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin/kontak/index')) ? 'active' : '' ?>" href="<?= base_url('admin/kontak/index') ?>">
                        <span class="nav-icon">
                            <svg width="16" height="16" fill="currentColor" class="fas fa-address-book bi bi-activity" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V.5A.5.5 0 0 1 .5 0h3zM4 1h-2v14h2V1zm8 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V.5A.5.5 0 0 1 9 0h3zM10 1h-2v14h2V1z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Kontak</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin/founder/index')) ? 'active' : '' ?>" href="<?= base_url('admin/founder/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" />
                                <path fill-rule="evenodd" d="M0 14s1-3 7-3 7 3 7 3V1H0v13z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Founder</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin/link_founder/index')) ? 'active' : '' ?>" href="<?= base_url('admin/link_founder/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
                                <path d="M6.354 0a2 2 0 0 1 1.414.586l1.5 1.5a2 2 0 0 1 0 2.828l-1.5 1.5a2 2 0 0 1-2.828 0l-1.5-1.5A2 2 0 0 1 0 4.828l1.5-1.5A2 2 0 0 1 2.828 0h3.526zM4.828 2.828a1 1 0 0 0 0 1.414l1.5 1.5a1 1 0 0 0 1.414 0l1.5-1.5a1 1 0 0 0 0-1.414l-1.5-1.5a1 1 0 0 0-1.414 0l-1.5 1.5zM16 11.172a2 2 0 0 1-1.414.586H10.586a2 2 0 0 1-1.414-.586l-1.5-1.5a2 2 0 0 1 0-2.828l1.5-1.5a2 2 0 0 1 2.828 0l1.5 1.5A2 2 0 0 1 16 11.172zM10.586 12a1 1 0 0 0 0-1.414l-1.5-1.5a1 1 0 0 0-1.414 0l-1.5 1.5a1 1 0 0 0 0 1.414l1.5 1.5a1 1 0 0 0 1.414 0l1.5-1.5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Link Founder</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin/tentang/index')) ? 'active' : '' ?>" href="<?= base_url('admin/tentang/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Tentang Kami</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin-belajar-ekspor')) ? 'active' : '' ?>" href="<?= base_url('admin-belajar-ekspor') ?>">
                        <span class="nav-icon">
                            <svg width="16" height="16" fill="currentColor" class="fas fa-bullhorn bi bi-activity" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Belajar Ekspor</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin-kategori-belajar-ekspor')) ? 'active' : '' ?>" href="<?= base_url('admin-kategori-belajar-ekspor') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                <path d="M9.828 1.5A.5.5 0 0 1 10.5 2h3a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .354.146l1.414 1.414a.5.5 0 0 0 .354.146h2.5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Kategori Belajar Ekspor</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->

                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin/berita/index')) ? 'active' : '' ?>" href="<?= base_url('admin/berita/index') ?>">
                        <span class="nav-icon">
                            <svg width="16" height="16" fill="currentColor" class="fas fa-newspaper bi bi-activity" viewBox="0 0 16 16" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Berita</span>
                    </a><!--//nav-link-->
                </li>
                <li class="nav-item">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link <?= (current_url() == base_url('admin/socialmedia/index')) ? 'active' : '' ?>" href="<?= base_url('admin/socialmedia/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fas fa-folder bi bi-activity" viewBox="0 0 16 16">
                                <path d="M.5 3.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5a.5.5 0 0 0 0-1zm2-2h3.5a.5.5 0 0 0 0 1H3a.5.5 0 1 0 0-1zm0 7a.5.5 0 0 0 0 1h12a.5.5 0 0 0 0-1H3a.5.5 0 0 0 0 1zm0 7a.5.5 0 0 0 0 1h12a.5.5 0 0 0 0-1H3a.5.5 0 0 0 0 1z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Social Media</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->


                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin/meta/index')) ? 'active' : '' ?>" href="<?= base_url('admin/meta/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                <path d="M9.828 1.5A.5.5 0 0 1 10.5 2h3a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .354.146l1.414 1.414a.5.5 0 0 0 .354.146h2.5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Meta</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->
                <li class="nav-item">
                    <a class="nav-link <?= (current_url() == base_url('admin/testimonial/index')) ? 'active' : '' ?>" href="<?= base_url('admin/testimonial/index') ?>">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                <path d="M9.828 1.5A.5.5 0 0 1 10.5 2h3a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .354.146l1.414 1.414a.5.5 0 0 0 .354.146h2.5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Testimonial</span>
                    </a><!--//nav-link-->
                </li><!--//nav-item-->
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                </li><!--//nav-item-->
            </ul><!--//app-menu-->
        </nav><!--//app-nav-->
    </div><!--//sidepanel-inner-->
</div><!--//app-sidepanel-->
<header class="app-header fixed-top">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">

                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <svg xmlns="" width="30" height="30" viewBox="0 0 30 30" role="img">
                                <title>Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div><!--//col-->
                    <div class="search-mobile-trigger d-sm-none col">
                        <i class="search-mobile-trigger-icon fa-solid fa-magnifying-glass"></i>
                    </div><!--//col-->
                    <div class="app-utilities col-auto">
                        <div class="app-utility-item app-user-dropdown dropdown">
                            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="<?= base_url('/asset-user/images/Favicon_PRIBADI-Indonesia_20012024041928.jpeg') ?>" alt="user profile">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li><a class="dropdown-item" href="/pengumuman?view=member">Tampilan Member</a></li>
                                <li><a class="dropdown-item" href="/?view=nonmember">Tampilan Non Member</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('logout') ?>">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--//row-->
            </div><!--//app-header-content-->
        </div><!--//container-fluid-->
    </div><!--//app-header-inner-->

    <?= $this->include('admin/layout/navbar'); ?>
</header><!--//app-header-->
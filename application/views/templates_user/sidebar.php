

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Login_user'); ?>">
                <div class="sidebar-brand-icon">
                <img src="<?= base_url('assets/img/logo-mayasi.png'); ?>" width="100" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">DASHBOARD USER</div>
            </a>

            <!-- Divider -->
            <!-- query menu -->
            <!-- Heading -->
            <hr class="sidebar-divider ">
            <div class="sidebar-heading">
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Login_user'); ?>">
                <i data-feather="home"></i>
                    <span>Dashboard User</span></a>

                    <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i data-feather="shopping-cart"></i>
                        <span>Daftar Orderan</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('Login_user/index_menu'); ?>">Orderan Masuk</a>
                            <a class="collapse-item" href="<?= base_url('Login_user/pesanan_telah_diproses'); ?>">Orderan Selesai</a>
                        </div>
                    </div>
                </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Admin_login/Logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i data-feather="log-out"></i>
            <span> Logout </span> </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                <img src="<?= base_url('assets/img/logo-mayasi.png'); ?>" width="100" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Admin Waroeng Mayasi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider ">

            <!-- query menu -->

            <div class="sidebar-heading">
                Administrator
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('User'); ?>">
                <i data-feather="home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('data_user/'); ?>">
                    <i data-feather="user-plus"></i>
                    <span>Daftar User</span></a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Menu'); ?>">
                <i data-feather="list"></i>
                    <span>Daftar Menu</span></a>
            </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i data-feather="shopping-cart"></i>
                        <span>Daftar Orderan</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('Pesanan'); ?>">Orderan Masuk</a>
                            <a class="collapse-item" href="<?= base_url('Pesanan/index_pesanan'); ?>">Orderan Selesai</a>
                            <a class="collapse-item" href="<?= base_url('Pesanan/batal'); ?>">Pesanan Dibatalkan</a>
                        </div>
                    </div>
                </li>
            <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i data-feather="book"></i>
                        <span>Data Laporan</span>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('Laporan'); ?>">Laporan Penjualan</a>
                            <!-- <a class="collapse-item" href="<?= base_url('Laporan/lap_pembayaran'); ?>">Laporan Pembayaran</a> -->
                        </div>
                    </div>
                </li>
           
            <!-- Nav Item - Pages Collapse Menu -->

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
      
        
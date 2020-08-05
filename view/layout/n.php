<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <?php if($_SESSION['akses']=='admin'){ ?>
            <?php if($_SESSION['level']!='Admin'){?>
            <li class="nav-item">
                <a class="nav-link" href="data_user.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User</span></a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="data_pengguna.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengguna</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="data_kategori.php">
                    <i class="fas fa-fw fa-th-large"></i>
                    <span>Kategori Produk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_produk.php">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Produk</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="data_pengguna.php">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Pembelian</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="data_pengguna.php">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Laporan Pembelian</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="data_slider.php">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Slider</span></a>
            </li>

            <?php if($_SESSION['level']!='Admin'){?>
            <li class="nav-item">
                <a class="nav-link" href="setting_web.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Setting Web</span></a>
            </li>
            <?php } ?>
            <?php } ?>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'];?></span>
                                <img class="img-profile rounded-circle" src="../assets/img/user.png">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <?php if($_SESSION['akses']=='admin'){ ?>
                                <a class="dropdown-item" href="edit_profile_admin.php">
                                    <i class="fas fa-wrench fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Edit Profile
                                </a>
                                <?php }else{ ?>
                                <a class="dropdown-item" href="edit_profile_karyawan.php">
                                    <i class="fas fa-wrench fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Edit Profile
                                </a>
                                <?php } ?>
                                <a class="dropdown-item" href="../php/aksi_logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
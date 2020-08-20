<?php
error_reporting(0);
session_start();
include '../php/koneksi.php';

?>
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<?php
$datasetting = mysqli_query($koneksi,"select * from setting order by id desc limit 0,1");
while($st=mysqli_fetch_assoc($datasetting)) { ?>
<header class="header shop">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> <?php echo $st['telp_satu']?> </li>
                            <li><i class="ti-headphone-alt"></i> <?php echo $st['telp_dua']?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin"></i> <?php echo $st['alamat']?></li>
                            <?php 
                                if($_SESSION['username']==''){ ?>
                            <li><a href="register.php"><i class="ti-user"></i> Register</a></li>
                            <li><a href="login.php"><i class="fa fa-sign-in"></i>Login</a></li>
                            <?php }else{ ?>
                            <li><a href="php/aksi_logout_frontend.php"><i class="ti-power-off"></i>Logout</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="logo">
                        <a href="index.html"><img src="assets/user/images/logo.png" alt="logo"></a>
                    </div>
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <div class="search-top">
                            <form class="search-form" action="pencarian.php" method="get">
                                <input required name="search" type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form action="pencarian.php" method="get">
                                <input required name="search" placeholder="Search Products Here....." type="search">
                                <button type="submit" class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <?php 
                            if($_SESSION['username']!=''){ ?>
                        <div class="sinlge-bar">
                            <a href="editprofile.php" class="single-icon">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i> <?= $_SESSION['username']; ?>
                            </a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <?php
                            $keranjang = mysqli_query($koneksi,"select * from keranjang where id_pengguna='$_SESSION[id]'");
                            $cek = mysqli_num_rows($keranjang);
                            if($cek > 0){ ?>

                            <a href="keranjang.php" class="single-icon"><i class="ti-bag"></i> <span
                                    class="total-count"><?=$cek?></span></a>
                            <?php }else{ ?>
                            <a href="keranjang.php" class="single-icon"><i class="ti-bag"></i></a>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="active"><a href="index.php">Home</a></li>
                                            <li><a href="all-product.php">Semua Produk</a></li>
                                            <?php 
                                            if($_SESSION['username']!=''){ ?>
                                            <li><a href="pembelian-saya.php">Transaksi</a></li>
                                            <?php } ?>
                                            <li><a href="contact-us.php">Hubungi Kami</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php } ?>
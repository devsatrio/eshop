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
                    <!-- Top Left -->
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
                            <li><i class="ti-user"></i> <a href="register.php">Register</a></li>
                            <li><i class="ti-power-off"></i><a href="login.php">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="logo">
                        <a href="index.html"><img src="assets/user/images/logo.png" alt="logo"></a>
                    </div>
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
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
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="#" class="single-icon"><i class="ti-bag"></i> <span
                                    class="total-count">2</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>2 Items</span>
                                    <a href="#">View Cart</a>
                                </div>
                                <ul class="shopping-list">
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i
                                                class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70"
                                                alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i
                                                class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70"
                                                alt="#"></a>
                                        <h4><a href="#">Woman Necklace</a></h4>
                                        <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                    </li>
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">$134.00</span>
                                    </div>
                                    <a href="checkout.html" class="btn animate">Checkout</a>
                                </div>
                            </div>
                        </div>
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
                                            <li><a href="all-product.php">All Product</a></li>
                                            <li><a href="contact-us.php">Contact Us</a></li>
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
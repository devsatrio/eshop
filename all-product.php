<!DOCTYPE html>
<html lang="zxx">
<?php include 'php/koneksi.php';?>
<?php include 'base_h.php';?>

<body class="js">
    <?php include 'base_nav.php';?>

    <!-- Product Style -->
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>All Product</h2>
                        </div>
                        <?php $produk = mysqli_query($koneksi,"select * from produk order by id desc limit 0,8");
                                        while($dpro=mysqli_fetch_assoc($produk)) { ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="default-img" src="assets/gambar/produk/<?php echo $dpro['gambar']?>"
                                            alt="#">
                                        <span class="price-dec"><?php echo $dpro['stok']?> Pcs</span>
                                    </a>

                                    <div class="button-head text-center">
                                        <a title="Add to cart" href="#">Add to cart</a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="#"><?php echo $dpro['nama']?></a></h3>
                                    <div class="product-price">
                                        <span><?php echo "Rp. ".number_format($dpro['harga'],0,',','.'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <div class="single-widget category mt-5">
                            <h3 class="title">Kategori</h3>
                            <ul class="categor-list">
                                <?php $datakategori = mysqli_query($koneksi,"select * from kategori order by id desc");
                                while($dkat=mysqli_fetch_assoc($datakategori)) { ?>
                                <li><a href="#"><?php echo $dkat['nama']?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Product Style 1  -->


    <?php include 'base_f.php';?>
</body>

</html>
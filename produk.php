<!DOCTYPE html>
<html lang="zxx">
<?php include 'php/koneksi.php';?>
<?php include 'base_h.php';?>

<body class="js">
    <?php include 'base_nav.php';?>

    <?php $produk = mysqli_query($koneksi,"select * from produk where id='$_GET[id]'");
    while($dpro=mysqli_fetch_assoc($produk)) { ?>
    <section class="product-area shop-sidebar shop section mr-5 ml-5 mt-3 pt-4">
        <div class="text-center">
            <h1>Detail Produk</h1>
        </div>
        <br>
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="product-gallery">
                    <img src="assets/gambar/produk/<?=$dpro['gambar']?>" width="100%" alt="#" class="img-thumbnail">
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="quickview-content">
                    <h2><?php echo $dpro['nama']?></h2>
                    
                    <h3><?php echo "Rp. ".number_format($dpro['harga'],0,',','.'); ?></h3>
                    <div class="quickview-peragraph">
                        <p><?=$dpro['deskripsi']?></p>
                    </div>
                    <br>

                    <form action="php/aksi_tambah_keranjang.php" method="post">
                        <div class="quantity">
                            <div class="input-group">
                                <div class="button minus">
                                    <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                        data-type="minus" data-field="jumlah">
                                        <i class="ti-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="jumlah" class="input-number" data-max="20" data-min="1" value="1">
                                <div class="button plus">
                                    <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                        data-field="jumlah">
                                        <i class="ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php 
                        if($_SESSION['username']==''){ ?>
                        <div class="add-to-cart">
                            <a href="#" class="btn" onclick="return alert('Maaf, Anda harus login')">Add to cart</a>
                        </div>
                        <?php }else{ ?>
                        <div class="add-to-cart">
                            <input type="hidden" value="<?=$dpro['id']?>" name="kodeproduk">
                            <button type="submit" class="btn">Add to cart</button>
                        </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <!--/ End Product Style 1  -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Produk Lainnya</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">

                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">
                                        <?php $produk = mysqli_query($koneksi,"select * from produk order by rand() limit 0,4");
                                        while($dpro=mysqli_fetch_assoc($produk)) { ?>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="produk.php?id=<?php echo $dpro['id']?>">
                                                        <img class="default-img"
                                                            src="assets/gambar/produk/<?php echo $dpro['gambar']?>"
                                                            alt="#">
                                                    </a>

                                                    <div class="button-head text-center">
                                                        <a title="Add to cart" href="#">Add to cart</a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a
                                                            href="produk.php?id=<?php echo $dpro['id']?>"><?php echo $dpro['nama']?></a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span><?php echo "Rp. ".number_format($dpro['harga'],0,',','.'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'base_f.php';?>
</body>

</html>
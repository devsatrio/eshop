<!DOCTYPE html>
<html lang="zxx">
<?php include 'php/koneksi.php';?>
<?php include 'base_h.php';?>

<body class="js">
    <?php include 'base_nav.php';?>
    <?php $kategorinya = mysqli_query($koneksi,"select * from kategori where slug='$_GET[kategori]'");
    while($dkatnya=mysqli_fetch_assoc($kategorinya)) { ?>
    
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2><?=$dkatnya['nama']?></h2>
                        </div>
                        <?php 
                        $halaman = 12;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                        $produk = mysqli_query($koneksi,"select * from produk where id_kategori='$dkatnya[id]' order by id desc limit 0,8");
                        $total = mysqli_num_rows($produk);
                        $pages = ceil($total/$halaman);            
                        $proquery = mysqli_query($koneksi,"select * from produk where id_kategori='$dkatnya[id]' order by id desc LIMIT $mulai, $halaman");
                        $no =$mulai+1;
                        while($dpro=mysqli_fetch_assoc($proquery)) { ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="produk.php?id=<?php echo $dpro['id']?>">
                                        <img class="default-img" src="assets/gambar/produk/<?php echo $dpro['gambar']?>"
                                            alt="#">
                                        <span class="price-dec"><?php echo $dpro['stok']?> Pcs</span>
                                    </a>

                                    <div class="button-head text-center">
                                        <a title="Add to cart" href="#">Add to cart</a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="produk.php?id=<?php echo $dpro['id']?>"><?php echo $dpro['nama']?></a>
                                    </h3>
                                    <div class="product-price">
                                        <span><?php echo "Rp. ".number_format($dpro['harga'],0,',','.'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-12 text-center mt-5">
                        <?php for ($i=1; $i<=$pages ; $i++){ ?>
                        <a href="?halaman=<?php echo $i; ?>">
                            <button type="button" class="btn"><?php echo $i; ?></button>
                        </a>
                        <?php } ?>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <div class="single-widget category mt-5">
                            <h3 class="title">Kategori</h3>
                            <ul class="categor-list">
                                <li><a href="all-product.php">Semua Produk</a></li>
                                <?php $datakategori = mysqli_query($koneksi,"select * from kategori order by id desc");
                                while($dkat=mysqli_fetch_assoc($datakategori)) { ?>
                                <li><a href="kategori.php?kategori=<?=$dkat['slug']?>"><?php echo $dkat['nama']?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>


    <?php include 'base_f.php';?>
</body>

</html>
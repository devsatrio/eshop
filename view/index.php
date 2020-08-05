<?php
error_reporting(0);
session_start();
include '../php/koneksi.php';
if($_SESSION['username']==''){
echo "<script>window.alert('Maaf, Anda Harus Login'); window.location=('../loginadm.php')</script>";
}
include 'layout/h.php';
include 'layout/n.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if($_SESSION['akses']=='admin'){ ?>
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php $datapengguna = mysqli_query($koneksi,"select * from user");
								echo mysqli_num_rows($datapengguna)." Orang";?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $databarang = mysqli_query($koneksi,"select * from karyawan");
								echo mysqli_num_rows($databarang)." Orang";?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Order</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php $datatransaksi = mysqli_query($koneksi,"select * from pemesanan where status_selesai='n'");
								echo mysqli_num_rows($datatransaksi)." Order";?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php }else{ ?>
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang, <?php echo $_SESSION['username'];?> (<?php echo $_SESSION['level'];?>)</h1>
    <?php 
    if($_SESSION['level']=='Desain'){
        $prosess ="Menuju proses layout";
        $statusnya = 'Layout';
    }elseif($_SESSION['level']=='Layout'){
        $prosess ="Menuju proses Print";
        $statusnya = 'Print';
    }elseif($_SESSION['level']=='Print'){
        $prosess ="Menuju proses Press";
        $statusnya = 'Press';
    }elseif($_SESSION['level']=='Press'){
        $prosess ="Menuju proses Cutting";
        $statusnya = 'Cutting';
    }elseif($_SESSION['level']=='Cutting'){
        $prosess ="Menuju proses Jahit";
        $statusnya = 'Jahit';
    }elseif($_SESSION['level']=='Jahit'){
        $prosess ="Menuju proses Finishing";
        $statusnya = 'Finishing';
    }else{
        $prosess ="Order selesai & siap diambil";
    }
    
    ?>
    <hr>
    <h4>List Pekerjaan anda</h4>
    <div class="card-deck row">
        <?php
        $queryorder = mysqli_query($koneksi,"select pemesanan.*,user.nama as namauser,karyawan.status as statuskaryawan,karyawan.nama as namakaryawan from pemesanan left join user on user.id = pemesanan.id_user left join karyawan on karyawan.id = pemesanan.id_karyawan where pemesanan.id_karyawan='$_SESSION[id]' and pemesanan.status_selesai='n' and pemesanan.status_hapus='n' order by pemesanan.id desc");
        while($roworder=mysqli_fetch_assoc($queryorder)) { ?>
        <div class="card col-md-3">
            <?php if($roworder['gambar']!=''){ ?>
            <img src="../assets/gambar/order/<?php echo $roworder['gambar'];?>" class="card-img-top" alt="...">
            <?php }else{ ?>
            <img src="../assets/img/noimage.png" class="card-img-top" alt="...">
            <?php } ?>
            <div class="card-body">
                <a href="detail_order.php?id=<?php echo $roworder['id'];?>">
                    <h5 class="card-title"><?php echo $roworder['kode']?></h5>
                </a>
                <table>
                    <tr>
                        <td>customer : </td>
                        <td><?php echo $roworder['customer']?></td>
                    </tr>
                    <tr>
                        <td>Jenis : </td>
                        <td><?php echo $roworder['jenis']?></td>
                    </tr>
                    <tr>
                        <td>Bahan : </td>
                        <td><?php echo $roworder['bahan']?></td>
                    </tr>
                    <tr>
                        <td>Jumlah : </td>
                        <td><?php echo $roworder['jumlah']?> Pcs</td>
                    </tr>
                    <tr>
                        <td>Tgl Masuk : </td>
                        <td><?php echo $roworder['tanggal_masuk']?></td>
                    </tr>
                </table>
                <hr>
                <div class="text-center">
                    <a href="edit_data_order.php?id=<?php echo $roworder['id']?>" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#exampleModal<?php echo $roworder['id']?>">Pengerjaan Selesai</button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal<?php echo $roworder['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order <?php echo $roworder['kode']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../php/aksi_selesai_prosess.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputCity">Prosess Selanjutnya</label>
                                <input type="hidden" name="kode" value="<?php echo $roworder['kode']?>">
                                <input type="hidden" name="idorder" value="<?php echo $roworder['id']?>">
                                <input type="text" class="form-control" name="prosess" value="<?php echo $prosess;?>"
                                    required readonly>
                            </div>
                            <?php 
                            if($_SESSION['level']!='Finishing'){ ?>
                            <div class="form-group">
                                <label for="inputCity">Lanjutkan Order ke karyawan</label>
                                <select class="form-control" name="karyawan">
                                    <?php
                                    $datakaryawan = mysqli_query($koneksi,"select * from karyawan where status='$statusnya' order by id desc");
                                    while($karyawan=mysqli_fetch_assoc($datakaryawan)) { ?>
                                    <option value="<?php echo $karyawan['id'];?>"><?php echo $karyawan['nama'];?>
                                        (<?php echo $karyawan['status'];?>)
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <br><br>
    <?php } ?>
</div>
<?php
include'layout/f_dashboard.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Perpustakaan - Transaksi</title>
</head>
<body>
<?php    
    include "koneksi.php";
    include "function.php";
?>
<div class="row">
    <div class="col-md-13">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Data Transaksi
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Judul</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Terlambat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $sql = $koneksi->query("select * from tb_transaksi where status='Pinjam'");
                                while ($data=$sql->fetch_assoc()) {

                            ?>  
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['judul'];?></td>
                                <td><?php echo $data['nim'];?></td>
                                <td><?php echo $data['nama'];?></td>
                                <td><?php echo $data['tanggal_pinjam'];?></td>
                                <td><?php echo $data['tanggal_kembali'];?></td>
                                <td>
                                <?php
                                    $denda = 1000;
                                    $tgl_deadline = $data['tanggal_kembali'];
                                    $tgl_kembali = date('Y-m-d');
                                    $lambat = terlambat($tgl_dateline, $tgl_kembali);
                                    $denda1 = $lambat*$denda;

                                    if($lambat > 0){
                                        echo "
                                            <font color='red' >$lambat hari<br>(Rp $denda1)</font>
                                        ";
                                    }else{
                                        echo $lambat . " Hari";
                                    }

                                ?>
                                </td>
                                <td><?php echo $data['status'];?></td>
                                <td>
                                    <a href="?page=transaksi&aksi=kembali&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul'];?>" class="btn btn-info" style="font-size:12px;margin: 5px" >Kembali</a><br>
                                    <a href="?page=transaksi&aksi=perpanjang&id=<?php echo $data['id']; ?>&judul=<?php
                                    echo $data['judul'];?>&lambat=<?php echo $lambat?>&tanggal_kembali=<?php echo $data['tanggal_kembali']?>" class="btn btn-danger" style="font-size:12px;margin: 5px;">Perpanjang</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody> 
                    </table>
                </div>
                <a href="?page=transaksi&aksi=tambah_transaksi" class="btn btn-success" style="margin-top:8px;"><i class="fa fa-plus"></i>  Tambah Data</a>
            </div>     
        </div>  
    </div>
</div> 
<footer>
    <br>
    <p style="text-align:right;height:150px;font-size:12px;font-weight:bold;font-style:italic" >@Sawaluddin</p>
</footer>   
</body>
</html>

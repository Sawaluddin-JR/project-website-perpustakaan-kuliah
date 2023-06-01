<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<?php    
    include "koneksi.php";
?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Data Anggota
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Prodi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $sql = $koneksi->query("select * from tb_anggota");
                                while ($data=$sql->fetch_assoc()) {

                                    $jenis_kelamin = ($data['jenis_kelamin']=='L')?"Laki-laki":"Perempuan";
                                    $prodi = ($data['prodi']=='TI')?"Teknik Informatika":"Manajemen Informatika";
                                    // if($data['prodi' == 'TI'])
                                    // {
                                    //     $prodi = "Teknik Informatika";
                                    // }
                                    // else if($data['prodi' == 'MI'])
                                    // {
                                    //     $prodi = "Manajemen Informatika";
                                    // }
                                    // else if($data['prodi' == 'Sastra'])
                                    // {
                                    //     $prodi = "Sastra";
                                    // }
                                    // else if($data['prodi' == 'Akuntansi'])
                                    // {
                                    //     $prodi = "Akuntansi";
                                    // }
                                    
                            ?>  
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['nim'];?></td>
                                <td><?php echo $data['nama'];?></td>
                                <td><?php echo $data['tempat_lahir'];?></td>
                                <td><?php echo $data['tanggal_lahir'];?></td>
                                <td><?php echo $jenis_kelamin;?></td>
                                <td><?php echo $prodi;?></td>
                                <td>
                                    <a href="?page=anggota&aksi=ubah_anggota&nim=<?php echo $data['nim']; ?>" class="btn btn-info" style="font-size:12px;margin: 5px" > Ubah</a>
                                    <a onclick="return confirm('Anda Yakin Akan Menghapus Data ini ... ??')"href="?page=anggota&aksi=hapus_anggota&nim=<?php echo $data['nim']; ?>" class="btn btn-danger"
                                    style="font-size:12px;margin: 5px">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody> 
                    </table>
                </div>
                <a href="?page=anggota&aksi=tambah_anggota" class="btn btn-success" style="margin-top:8px;"><i class="fa fa-plus"></i>  Tambah Data</a>
                <a href="./laporan/laporan_anggota.php" target="blank" class="btn btn-defult" style="margin-top:8px;"><i class="fa fa-print"></i>ExportToWord</a>
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

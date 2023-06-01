<?php
	//include "koneksi.php";
    $koneksi = new mysqli("localhost","root","","db_perpustakaan");
	$filename = "anggota - (".date('d-m-Y').").xlsx";
	header("content-disposition:cattachment;filename='$filename'");
	header("content-type:capplication/vdn.ms-exel");


?>
<h2>Laporan Anggota</h2>
<table border="1">
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
    <?php
    	$no = 1;
    	$sql = $koneksi->query("select * from tb_anggota");
    	while ($data=$sql->fetch_assoc()) {

        	$jenis_kelamin = ($data['jenis_kelamin']=='L')?"Laki-laki":"Perempuan";
      		$prodi = ($data['prodi']=='TI')?"Teknik Informatika":"Manajemen Informatika";
	?>
	<tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $data['nim'];?></td>
        <td><?php echo $data['nama'];?></td>
        <td><?php echo $data['tempat_lahir'];?></td>
        <td><?php echo $data['tanggal_lahir'];?></td>
        <td><?php echo $jenis_kelamin;?></td>
        <td><?php echo $prodi;?></td>
        <!-- <td>
        <a href="?page=anggota&aksi=ubah_anggota&nim=<?php echo $data['nim']; ?>" class="btn btn-info" > Ubah</a>
        <a onclick="return confirm('Anda Yakin Akan Menghapus Data ini ... ??')"href="?page=anggota&aksi=hapus_anggota&nim=<?php echo $data['nim']; ?>" class="btn btn-danger">Hapus</a>
        </td> -->
    </tr>
    <?php } ?> 
</table>

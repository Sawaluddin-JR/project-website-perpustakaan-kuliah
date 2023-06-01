<?php
    include "koneksi.php";
    $nim = $_GET['nim'];
    $sql = $koneksi->query("select * from tb_anggota where nim='$nim'");
    $tampil = $sql->fetch_assoc();
    $prodi = $tampil['prodi'];
    $jenis_kelamin = $tampil['jenis_kelamin'];
?>
<div class="panel panel-primary">
<div class="panel-heading">
    Ubah Data Anggota
</div> 
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name="nim" value="<?php echo $tampil['nim']?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" value="<?php echo $tampil['nama']?>" />
                    </div>
                    <div class="form-group">
                        <label>Tempat lahir</label>
                        <input class="form-control" name="tempat_lahir" value="<?php echo $tampil['tempat_lahir']?>" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        <input class="form-control" name="tanggal_lahir" type="date" value="<?php echo $tampil['tanggal_lahir']?>" />
                    </div>
                    <div class="form-group" style="padding-top:5px;padding-bottom:5px">
                        <label>Jenis Kelamin</label><br>
                        <label class="checkbox-inline">
                            <input type="radio" value="L" name="jenis_kelamin" 
                            <?php echo($jenis_kelamin=='L')?"checked":"";?> /> Laki-laki
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" value="P" name="jenis_kelamin" 
                            <?php echo($jenis_kelamin=='P')?"checked":"";?> /> Perempuan
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Prodi</label>
                        <select class="form-control" name="prodi">
                            <option value="TI" <?php if ($prodi=='TI') {echo "selected";} ?>>Teknik Informatika</option>
                            <option value="MI" <?php if ($prodi=='MI') {echo "selected";} ?>>Manajemen Informatika</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Ubah" class="btn btn-primary"/>
                    </div>
                </form>    
        </div>
    </div>
</div>     
</div>    
<footer>
        <br>
        <p style="text-align:right;height:150px;font-size:12px;font-weight:bold;font-style:italic" >@Sawaluddin</p>
</footer>
<?php
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin= $_POST['jenis_kelamin'];
    $prodi = $_POST['prodi'];
    $simpan = $_POST['simpan'];
    if($simpan) {
        $sql = $koneksi->query
        ("update tb_anggota set nama='$nama',tempat_lahir='$tempat_lahir',
        tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',prodi='$prodi' where nim='$nim'");
        if($sql) {
            ?>
                <script type="text/javascript">
                    alert("Ubah Berhasil Disimpan");
                    window.location.href="?page=anggota";                    
                </script>
            <?php
        }
    }
?>      
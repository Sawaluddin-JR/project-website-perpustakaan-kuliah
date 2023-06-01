<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $sql = $koneksi->query("select * from tb_buku where id='$id'");
    $tampil = $sql->fetch_assoc();
    $tahuntemp = $tampil['tahun_terbit'];
    $lokasi = $tampil['lokasi'];
?>
<div class="panel panel-primary">
<div class="panel-heading">
    Ubah Data Buku
</div> 
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name="judul" value="<?php echo $tampil['judul']?>" />
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input class="form-control" name="pengarang" value="<?php echo $tampil['pengarang']?>" />
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input class="form-control" name="penerbit" value="<?php echo $tampil['penerbit']?>" />
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select class="form-control" name="tahun_terbit">
                           <?php
                            $tahun = date("Y");

                            for($i = $tahun-23;$i <= $tahun;$i++)
                            {
                                if($i==$tahuntemp){
                                    echo'<option value="'.$i.'" selected>'.$i.'</option>';
                                }else{
                                    echo'<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                           ?>                     
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input class="form-control" name="isbn" value="<?php echo $tampil['isbn']?>" />
                    </div>
                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input class="form-control" type="number" name="jumlah_buku" value="<?php echo $tampil['jumlah_buku']?>" />
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" name="lokasi">
                            <option value="Rak1" <?php if ($lokasi=='Rak1') {echo "selected";} ?>>Rak1</option>

                            <option value="Rak2" <?php if ($lokasi=='Rak2') {echo "selected";} ?>>Rak2</option>

                            <option value="Rak3" <?php if ($lokasi=='Rak3') {echo "selected";} ?>>Rak3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input class="form-control" name="tanggal_input" type="date" value="<?php echo $tampil['tanggal_input']?>" />
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
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $isbn = $_POST['isbn'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $lokasi = $_POST['lokasi'];
    $tanggal_input = $_POST['tanggal_input'];
    $simpan = $_POST['simpan'];
    if($simpan) {
        $sql = $koneksi->query("update tb_buku set judul='$judul',pengarang='$pengarang',penerbit='$penerbit',tahun_terbit='$tahun_terbit',isbn='$isbn',jumlah_buku='$jumlah_buku',lokasi='$lokasi',tanggal_input='$tanggal_input' where id='$id'");
        if($sql) {
            ?>
                <script type="text/javascript">
                    alert("Ubah Berhasil Disimpan");
                    window.location.href="?page=buku";                    
                </script>
            <?php
        }
    }
?>      
<div class="panel panel-primary">
<div class="panel-heading">
    Tambah Data Buku
</div> 
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name="judul" />
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input class="form-control" name="pengarang" />
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input class="form-control" name="penerbit"/>
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select class="form-control" name="tahun_terbit">
                        <?php
                            $tahun = date("Y");
                            for($i = $tahun-23;$i <= $tahun;$i++)
                            {
                                echo'<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>                     
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input class="form-control" name="isbn"/>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input class="form-control" type="number" name="jumlah_buku"/>
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" name="lokasi">
                            <option value="Rak1">Rak1</option>
                            <option value="Rak2">Rak2</option>
                            <option value="Rak3">Rak3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input class="form-control" name="tanggal_input" type="date"/>
                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"/>
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
    include "koneksi.php";
    if(isset($_POST['simpan'])){
        $sql = mysqli_query($koneksi, "insert into tb_buku set
        judul = '$_POST[judul]',
        pengarang = '$_POST[pengarang]',
        penerbit = '$_POST[penerbit]',
        tahun_terbit = '$_POST[tahun_terbit]',
        isbn = '$_POST[isbn]',
        jumlah_buku = '$_POST[jumlah_buku]',
        lokasi = '$_POST[lokasi]',
        tanggal_input = '$_POST[tanggal_input]'") or die(mysqli_error($koneksi));
        if($sql) {
            ?>
                <script type="text/javascript">
                    alert("Data Berhasil Disimpan");
                    window.location.href="?page=buku";                    
                </script>
            <?php
        }
    }
?>      
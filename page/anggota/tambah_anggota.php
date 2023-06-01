<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Data Anggota
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name="nim" />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" />
                    </div>
                    <div class="form-group">
                        <label>Tempat lahir</label>
                        <input class="form-control" name="tempat_lahir" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" name="tanggal_lahir" type="date" />
                    </div>
                    <div class="form-group" style="padding-top:5px;padding-bottom:5px">
                        <label>Jenis Kelamin</label><br>
                        <label class="checkbox-inline">
                            <input type="radio" value="L" name="jenis_kelamin" /> Laki-laki
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" value="P" name="jenis_kelamin" /> Perempuan
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Prodi</label>
                        <select class="form-control" name="prodi">
                            <option value="TI">Teknik Informatika</option>
                            <option value="MI">Manajemen Informatika</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" />
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
if (isset($_POST['simpan'])) {
    $sql = mysqli_query($koneksi, "insert into tb_anggota set
    nim = '$_POST[nim]',
    nama = '$_POST[nama]',
    tempat_lahir = '$_POST[tempat_lahir]',
    tanggal_lahir = '$_POST[tanggal_lahir]',
    jenis_kelamin = '$_POST[jenis_kelamin]',
    prodi = '$_POST[prodi]'") or die(mysqli_error($koneksi));
    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href = "?page=anggota";
        </script>
        <?php
    }
}
?>
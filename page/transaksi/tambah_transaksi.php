<?php
    $tanggal_pinjam = date("d-m-Y");
    $tujuh_hari = mktime(0, 0, 0,date("n"),date("j")+7,date("Y"));
    $kembali = date("d-m-Y",$tujuh_hari);
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        Tambah Data Transaksi
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" onsubmit="return validasi(this)">
                    <div class="form-group">
                        <label>Judul</label>
                        <select class="form-control" name="judul">
                            <?php
                                $sql = $koneksi->query("select * from tb_buku order by id");
                                while($data=$sql->fetch_assoc())
                                {
                                    echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <select class="form-control" name="nama">
                            <?php
                                $sql = $koneksi->query("select * from tb_anggota order by nim");
                                while($data=$sql->fetch_assoc())
                                {
                                    echo "<option value='$data[nim].$data[nama]'>$data[nim] - $data[nama]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input class="form-control" name="tanggal_pinjam" type="text" id="tgl" 
                        value="<?php echo $tanggal_pinjam;?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input class="form-control" name="tanggal_kembali" type="text" id="tgl" 
                        value="<?php echo $kembali;?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input class="form-control" name="status" />
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
    if(isset($_POST['simpan']))
    {
        $tanggal_pinjam = $_POST['tanggal_pinjam'];
        $tanggal_kembali = $_POST['tanggal_kembali'];

        $buku = $_POST['buku'];
        $pecah_buku = explode(",", $buku);
        $id = $pecah_buku[0];
        $judul = $pecah_buku[1];

        $nama = $_POST['nama'];
        $pecah_nama = explode(",", $nama);
        $nim = $pecah_nama[0];
        $nama = $pecah_nama[1];

        $sql = $koneksi->query("select * from tb_buku where judul = '$judul'");
        while($data = $sql->fetch_assoc())
        {
            $sisa = $data['jumlah_buku'];
            if($sisa == 0)
            {
                ?>
                <script type="text/javascript">
                    alert("Stok Buku Habis,Transaksi Tidak Dapat Dilakukan,Silahkan Tambah Stok Terlebih Dahulu!!");
                    window.location.href = "?page=transaksi&aksi=tambah_transaksi";
                </script>
                <?php
            }
            else
            {
                $sql = $koneksi->query("insert into tb_transaksi(judul,nim,nama,
                tanggal_pinjam,tanggal_kembali,status)values('$judul','$nim','$nama','$tanggal_pinjam','$tanggal_kembali','Pinjam')");

                $sql2 = $koneksi->query("update tb_buku set jumlah_buku=(jumlah_buku-1) where id='$id'");
                ?>
                <script type="text/javascript">
                    alert("Simpan Data Berhasil!!");
                    window.location.href = "?page=transaksi";
                </script>
                <?php
            }
        }
    }                   
?>
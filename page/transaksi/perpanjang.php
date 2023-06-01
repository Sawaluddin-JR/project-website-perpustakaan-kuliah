perpanjangan.php
<?php
	include "koneksi.php";
	$id = $_GET['id'];
	$judul = $_GET['judul'];
	$tanggal_kembali = $_GET['tanggal_kembali'];
	$lambat = $_GET['lambat'];

	if($lambat > 7)
	{
		?>
		<script type="text/javascript">
			alert("Buku Tidak Bisa Diperpanjang,Karena Lebih dari 7 Hari... Kembalikan Dahulu Kemudian Pinjam Kembali");
			window.location.href="?page=transaksi";
		</script>
		<?php
	}
	else
	{
		$pecah_tanggal_kembali = explode("-",$tanggal_kembali);
		$next_7_hari = mktime(0,0,0,$pecah_tanggal_kembali[1],$pecah_tanggal_kembali[0]+7,$pecah_tanggal_kembali[2]);
		$hari_next = date("d-m-y",$next_7_hari);

		$sql = $koneksi->query("update tb_transaksi set tanggal_kembali='$hari_next' where id='$id'");

		if($sql)
		{
			?>
				<script type="text/javascript">
					alert("Perpanjang Berhasil!!");
					window.location.href="?page=transaksi";
				</script>
			<?php
		}
		else
		{
			?>
				<script type="text/javascript">
					alert("Perpanjang Gagal!!");
					window.location.href="?page=transaksi";
				</script>
			<?php
		}
	}
?>
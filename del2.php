<html>
<head>
<title>Hapus</title>
</head>
<?php
$koneksi = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost",  "root",  "")) or die("Gagal konek ke server.");
mysqli_select_db($GLOBALS["___mysqli_ston"], antrian) or die("Gagal membuka database.");
$id= $_GET['id_pengajuan'];
$query = mysqli_query($GLOBALS["___mysqli_ston"], "delete from pengajuan where id_pengajuan='$id'");
if($query){
	echo "<script>window.alert(' Berhasil dihapus');
			window.location=('kelola_pengajuan.php')
			</script>";
}else{
	echo	"<script>window.alert('Gagal Menghapus');
			window.location=('kelola_pengajuan.php')
			</script>";
}
?>
</body>
</html>
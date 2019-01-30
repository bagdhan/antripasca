<html>
<head>
<title>Hapus</title>
</head>
<?php
$koneksi = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost",  "root",  "")) or die("Gagal konek ke server.");
mysqli_select_db($GLOBALS["___mysqli_ston"], antrian) or die("Gagal membuka database.");
$id= $_GET['id'];
$query = mysqli_query($GLOBALS["___mysqli_ston"], "delete from antrian where id='$id'");
if($query){
	echo "<script>window.alert(' Berhasil dihapus');
			window.location=('panggil.php')
			</script>";
}else{
	echo	"<script>window.alert('Gagal Menghapus');
			window.location=('panggil.php')
			</script>";
}
?>
</body>
</html>
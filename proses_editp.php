<?php
//Masukan koneksi ke database nya disini
include "config.php";

session_start();

$id	= @$_POST['id_pengajuan'];
$nama	= @$_POST['nama'];
$waktu	= @$_POST['waktu'];

$query = mysqli_query($GLOBALS["___mysqli_ston"], "update pengajuan set waktu='$waktu', nama_surat='$nama' where id_pengajuan='$id'");


if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='kelola_pengajuan.php'</script>\n";
} else {
echo "<script>alert('gagal menyimpan');
document.location.href='history.go(-1)'</script>\n";
}
?>
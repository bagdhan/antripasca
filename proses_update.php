<?php
//Masukan koneksi ke database nya disini
include "config.php";

session_start();

$id_proses	= @$_POST['id_proses'];
$status	= @$_POST['status'];

$query = mysqli_query($GLOBALS["___mysqli_ston"], "update proses set id_proses='$id_proses', status='$status' where id_proses='$id_proses'");


if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='cari.php'</script>\n";
} else {
echo "<script>alert('gagal menyimpan');
document.location.href='history.go(-1)'</script>\n";
}
?>
<?php
//Masukan koneksi ke database nya disini
include "config.php";

session_start();

$username= $_SESSION['username'];
$loket	= @$_POST['loket'];

$query = mysqli_query($GLOBALS["___mysqli_ston"], "update user set username='$username', loket='$loket' where username='$username'");


if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='index.php'</script>\n";
} else {
echo "<script>alert('gagal menyimpan');
document.location.href='loket.php'</script>\n";
}
?>
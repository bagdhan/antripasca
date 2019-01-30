<?php
//Masukan koneksi ke database nya disini
include "config.php";

session_start();

$id_info	= @$_POST['id_info'];
$info	= @$_POST['info'];

$query = mysqli_query($GLOBALS["___mysqli_ston"], "update informasi set id_info='$id_info', info='$info' where id_info='$id_info'");


if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='info.php'</script>\n";
} else {
echo "<script>alert('gagal menyimpan');
document.location.href='history.go(-1)'</script>\n";
}
?>
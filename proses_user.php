<?php
//Masukan koneksi ke database nya disini
include "config.php";


$nama	= @$_POST['nama'];
$username	= @$_POST['username'];
$password	= @$_POST['password'];
$level	= @$_POST['level'];


$query = mysqli_query($GLOBALS["___mysqli_ston"], 'insert into user (username,nama_user,password,loket,level) values ("'.$username.'","'.$nama.'","'.$password.'","'.null.'","'.$level.'")');


if ($query) {
echo "<script>('Terima Kasih Anda Masuk Antrian');
document.location.href='user.php'</script>\n";
} else {
echo "<script>alert('Nomor Antrian Tidak Tersedia'<br>'' Silahkan Antri kembali');
document.location.href='user.php'</script>\n";
}
?>
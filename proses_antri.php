<?php
//Masukan koneksi ke database nya disini
include "config.php";


$id	= @$_POST['id'];
$nrp	= @$_POST['nrp'];
$jenis = isset($_POST['action']) && $_POST['action'] == 'pengajuan' ? 'Pengajuan' : 'Pengambilan';
$sesi	= @$_POST['sesi'];
$status	= @$_POST['status'];

$loket= 'waiting';

$query = mysqli_query($GLOBALS["___mysqli_ston"], 'insert into antrian (id,nrp,jenis,loket,sesi,status) values ("'.$id.'","'.$nrp.'","'.$jenis.'","'.$loket.'","'.$sesi.'","'.$status.'")');


if ($query) {

  $mysql2= mysqli_query($GLOBALS["___mysqli_ston"], 'insert into histori (id_his,nrp,jenis) values ("'.$id.'","'.$nrp.'","'.$jenis.'","'.$loket.'","'.$sesi.'","'.$status.'")');

  $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $mysql2);
echo "<script>('Terima Kasih Anda Masuk Antrian');
document.location.href='antrian.php'</script>\n";
} else {
echo "<script>alert('Nomor Antrian Tidak Tersedia'<br>'' Silahkan Antri kembali');
document.location.href='antrian.php'</script>\n";
}
?>
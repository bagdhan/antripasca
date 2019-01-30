<?php
include "config.php";

$a = @$_POST['id'];
$b = date('d');
$c =date('m');
$d = @$_POST['id_pengajuan'];
$id_proses = $a.$b.$c.$d;
$id	= @$_POST['id'];
$nrp	= @$_POST['nrp'];
$id_pengajuan = @$_POST['id_pengajuan'];
$tanggal_pengajuan = @$_POST['tanggal_pengajuan'];
$estimasi = @$_POST['estimasi'];
$id_user = @$_POST['id_user'];
$status = 'Proses';


$mysql ='insert into proses (id_proses,id,nrp,id_pengajuan,tanggal_pengajuan,estimasi,id_user,status) values ("'.$id_proses.'","'.$id.'","'.$nrp.'","'.$id_pengajuan.'","'.$tanggal_pengajuan.'","'.$estimasi.'","'.$id_user.'","'.$status.'")';
$sql= mysqli_query($GLOBALS["___mysqli_ston"], $mysql);

if ($sql){
	
	echo "<script>alert('Data Berhasil Disimpan');
	document.location.href='tahap3.php?id_proses=$id_proses'</script>\n";

} else {
	echo "<script>alert('Data Gagal Disimpan');
	document.location.href='tahap3.php'</script>\n";
	
	}
?>
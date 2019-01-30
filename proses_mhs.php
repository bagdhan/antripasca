<?php
//Masukan koneksi ke database nya disini
include "config.php";


$nama	= @$_POST['nama'];
$nrp	= @$_POST['nrp'];
$prodi	= @$_POST['prodi'];
$mayor	= @$_POST['mayor'];


$query = mysqli_query($GLOBALS["___mysqli_ston"], 'insert into mahasiswa (nrp,nama,prodi,mayor) values ("'.$nrp.'","'.$nama.'","'.$prodi.'","'.$mayor.'")');


if ($query) {
echo "<script>alert('Data Mahasiswa Berhasil di Tambahkan');
document.location.href='admin.php'</script>\n";
} else {
echo "<script>alert('Nomor Antrian Tidak Tersedia'<br>'' Silahkan Antri kembali');
document.location.href='admin.php'</script>\n";
}
?>
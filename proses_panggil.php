<?php
include "config.php";
session_start();

 
$koneksi = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost",  "root",  "")) or die("Gagal koneksi ke server."); 
 
mysqli_select_db($GLOBALS["___mysqli_ston"], antrian) or die("Gagal membuka database."); 
 

$username= $_SESSION['username'];
$sql = "select * from user where username='$username'";
 
$hasil = mysqli_query( $koneksi, $sql) or die("Gagal melakukan query.");
 
while ($buff2 = mysqli_fetch_array($hasil)) 
$loket=$buff2['loket'];


$a = @$_POST['id'];
$id = $a-1;
$status =@$_POST['status'];

$query = mysqli_query($GLOBALS["___mysqli_ston"], "update antrian set id='$a', loket='$loket', status='$status' where id='$a'");



if ($query){
  
  $mysql2="delete from antrian where id='$id'";
  $sql2 = mysqli_query($GLOBALS["___mysqli_ston"], $mysql2);
  echo "<script>('PANGGIL');
  document.location.href='panggil1.php'</script>\n";

} else {
  echo "<script>alert('Data Panggil');
  document.location.href='panggil.php'</script>\n";
  
  }
?>
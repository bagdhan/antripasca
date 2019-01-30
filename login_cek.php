

<?php
session_start();
include 'config.php';
$username = $_POST['user'];
$password = $_POST['pass'];
// query untuk mendapatkan record dari username
$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
$data = mysqli_fetch_array($hasil);
// cek kesesuaian password
if ($password == $data['password'])
{
    // menyimpan username dan level ke dalam session
    $_SESSION['level'] = $data['level'];
    $_SESSION['username'] = $data['username'];
echo "<script> alert('Berhasil'); location.href='loket.php'</script>";
}
else 
{ echo " <script> alert('Gagal'); location.href='login.php'</script>";  }
?>
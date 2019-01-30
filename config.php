<?php
$cekhost=($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost", "root", ""));
$cekdb=mysqli_select_db($GLOBALS["___mysqli_ston"], antrian) or die ("Tidak Ada Koneksi");
?>
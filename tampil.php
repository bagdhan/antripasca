<?php
include("config.php");


$sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM antrian,mahasiswa where antrian.nrp=mahasiswa.nrp and status='1' order by loket ASC LIMIT 8");
$buff = array();
 
while($row = mysqli_fetch_array($sql)){
	array_push($buff, array('id' => $row['id'], 'nrp' => $row['nrp'], 'nama' => $row['nama'], 'loket' => $row['loket']));
}
echo json_encode(array("buff" => $buff));
?>
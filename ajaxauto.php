<?php
  require_once "config2.php";
  $sql = "SELECT nrp, nama FROM mahasiswa WHERE nrp LIKE ?";
  $arrData = array();
  
  try {
    $query = $dbh->prepare($sql);
    $query->execute(array($_REQUEST["nrp"].'%'));
    while($data = $query->fetch()) {
      $arrData[] = array("value" => $data["nrp"], 
                         "label" => $data["nrp"]." (".$data["nama"].")");
    }
  }
  catch (PDOException $e) {
    echo $e->getMessage();
  }
  
  echo json_encode($arrData);
?>
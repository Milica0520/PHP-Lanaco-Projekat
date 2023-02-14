<?php

include("connect.php");




if (isset($_GET['artikal_id'])) {

  $item_name = $_GET['artikal_id'];
  $sql = "SELECT * FROM artikal WHERE artikal_id = $item_name ";
  if ($result = $conn->query($sql)) {
    if ($result->num_rows > 0) {
      while ($row = $resalt->fetch_array()) {
        // echo $row['artikal_id'];
        $dbselected = $row['artikal_id'];
      }
      $result->free_result();
    } else {
      echo "Nesto nije u redu...";
    }
  }



}


?>
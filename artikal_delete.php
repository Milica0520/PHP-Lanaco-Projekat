<?php

if (isset($_POST['ID'])) {
    include("connect.php");
    $id = $_POST['ID'];
    $sql = "DELETE FROM artikal WHERE artikal_id = '$id'";
    $conn->query($sql);
    $conn->close();
}

header("location: artikal.php");

?>
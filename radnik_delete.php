<?php

if (isset($_POST['ID'])) {
    include("connect.php");
    $id = $_POST['ID'];
    $sql = "DELETE FROM radnik WHERE radnik_id = '$id'";
    $conn->query($sql);
    $conn->close();
}

header("location: radnik.php");

?>
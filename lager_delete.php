<?php

if (isset($_POST['ID'])) {
    include("connect.php");
    $id = $_POST['ID'];
    $sql = "DELETE FROM lager WHERE lager_id = '$id'";
    $conn->query($sql);
    $conn->close();
}

header("location: lager.php");

?>
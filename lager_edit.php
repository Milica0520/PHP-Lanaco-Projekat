<?php

if (!isset($_COOKIE['username'])) {
    header("Location: index.php");
    exit();
}
include("connect.php");

$id = $_POST['ID'];

$rezultat = $conn->query("SELECT * FROM lager WHERE lager_id = '$id' ");
$red = $rezultat->fetch_assoc();
$artikal = $red['artikal_id'];
$avq = $red['razpoloziva_kolicina'];
$location = $red['lokacija'];

if (isset($_POST['dodaj'])) {
    $artikal = $_POST['artikal_id'];
    $avq = $_POST['avq'];
    $location = $_POST['location'];

    $sql = "UPDATE lager
    SET
    artikal_id ='  $artikal',
    razpoloziva_kolicina ='$avq',
    lokacija ='$location'
  
    WHERE lager_id = '$id'
     ";

    header("location:lager.php");

    $conn->query($sql);

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update record</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="flex-container">
        <form id="form" action="lager_edit.php" method="post">
            <div class="input-group">
                <label>Naziv artikla</label>
                <input type="text" name="artikal_id" value="<?php echo $artikal ; ?>" required>
            </div>
            <div class="input-group">
                <label>Dostupna kolicina</label>
                <input type="text" name="avq" value="<?php echo $avq; ?>" required>
            </div>
            <div class="input-group">
                <label>Lokacija</label>
                <input type="text" name="location" value="<?php echo $location; ?>" required>
            </div>
           
            <div class="button input-group">
                <input type="hidden" name="ID" value="<?php echo $red['lager_id']; ?>" />
                <input type="submit" name="dodaj" class="btn" value="Azuriraj lager" />

            </div>


        </form>
    </div>

</body>

</html>

<?php
$conn->close();
?>
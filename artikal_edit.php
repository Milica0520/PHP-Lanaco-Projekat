<?php

if (!isset($_COOKIE['username'])) {
    header("Location: index.php");
    exit();
}
include("connect.php");
$id = $_POST['ID'];

$rezultat = $conn->query("SELECT * FROM artikal WHERE artikal_id = '$id' ");
$red = $rezultat->fetch_assoc();
$naziv = $red['naziv'];
$sifra = $red['sifra'];
$jedinica = $red['jedinica_mjere'];
$barkod = $red['barkod'];
$plukod = $red['PLU_KOD'];



/*$data_type = gettype($rezultat);
echo $data_type;//object
echo "<br>";
$data_type = gettype($red);
echo $data_type;//array
echo "<br>";
var_dump($red);
echo "<br>";
var_dump($red['naziv']);
echo "<br>";
var_dump($red['sifra']);*/


if (isset($_POST['dodaj'])) {
    $naziv = $_POST['naziv'];
    $sifra = $_POST['sifra'];
    $jedinica = $_POST['jedinica_mjere'];
    $barkod = $_POST['barkod'];
    $plukod = $_POST['plu_kod'];

    $sql = "UPDATE artikal 
    SET
  
    naziv ='$naziv',
    sifra ='$sifra',
    jedinica_mjere ='$jedinica',
    barkod = '$barkod',
    PLU_KOD = '$plukod'
    WHERE artikal_id = '$id'
     ";

    header("location:artikal.php");

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
        <form id="form" action="artikal_edit.php" method="post">
            <div class="input-group">
                <label>Naziv</label>
                <input type="text" name="naziv" value="<?php echo $naziv; ?>" required>
            </div>
            <div class="input-group">
                <label>Sifra</label>
                <input type="text" name="sifra" value="<?php echo $sifra; ?>" required>
            </div>
            <div class="input-group">
                <label>Jedinica mjere</label>
                <input type="text" name="jedinica_mjere" value="<?php echo $jedinica; ?>" required>
            </div>
            <div class="input-group">
                <label>BarKod</label>
                <input type="text" name="barkod" value="<?php echo $barkod; ?>" required>
            </div>
            <div class="input-group">
                <label>PLU_KOD</label>
                <input type="text" name="plu_kod" value="<?php echo $plukod; ?>" required>
            </div>
            <div class="button input-group">
                <input type="hidden" name="ID" value="<?php echo $red['artikal_id']; ?>" />
                <input type="submit" name="dodaj" class="btn" value="Azuriraj artikl" />

            </div>


        </form>
    </div>

</body>

</html>

<?php
$conn->close();
?>
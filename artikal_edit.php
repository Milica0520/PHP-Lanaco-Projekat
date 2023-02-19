<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

    <?php include("includes/design-top.php"); ?>
   
    <link rel="stylesheet" href="css/btns.css">
    <div class="container" id="main-content">
        <h2>Azuriraj Lager</h2>
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
        <div class="form-container">
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
    </div>
</body>

</html>

<?php
$conn->close();
?>
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
        }
        ?>

        <div class="flex-container">
            <form id="form" action="lager_edit.php" method="post">
                <div class="input-group">
                    <label>Naziv artikla</label>
                    <input type="text" name="artikal_id" value="<?php echo $artikal; ?>" required>
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
    </div>
</body>

</html>

<?php
$conn->close();
?>
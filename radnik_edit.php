<?php include("connect.php"); ?>
<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<?php include("includes/design-top.php"); ?>

<body>
    <div class="container" id="main-content">



        <?php

        if (!isset($_COOKIE['username'])) {
            header("Location: index.php");
            exit();
        }
        include("connect.php");
        $id = $_POST['ID'];

        $rezultat = $conn->query("SELECT * FROM radnik WHERE radnik_id = '$id' ");
        $red = $rezultat->fetch_assoc();
        $ime = $red['ime'];
        $prezime = $red['prezime'];
        $br_telefona = $red['broj_telefona'];
        $adresa = $red['adresa'];
        $grad = $red['grad'];
        $email = $red['email'];
        $jmbg = $red['JMBG'];

        if (isset($_POST['dodaj'])) {
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $br_telefona = $_POST['broj_telefona'];
            $adresa = $_POST['adresa'];
            $grad = $_POST['grad'];
            $email = $_POST['email'];
            $jmbg = $_POST['JMBG'];

            $sql = "UPDATE radnik
    SET
    ime ='$ime',
    prezime ='$prezime',
    broj_telefona ='$br_telefona',
    adresa = '$adresa',
    grad = '$grad',
    email = '$email',
    JMBG = '$jmbg'
    WHERE radnik_id = '$id'
     ";

            header("location:radnik.php");

            $conn->query($sql);

        }
        ?>






        <div class="flex-container">
            <form id="form" action="radnik_edit.php" method="post">
                <div class="input-group">
                    <label>Ime</label>
                    <input type="text" name="ime" value="<?php echo $ime; ?>" required>
                </div>
                <div class="input-group">
                    <label>Prezime</label>
                    <input type="text" name="prezime" value="<?php echo $prezime; ?>" required>
                </div>
                <div class="input-group">
                    <label>Broj Telefona</label>
                    <input type="text" name="broj_telefona" value="<?php echo $br_telefona; ?>" required>
                </div>
                <div class="input-group">
                    <label>Adresa</label>
                    <input type="text" name="adresa" value="<?php echo $adresa; ?>" required>
                </div>
                <div class="input-group">
                    <label>Grad</label>
                    <input type="text" name="grad" value="<?php echo $grad; ?>" required>
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group">
                    <label>JMBG</label>
                    <input type="text" name="JMBG" value="<?php echo $jmbg; ?>" required>
                </div>
                <div class="button input-group">
                    <input type="hidden" name="ID" value="<?php echo $red['radnik_id']; ?>" />
                    <input type="submit" name="dodaj" class="btn" value="Azuriraj podatke o radniku" />

                </div>


            </form>
        </div>
        </div>

</body>

</html>

<?php
$conn->close();
?>
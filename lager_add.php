<?php

include("connect.php");
?>
<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
</head>
<?php include("includes/navigation.php"); ?>
<?php include("includes/design-top.php"); ?>
<body>
  


  <body>
    <div class="container" id="main-content">
      <div class="form-container">
        <form id="form" action="lager_add.php" method="post">
          <!-- SELECT OPADAJUCI MENI IZ BAZE -->
          <?php
          $rezultat = $conn->query("SELECT * FROM artikal");
          $rezultat->fetch_assoc();
          ?>
          <div class="input-group">
            <label for="naziv_artikla">Odaberi artikal</label>
            <select class="input-group" name="artikal">
              <?php
              while ($red = $rezultat->fetch_assoc()):
                ?>
                <option value="<?php echo $red['artikal_id']; ?>">
                  <?php echo $red['naziv']; ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>

          <div class="input-group">
            <label>Raspoloziva Kolicina</label>
            <input type="text" name="avq" value="" required>
          </div>
          <div class="input-group">
            <label>Lokacija</label>
            <input type="text" name="location" value="" required>
          </div>
          <div class="button input-group">
            <input type="hidden" name="ID" value="" />
            <input type="submit" name="add_lager" class="btn" value="Dodaj novi Lager" />
          </div>
        </form>
      </div>
    </div>

  </body>

</html>
<?php
if (isset($_POST['add_lager'])) {
  $naziv_artikla = $_POST['artikal'];
  $avq = $_POST['avq'];
  $location = $_POST['location'];


  $conn->query("INSERT INTO lager (artikal_id,razpoloziva_kolicina, lokacija)
    VALUES ('$naziv_artikla','$avq','$location')");
  header("location:lager.php");

}

$conn->close();
?>
<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
</head>
<link rel="stylesheet" href="css/btns.css">
<body>

  <?php include("includes/design-top.php"); ?>
  <?php include("includes/navigation.php"); ?>

  <div class="container" id="main-content">
  <h2>Radnik</h2>
    <?php

    include("connect.php");

    if (!isset($_COOKIE['username'])) {
      header("Location: index.php");
    }

    $rezultat = $conn->query("SELECT * FROM radnik");
    $rezultat->fetch_assoc();
    ?>



    <div class="table-container">
      <table class="table">
        <thead>
          <tr>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Broj Telefona</th>
            <th>Adresa</th>
            <th>Grad</th>
            <th>Email</th>
            <th>JMBG</th>
            <th>Korisnik_id</th>
            <th colspan="2">Akcije</th>
          </tr>
        </thead>
        <?php
        while ($red = $rezultat->fetch_assoc()):
          ?>
          <tr>
            <td>
              <?php echo $red['ime']; ?>
            </td>
            <td>
              <?php echo $red['prezime']; ?>
            </td>
            <td>
              <?php echo $red['broj_telefona']; ?>
            </td>
            <td>
              <?php echo $red['adresa']; ?>
            </td>
            <td>
              <?php echo $red['grad']; ?>
            </td>
            <td>
              <?php echo $red['email']; ?>
            </td>
            <td>
              <?php echo $red['JMBG']; ?>
            </td>
            <td>
              <?php echo $red['korisnik_id']; ?>
            </td>
            <td>
              <form name="edit" action="radnik_edit.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $red['radnik_id']; ?>" />
                <input type="submit" name="editID" value="Edit" />
              </form>
            </td>
            <td>
              <form name="delete" action="radnik_delete.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $red['radnik_id']; ?>" />
                <input type="submit" name="delete" value="Delete" />
              </form>
            </td>
          </tr>
        <?php endwhile; ?>
        <tbody>
        </tbody>

      </table>


      <div class="addNewItem">

        <div class="input-group">
          <a href="radnik_add.php">Dodaj novog radnika</a>
        </div>

      </div>
      <?php

      if ($rezultat->num_rows == 0) {
        echo "NEMA PODATAKA O RADNICIMA ZA PRIKAZ!";
      }
      $conn->close();
      ?>

    </div>

    <?php include("includes/footer.php"); ?>



</body>

</html>
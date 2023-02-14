<!DOCTYPE html>
<html lang="en">

<?php

include("connect.php");

if (!isset($_COOKIE['username'])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artikal</title>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <?php

  $rezultat = $conn->query("SELECT * FROM lager");
  $rezultat->fetch_assoc();
  ?>

  <div class="addNewItem">
    <form action="lager_add.php" method="post">
      <div class="input-group">
        <input type="submit" class="btn" name="logout" value="Dodaj novi lager">
      </div>
    </form>
  </div>

  <div class="table-container">
    <table class="table">
      <thead>
        <tr>
          <th>Artikal ID</th>
          <th>Raspoloziva Kolicina</th>
          <th>Lokacija</th>
          <th colspan="2">Akcije</th>
        </tr>
      </thead>
      <?php
      while ($red = $rezultat->fetch_assoc()):
        ?>
        <tr>
          <td><?php echo $red['naziv']; ?></td>
          <td><?php echo $red['sifra']; ?></td>
          <td><?php echo $red['opis']; ?></td>

          <td>
            <form name="edit" action="artikli_edit.php" method="post">
              <input type="hidden" name="ID" value="<?php echo $red['ID_artikla']; ?>" />
              <input type="submit" name="editID" value="Edit" />
            </form>
          </td>
          <td>
            <form name="delete" action="artikli_delete.php" method="post">
              <input type="hidden" name="ID" value="<?php echo $red['ID_artikla']; ?>" />
              <input type="submit" name="delete" value="Delete" />
            </form>
          </td>
        </tr>
      <?php endwhile; ?>
      <tbody>
      </tbody>

    </table>
    <?php

    if ($rezultat->num_rows == 0) {
      echo "NEMA ARTIKALA ZA PRIKAZ!"; //pogledaj na snimku da se ne ispisuje ni zaglavlje tabele
    }
    $conn->close();
    ?>



</body>

</html>
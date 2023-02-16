<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
<?php

include("connect.php");

if (!isset($_COOKIE['username'])) {
  header("Location: index.php");
}
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
      echo "NEMA LAGERA ZA PRIKAZ!"; //pogledaj na snimku da se ne ispisuje ni zaglavlje tabele
    }
    $conn->close();
    ?>


<?php include("includes/footer.php");?>

</body>
</html>
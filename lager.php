<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>
<link rel="stylesheet" href="css/btns.css">
<div class="container" id="main-content">
<h2>Lager</h2>
<?php

include("connect.php");

if (!isset($_COOKIE['username'])) {
  header("Location: index.php");
}
  $rezultat = $conn->query("SELECT * FROM lager");
  $rezultat->fetch_assoc();
  ?>



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
          <td><?php echo $red['artikal_id']; ?></td>
          <td><?php echo $red['razpoloziva_kolicina']; ?></td>
          <td><?php echo $red['lokacija']; ?></td>
          <td>
          <?php if (isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) { ?>
            <form name="edit" action="lager_edit.php" method="post">
              <input type="hidden" name="ID" value="<?php echo $red['lager_id']; ?>" />
              <input type="submit"  class="edit-btn"  name="editID" value="Edit" />
            </form>
            <form name="delete" action="lager_delete.php" method="post">
              <input type="hidden" name="ID" value="<?php echo $red['lager_id']; ?>" />
              <input type="submit"  class="delete-btn"  name="delete" value="Delete" />
            </form>
          </td>
          <?php
              } ?>
        </tr>
      <?php endwhile; ?>
      <tbody>
      </tbody>

    </table>
   
    <?php

    if ($rezultat->num_rows == 0) {
      echo "NEMA LAGERA ZA PRIKAZ!"; 
    }
    $conn->close();
    ?>
 <div class="addNewItem">
    <form action="lager_add.php" method="post">
      <div class="input-group">
        <input type="submit" class="btn" name="logout" value="Dodaj novi lager">
      </div>
    </form>
  </div>

<?php include("includes/footer.php");?>

</body>
</html>
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
<h2>Racun</h2>

    <?php

    include("connect.php");

    if (!isset($_COOKIE['username'])) {
      header("Location: index.php");
    }

    $rezultat = $conn->query("SELECT * FROM racun LEFT JOIN racun_stavka ON racun.racun_id = racun_stavka.racun_id");
    $rezultat->fetch_assoc();
    ?>




    <div class="table-container">
      <table class="table">
        <thead>
          <tr>
            <th>Radnik Izdao</th>
            <th>Datum Racuna</th>
            <th>Br Racuna</th>
            <th>Ukupni Iznos</th>
            <th>IznosPDV</th>
			<th>IznosBezPDV</th>
          </tr>
        </thead>
        <?php
        while ($red = $rezultat->fetch_assoc()):
          ?>
          <tr>
            <td>
              <?php echo $red['radnik_id']; ?>
            </td>
            <td>
              <?php echo $red['datum_racuna']; ?>
            </td>
            <td>
              <?php echo $red['broj_racuna']; ?>
            </td>
            <td>
              <?php echo $red['ukupni_iznos']; ?>
            </td>
            <td>
              <?php echo $red['iznos_PDV']; ?>
            </td>
			<td>
              <?php echo $red['iznos_bezPDV']; ?>
            </td>
          </tr>

        <?php endwhile; ?>
        <tbody>
        </tbody>

      </table>


      <div class="addNewItem">

        <div class="input-group">
          <a href="racun_add_new.php">Dodaj novi racun</a>
        </div>

      </div>
      <?php

      if ($rezultat->num_rows == 0) {
        echo "NEMA RACUNA ZA PRIKAZ!";
      }
      $conn->close();
      ?>

    </div>

    <?php include("includes/footer.php"); ?>

</body>

</html>
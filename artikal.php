<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

  <?php include("includes/design-top.php"); ?>
  <?php include("includes/navigation.php"); ?>
  <link rel="stylesheet" href="css/btns.css">
  <div class="container" id="main-content">
    <h2>Artikli</h2>
    <?php

    include("connect.php");

    if (!isset($_COOKIE['username'])) {
      header("Location: index.php");
    }

    $rezultat = $conn->query("SELECT * FROM artikal");
    $rezultat->fetch_assoc();
    ?>

    <div class="table-container">
      <table class="table">
        <thead>
          <tr>
            <th>Sifra</th>
            <th>Naziv</th>
            <th>JedinicaMjere</th>
            <th>BarKod</th>
            <th>PLU_KOD</th>
            <?php if (isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) { ?>
              <th colspan="2">Akcije</th>
              <?php
            } ?>
          </tr>
        </thead>
        <?php
        while ($red = $rezultat->fetch_assoc()):
          ?>
          <tr>
            <td>
              <?php echo $red['sifra']; ?>
            </td>
            <td>
              <?php echo $red['naziv']; ?>
            </td>
            <td>
              <?php echo $red['jedinica_mjere']; ?>
            </td>
            <td>
              <?php echo $red['barkod']; ?>
            </td>
            <td>
              <?php echo $red['PLU_KOD']; ?>
            </td>

            <td>
              <?php if (isset($_COOKIE['rola']) && $_COOKIE['rola'] == 1) { ?>
                <form name="edit" action="artikal_edit.php" method="post">
                  <input type="hidden" name="ID" value="<?php echo $red['artikal_id']; ?>" />
                  <input type="submit" class="edit-btn" name="editID" value="Edit" />
                </form>
                <form name="delete" action="artikal_delete.php" method="post">
                  <input type="hidden" name="ID" value="<?php echo $red['artikal_id']; ?>" />
                  <input type="submit" class="delete-btn" name="delete" value="Delete" />
                </form>
              </td>
              <?php
              } ?>
          </tr>

        <?php endwhile; ?>
        <tbody>
        </tbody>

      </table>


      <div class="addNewItem">

        <div class="input-group">
          <a href="artikal_add.php">Dodaj novi artikal</a>
        </div>

      </div>
      <?php

      if ($rezultat->num_rows == 0) {
        echo "NEMA ARTIKALA ZA PRIKAZ!";
      }
      $conn->close();
      ?>

    </div>
  </div>
  <?php include("includes/footer.php"); ?>

</body>

</html>
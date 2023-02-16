<?php

include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>add lager</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>


  <div class="flex-container">
    <form id="form" action="lager_add.php" method="post">
      <div class="input-group">//SELECT OPADAJUCI MENI IZ BAZE
        <select class="form-select mb-3" name="artikal-option" aria-label="Default select example">
          <option selected value="user"></option>
        </select>
      </div>

      <div class="input-group">
        <label>Raspoloziva Kolicina</label>
        <input type="text" name="avq" value="" required>
      </div>
      <div class="input-group">
        <label>Lokacija</label>
        <input type="text" name="loc" value="" required>
      </div>

      <div class="button input-group">
        <input type="hidden" name="ID" value="" />
        <input type="submit" name="add_lager" class="btn" value="Dodaj novi Lager" />

      </div>


    </form>
  </div>
</body>

</html>

<?php



if (isset($_POST['add_lager'])) {
  $artikal_id = $_POST['artikal_id'];
  $avq = $_POST['avq'];
  $location = $_POST['loc'];


  $conn->query("INSERT INTO lager(artikal_id,avq, loc)
    VALUES ('$artikal_id','$avq','$location')");
  header("location:lager.php");

}

$conn->close();
?>
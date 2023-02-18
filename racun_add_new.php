<?php

include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add employee</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>


  <div class="flex-container">
    <form id="form" action="radnik_add.php" method="post">
      <div class="input-group">
        <label>Radnik Izdao</label>
        <!-- opadajuci meni za radnika -->
        <input type="text" name="radnik_id" required>
      </div>
      <div class="input-group">
        <label>Datum Racuna</label>
        <input type="date" name="datum_racuna"  required>
      </div>
      <div class="input-group">
        <label>Br Racuna</label>
        <input type="text" name="broj_racuna"  required>
      </div>
      <div class="input-group">
        <label>Ukupni iznos</label>
        <input type="text" name="ukupni_iznos"  required>
      </div>
      <div class="input-group">
        <label>IznosPDV</label>
        <input type="text" name="iznos_PDV" required>
      </div>
      <div class="input-group">
        <label>IznosBezPDV</label>
        <input type="text" name="iznos_bezPDV"  required>
      </div>
    
      
      <div class="button input-group">
        <input type="hidden" name="ID"  />
        <input type="submit" name="add_check" class="btn" value="Dodaj racun" />
      </div>


    </form>
  </div>
</body>

</html>

<?php



if (isset($_POST['add_check'])) {
  $radnik = $_POST['radnik_id'];
  $datum= $_POST['datum_racuna'];
  $br_racuna = $_POST['broj_racuna'];
  $suma= $_POST['ukupni_iznos'];
  $sumaPDV = $_POST['iznos_PDV'];
  $sumaBezPDV = $_POST['iznos_bezPDV'];
 

  $conn->query("INSERT INTO racun (radnik_id ,datum_racuna, broj_racuna,ukupni_iznos,iznos_PDV,iznos_bezPDV)
    VALUES ('$radnik',' $datum','  $br_racuna ',' $suma','  $sumaPDV ','  $sumaBezPDV')");
  header("location:racun.php");

}

$conn->close();
?>

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
<?php
if (isset($_GET['artikal_id'])) {

$item_id = $_GET['artikal_id'];

$sql = "SELECT * FROM artikal WHERE artikal_id = $item_id ";
if ($result = $conn->query($sql)) {
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
      // echo $row['artikal_id'];
      $dbselected = $row['artikal_id'];
    }
    $result->free_result();
  } else {
    echo "Nesto nije u redu...";
  }
}



}
?>
  <div class="flex-container">
    <form id="form" action="lager_add.php" method="post">
    <!-- SELECT OPADAJUCI MENI IZ BAZE -->
      <div class="input-group">
      <?php echo "<select>";
      foreach($options as $option){
        if( $dbselected == $option){
          echo "<option value='$option'>$option </option>";
        }
      }
     echo "</select>" ;
      
      
      
      ?>
        
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
<!-- <select class="form-select" name="artikal-option" > -->
          <!-- <option selected value="atikal_id"><?php $row['artikal_id']?></option> -->
        <!-- </select> -->
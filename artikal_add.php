<?php

include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add article</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>


  <div class="flex-container">
    <form id="form" action="artikal_add.php" method="post">
      <div class="input-group">
        <label>Sifra</label>
        <input type="text" name="product_code" value="" required>
      </div>
      <div class="input-group">
        <label>Naziv</label>
        <input type="text" name="product_name" value="" required>
      </div>
      <div class="input-group">
        <label>JedinicaMjere</label>
        <input type="text" name="quantity_unit" value="" required>
      </div>
      <div class="input-group">
        <label>Barkod</label>
        <input type="text" name="bar_code" value="" required>
      </div>
      <div class="input-group">
        <label>PLU_KOD</label>
        <input type="text" name="plu_code" value="" required>
      </div>
      <div class="button input-group">
        <input type="hidden" name="ID" value="" />
        <input type="submit" name="add_article" class="btn" value="Dodaj novi artikal" />
      </div>


    </form>
  </div>
</body>

</html>

<?php



if (isset($_POST['add_article'])) {
  $product_code = $_POST['product_code'];
  $product_name = $_POST['product_name'];
  $quantity_unit = $_POST['quantity_unit'];
  $bar_code = $_POST['bar_code'];
  $plu_code = $_POST['plu_code'];

  $conn->query("INSERT INTO artikal(sifra,naziv, jedinica_mjere,barkod,PLU_KOD)
    VALUES ('$product_code','$product_name','$quantity_unit','$bar_code','$plu_code')");
  header("location:artikal.php");

}

$conn->close();
?>
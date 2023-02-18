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
        <label>Ime</label>
        <input type="text" name="fname" value="" required>
      </div>
      <div class="input-group">
        <label>Prezime</label>
        <input type="text" name="lname" value="" required>
      </div>
      <div class="input-group">
        <label>Broj telefona</label>
        <input type="text" name="phone" value="" required>
      </div>
      <div class="input-group">
        <label>Addresa</label>
        <input type="text" name="adress" value="" required>
      </div>
      <div class="input-group">
        <label>Grad</label>
        <input type="text" name="city" value="" required>
      </div>
      <div class="input-group">
        <label>Email</label>
        <input type="text" name="email" value="" required>
      </div>
      <div class="input-group">
        <label>JMBG</label>
        <input type="text" name="jmbg" value="" required>
      </div>
      <?php
      $rezultat = $conn->query("SELECT * FROM korisnik");
      $rezultat->fetch_assoc();
      ?>
      <div class="input-group">
        <label for="user_id">Korisnik ID</label>
        <select class="input-group" name="user_id">
          <?php
          while ($red = $rezultat->fetch_assoc()):
            ?>
            <option value="<?php echo $red['korisnik_id']; ?>">
              <?php echo $red['korisnicko_ime']; ?>
            </option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="button input-group">
        <input type="hidden" name="ID" value="" />
        <input type="submit" name="add_employee" class="btn" value="Dodaj radnika" />
      </div>


    </form>
  </div>
</body>

</html>

<?php



if (isset($_POST['add_employee'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $adress = $_POST['adress'];
  $city = $_POST['city'];
  $email = $_POST['email'];
  $jmbg = $_POST['jmbg'];
  $user_id = $_POST['user_id'];

  $conn->query("INSERT INTO radnik(ime,prezime, broj_telefona,adresa,grad,email,JMBG,korisnik_id)
    VALUES ('$fname',' $lname','  $phone ',' $adress',' $city','  $email',' $jmbg',' $user_id')");
  header("location:radnik.php");

}

$conn->close();
?>
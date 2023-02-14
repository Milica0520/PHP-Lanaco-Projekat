<?php

include("connect.php");


if (isset($_POST['username'])) {


  $sql_query = "
        SELECT 
            `korisnicko_ime`, 
            `sifra` 
        FROM `korisnik`
        WHERE `korisnicko_ime` = '$_POST[username]'
                OR `sifra` = '$_POST[password]'";

  $response = $conn->query($sql_query);

  if ($response->num_rows == 0) {
    $sql_query = "INSERT INTO `korisnik`
            (`korisnicko_ime`, `sifra`)
            VALUES
            ('$_POST[username]', '$_POST[password]')";

    $conn->query($sql_query); //provjeri constrain, sta znaci kad trebas nesto dodati

    setcookie('username', $_POST['username'], time() + 3600);
  } else {
    header("Location: login.php");
    $conn->close();
    die();
  }

  $conn->close();
}


header("Location: artikal.php");
?>
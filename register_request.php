<?php

include("connect.php");


if (isset($_POST['username'])) {


  $sql_query = "
        SELECT 
            `korisnicko_ime`
          
        FROM `korisnik`
        WHERE `korisnicko_ime` = '$_POST[username]'";

  $response = $conn->query($sql_query);

  if ($response->num_rows == 0) {
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $sql_query = "INSERT INTO `korisnik`
            (`korisnicko_ime`, `sifra`)
            VALUES
            ('$_POST[username]', '$password')";

    $conn->query($sql_query); //provjeri constrain, sta znaci kad trebas nesto dodati

    setcookie('username', $_POST['username'], time() + 3600);
  } else {
    header("Location: index.php");
    $conn->close();
    die();
  }

  $conn->close();
}


header("Location: artikal.php");
?>
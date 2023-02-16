<?php

include("connect.php");

if (isset($_POST['username'])) {

  $sql_query = "SELECT * FROM `korisnik`
                        WHERE `korisnicko_ime` = '$_POST[username]'";


  $response = $conn->query($sql_query);

  if ($response->num_rows == 1 ) {
     $korisnik= $response->fetch_assoc();
    $password_valid =password_verify($_POST['password'],$korisnik['sifra']) ;
    if($password_valid ){
      setcookie('username', $_POST['username'], time() + 3600);
      setcookie('rola', $korisnik['rola_id'] , time() + 3600);
    }
    
  }



  $conn->close();

}

header("Location: artikal.php");



?>

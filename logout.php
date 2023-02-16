<?php
if(isset($_COOKIE['username'])){
    setcookie('username', '', time() - 3600);
    setcookie('rola',$korisnik['rola_id'] , time() - 3600);
    header("Location: index.php");
} 
?>
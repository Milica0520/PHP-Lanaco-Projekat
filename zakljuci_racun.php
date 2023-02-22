<?php
include("connect.php");

$radnik_id = $_COOKIE['username'];
$datum = date("d F Y");
$br_racuna = date('YmdHis') . mt_rand(100000, 999999);
$ukupnacijena= 
$pdv = ($ukupnacijena * 0.17);
$bezPdv = $ukupnacijena - ($ukupnacijena * 0.17);

var_dump($_COOKIE['username']);
var_dump($pdv);//null
var_dump($bezPdv);//null
var_dump($br_racuna);//ocita
var_dump($datum);//ocita
var_dump($_POST['stavke_racuna']);


$sql = "SELECT radnik_id FROM radnik WHERE korisnik_id = '$radnik_id'";
$conn->query($sql);


var_dump($radnik_id);

$sql= "INSERT INTO racun (racun_id, radnik_id, datum_racuna,broj_racuna,ukupni_iznos, iznos_PDV, iznos_bezPDV)
VALUES ('$radnik_id','$datum','$br_racuna','$ukupnacijena','$pdv ','$bezPdv')";

$conn->query($sql);

$conn->close();

?>


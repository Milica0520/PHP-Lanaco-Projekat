<?php
// Retrieve the values from the form
// $kolona = $_POST['kolona'];
// $vrijednost = $_POST['vrijednost'];

include("connect.php");

if(isset($_POST['add_racun'])){

// Get form data

var_dump($radnik_id);
$radnik_id = $_POST['polje'][0];
$datum_racuna = $_POST['polje'][1];
$broj_racuna = $_POST['polje'][2];
$ukupni_iznos = $_POST['polje'][3];
$iznos_pdv = $_POST['polje'][4];
$iznos_bezpdv = $_POST['polje'][5];

// var_dump( $_POST['polje']);
// var_dump( $_POST['polje']);


// Insert data into the database
$sql = "INSERT INTO racun (radnik_id, datum_racuna, broj_racuna, ukupni_iznos, iznos_PDV, iznos_bezPDV) 
VALUES ('$radnik_id', '$datum_racuna', '$broj_racuna', '$ukupni_iznos', '$iznos_pdv', '$iznos_bezpdv')";
$conn->query($sql);

header("location: racun_lista.php");

}
$conn->close();




?>

<!-- ovdje ce se auto inkrenetovati racun id -->
<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

    <?php include("includes/design-top.php"); ?>
    <?php include("includes/navigation.php"); ?>
    <link rel="stylesheet" href="css/btns.css">
    <div class="container" id="main-content">
        <h2>Izgled Racuna</h2>
        <?php
        //var_dump($_POST);
        
        $listaStavkiJson = $_POST["stavke_racuna"];

        $listaStavki = json_decode($listaStavkiJson, true);

        $ukupnacijena = 0;
        ?>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Artikal</th>
                        <th>Kolicina</th>
                        <th>Cijena</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $listaStavki as $stavka):
                    $ukupnacijena+= $stavka["price"] * $stavka["quantity"];
                        ?>
                        <tr>
                            <td>
                                <?php echo $stavka["artikal_id"]; ?>
                            </td>
                            <td>
                                <?php echo $stavka["quantity"]; ?>
                            </td>
                            <td>
                                <?php echo $stavka["price"]; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

      <p>Radnik kreirao:  <?php echo $_COOKIE['username'] ;?></p>

      <p>Datum izdavanja racuna: <?php date("d F Y") ;?></p>

      <p>Ukupan iznos: <?php echo $ukupnacijena ;?></p>

      <p>Iznos PDV: <?php echo ($ukupnacijena * 0.17) ;?></p>

      <p>Iznos bez PDV: <?php echo $ukupnacijena - ($ukupnacijena * 0.17) ;?></p>

    <!-- poslati u bazu -->

    </div>
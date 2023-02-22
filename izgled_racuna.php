<!-- ovdje ce se auto inkrenetovati racun id -->

<?php include("includes/a_config.php");
include("connect.php"); ?>
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
        // izlistavanje stavki u tabeli stavke
        
        $listaStavkiJson = $_POST["stavke_racuna"];
        // var_dump($_POST);
        $listaStavki = json_decode($listaStavkiJson, true);


        //var_dump($listaStavki);
        echo "<br>";

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
                    <?php foreach ($listaStavki as $stavka):
                        $ukupnacijena += $stavka["price"] * $stavka["quantity"];
                        ?>
                        <tr>
                            <td>
                                <?php echo $atikal_id = $stavka["artikal_id"]; ?>
                            </td>
                            <td>
                                <?php echo $kolicina = $stavka["quantity"]; ?>
                            </td>
                            <td>
                                <?php echo $cijena = $stavka["price"]; ?>
                            </td>
                        </tr>
                    <?php endforeach;
                    //var_dump($_POST);
                    ?>
                </tbody>
            </table>



            <!-- izlistavanje svih stavki racuna u tabeli racun -->

            <?php
            $racun = array(
                'radnik' => $radnikID = $_COOKIE['username'],
                'date' => $datum = date("d F Y"),
                'invoiceNumber' => $br_racuna = date('YmdHis') . mt_rand(100000, 999999),
                'ukupnacijena' => $ukupnacijena,
                'pdv' => $pdv = ($ukupnacijena * 0.17),
                'bezpdv' => $bezPdv = $ukupnacijena - ($ukupnacijena * 0.17)
            );
           // var_dump($radnikID );

            ?>
            <!-- racun tabela -->
        </div>

        <div class="table-container">
            <form action="process_form_racun.php" method="post">
                <table class="table">
                    <tr>
                        <th>Radnik ID</th>
                        <th>Datum racuna</th>
                        <th>Broj racuna</th>
                        <th>Ukupni iznos</th>
                        <th>Iznos PDV</th>
                        <th>Iznos bezPDV</th>
                    </tr>
                    <?php foreach ($racun as $polje): ?>
                        <td>
                           <input name="polje" value="<?php echo $polje; ?>"> 
                        </td>
                        <?php
                    endforeach;
                    ?>
                </table>
                <div class="button input-group">
          <input type="hidden" name="ID" value="" />
          <input type="submit" name="add_racun" class="btn" value="Potvrdi" />
        </div>
            </form>

        </div>




        <!-- <div class="button input-group">
            <a class="btn" href="zakljuci_racun.php">Zakljuci racun</a>
        </div>
        <div class="button input-group">
            <a class="btn" href="racun_lista.php">Odustani od racuna</a>
        </div>

    </div>

    <?php



    ?>

    <?php
    $conn->close();
    ?>
    
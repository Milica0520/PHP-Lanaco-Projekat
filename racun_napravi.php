<!-- ovdje ce se auto inrementovati racun_id u stavkRacun -->
<?php

include("connect.php");
?>
<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/design-top.php"); ?>
    <?php include("includes/navigation.php"); ?>
    <div class="container" id="main-content">
        <h2>Dodaj stavke</h2>
        <div class="table-container">
            <table class="table">
                <tr>
                    <th>Artikal ID</th>
                    <th>Kolicina</th>
                    <th>Cijena</th>
                    <th>Izbriši</th>
                </tr>
                <tbody id="tabel"> </tbody>
            </table>

        </div>
        <div class="form-container">
            <form id="form">
                <?php
                $rezultat = $conn->query("SELECT * FROM artikal");
                $rezultat->fetch_assoc();
                ?>
                <div class="input-group">
                    <label for="naziv_artikla">Odaberi artikal</label>
                    <select name="artikal" id="artikal_id">
                        <?php
                        while ($red = $rezultat->fetch_assoc()):
                            ?>
                            <option value="<?php echo $red['artikal_id']; ?>">
                                <?php echo $red['naziv']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="input-group">
                    <input type="number" id="quantity" required placeholder="Kolicina">
                </div>
                <div class="input-group">
                    <input type="number" id="price" required placeholder="Cijena">
                </div>
                <div class="input-group">
                    <input type="button" onclick="create()" id="submit" value="DODAJ">
                </div>
            </form>
        </div>
        <div>
            <button onclick="napraviRacun()">Napravi racun</button>
        </div>
    </div>


    <script>
        var itemList = [];//pravim niz/ojekat koji se sasti od podataka iz forme
        class item {
            constructor(artikal_id, quantity, price) {
                this.artikal_id = artikal_id;
                this.quantity = quantity;
                this.price = price;
            }
        }

        var itemList = [];
        //console.log(itemList);
        read();

        function read() {//create funkcija pravi tabelu
            var tabel = document.getElementById("tabel");
            tabel.innerHTML = '';//ovdje sam ispraznila tabelu
            for (var i = 0; i < itemList.length; i++) {
                tabel.innerHTML += "<tr><td>" + itemList[i].artikal_id + "</td>"
                    + "<td>" + itemList[i].quantity + "</td>"//ove vrijednosti koje korisnik unosi
                    + "<td>" + itemList[i].price + "</td>"
                    // + "<td><button onclick='edit(" + i + ")'>Ažuriraj</button></td>"
                    + "<td><button onclick='del(" + i + ")'>X</button></td></tr>";
            }
        }

        function create() {//ova funkcija ubaci novi element u niz, sortira i ispise u tabeli

            var newArtikal_id = artikal_id.value;//fname je getelementbyid("fname")
            var newQuantity = quantity.value;
            var newPrice = price.value;

            var newItem = new item(newArtikal_id, newQuantity, newPrice)//nova varijabla koja je jednaka klasi objekta koju smo napravili na pocetku
            itemList.push(newItem);

            //ocistiti tj. isprazni formu, 
            artikal_id.value = "";
            quantity.value = "";
            price.value = "";

            itemList.sort();
            read();
        }

        function del(index) {//brisanje
            itemList.splice(index, 1)
            read();
        }

        function napraviRacun() {
            document.body.innerHTML += `<form id="dynForm" action="izgled_racuna.php" method="post">
                                        <input type="hidden" name="stavke_racuna" value='`
                + JSON.stringify(itemList) + `'></form>`;
            document.getElementById("dynForm").submit();
        }
    </script>
</body>

</html>
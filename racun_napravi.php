<!-- forma za stavku racuna sa opadajucim menijem za artikal id,sabmit i ispisi u tabeli -->
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


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add check item</title>

    </head>

    <body>
    <table>

<tr>
<!-- opadajuci meni za artikal-->
    <th>Artikal ID</th>
    <th>Kolicina</th>
    <th>Cijena</th>
    <th>Ažuriraj</th>
    <th>Izbriši</th>
</tr>
<tbody id="tabel"> </tbody><!--Izbacila sam ovaj tr gore iz tbody da ostane prazan prazan, ovo sam sana skontala-->
</table>


<div class="form-container">
<form id="form">
<div class="input-group">
        <input type="text" id="artikal_id" required placeholder="Artikal id">
    </div>
    <div class="input-group">
        <input type="text" id="quantity" required placeholder="Kolicina">
    </div>
    <div class="input-group">
        <input type="text" id="price" required placeholder="Cijena">
    </div>
    <div class="input-group">
        <input type="button" onclick="create()" id="submit" value="DODAJ">
    </div>
</form>
</div>

        <script>


            var indexOfelementInEdit = -1;
            var contactList = [];//U niz bi se trebali smjestiti nove kontakte koje dodamo

            class contact {
                constructor(artikal_id, quantity,price) {
                    this.artikal_id = artikal_id;
                    this. quantity =  quantity;
                    this.price =price ;
                   
                }


            }
            //pravim novu "praznu" varijablu objekta koji se zove firstContact,  koji je kao konstruktor
            var firstContact = new contact("Milica", "Dujakovic", "065/695-775", "dujakovic.milica3@gmail.com");
            var contactList = [firstContact];
            read();




            function read() {//ova funkcija izcitava elemente niza 
                var tabel = document.getElementById("tabel");//var sam ubacila u funkiju
                tabel.innerHTML = '';//ovdje sam ispraznila tabelu
                for (var i = 0; i < contactList.length; i++) {
                    tabel.innerHTML += "<tr><td>" + contactList[i].artikal_id + "</td>"
                        + "<td>" + contactList[i].quantity + "</td>"//ove 4  vrijednosti koje korisnik unosi
                        + "<td>" + contactList[i].price + "</td>"
                        + "<td><button onclick='edit(" + i + ")'>Ažuriraj</button></td>"//bila je greska u zatvaranju tr taga
                        + "<td><button onclick='del(" + i + ")'>X</button></td></tr>";
                }

            }

            //trebam napraviti funkciju za dugme azuriraj
            //Zadaca napraviti da create ne brise stari kontakt i dodaje novi nego mjenja postojeci
            //to mozes urati tako sto  if(indexOfelementInEdit>-1)


            function create() {//ova funkcija ubaci novi element u niz, sortira i ispise u tabeli
                if (indexOfelementInEdit > -1) {
                    contactList[indexOfelementInEdit].artikal_id = artikal_id.value;
                    contactList[indexOfelementInEdit].quantity = quantity.value;
                    contactList[indexOfelementInEdit].price =price.value;
                   
                    indexOfelementInEdit = -1;
                }
                else {
                    var newArtikal_id = artikal_id.value;//fname je getelementbyid("fname")
                    var newQuantity = quantity.value;
                    var newPrice = price.value;
                   
                    var newContact = new contact( newArtikal_id , newQuantity ,  newPrice)//nova varijabla koja je jednaka klasi objekta koju smo napravili na pocetku
                    contactList.push(newContact);

                }
                //ocistiti tj. isprazni formu, 
                artikal_id.value = "";
                quantity.value = "";
                price.value = "";
                
                console.log(indexOfelementInEdit);
                contactList.sort();
                read();
            }


            function del(index) {//brisanje
                contactList.splice(index, 1)
                read()
            }

            //trebam naptaviti funkciju kada kliknemo azuriraj, to ne znam 
            //mislila sam da se contakt ispise u formi pa da ga mogu mjenjati

            function edit(index) {

                console.log(index, contactList[index]);
                console.log(index);
                console.log(contactList[index].fname);
                artikal_id.value = contactList[index].fname;//popunjavam formu sa imenom u kontaktom kojim mjenjam
                quantity.value = contactList[index].lname;//popunjavam formu sa prezimenom u kontaktom kojim mjenjam
                price.value = contactList[index].tel;//popunjavam formu sa telefonom u kontaktom kojim mjenjam
               

                //console.log(telefon, "\ntelefon", "", lname, email);//\n eskejp karakter koji se koristi za unos novog reda u izlaz
                indexOfelementInEdit = index;
            }













        </script>
    </body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form  method="post">
       Name:  <input type="text" name="name" ><br>
       Email: <input type="text" name="Email" ><br>
        <button type="submit">Wyślij</button>
    </form>

    <form  method="get">
       Name:  <input type="text" name="name" ><br>
       Email: <input type="text" name="Email" ><br>
        <button type="submit">Wyślij</button>
    </form>

</body>
</html>


<?php 

// define("PI", 3.14);

//Zmienne super globalne.Są to tablice asocjacyjne, które przechowują dane z formularzy oraz inne informacje.


// $_POST

// $_POST['name'] = "Gracek placek";

// $_GET

// $_SESSION

//GET = Pobieranie,POST = Wysyłanie,PUT = Aktualizacja,DELETE = Usuwanie. Nie ma to nic wspólnego z $_POST itd to są zmienne globalne a zwykle gety itd to metody http.

//GET localhost:8080/index.php?name=Gracek&surname=Placek 
//echo $_GET['name']; // Gracek
//echo $_GET['surname']; // Placek

//Pobiera informacje z jakiegoś pola formularza jako link.
// Geta urzywamy gdy inforamcjie ktore chcemy pobrac sa nie wrażliwe nie mają dużego znaczenia jak wyciekną

//payload = informacje
//swt = token bezpieczenstwa
//informacje postem są wysłane w request body w formacie json
//$_POST['name'] = "Gracek placek"; // to jest payload



 ?>
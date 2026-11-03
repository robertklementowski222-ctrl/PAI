<?php 

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "Warehouse";

$conn = new mysqli($localhost, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zadanie 17 - PHP</title>
</head>
<body>

   <form action="./" method="post">

        <label for="name">Nazwa produktu:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="price">Cena:</label>
        <input type="number" id="price" name="price"
               min="0.01" step="0.01" required><br>

        <label for="amount">Ile chcesz kupić?</label>
        <input type="number" id="amount" name="amount"
               min="1" step="1" required><br>

        <button type="submit" name="dodaj">Dodaj produkt</button>

    </form>

<?php 
    $conn; //ustanowienie połączenia, DO UZUPEŁNIENIA


    if(isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["amount"])) {
        echo "Nazwa: ".$_POST["name"]."<br>";
        echo "Cena: ".$_POST["price"]."<br>";
        echo "Ilość: ".$_POST["amount"]."<br>";

        $name = $_POST["name"];
        $price = $_POST["price"];
        $amount = $_POST["amount"];

        //Tabela Products
        //Pola: id, name, price, amount
        $sql = "INSERT INTO Products (name, price, amount) VALUES (?, ?, ?)";

        $stmt = $conn -> prepare($sql); // przygotowuje na połączeniu zapytanie sql
    }

?>

</body>
</html>

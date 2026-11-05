<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "warehouse";

    //Tworzenie polaczenia
    $conn = mysqli_connect($host, $username, $password, $database);

    if(!$conn){
        die("Połączenie się nie powiodło: " . "<br><br>");
    } else {
        echo "Połączenie się powiodło" . "<br><br>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" require>
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required>
        <br>

        <label for="name">Nazwa produktu:</label>
        <input type ="text" id="name" name ="name" required>
        <br>

        <label for="amount">Ilość sztuk:</label>
        <input type="number" id="amount" name="amount" required>
        <br>

        <label for="price">Cena:</label>
        <input type="number" id="price" name="price" required>
        <br>

        <button type="submit">Dodaj do koszyka!</button>
        <br><br>
    </form>

    <?php

        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['amount'])){
            $name = $_POST["name"];
            $amount = $_POST["amount"];
            $price = $_POST["price"];
            
            echo "Nazwa: " . $name . "<br>";
            echo "Ilość: " . $amount . "<br>";
            echo "Cena: " . $price . "<br>";

            //Tabela: Products
            //Pola: (int) id, (varchar) name, (double) price, (int) amount
            $sql = "INSERT INTO `products` (`name`, `amount`, `price`) VALUES ('$name', '$amount', '$price')";

            //wykonuje zapytanie na bazie danych na podstawie podanego SQLa oraz polaczenia z DB
            if(mysqli_query($conn, $sql)){
                echo "Udało sie dodać rekord!";
            }else{
                echo "Nie udało się dodać rekordu: " . mysqli_error($conn);
            }

            mysqli_close($conn);

    }
    ?>
</body>
</html>
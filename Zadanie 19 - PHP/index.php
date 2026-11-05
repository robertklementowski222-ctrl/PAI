<?php

    require_once "db_connect.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>UPDATE</h1>

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

        if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['amount'])){

            $id = $_POST["id"];
            $name = $_POST["name"];
            $amount = $_POST["amount"];
            $price = $_POST["price"];
            
        

            $sql = "UPDATE `products` SET 
                `name`='$name',
                `price`='$price',
                `amount`='$amount'
                WHERE `id`='$id' ";


            $result = mysqli_query($conn, $sql);

            if($result){
                echo "Zaktualizowano rekord o ID: " . $id;
            }else{
                echo "Nie udało się zaktualizować rekordu: " . mysqli_error($conn);
            }

            mysqli_close($conn);

    }
    ?>
</body>
</html>
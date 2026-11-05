<?php 

    require_once "db_connect.php"; // Jeśli jestnieje plik nie będzie go drgui raz ładować
    // require "db_connect.php"; // Wyrzuci nam error (strona nie będzie działać) gdy np plik nie istnieje
    // include "db_connect.php"; // Wyrzuci Warning gdy np plik nie istnieje
    // include_once "db_connect.php"; // Jeśli jestnieje plik nie będzie go drgui raz ładować

?>
<html>
    <head>
        <title>lekcja 19</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Lista Produktów</h1>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Cena</th>
                <th>Ilość</th>
            </tr>
        <?php 
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql);
            

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["price"]."</td>";
                echo "<td>".$row["amount"]."</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
        ?>
        </table>
    </body>
</html>
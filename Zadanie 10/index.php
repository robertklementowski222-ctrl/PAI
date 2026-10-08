<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./" method="POST">
        <label for="name">Imię:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="age">Wiek:</label>
        <input type="text" id="age" name="age" ><br><br>

        <input type="submit" value="Wyślij">
    </form>
</body>
</html>

<?php    

//RESTful API jest bez stanowa czyli dajemy duzo metod ale one same w sobie nie przechowują informacji

//Form -> PHP -> DATABASE

//localhost:8080/index.php?name=Gracek&surname=Placek  ? = query parameter czyli po tym już są same informacje

if(isset($_POST['name']) && isset($_POST['age'])) {
    echo $_POST['name'];
    echo $_POST['age'];
} else {
    echo "Nie podano imienia lub wieku.";
}

?>
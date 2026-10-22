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

        <label for="sex">Płeć:</label>

        <input type="radio" id="male" name="sex" value="male">
        <label for="male">Mężczyzna</label>

        <input type="radio" id="female" name="sex" value="female">
        <label for="female">Kobieta</label><br><br>

        <label for="game">Ulubiona gra:</label> <br>
        <input type="checkbox" id="game1" name="game1" value="GTA"> GTA <br>
        <input type="checkbox" id="game2" name="game2" value="Minecraft"> Minecraft <br>
        <input type="checkbox" id="game3" name="game3" value="League of Legends"> League of Legends <br>
        <input type="checkbox" id="game4" name="game4" value="Counter-Strike"> Counter-Strike <br><br>

        <input type="submit" value="Wyślij">
    </form>
</body>
</html>

<?php    

//RESTful API jest bez stanowa czyli dajemy duzo metod ale one same w sobie nie przechowują informacji

//Form -> PHP -> DATABASE

//localhost:8080/index.php?name=Gracek&surname=Placek  ? = query parameter czyli po tym już są same informacje


//weryfikacja imienia i wieku

if(isset($_POST['name']) && isset($_POST['age']) && !empty($_POST['name']) && !empty($_POST['age'])) {
    echo $_POST['name'];
    echo $_POST['age'];
    echo $_POST['sex'];
} else {
    echo "Nie podano imienia lub wieku.";
}

//weryfikacja płci

if(isset($_POST['sex'])){
    if($_POST['sex'] == 'male') {
         echo "<br>";
        echo "Mężczyzna";
    } else {
        echo "<br>";
        echo "Kobieta";
    }
}

//weryfikacja wybranej gry na debila

// if(isset($_POST['game1']) && $_POST['game1'] == 'GTA' || isset($_POST['game2']) && $_POST['game2'] == 'Minecraft' || isset($_POST['game3']) && $_POST['game3'] == 'League of Legends' || isset($_POST['game4']) && $_POST['game4'] == 'Counter-Strike') {
//     echo "<br>";
//     echo "Wybrane gry: ";
//     if(isset($_POST['game1'])) {
//         echo "<br>";
//         echo "GTA ";
//     }
//     if(isset($_POST['game2'])) {
//         echo "<br>";
//         echo "Minecraft ";
//     }
//     if(isset($_POST['game3'])) {
//         echo "<br>";
//         echo "League of Legends ";
//     }
//     if(isset($_POST['game4'])) {
//         echo "<br>";
//         echo "Counter-Strike ";
//     }
// }

//weryfikacja wybranej gry

    for($i = 1; $i <= 4; $i++) {
        if(isset($_POST['game' . $i])) {
            echo "<br>";
            echo "Wybrano gry: " . $_POST['game' . $i];
        }
    }

?>
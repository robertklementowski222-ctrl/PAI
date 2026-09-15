<?php 

    //for

    for($i = 0; $i < 10; $i++){
        echo $i;
    }

    //while

    $i = 0;

    while($i < 5){
        echo $i;
        $i++;
    }

    //do-while

    $i = 0;
    do{
        echo $i;
        $i ++;
    } while ($i <= 5);

    //foreach

    $tablica = [1,2,3,4,5];

    foreach($tablica as $wartosc){
        echo $wartosc;
    }

    //tablice asocjacyjne

    $owoce = ["jabłko" => "czerwone", "banan" => "żółty", "gruszka" => "zielona"];

    foreach($owoce as $klucz => $wartosc){
        echo "Klucz: " . $klucz . "  Wartość: " . $wartosc;
    }

    //tablice

    $array = [1,2,3];
    $assoc_table = ["imie" => "Jan", "wiek" => 30, "miasto" => "Kraków"];
    $empty_array = [];
    $array2 = array(1,2,3);

    $arrayOfNumbers = [1,2,3,4,5];
    for($i = 0; $i < count($arrayOfNumbers); $i++){
        echo $arrayOfNumbers[$i];
    }

    //Wstawianie jednego elementu

    $number = 10;
    $insert_array = [1,2,3];
    $insert_array[1] = $number;

    //Wstawianie elementu do całej tablicy

    $number = 10;
    $insert_array = [1,2,3];

    for($i = 0; $i < count($insert_array); $i++){
        echo $insert_array[$i] = $number;
    }
    echo var_dump($insert_array);

    //Wstawianie elementu pod wybrany index

    $number = 10;
    $index = 0;
    $insert_array = [1,2,3];

    $insert_array[$index] = $number;

    //Program ktory za pomoca for zwieksza zmiena $i od 1 do 100 o 2 a pozniej zmniesza ja do 1 o 4

    for($i = 1; $i <= 100; $i += 2){
        echo $i;
    }

    for($i = 100; $i >= 1; $i -= 4){
        echo $i;
    }

    while($i <= 100){
        echo $i;
        $i += 2;
    }

    while($i = 100; $i >= 1){
        echo $i;
        $i -= 4;
    }

    $i = 1;
    do{
        echo $i;
        $i += 2;
    } while ($i <= 100);

    $i = 100;
    do{
        echo $i;
        $i -= 4;
    } while ($i >= 1);


?>
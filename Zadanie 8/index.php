<?php 

    //Zad 1 Z przedziału <0..1000> wyświetl liczby podzielne przez 3 i 7
    for ($i = 0; $i <= 1000; $i++) {
        if ($i % 3 == 0 && $i % 7 == 0) {
            echo $i . " ";
        }
    }

    echo "<br>";
    echo "<br>";

    //Zad 2 Wyświetl liczby z przedziału <0..100> z pominięciem liczb podzielnych przez 3
    for ($i = 0; $i <= 100; $i++) {
        if ($i % 3 != 0) {
            echo $i . " ";
        }
    }

    echo "<br>";
    echo "<br>";

    //Zad 3 Wprowadź dowolną liczbę całkowitą. Wyświetl kolejne 20 liczb podzielnych przez 3.
    //Jeśli podana liczba nie jest podzielna przez 3,znajdź kolejną liczbę podzielną przez 3.
    //Wykonaj to zadanie dla dowolnego dzielnika n.
    $n = 3; 
    $count = 0;
    $i = $n;

    
    while ($count < 20) {
        if($i % 3 ==  0) {
            echo $i . " ";
            $count++;
        }
        $i++;
    }

    echo "<br>";
    echo "<br>";

    //Zad 4 Wprowadź dowolną liczbę całkowitą. Wyświetl kolejne 20 liczb podzielnych przez n.
    //Jeśli podana liczba nie jest podzielna przez n,znajdź kolejną liczbę podzielną przez n.
    $x = 5
    $n = 3; 
    $count = 0;
    $i = $x;
   
    while ($count < 20) {
        if($i % $n ==  0) {
            echo $i . " ";
            $count++;
        }
        $i++;
    }

    echo "<br>";
    echo "<br>";

    //Zad 5 [1,4,3,6,8,9,2]  Znajdź maksimum bez użycia gotowej funkcji.

    $array = [1,4,3,6,8,9,2];

    for($i = 0;$i < count($array); $i++) {
        if($array[$i] > $max) {
            $max = $array[$i];
        }
    }

?>
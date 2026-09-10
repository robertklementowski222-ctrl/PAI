<?php 

    // $zmienna = 5;

    // if($zmienna > 4){
    //     echo "Zmienna większa od 4";
    // } else if($zmienna == 5){
    //     echo "Zmienna rowna sie 5";
    // } else {
    //     echo "Inny wynik";
    // }

    // $kolor = "red";

    // switch ($kolor){
    //     case "red":
    //         echo "czerwony";
    //         break;
    //     case "blue":
    //         echo "niebieski";
    //         break;
    //     case "yellow":
    //         echo "żółty";
    //         break;
    //     case "green":
    //         echo "zielont";
    //         break;
    //     default:
    //         echo "kolor nierozpoznany";
    // }

    //Zadanie 1

    $a = 1;
    $b = -5;
    $c = 6;

    $delta = pow($b,2) - (4 * $a * $c);

    
    


    if ($delta > 0){
        $x1 = (-$b - sqrt($delta)) / (2*$a);
        $x2 = (-$b + sqrt($delta)) / (2*$a);
        echo "Miejsce zerowe nr 1: $x1 nr2: $x2";
    } else if ($delta == 0){
        $x = -$b / 2*$a;
        echo "Miejsce zerowe: $x";
    } else if ($delta < 0){
        echo "Brak miejsc zerowych";
    }
?>
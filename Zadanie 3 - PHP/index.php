<?php 

    $zmienna = 5;

    if($zmienna > 4){
        echo "Zmienna większa od 4";
    } else if($zmienna == 5){
        echo "Zmienna rowna sie 5";
    } else {
        echo "Inny wynik";
    }

    $kolor = "red";

    switch ($kolor){
        case "red":
            echo "czerwony";
            break;
        case "blue":
            echo "niebieski";
            break;
        case "yellow":
            echo "żółty";
            break;
        case "green":
            echo "zielont";
            break;
        default:
            echo "kolor nierozpoznany";
    }
?>
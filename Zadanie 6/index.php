<?php 
    // $array = [1, 2, 3, 4, 5];

    // $index_to_remove = 2;

    // unset($array[$index_to_remove]); //usuwanie elementu z tablicy
    // var_dump($array);

    // $a = 0;


    // for($i = 0; $i < count($array); $i++){
    //     $array[$i] = $a;
    // }
    // var_dump($array);

    echo "<h1>Tablice dwuwymiarowe</h1>";
    
    // $array2D = [
    //     [1, 2, 3],
    //     [4, 5, 6],
    //     [7, 8, 9]
    // ];

    // echo "<br>";

    // echo $array2D[0][0];

    // echo "<br>";

    // for($i = 0; $i < count($array2D); $i++){
    //     for($j = 0; $j < count($array2D[$i]); $j++){
    //         echo $array2D[$i][$j];
    //         echo " ";
    //     }
    //     echo "<br>";
    // }

    echo "<br>";

    $osoby = [
        ["imie" => "Jan", "wiek" => 25],
        ["imie" => "Anna", "wiek" => 30],
        ["imie" => "Piotr", "wiek" => 35]
    ];

    foreach($osoby as $wiersz){
        foreach($wiersz as $element){
            echo $element . " ";
        }
        echo "<br>";
    }

    echo "<br>";

    for($i = 0; $i < count($osoby); $i++){
        foreach($osoby[$i] as $element){
            echo $element . " ";
        }
        echo "<br>";
    }

    echo "<br>";

    //Zadanie :

    $array4x4 = [
        [1,2,3,4],
        [5,6,7,8],
        [9,10,11,12],
        [13,14,15,16]
    ];

    //Diagonalna = przekątna
    //Za pomocą dwóch pętli for dodać na diagonalnych wartość 0
    for($i = 0; $i < count($array4x4); $i++){
        for($j = 0; $j < count($array4x4[$i]); $j++){
            if($i === $j){
                $array4x4[$i][$j] = 0;
                
            }
        }
    }

    printArray($array4x4);
    
    function printArray($array4x4){
        for($i = 0; $i < count($array4x4); $i++){
            for($j = 0; $j < count($array4x4[$i]); $j++){
                echo $array4x4[$i][$j] . " ";
            }
            echo "<br>";
        }
    }

    //Zadanie 2 
    //Summuj wszystkie elementy w tablicy 2 wymiarowej array4x4

    echo "<br>";

    
    
        $sum = 0;
        for($i = 0; $i < count($array4x4); $i++){
            for($j = 0; $j < count($array4x4[$i]); $j++){
                $sum += $array4x4[$i][$j];
            }
           
        }
    

    echo $sum;

    echo "<br>";
     echo "<br>";
      echo "<br>";

    //Zadanie 3
    //Summuj wszywstkie wartość w 1 kolumnie tablicy 2 wymiarowej array4x4 i wypisz to w nowej
        $suma = 0;
        for($i = 0; $i < count($array4x4); $i++){
            for($j = 0; $j < count($array4x4[$i]); $j++){
                if($array4x4[$i][$j] === $array4x4[$i][0]){
                    $suma += $array4x4[$i][$j];
                }
            }
            echo $suma . "<br>";
        }

?>
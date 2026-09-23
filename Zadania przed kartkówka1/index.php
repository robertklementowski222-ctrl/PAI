<?php

//ZAD 1
// echo sprawdz(3); 

// function sprawdz(int $a): string {
//     if ($a < 0) {
//         return "Liczba ujemna"; 
//     } elseif ($a == 0) {
//         return "Liczba równa 0"; 
//     } else {
//         return "Liczba dodatnia"; 
//     }
// } 

//ZAD 2

// for($i = 0;$i <= 50;$i++){
//     if($i % 2 == 0){
//         echo $i . " ";
//     }
// }

//ZAD 3

// $liczby = [4, 7, 2, 9, 1];
// $suma = 0;

// for($i = 0; $i < count($liczby); $i++){
//     $suma += $liczby[$i];
   
// }
// echo $suma . " ";

//ZAD 4

// $liczby = [4, 7, 2, 9, 1];
// $max = $liczby[0];
// for($i = 1; $i < count($liczby); $i++){
//     if($max < $liczby[$i]){
//         $max = $liczby[$i];
//     }
// }
// echo $max;

//ZAD 5

// $array = [1,2,3,4,5,6,7,8,9];

// echo sprawdzTablice($array);

// function obliczCzyPierwsza(int $a){
//     if($a < 2){
//         return false;
//     }
//     for($i = 2; $i <= sqrt($a);$i++){
//         if($a % $i == 0){
//             return false;
//         }
//     }
//     return true;
// }

// function sprawdzTablice(array $tablica){
//     foreach($tablica as $liczba){
//         if(obliczCzyPierwsza($liczba)){
//             echo "Liczby pierwsze w tablicy: " . $liczba . PHP_EOL;
//         }
//     }
// }

//ZAD 6

// $array3x3 = [
//     [1,2,3,4],
//     [5,6,7,8],
//     [9,10,11,12]
// ];

// $suma = 0;

// for($i = 0; $i < count($array3x3); $i++){
//     for($j = 0; $j < count($array3x3[$i]);$j++){
//         $suma += $array3x3[$i][$j];
//     }
// }
// echo $suma;

//ZAD 7

// $liczby = [2, 4, 6];

// $suma = 0;


// for($i = 0; $i < count($liczby); $i++){
//     $suma += $liczby[$i];
    
// }
// $srednia = $suma/ count($liczby);
// echo $srednia;

//ZAD 8

$osoby = [
        ["imie" => "Jan", "wiek" => 25],
        ["imie" => "Anna", "wiek" => 30],
        ["imie" => "Piotr", "wiek" => 35]
    ];

    foreach($osoby as $wiersz){
        foreach($wiersz as $element){
            echo $element . " ";
        }
       
    }

    

    for($i = 0; $i < count($osoby); $i++){
        foreach($osoby[$i] as $element){
            echo $element . " ";
        }
       
    }

?>

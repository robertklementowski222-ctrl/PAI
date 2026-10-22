<?php 
    $array = [1, 2, 3, 4, 5];
    $array2 = [6, 7, 8, 9, 10];
    

    printArray($array);
    printArray($array2);
    echo sumNumbers(1,2,3,4,5);
    echo "<br>";
    echo multiplyNumbers(2,3);
    echo "<br>";
    echo zamienNaWielkie("gracjan gej");
    echo "<br>";
    echo czyPierwsza(7);
    echo "<br>";
    echo czyPierwsza(10);
    echo "<br>";
    echo czyJestPrzediale(1, 20);
    echo "<br>";
    echo ObliczStatystykiSuma($array, $array2);

    function printArray($array){
        for($i = 0; $i < count($array); $i++) {
            echo $array[$i];
        }
        echo "<br>";
    }

    //zmienna liczba argumentów
    function sumNumbers(...$x){
        $sum = 0;
        for($i = 0; $i < count($x); $i++) {
            $sum += $x[$i];
        }
        return $sum;
    }

    //wartosci domyslne
    //int po dwukropku (na końcu sygnatury funkcji) oznacza typ zwracany przez funkcję
    function multiplyNumbers($a, $b = 9): int{
        return $a * $b;
    }

    function zamienNaWielkie(string $tekst): string{
        return strtoupper($tekst);
    }

    function czyPierwsza(int $n) : bool{
        if($n <= 1) {
            return false;
        }
        for($i = 2; $i <= sqrt($n); $i++) {
            if($n % $i == 0) {
                return false;
            }
        }
        return true;
    }

    function czyJestPrzedziale(int $poczatek = 1,int $koniec = 100){
        for($i = $poczatek; $i <= $koniec; $i++) {
            if(czyPierwsza($i)) {
                echo $i . " ";
            }
        }
    }

    $array = [
        1, 2, 3, 4, 5
    ];


    function obliczSume(array $liczby): int|float
{
    $suma = 0;

    foreach ($liczby as $liczba) {
        $suma += $liczba;
    }

    return $suma;
}

function obliczSrednia(array $liczby): float
{
    if (count($liczby) === 0) {
        throw new InvalidArgumentException('Tablica nie może być pusta.');
    }

    return obliczSume($liczby) / count($liczby);
}

function obliczMin(array $liczby): int|float
{
    if (count($liczby) === 0) {
        throw new InvalidArgumentException('Tablica nie może być pusta.');
    }

    $najmniejsza = $liczby[0];

    foreach ($liczby as $liczba) {
        if ($liczba < $najmniejsza) {
            $najmniejsza = $liczba;
        }
    }

    return $najmniejsza;
}

function obliczMax(array $liczby): int|float
{
    if (count($liczby) === 0) {
        throw new InvalidArgumentException('Tablica nie może być pusta.');
    }

    $najwieksza = $liczby[0];

    foreach ($liczby as $liczba) {
        if ($liczba > $najwieksza) {
            $najwieksza = $liczba;
        }
    }

    return $najwieksza;
}

function obliczStatystyki(array $liczby): array
{
    return [
        'suma' => obliczSume($liczby),
        'srednia' => obliczSrednia($liczby),
        'min' => obliczMin($liczby),
        'max' => obliczMax($liczby),
    ];
}
?>

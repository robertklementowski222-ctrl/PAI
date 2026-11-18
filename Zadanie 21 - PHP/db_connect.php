<?php
// Jedyne miejsce z mysqli_connect w całej aplikacji.
mysqli_report(MYSQLI_REPORT_OFF); // błędy obsługujemy sami (bez wyjątków)

$host       = 'localhost';
$uzytkownik = 'root';
$haslo      = '';
$nazwa_bazy = 'gry_db';

$conn = mysqli_connect($host, $uzytkownik, $haslo);
if (!$conn) {
    die('Błąd połączenia z serwerem MySQL: ' . htmlspecialchars(mysqli_connect_error()));
}
mysqli_set_charset($conn, 'utf8mb4');

// Wybór bazy gry_db (może jeszcze nie istnieć)
$baza_istnieje = mysqli_select_db($conn, $nazwa_bazy);

// Czy istnieje tabela gry?
$tabela_istnieje = false;
if ($baza_istnieje) {
    $sql = "SHOW TABLES LIKE 'gry'";
    $wynik = mysqli_query($conn, $sql);
    $tabela_istnieje = ($wynik && mysqli_num_rows($wynik) > 0);
}
$baza_gotowa = ($baza_istnieje && $tabela_istnieje);

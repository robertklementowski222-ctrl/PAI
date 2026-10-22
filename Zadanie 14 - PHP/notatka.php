<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My PHP Page</title>
</head>
<body>
    <h1>Welcome to My PHP Page</h1>
    <p>This is a simple PHP page.</p>
</body>
</html>

<?php

    // session_start(); // zaczyna sesję
    // $_SESSION // zmienna super globalna przechowująca informacjie o sesji
    // $_SESSION['login'] = 'gracek_placek'; // przypisanie wartości do tablicy asocjacyjnej
    // unset() // usuwamy kąkretną zmienną sesji
    // unset($_SESSION['login']);
    // session_destroy(); // usuwamy (niszczymy) wszystkie zmienne z sesji
    // session_unset(); // uwolnienie zmiennej spod danego klucza
    // Jeśli sesja nie istnieje - session_start tworzy nową
    // Jeśli sesja istnieje - session_start dołącza do istniejącej

?>
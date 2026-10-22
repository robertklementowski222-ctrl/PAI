<?php 

    $name = "username";
    $value = "LIL DIH";

    //setcookie(name, value, expire, path, domain, secure, httponly)
    //wymagane: name
    //reszta jest opcjonalna

    setcookie($name, $value, time() + (86400*30), "/");

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My PHP Page</title>
</head>
<body>

<?php 

    if(isset($_COOKIE[$name])) {
        echo "Ciastosław '" . $name . "' jest ustawione!<br>";
        echo "Wartość: " . $_COOKIE[$name];
    } else {
        echo "Ciastosław '" . $name . "' nie jest ustawione!";
    }
    //Modyfikacja ciastosława
    setcookie($name, "Nowa Wartość", time() + (86400 * 30), "/");
    //usuwanie
    setcookie($name, "", time() - 3600, "/");
    //czy ciastosławy są włączone
    if(count($_COOKIE) > 0) {
        echo "Ciastosławy są włączone.";
    } else {
        echo "Ciastosławy są wyłączone.";
    }

?>


</body>
</html>


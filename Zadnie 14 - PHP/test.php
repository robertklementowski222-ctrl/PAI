<?php
    session_start();


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My PHP Page</title>
</head>
<body>

<?php

    if(isset($_SESSION['favcolor']) ) {
        echo $_SESSION['favcolor'];
    } else {
        echo "Nie znaleziono takiej informacji.";
    }

    echo "<br>";
    print_r($_SESSION);

    echo "<br>";
    $_SESSION['favcolor'] = "red";
    print_r($_SESSION);

    echo "<br>";
    session_unset();
    session_destroy();


?>

</body>
</html>

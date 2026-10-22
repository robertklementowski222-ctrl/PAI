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

    $_SESSION['favcolor'] = "green";
    $_SESSION['favanimal'] = "cat";
    echo "Zmienne sesyjne ustawione: " . $_SESSION['favcolor'] . ", " . $_SESSION['favanimal'];

?>


</body>
</html>


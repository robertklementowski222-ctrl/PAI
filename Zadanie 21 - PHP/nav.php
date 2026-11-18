<?php
// Wspólny początek dokumentu HTML + menu nawigacyjne.
$biezaca = basename($_SERVER['PHP_SELF']);
$strony = [
    'index.php'  => 'Start',
    'utworz.php' => 'Utwórz bazę',
    'dodaj.php'  => 'Dodaj grę',
    'lista.php'  => 'Lista gier',
    'edytuj.php' => 'Edytuj grę',
    'usun.php'   => 'Usuń grę',
];
if (!isset($tytul)) { $tytul = 'Baza gier komputerowych'; }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($tytul) ?> – Baza gier</title>
<style>
    body { font-family: Arial, sans-serif; margin: 0; background: #f2f2f7; color: #222; }
    nav { background: #2d2a4a; padding: 0 20px; }
    nav a { display: inline-block; padding: 14px 18px; color: #ddd; text-decoration: none; }
    nav a:hover { background: #413d6b; }
    nav a.active { background: #7c4dff; color: #fff; font-weight: bold; }
    main { max-width: 900px; margin: 25px auto; background: #fff; padding: 25px 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.1); }
    h1 { margin-top: 0; }
    label { display: block; margin: 12px 0 4px; font-weight: bold; }
    input[type=text], input[type=number] { width: 100%; max-width: 380px; padding: 8px; box-sizing: border-box; }
    button { margin-top: 16px; padding: 9px 20px; background: #7c4dff; color: #fff; border: 0; border-radius: 4px; cursor: pointer; font-size: 15px; }
    button:hover { background: #6236e0; }
    table { border-collapse: collapse; width: 100%; margin-top: 15px; }
    th, td { border: 1px solid #ccc; padding: 8px 10px; text-align: left; }
    th { background: #ece8ff; }
    tr:nth-child(even) td { background: #fafafa; }
    .komunikat { padding: 10px 14px; border-radius: 4px; margin: 15px 0; }
    .sukces { background: #e1f7e1; border: 1px solid #5cb85c; }
    .blad { background: #fde3e3; border: 1px solid #d9534f; }
    .info { background: #fff6d6; border: 1px solid #e0b800; }
</style>
</head>
<body>
<nav>
<?php foreach ($strony as $plik => $nazwa): ?>
    <a href="<?= $plik ?>"<?= ($biezaca === $plik) ? ' class="active"' : '' ?>><?= $nazwa ?></a>
<?php endforeach; ?>
</nav>
<main>

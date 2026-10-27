<?php
session_start();

if (!isset($_SESSION['koszyk'])) {
    $_SESSION['koszyk'] = [];
}

$announcement = '';

function safeTxt($text) {
    return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');
}

// Dodawanie produktu
if (isset($_POST['dodaj'])) {
    $nazwa = trim($_POST['name'] ?? '');
    $cena = $_POST['price'] ?? '';
    $ilosc = $_POST['howMuch'] ?? '';

    if ($nazwa === '') {
        $announcement = "Podaj nazwę produktu!";
    } elseif (
        !is_numeric($cena) ||
        !is_finite((float)$cena) ||
        (float)$cena <= 0
    ) {
        $announcement = "Podaj poprawną cenę!";
    } elseif (
        !is_numeric($ilosc) ||
        !is_finite((float)$ilosc) ||
        (float)$ilosc <= 0 ||
        (float)$ilosc != (int)$ilosc
    ) {
        $announcement = "Podaj poprawną ilość!";
    } else {
        $_SESSION['koszyk'][] = [
            'nazwa' => $nazwa,
            'cena' => (float)$cena,
            'ilosc' => (int)$ilosc
        ];

        $announcement = "Dodano produkt do koszyka!";
    }
}

// Czyszczenie koszyka
if (isset($_POST['wyczysc'])) {
    $_SESSION['koszyk'] = [];
    $announcement = "Koszyk został wyczyszczony.";
}

// Obliczanie wartości koszyka
$sum = 0;

foreach ($_SESSION['koszyk'] as $produkt) {
    $sum += $produkt['cena'] * $produkt['ilosc'];
}

$discount = ($sum > 500) ? $sum * 0.10 : 0;
$payment = $sum - $discount;
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zadanie 16 - PHP</title>
</head>
<body>

    <h1>Koszyk zakupowy</h1>

    <!-- Formularz dodawania produktu -->
    <form action="./" method="post">

        <label for="name">Nazwa produktu:</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Cena:</label>
        <input type="number" id="price" name="price"
               min="0.01" step="0.01" required>

        <label for="howMuch">Ile chcesz kupić?</label>
        <input type="number" id="howMuch" name="howMuch"
               min="1" step="1" required>

        <button type="submit" name="dodaj">Dodaj produkt</button>

    </form>

    <!-- Komunikat -->
    <?php if ($announcement !== ''): ?>
        <p><?php echo safeTxt($announcement); ?></p>
    <?php endif; ?>

    <!-- Tabela produktów -->
    <h2>Wartość koszyka:</h2>

    <table>
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Cena</th>
                <th>Ilość</th>
                <th>Łączna cena</th>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($_SESSION['koszyk'])): ?>
                <tr>
                    <td colspan="4">Koszyk jest pusty.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($_SESSION['koszyk'] as $produkt): ?>
                    <tr>
                        <td><?php echo safeTxt($produkt['nazwa']); ?></td>
                        <td><?php echo number_format($produkt['cena'], 2, ',', ' '); ?> zł</td>
                        <td><?php echo safeTxt($produkt['ilosc']); ?></td>
                        <td><?php echo number_format($produkt['cena'] * $produkt['ilosc'], 2, ',', ' '); ?> zł</td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Podsumowanie -->
    <div id="summary">
        <h2>Podsumowanie:</h2>

        <p>
            Łączna wartość koszyka:
            <?php echo number_format($sum, 2, ',', ' '); ?> zł
        </p>

        <p>
            Kwota rabatu:
            <?php echo number_format($discount, 2, ',', ' '); ?> zł
        </p>

        <p>
            Do zapłaty:
            <?php echo number_format($payment, 2, ',', ' '); ?> zł
        </p>
    </div>

    <!-- Osobny formularz czyszczenia koszyka -->
    <form action="./" method="post">
        <button type="submit" name="wyczysc">Wyczyść koszyk</button>
    </form>

</body>
</html>

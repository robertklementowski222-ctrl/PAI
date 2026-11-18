<?php
require 'db_connect.php';
$tytul = 'Utwórz bazę';
require 'nav.php';

$komunikaty = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['utworz'])) {
    // 1. Baza danych
    $sql = "CREATE DATABASE IF NOT EXISTS gry_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    if (mysqli_query($conn, $sql)) {
        $komunikaty[] = ['sukces', 'Baza danych gry_db jest gotowa.'];
        mysqli_select_db($conn, $nazwa_bazy);

        // 2. Tabela
        $sql = "CREATE TABLE IF NOT EXISTS gry (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    tytul VARCHAR(100) NOT NULL,
                    gatunek VARCHAR(50) NOT NULL,
                    platforma VARCHAR(50) NOT NULL,
                    rok_wydania YEAR NOT NULL,
                    ocena DECIMAL(3,1) NOT NULL
                ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        if (mysqli_query($conn, $sql)) {
            $komunikaty[] = ['sukces', 'Tabela gry jest gotowa.'];
        } else {
            $komunikaty[] = ['blad', 'Błąd tworzenia tabeli: ' . htmlspecialchars(mysqli_error($conn))];
        }
    } else {
        $komunikaty[] = ['blad', 'Błąd tworzenia bazy: ' . htmlspecialchars(mysqli_error($conn))];
    }
}
?>
<h1>Utwórz bazę danych</h1>
<p>Kliknij przycisk, aby utworzyć bazę <code>gry_db</code> oraz tabelę <code>gry</code> (jeśli jeszcze nie istnieją).</p>

<?php foreach ($komunikaty as $k): ?>
    <div class="komunikat <?= $k[0] ?>"><?= $k[1] ?></div>
<?php endforeach; ?>

<form method="post" action="<?= basename($_SERVER['PHP_SELF']) ?>">
    <button type="submit" name="utworz">Utwórz bazę i tabelę</button>
</form>
<?php require 'footer.php'; ?>

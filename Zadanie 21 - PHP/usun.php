<?php
require 'db_connect.php';
$tytul = 'Usuń grę';
require 'nav.php';

$komunikat = '';
$klasa = '';

if ($baza_gotowa && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_txt = trim($_POST['id'] ?? '');
    if (!ctype_digit($id_txt) || (int)$id_txt < 1) {
        $komunikat = 'Podaj poprawne ID (dodatnia liczba całkowita).'; $klasa = 'blad';
    } else {
        $id = (int)$id_txt;
        $sql = "DELETE FROM gry WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            if (mysqli_affected_rows($conn) > 0) {
                $komunikat = "Usunięto grę o ID $id."; $klasa = 'sukces';
            } else {
                $komunikat = "Gra o ID $id nie istnieje."; $klasa = 'blad';
            }
        } else {
            $komunikat = 'Błąd usuwania: ' . htmlspecialchars(mysqli_error($conn)); $klasa = 'blad';
        }
    }
}
?>
<h1>Usuń grę</h1>

<?php if (!$baza_gotowa): ?>
    <div class="komunikat info">Baza danych lub tabela nie istnieje. Najpierw <a href="utworz.php">utwórz bazę</a>.</div>
<?php else: ?>
    <?php if ($komunikat !== ''): ?>
        <div class="komunikat <?= $klasa ?>"><?= $komunikat ?></div>
    <?php endif; ?>

    <form method="post" action="<?= basename($_SERVER['PHP_SELF']) ?>">
        <label for="id">ID gry do usunięcia</label>
        <input type="number" id="id" name="id" min="1" required>
        <button type="submit">Usuń</button>
    </form>
<?php endif; ?>
<?php require 'footer.php'; ?>

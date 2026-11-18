<?php
require 'db_connect.php';
$tytul = 'Dodaj grę';
require 'nav.php';

$komunikat = '';
$klasa = '';
$v = ['tytul' => '', 'gatunek' => '', 'platforma' => '', 'rok' => '', 'ocena' => ''];

if ($baza_gotowa && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $v['tytul']     = trim($_POST['tytul'] ?? '');
    $v['gatunek']   = trim($_POST['gatunek'] ?? '');
    $v['platforma'] = trim($_POST['platforma'] ?? '');
    $v['rok']       = trim($_POST['rok_wydania'] ?? '');
    $v['ocena']     = str_replace(',', '.', trim($_POST['ocena'] ?? ''));

    if ($v['tytul'] === '' || $v['gatunek'] === '' || $v['platforma'] === '' || $v['rok'] === '' || $v['ocena'] === '') {
        $komunikat = 'Wypełnij wszystkie pola.'; $klasa = 'blad';
    } elseif (mb_strlen($v['tytul']) > 100 || mb_strlen($v['gatunek']) > 50 || mb_strlen($v['platforma']) > 50) {
        $komunikat = 'Tytuł może mieć maks. 100 znaków, gatunek i platforma – maks. 50.'; $klasa = 'blad';
    } elseif (!ctype_digit($v['rok']) || (int)$v['rok'] < 1901 || (int)$v['rok'] > 2155) {
        $komunikat = 'Rok wydania musi być liczbą z zakresu 1901–2155.'; $klasa = 'blad';
    } elseif (!is_numeric($v['ocena']) || (float)$v['ocena'] < 0 || (float)$v['ocena'] > 10) {
        $komunikat = 'Ocena musi być liczbą z zakresu 0–10.'; $klasa = 'blad';
    } else {
        $t = mysqli_real_escape_string($conn, $v['tytul']);
        $g = mysqli_real_escape_string($conn, $v['gatunek']);
        $p = mysqli_real_escape_string($conn, $v['platforma']);
        $r = (int)$v['rok'];
        $o = number_format((float)$v['ocena'], 1, '.', '');

        $sql = "INSERT INTO gry (tytul, gatunek, platforma, rok_wydania, ocena)
                VALUES ('$t', '$g', '$p', $r, $o)";
        if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) === 1) {
            $komunikat = 'Dodano grę „' . htmlspecialchars($v['tytul']) . '” (ID: ' . mysqli_insert_id($conn) . ').';
            $klasa = 'sukces';
            $v = ['tytul' => '', 'gatunek' => '', 'platforma' => '', 'rok' => '', 'ocena' => ''];
        } else {
            $komunikat = 'Błąd dodawania gry: ' . htmlspecialchars(mysqli_error($conn)); $klasa = 'blad';
        }
    }
}
?>
<h1>Dodaj grę</h1>

<?php if (!$baza_gotowa): ?>
    <div class="komunikat info">Baza danych lub tabela nie istnieje. Najpierw <a href="utworz.php">utwórz bazę</a>.</div>
<?php else: ?>
    <?php if ($komunikat !== ''): ?>
        <div class="komunikat <?= $klasa ?>"><?= $komunikat ?></div>
    <?php endif; ?>

    <form method="post" action="<?= basename($_SERVER['PHP_SELF']) ?>">
        <label for="tytul">Tytuł</label>
        <input type="text" id="tytul" name="tytul" maxlength="100" value="<?= htmlspecialchars($v['tytul']) ?>" required>

        <label for="gatunek">Gatunek</label>
        <input type="text" id="gatunek" name="gatunek" maxlength="50" placeholder="RPG, FPS, Strategia…" value="<?= htmlspecialchars($v['gatunek']) ?>" required>

        <label for="platforma">Platforma</label>
        <input type="text" id="platforma" name="platforma" maxlength="50" placeholder="PC, PlayStation 5, Xbox…" value="<?= htmlspecialchars($v['platforma']) ?>" required>

        <label for="rok_wydania">Rok wydania</label>
        <input type="number" id="rok_wydania" name="rok_wydania" min="1901" max="2155" value="<?= htmlspecialchars($v['rok']) ?>" required>

        <label for="ocena">Ocena (0–10)</label>
        <input type="number" id="ocena" name="ocena" min="0" max="10" step="0.1" value="<?= htmlspecialchars($v['ocena']) ?>" required>

        <button type="submit">Dodaj grę</button>
    </form>
<?php endif; ?>
<?php require 'footer.php'; ?>

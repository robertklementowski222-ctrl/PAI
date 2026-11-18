<?php
require 'db_connect.php';
$tytul = 'Edytuj grę';
require 'nav.php';

$komunikat = '';
$klasa = '';
$gra = null; 

if ($baza_gotowa) {
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['zapisz'])) {
        $id_txt    = trim($_POST['id'] ?? '');
        $t_gry     = trim($_POST['tytul'] ?? '');
        $g_gry     = trim($_POST['gatunek'] ?? '');
        $p_gry     = trim($_POST['platforma'] ?? '');
        $rok_txt   = trim($_POST['rok_wydania'] ?? '');
        $ocena_txt = str_replace(',', '.', trim($_POST['ocena'] ?? ''));

       
        $gra = ['id' => $id_txt, 'tytul' => $t_gry, 'gatunek' => $g_gry, 'platforma' => $p_gry,
                'rok_wydania' => $rok_txt, 'ocena' => $ocena_txt];

        if (!ctype_digit($id_txt) || (int)$id_txt < 1) {
            $komunikat = 'Nieprawidłowe ID gry.'; $klasa = 'blad'; $gra = null;
        } elseif ($t_gry === '' || $g_gry === '' || $p_gry === '' || $rok_txt === '' || $ocena_txt === '') {
            $komunikat = 'Wypełnij wszystkie pola.'; $klasa = 'blad';
        } elseif (mb_strlen($t_gry) > 100 || mb_strlen($g_gry) > 50 || mb_strlen($p_gry) > 50) {
            $komunikat = 'Tytuł może mieć maks. 100 znaków, gatunek i platforma – maks. 50.'; $klasa = 'blad';
        } elseif (!ctype_digit($rok_txt) || (int)$rok_txt < 1901 || (int)$rok_txt > 2155) {
            $komunikat = 'Rok wydania musi być liczbą z zakresu 1901–2155.'; $klasa = 'blad';
        } elseif (!is_numeric($ocena_txt) || (float)$ocena_txt < 0 || (float)$ocena_txt > 10) {
            $komunikat = 'Ocena musi być liczbą z zakresu 0–10.'; $klasa = 'blad';
        } else {
            $id = (int)$id_txt;
            $sql = "SELECT id FROM gry WHERE id = $id";
            $sprawdz = mysqli_query($conn, $sql);
            if (!$sprawdz || mysqli_num_rows($sprawdz) === 0) {
                $komunikat = "Gra o ID $id nie istnieje."; $klasa = 'blad'; $gra = null;
            } else {
                $t = mysqli_real_escape_string($conn, $t_gry);
                $g = mysqli_real_escape_string($conn, $g_gry);
                $p = mysqli_real_escape_string($conn, $p_gry);
                $r = (int)$rok_txt;
                $o = number_format((float)$ocena_txt, 1, '.', '');

                $sql = "UPDATE gry SET tytul = '$t', gatunek = '$g', platforma = '$p',
                        rok_wydania = $r, ocena = $o WHERE id = $id";
                if (mysqli_query($conn, $sql)) {
                    if (mysqli_affected_rows($conn) > 0) {
                        $komunikat = "Zapisano zmiany w grze o ID $id."; $klasa = 'sukces';
                    } else {
                        $komunikat = 'Nie wprowadzono żadnych zmian (dane są takie same).'; $klasa = 'info';
                    }
                } else {
                    $komunikat = 'Błąd zapisu: ' . htmlspecialchars(mysqli_error($conn)); $klasa = 'blad';
                }
            }
        }
    }
    
    elseif (isset($_GET['id'])) {
        $id_txt = trim($_GET['id']);
        if (!ctype_digit($id_txt) || (int)$id_txt < 1) {
            $komunikat = 'Podaj poprawne ID (dodatnia liczba całkowita).'; $klasa = 'blad';
        } else {
            $id = (int)$id_txt;
            $sql = "SELECT * FROM gry WHERE id = $id";
            $wynik = mysqli_query($conn, $sql);
            if ($wynik && ($wiersz = mysqli_fetch_assoc($wynik))) {
                $gra = $wiersz;
            } else {
                $komunikat = "Gra o ID $id nie istnieje."; $klasa = 'blad';
            }
        }
    }
}
?>
<h1>Edytuj grę</h1>

<?php if (!$baza_gotowa): ?>
    <div class="komunikat info">Baza danych lub tabela nie istnieje. Najpierw <a href="utworz.php">utwórz bazę</a>.</div>
<?php else: ?>
    <?php if ($komunikat !== ''): ?>
        <div class="komunikat <?= $klasa ?>"><?= $komunikat ?></div>
    <?php endif; ?>

    <!-- Krok 1: podanie ID (GET) -->
    <form method="get" action="<?= basename($_SERVER['PHP_SELF']) ?>">
        <label for="id">ID gry do edycji</label>
        <input type="number" id="id" name="id" min="1" required>
        <button type="submit">Wczytaj grę</button>
    </form>

    <?php if ($gra !== null): ?>
        
        <h2>Dane gry (ID: <?= htmlspecialchars($gra['id']) ?>)</h2>
        <form method="post" action="<?= basename($_SERVER['PHP_SELF']) ?>">
            <input type="hidden" name="id" value="<?= htmlspecialchars($gra['id']) ?>">

            <label for="tytul">Tytuł</label>
            <input type="text" id="tytul" name="tytul" maxlength="100" value="<?= htmlspecialchars($gra['tytul']) ?>" required>

            <label for="gatunek">Gatunek</label>
            <input type="text" id="gatunek" name="gatunek" maxlength="50" value="<?= htmlspecialchars($gra['gatunek']) ?>" required>

            <label for="platforma">Platforma</label>
            <input type="text" id="platforma" name="platforma" maxlength="50" value="<?= htmlspecialchars($gra['platforma']) ?>" required>

            <label for="rok_wydania">Rok wydania</label>
            <input type="number" id="rok_wydania" name="rok_wydania" min="1901" max="2155" value="<?= htmlspecialchars($gra['rok_wydania']) ?>" required>

            <label for="ocena">Ocena (0–10)</label>
            <input type="number" id="ocena" name="ocena" min="0" max="10" step="0.1" value="<?= htmlspecialchars($gra['ocena']) ?>" required>

            <button type="submit" name="zapisz">Zapisz zmiany</button>
        </form>
    <?php endif; ?>
<?php endif; ?>
<?php require 'footer.php'; ?>

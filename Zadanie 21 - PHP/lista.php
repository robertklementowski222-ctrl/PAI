<?php
require 'db_connect.php';
$tytul = 'Lista gier';
require 'nav.php';
?>
<h1>Lista gier</h1>

<?php if (!$baza_gotowa): ?>
    <div class="komunikat info">Baza danych lub tabela nie istnieje. Najpierw <a href="utworz.php">utwórz bazę</a>.</div>
<?php else:
    $sql = "SELECT * FROM gry ORDER BY id";
    $wynik = mysqli_query($conn, $sql);
    if (!$wynik): ?>
        <div class="komunikat blad">Błąd odczytu danych: <?= htmlspecialchars(mysqli_error($conn)) ?></div>
    <?php else:
        $liczba = mysqli_num_rows($wynik); ?>
        <div class="komunikat sukces">Liczba gier w bazie: <strong><?= $liczba ?></strong></div>

        <?php if ($liczba > 0): ?>
        <table>
            <tr><th>ID</th><th>Tytuł</th><th>Gatunek</th><th>Platforma</th><th>Rok wydania</th><th>Ocena</th></tr>
            <?php while ($wiersz = mysqli_fetch_assoc($wynik)): ?>
            <tr>
                <td><?= htmlspecialchars($wiersz['id']) ?></td>
                <td><?= htmlspecialchars($wiersz['tytul']) ?></td>
                <td><?= htmlspecialchars($wiersz['gatunek']) ?></td>
                <td><?= htmlspecialchars($wiersz['platforma']) ?></td>
                <td><?= htmlspecialchars($wiersz['rok_wydania']) ?></td>
                <td><?= htmlspecialchars($wiersz['ocena']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
            <p>Brak gier w bazie. <a href="dodaj.php">Dodaj pierwszą grę</a>.</p>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<?php require 'footer.php'; ?>

<?php
$tytul = 'Start';
require 'nav.php';
?>
<h1>Baza gier komputerowych</h1>
<p>Prosta aplikacja do zarządzania kolekcją gier komputerowych, napisana w PHP z użyciem MySQL (rozszerzenie mysqli).
Realizuje wszystkie operacje CRUD – każda na osobnej podstronie:</p>
<ul>
    <li><strong>Utwórz bazę</strong> – tworzy bazę <code>gry_db</code> i tabelę <code>gry</code>,</li>
    <li><strong>Dodaj grę</strong> – dodaje nowy rekord (Create),</li>
    <li><strong>Lista gier</strong> – wyświetla wszystkie gry i ich liczbę (Read),</li>
    <li><strong>Edytuj grę</strong> – zmienia dane wybranej gry (Update),</li>
    <li><strong>Usuń grę</strong> – usuwa grę o podanym ID (Delete).</li>
</ul>
<p>Na początek przejdź do zakładki <em>Utwórz bazę</em>.</p>
<?php require 'footer.php'; ?>

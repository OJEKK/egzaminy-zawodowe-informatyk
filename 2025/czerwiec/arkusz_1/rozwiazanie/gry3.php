<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <?php
    $pol = new mysqli('localhost', 'root', '', 'gry');
    ?>

    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>

    <nav class="lewo">
        <h3>Top 5 gier w tym miesiącu</h3>
        <ul>
            <!-- skrypt 1 -->
            <?php
            $sql = 'SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;';
            $wynik = $pol->query($sql);
            while ($wiersz = $wynik->fetch_assoc()) {
                echo '<li>' . $wiersz['nazwa'] . ' <span class="punkty">' . $wiersz['punkty'] . '</span></li>';
            }
            ?>
        </ul>
        <h3>Nasz sklep</h3>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>Stronę wykonał</h3>
        <p>0123456789</p>
    </nav>
    <section class="srodek">
        <!-- skrypt 2 -->
        <?php
        $sql = 'SELECT id, nazwa, zdjecie FROM gry;';
        $wynik = $pol->query($sql);
        while ($wiersz = $wynik->fetch_assoc()) {
            echo '<div class="blok">';
            echo '<img src="' . $wiersz['zdjecie'] . '" alt="' . $wiersz['nazwa'] . '" title="' . $wiersz['id'] . '">';
            echo '<p>' . $wiersz['nazwa'] . '</p>';
            echo '</div>';
        }
        ?>
    </section>
    <aside class="prawo">
        <h3>Dodaj nową grę</h3>
        <form method="post">
            <label>nazwa <br><input type="text" name="nazwa"></label><br>
            <label>opis <br><input type="text" name="opis"></label><br>
            <label>cena <br><input type="text" name="cena"></label><br>
            <label>zdjęcie <br><input type="text" name="zdjecie"></label><br>
            <input type="submit" name="dodaj" value="DODAJ">
        </form>
        <!-- skrypt 4 -->
        <?php
        if (isset($_POST['nazwa'], $_POST['dodaj'])) {
            $nazwa = $_POST['nazwa'];
            $opis = $_POST['opis'] ?? '';
            $cena = $_POST['cena'] ?? 0;
            $zdjecie = $_POST['zdjecie'] ?? '';
            $sql = "INSERT INTO gry (nazwa, opis, cena, zdjecie, punkty) VALUES ('$nazwa', '$opis', $cena, '$zdjecie', 0);";
            $pol->query($sql);
        }
        ?>
    </aside>

    <footer>
        <form method="post">
            <input type="text" name="id_gry">
            <input type="submit" name="pokaz" value="Pokaż opis">
        </form>
        <!-- skrypt 3 -->
        <?php
        if (isset($_POST['id_gry'], $_POST['pokaz'])) {
            $id = $_POST['id_gry'];
            $sql = "SELECT nazwa, SUBSTRING(opis, 1, 100) as opis, punkty, cena FROM gry WHERE id = $id;";
            $wynik = $pol->query($sql);
            $wynik = $wynik->fetch_assoc();
            echo '<h2>' . $wynik['nazwa'] . ', ' . $wynik['punkty'] . ' punktów, ' . $wynik['cena'] . ' zł</h2>';
            echo '<p>' . $wynik['opis'] . '</p>';
        }
        ?>
    </footer>

    <?php
    $pol->close();
    ?>
</body>

</html>
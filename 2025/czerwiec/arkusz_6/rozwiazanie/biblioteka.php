<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <!-- skrypt 1 -->
        <?php
        for ($i = 0; $i < 20; $i++) {
            echo "<img src='obraz.png'>";
        }
        ?>
    </header>
    <section class="sekcja1">
        <h2>Liryka</h2>
        <form method="post">
            <select name="id_ksiazki">
                <!-- skrypt 2 -->
                <?php
                $pol = new mysqli('localhost', 'root', '', 'biblioteka');
                $sql = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'liryka';";
                $wynik = $pol->query($sql);

                while ($wiersz = $wynik->fetch_assoc()) {
                    echo "
                    <option value='$wiersz[id]'>$wiersz[tytul]</option>
                    ";
                }
                ?>
            </select>
            <button type="submit" name="rezerwuj">Rezerwuj</button>
        </form>
        <!-- skrypt 3 -->
        <?php
        if (isset($_POST['rezerwuj'])) {
            $id = $_POST['id_ksiazki'];
            $sql = "SELECT tytul FROM ksiazka WHERE id = $id;";
            $wynik = $pol->query($sql)->fetch_assoc();
            echo "
            <p>Książka $wynik[tytul] została zarezerwowana</p>
            ";
            $sql = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id;";
            $pol->query($sql);
        }
        ?>
    </section>
    <section class="sekcja2">
        <h2>Epika</h2>
        <form method="post">
            <select name="id_ksiazki">
                <!-- skrypt 2 -->
                <?php
                $sql = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'epika';";
                $wynik = $pol->query($sql);

                while ($wiersz = $wynik->fetch_assoc()) {
                    echo "
                    <option value='$wiersz[id]'>$wiersz[tytul]</option>
                    ";
                }
                ?>
            </select>
            <button type="submit" name="rezerwuj">Rezerwuj</button>
        </form>
    </section>
    <section class="sekcja3">
        <h2>Dramat</h2>
        <form method="post">
            <select name="id_ksiazki">
                <!-- skrypt 2 -->
                <?php
                $sql = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'dramat';";
                $wynik = $pol->query($sql);

                while ($wiersz = $wynik->fetch_assoc()) {
                    echo "
                    <option value='$wiersz[id]'>$wiersz[tytul]</option>
                    ";
                }
                ?>
            </select>
            <button type="submit" name="rezerwuj">Rezerwuj</button>
        </form>
    </section>
    <section class="sekcja4">
        <h2>Zaległe książki</h2>
        <ul>
            <!-- skrypt 4 -->
            <?php
            $sql = 'SELECT tytul, id_cz, data_odd FROM wypozyczenia INNER JOIN ksiazka ON ksiazka.id = wypozyczenia.id_ks ORDER BY data_odd ASC LIMIT 15;';
            $wynik = $pol->query($sql);

            while ($wiersz = $wynik->fetch_assoc()) {
                echo "
                <li>$wiersz[tytul] $wiersz[id_cz] $wiersz[data_odd]</li>
                ";
            }

            $pol->close();
            ?>
        </ul>
    </section>
    <footer>
        <p>Autor: <strong>0123456789</strong></p>
    </footer>
</body>

</html>
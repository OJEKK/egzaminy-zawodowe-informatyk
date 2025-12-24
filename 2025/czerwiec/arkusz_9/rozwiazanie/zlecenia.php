<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Malowanie i gipsowanie</h1>
    </header>
    <main>
        <nav>
            <a href="kontakt.html">Kontakt</a>
            <a href="https://remonty.pl" target="_blank">Partnerzy</a>
        </nav>
        <aside>
            <img src="tapeta_lewa.png" alt="uslugi">
            <img src="tapeta_prawa.png" alt="uslugi">
            <img src="tapeta_lewa.png" alt="uslugi">
        </aside>
        <section class="lewa">
            <h2>Dla klientów</h2>
            <form method="post">
                <label>
                    Ilu co najmniej pracowników potrzebujesz?
                    <br>
                    <input type="number" name="liczba_pracownikow">
                </label>
                <br>
                <button type="submit" name="szukaj_firm">Szukaj firm</button>
            </form>
            <!-- skrypt 1 -->
            <?php
            $pol = new mysqli('localhost', 'root', '', 'remonty');

            if (isset($_POST['szukaj_firm'])) {
                $liczba_pracownikow = $_POST['liczba_pracownikow'];
                $sql = "SELECT nazwa_firmy, liczba_pracownikow FROM wykonawcy WHERE liczba_pracownikow >= $liczba_pracownikow;";
                $wynik = $pol->query($sql);

                while ($wiersz = $wynik->fetch_assoc()) {
                    echo "
                    <p>$wiersz[nazwa_firmy], $wiersz[liczba_pracownikow] pracowników</p>
                    ";
                }
            }
            ?>
        </section>
        <section class="srodkowa">
            <h2>Dla wykonawców</h2>
            <form method="post">
                <select name="miasto">
                    <!-- skrypt 2 -->
                    <?php
                    $sql = 'SELECT DISTINCT miasto FROM klienci ORDER BY miasto ASC;';
                    $wynik = $pol->query($sql);

                    while ($wiersz = $wynik->fetch_assoc()) {
                        echo "
                        <option value='$wiersz[miasto]'>$wiersz[miasto]</option>
                        ";
                    }
                    ?>
                </select>
                <br>
                <label>
                    <input type="radio" name="rodzaj" value="malowanie" checked>
                    malowanie
                </label>
                <br>
                <label>
                    <input type="radio" name="rodzaj" value="gipsowanie">
                    gipsowanie
                </label>
                <br>
                <button type="submit" name="szukaj_klientow">Szukaj klientów</button>
            </form>
            <ul>
                <!-- skrypt 3 -->
                <?php
                if (isset($_POST['szukaj_klientow'])) {
                    $miasto = $_POST['miasto'];
                    $rodzaj = $_POST['rodzaj'];
                    $sql = "SELECT imie, cena FROM klienci INNER JOIN zlecenia ON zlecenia.id_klienta = klienci.id_klienta WHERE miasto = '$miasto' AND rodzaj = '$rodzaj';";
                    $wynik = $pol->query($sql);

                    while ($wiersz = $wynik->fetch_assoc()) {
                        echo "
                        <li>$wiersz[imie] - $wiersz[cena]</li>
                        ";
                    }
                }

                $pol->close();
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p><strong>Stronę wykonał: 0123456789</strong></p>
    </footer>
</body>

</html>
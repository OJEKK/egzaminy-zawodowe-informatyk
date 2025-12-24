<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h2>Poznaj smoki!</h2>
    </header>
    <nav>
        <div id="blok1" onclick="pokaz(this.id)">Baza</div>
        <div id="blok2" onclick="pokaz(this.id)">Opisy</div>
        <div id="blok3" onclick="pokaz(this.id)">Galeria</div>
    </nav>
    <main>
        <section id="sekcja1">
            <h3>Baza Smoków</h3>
            <form method="post">
                <select name="pochodzenie">
                    <!-- skrypt 1 -->
                    <?php
                    $pol = new mysqli('localhost', 'root', '', 'smoki');
                    $sql = 'SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie ASC;';
                    $wynik = $pol->query($sql);

                    while ($wiersz = $wynik->fetch_assoc()) {
                        echo "
                        <option value='$wiersz[pochodzenie]'>$wiersz[pochodzenie]</option>
                        ";
                    }
                    ?>
                </select>
                <button type="submit" name="szukaj">Szukaj</button>
            </form>
            <table>
                <tr>
                    <th>Nazwa</th>
                    <th>Długość</th>
                    <th>Szerokość</th>
                </tr>
                <!-- skrypt 2 -->
                <?php
                if (isset($_POST['szukaj'])) {
                    $pochodzenie = $_POST['pochodzenie'];
                    $sql = "SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie = '$pochodzenie';";
                    $wynik = $pol->query($sql);

                    while ($wiersz = $wynik->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$wiersz[nazwa]</td>
                            <td>$wiersz[dlugosc]</td>
                            <td>$wiersz[szerokosc]</td>
                        </tr>
                        ";
                    }
                }

                $pol->close();
                ?>
            </table>
        </section>
        <section id="sekcja2">
            <h3>Opisy smoków</h3>
            <dl>
                <dt>Smok czerwony</dt>
                <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach
                    wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
                <dt>Smok zielony</dt>
                <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym.
                    Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>
                <dt>Smok niebieski</dt>
                <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy.
                    Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie
                    lubi się przepracowywać.</dd>
            </dl>
        </section>
        <section id="sekcja3">
            <h3>Galeria</h3>
            <img src="smok1.jpg" alt="Smok czerwony">
            <img src="smok2.jpg" alt="Smok wielki">
            <img src="smok3.jpg" alt="Skrzydlaty łaciaty">
        </section>
    </main>
    <footer>
        <p>Stronę opracował: 0123456789</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia Medica</title>
    <link rel="icon" href="obraz2.png" type="image/png">
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Abonamenty w przychodni Medica</h1>
    </header>
    <article>
        <!-- skrypt 1 -->
        <?php
        $pol = new mysqli('localhost', 'root', '', 'medica');

        $sql = 'SELECT nazwa, cena, opis FROM abonamenty;';
        $wynik = $pol->query($sql);

        while ($wiersz = $wynik->fetch_assoc()) {
            echo "
            <h3>Pakiet $wiersz[nazwa] - cena $wiersz[cena] zł</h3>
            <p>$wiersz[opis]</p>
            ";
        }
        ?>
        <a href="opis.html">Dowiedz się więcej</a>
    </article>
    <main>
        <section class="sekcja1">
            <h2>Standardowy</h2>
            <ul>
                <!-- skrypt 2 -->
                <?php
                $pol = new mysqli('localhost', 'root', '', 'medica');

                $sql = 'SELECT nazwa, cecha FROM szczegolyabonamentu INNER JOIN abonamenty ON abonamenty.id = Abonamenty_id INNER JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 1;';
                $wynik = $pol->query($sql);

                while ($wiersz = $wynik->fetch_assoc()) {
                    echo "
                    <li>$wiersz[cecha]</li>
                    ";
                }
                ?>
            </ul>
        </section>
        <section class="sekcja2">
            <h2>Premium</h2>
            <ul>
                <!-- skrypt 2 -->
                <?php
                $pol = new mysqli('localhost', 'root', '', 'medica');

                $sql = 'SELECT nazwa, cecha FROM szczegolyabonamentu INNER JOIN abonamenty ON abonamenty.id = Abonamenty_id INNER JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 2;';
                $wynik = $pol->query($sql);

                while ($wiersz = $wynik->fetch_assoc()) {
                    echo "
                    <li>$wiersz[cecha]</li>
                    ";
                }
                ?>
            </ul>
        </section>
        <section class="sekcja3">
            <h2>Dziecko</h2>
            <ul>
                <!-- skrypt 2 -->
                <?php
                $pol = new mysqli('localhost', 'root', '', 'medica');

                $sql = 'SELECT nazwa, cecha FROM szczegolyabonamentu INNER JOIN abonamenty ON abonamenty.id = Abonamenty_id INNER JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 3;';
                $wynik = $pol->query($sql);

                while ($wiersz = $wynik->fetch_assoc()) {
                    echo "
                    <li>$wiersz[cecha]</li>
                    ";
                }

                $pol->close();
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p>
            <img src="obraz2.png" alt="przychodnia">
            Stronę przygotował: 0123456789
        </p>
    </footer>
</body>

</html>
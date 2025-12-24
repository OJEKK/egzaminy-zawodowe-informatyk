<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTEKA SZKOLNA</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h2>STRONA BIBLIOTEKI
            SZKOLNEJ WIEDZAMIN</h2>
    </header>
    <section>
        <h3>Nasze dzisiejsze propozycje: </h3>
        <table>
            <tr>
                <th>Autor</th>
                <th>Tytuł</th>
                <th>Katalog</th>
            </tr>
            <!-- skrypt -->
            <?php
            $pol = new mysqli('localhost', 'root', '', 'biblioteka');
            $sql = 'SELECT autor, tytul, kod FROM ksiazki ORDER BY RAND() LIMIT 5;';
            $wynik = $pol->query($sql);

            while ($wiersz = $wynik->fetch_assoc()) {
                echo "
                <tr>
                    <td>$wiersz[autor]</td>
                    <td>$wiersz[tytul]</td>
                    <td>$wiersz[kod]</td>
                </tr>";
            }

            $pol->close();
            ?>
        </table>
    </section>
    <main>
        <article>
            <img src="ksiazka1.jpg" alt="okładka książki">
            <p>Według różnych podań najpaskudniejsza ropucha nosi w głowie piękny, cenny klejnot.</p>
        </article>
        <article>
            <img src="ksiazka2.jpg" alt="okładka książki">
            <p>Panna Stefcia i Maryla nie są to zbyt grzeczne damy, nawet nie słuchają mamy...</p>
        </article>
        <article>
            <img src="ksiazka3.jpg" alt="okładka książki">
            <p>Ratuj mnie, przyjacielu, w ostatniej potrzebie: Kocham piękną Irenę. Rodzice i ona...</p>
        </article>
    </main>
    <footer>Stronę wykonał: 0123456789</footer>
</body>

</html>
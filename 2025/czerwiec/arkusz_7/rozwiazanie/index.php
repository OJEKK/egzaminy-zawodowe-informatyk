<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biuro turystyczne</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="wczasy.html">Wczasy</a></li>
            <li><a href="wycieczki.html">Wycieczki</a></li>
            <li><a href="allinclusive.html">All inclusive</a></li>
        </ul>
    </nav>
    <main>
        <aside>
            <h3>Twój cel wyprawy</h3>
            <form method="post">
                <label>
                    Miejsce wycieczki
                    <br>
                    <select name="miejsce">
                        <!-- skrypt 1 -->
                        <?php
                        $pol = new mysqli('localhost', 'root', '', 'wyprawy');
                        $sql = 'SELECT nazwa FROM miejsca ORDER BY nazwa ASC;';
                        $wynik = $pol->query($sql);

                        while ($wiersz = $wynik->fetch_assoc()) {
                            echo "
                            <option value='$wiersz[nazwa]'>$wiersz[nazwa]</option>
                            ";
                        }
                        ?>
                    </select>
                </label>
                <br>
                <label>
                    Ile dorosłych?
                    <br>
                    <input type="number" name="dorosli">
                </label>
                <br>
                <label>
                    Ile dzieci?
                    <br>
                    <input type="number" name="dzieci">
                </label>
                <br>
                <label>
                    Termin
                    <br>
                    <input type="date" name="termin">
                </label>
                <br>
                <button type="submit" name="symulacja">Symulacja ceny</button>
            </form>
            <h4>Koszt wycieczki</h4>
            <!-- skrypt 2 -->
            <?php
            if (isset($_POST['symulacja'])) {
                $miejsce = $_POST['miejsce'];
                $sql = "SELECT cena FROM miejsca WHERE nazwa = '$miejsce';";
                $cena = $pol->query($sql)->fetch_assoc()['cena'];
                $dorosli = $_POST['dorosli'];
                $dzieci = $_POST['dzieci'];
                $termin = $_POST['termin'];
                $suma = ($dorosli * $cena) + ($dzieci * $cena / 2);
                echo "
                <p>W dniu: $termin</p>
                <p>$suma złotych</p>
                ";
            }
            ?>
        </aside>
        <section>
            <h3>Wycieczki</h3>
            <!-- skrypt 3 -->
            <?php
            $sql = "SELECT nazwa, cena, link_obraz FROM miejsca WHERE link_obraz LIKE '0%';";
            $wynik = $pol->query($sql);

            while ($wiersz = $wynik->fetch_assoc()) {
                echo "
                <div class='wycieczka'>
                    <img src='$wiersz[link_obraz]' alt='zdjęcie z wycieczki'>
                    <h2>$wiersz[nazwa]</h2>
                    <p>$wiersz[cena]</p>
                </div>
                ";
            }

            $pol->close();
            ?>
        </section>
    </main>
    <footer>
        <p>Autor: 0123456789</p>
    </footer>
</body>

</html>
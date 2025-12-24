<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szkolenia i kursy</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>SZKOLENIA</h1>
    </header>
    <main>
        <section class="lewa">
            <table>
                <tr>
                    <th>Kurs</th>
                    <th>Nazwa</th>
                    <th>Cena</th>
                </tr>
                <!-- skrypt 1 -->
                <?php
                $pol = new mysqli('localhost', 'root', '', 'szkolenia');

                $sql = 'SELECT kod, nazwa, cena FROM kursy ORDER BY cena ASC;';
                $wynik = $pol->query($sql);

                while ($wiersz = $wynik->fetch_assoc()) {
                    echo "
                    <tr>
                        <td><img src='$wiersz[kod].jpg' alt='kurs'></td>
                        <td>$wiersz[nazwa]</td>
                        <td>$wiersz[cena]</td>
                    </tr>
                    ";
                }
                ?>
            </table>
        </section>
        <section class="prawa">
            <h2>Zapisy na kursy</h2>
            <form method="post">
                <label>
                    Imię
                    <br>
                    <input type="text" name="imie">
                </label>
                <br>
                <label>
                    Nazwisko
                    <br>
                    <input type="text" name="nazwisko">
                </label>
                <br>
                <label>
                    Wiek
                    <br>
                    <input type="number" name="wiek">
                </label>
                <br>
                <label>
                    Rodzaj kursu
                    <br>
                    <select name="nazwa">
                        <!-- skrypt 2 -->
                        <?php
                        $sql = 'SELECT nazwa FROM kursy;';
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
                <button type="submit" name="dodaj">Dodaj dane</button>
            </form>
            <!-- skrypt 3 -->
            <?php
            if (isset($_POST['dodaj'])) {
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $wiek = $_POST['wiek'];
                if ($imie == '' || $nazwisko == '' || $wiek == '') {
                    echo '<p>Wprowadź wszystkie dane</p>';
                } else {
                    $sql = "INSERT INTO uczestnicy (imie, nazwisko, wiek) VALUES ('$imie', '$nazwisko', $wiek);";
                    $pol->query($sql);
                    echo "<p>Dane uczestnika $imie $nazwisko zostały dodane</p>";
                }
            }

            $pol->close();
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 0123456789</p>
    </footer>
</body>

</html>
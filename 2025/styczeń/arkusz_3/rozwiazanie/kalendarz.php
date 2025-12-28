<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>
    <section class="napis">
        <p>
            <!-- skrypt 1 -->
            <?php
            $pol = new mysqli('localhost', 'root', '', 'kalendarz');

            $data = date('m-d');
            $sql = "SELECT imiona FROM imieniny WHERE data = '$data';";
            $imiona = $pol->query($sql)->fetch_assoc()['imiona'];

            $dzien = date('N');
            if ($dzien == 1)
                $dzien = 'poniedziałek';
            else if ($dzien == 2)
                $dzien = 'wtorek';
            else if ($dzien == 3)
                $dzien = 'środa';
            else if ($dzien == 4)
                $dzien = 'czwartek';
            else if ($dzien == 5)
                $dzien = 'piątek';
            else if ($dzien == 6)
                $dzien = 'sobota';
            else if ($dzien == 7)
                $dzien = 'niedziela';
            $data = date('d-m-Y');
            echo "Dzisiaj jest $dzien, $data, imieniny: $imiona";
            ?>
        </p>
    </section>
    <section class="lewy">
        <table>
            <tr>
                <th>liczba dni</th>
                <th>miesiąc</th>
            </tr>
            <tr>
                <td rowspan="7">31</td>
                <td>styczeń</td>
            </tr>
            <tr>
                <td>marzec</td>
            </tr>
            <tr>
                <td>maj</td>
            </tr>
            <tr>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>sierpień</td>
            </tr>
            <tr>
                <td>październik</td>
            </tr>
            <tr>
                <td>grudzień</td>
            </tr>
            <tr>
                <td rowspan="4">30</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>czerwiec</td>
            </tr>
            <tr>
                <td>wrzesień</td>
            </tr>
            <tr>
                <td>listopad</td>
            </tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </table>
    </section>
    <section class="srodek">
        <h2>Sprawdź kto ma urodziny</h2>
        <form method="post">
            <input type="date" name="data" min="2024-01-01" max="2024-12-31" value="2024-01-01" required>
            <button type="submit" name="wyslij">wyślij</button>
        </form>
        <!-- skrypt 2 -->
        <?php
        if (isset($_POST['wyslij'])) {
            $data = $_POST['data'];
            $format = date('m-d', strtotime($data));
            $sql = "SELECT imiona FROM imieniny WHERE data = '$format';";
            $imiona = $pol->query($sql)->fetch_assoc()['imiona'];

            echo "Dnia $data są imieniny: $imiona";
        }
        $pol->close();
        ?>
    </section>
    <section class="prawy">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank">
            <img src="kalendarz.gif" alt="Kalendarz Majów">
        </a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>słoneczny
                <ul>
                    <li>kalendarz Majów</li>
                    <li>juliański</li>
                    <li>gregoriański</li>
                </ul>
            </li>
            <li>księżycowy
                <ul>
                    <li>starogrecki</li>
                    <li>babiloński</li>
                </ul>
            </li>
        </ol>
    </section>
    <footer>
        <p>Stronę opracował(a): 0123456789</p>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>
    <main>
        <form action="zamow.php" method="post">
            <label>
                Model:
                <select name="model" class="kontrolki">
                    <!-- skrypt 1 -->
                    <?php
                    $pol = new mysqli('localhost', 'root', '', 'obuwie');

                    $sql = 'SELECT model FROM produkt;';
                    $wynik = $pol->query($sql);

                    while ($wiersz = $wynik->fetch_assoc()) {
                        echo "
                        <option value='$wiersz[model]'>$wiersz[model]</option>
                        ";
                    }
                    ?>
                </select>
            </label>
            <label>
                Rozmiar:
                <select name="rozmiar" class="kontrolki">
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                </select>
            </label>
            <label>
                Liczba par:
                <input type="number" name="pary" class="kontrolki">
            </label>
            <button type="submit" name="zamow" class="kontrolki">Zamów</button>
        </form>
        <!-- skrypt 2 -->
        <?php
        $sql = 'SELECT buty.model, nazwa, cena, nazwa_pliku FROM buty INNER JOIN produkt ON produkt.model = buty.model;';
        $wynik = $pol->query($sql);

        while ($wiersz = $wynik->fetch_assoc()) {
            echo "
            <div class='buty'>
                <img src='$wiersz[nazwa_pliku]' alt='but męski'>
                <h2>$wiersz[nazwa]</h2>
                <h5>Model: $wiersz[model]</h5>
                <h4>Cena: $wiersz[cena]</h4>
            </div>
            ";
        }

        $pol->close();
        ?>
    </main>
    <footer>
        <p>Autor strony: 0123456789</p>
    </footer>
</body>

</html>
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
        <h2>Zamówienie</h2>
        <!-- skrypt 3 -->
        <?php
        if (isset($_POST['zamow'])) {
            $model = $_POST['model'];
            $rozmiar = $_POST['rozmiar'];
            $pary = $_POST['pary'];

            $pol = new mysqli('localhost', 'root', '', 'obuwie');
            $sql = "SELECT nazwa, cena, kolor, kod_produktu, material, nazwa_pliku FROM buty INNER JOIN produkt ON produkt.model = buty.model WHERE buty.model = '$model';";
            $wynik = $pol->query($sql)->fetch_assoc();
            $wartosc = $pary * $wynik['cena'];

            echo "
            <img src='$wynik[nazwa_pliku]' alt='but męski'>
            <h2>$wynik[nazwa]</h2>
            <p>cena za $pary par: $wartosc zł</p>
            <p>Szczegóły produktu: $wynik[kolor], $wynik[material]</p>
            <p>Rozmiar: $rozmiar</p>
            ";

            $pol->close();
        }
        ?>
        <a href="index.php">Strona główna</a>
    </main>
    <footer>
        <p>Autor strony: 0123456789</p>
    </footer>
</body>

</html>
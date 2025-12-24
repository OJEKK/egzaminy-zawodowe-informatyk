<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPONY</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <main>
        <aside>
            <!-- skrypt 1 -->
            <?php
            header('Refresh:10');
            $pol = new mysqli('localhost', 'root', '', 'opony');

            $sql = 'SELECT * FROM opony ORDER BY cena ASC LIMIT 10;';
            $wynik = $pol->query($sql);

            while ($wiersz = $wynik->fetch_assoc()) {
                $img = 'uniwer.png';
                if ($wiersz['sezon'] == 'letnia')
                    $img = 'lato.png';
                else if ($wiersz['sezon'] == 'zimowa')
                    $img = 'zima.png';

                echo "
                <div class='opona'>
                    <img src='$img'>
                    <h4>Opona: $wiersz[producent] $wiersz[model]</h4>
                    <h3>Cena: $wiersz[cena]</h3>
                </div>
                ";
            }
            ?>
            <p>
                <a href="https://opona.pl/">więcej ofert</a>
            </p>
        </aside>
        <section class="sekcja1">
            <img src="opona.png" alt="Opona">
            <h2>Opona dnia</h2>
            <!-- skrypt 2 -->
            <?php
            $sql = 'SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9;';
            $wynik = $pol->query($sql)->fetch_assoc();

            echo "
            <h2>$wynik[producent] model $wynik[model]</h2>
            <h2>Sezon: $wynik[sezon]</h2>
            <h2>Tylko $wynik[cena] zł!</h2>
            ";
            ?>
        </section>
        <section class="sekcja2">
            <h2>Najnowsze zamówienie</h2>
            <!-- skrypt 3 -->
            <?php
            $sql = 'SELECT id_zam, ilosc, model, cena FROM zamowienie INNER JOIN opony ON opony.nr_kat = zamowienie.nr_kat ORDER BY RAND() LIMIT 1;';
            $wynik = $pol->query($sql)->fetch_assoc();

            $wartosc = $wynik['ilosc'] * $wynik['cena'];

            echo "
            <h2>$wynik[id_zam] $wynik[ilosc] sztuki modelu $wynik[model]</h2>
            <h2>Wartość zamówienia $wartosc zł</h2>
            ";

            $pol->close();
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 0123456789</p>
    </footer>
</body>

</html>
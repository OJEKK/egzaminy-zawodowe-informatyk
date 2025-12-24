<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma Przewozowa</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Firma przewozowa Półdarmo</h1>
    </header>
    <nav>
        <a href="kw1.jpg">kwerenda1</a>
        <a href="kw2.jpg">kwerenda2</a>
        <a href="kw3.jpg">kwerenda3</a>
        <a href="kw4.jpg">kwerenda4</a>
    </nav>
    <main>
        <section class="lewa">
            <h2>Zadania do wykonania</h2>
            <table>
                <tr>
                    <th>Zadanie do wykonania</th>
                    <th>Data realizacji</th>
                    <th>Akcja</th>
                </tr>
                <!-- skrypt 1 -->
                <?php
                $pol = new mysqli('localhost', 'root', '', 'przewozy');
                $sql = 'SELECT id_zadania, zadanie, data FROM zadania;';
                $wynik = $pol->query($sql);

                while ($wiersz = $wynik->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$wiersz[zadanie]</td>
                        <td>$wiersz[data]</td>
                        <td><a href='?id_zadania=$wiersz[id_zadania]'>Usuń</a></td>
                    </tr>
                    ";
                }

                if (isset($_GET['id_zadania'])) {
                    $id = $_GET['id_zadania'];
                    $sql = "DELETE FROM zadania WHERE id_zadania = $id;";
                    $wynik = $pol->query($sql);
                    if ($wynik)
                        header('Location: przewozy.php');
                }
                ?>
            </table>
            <form method="post">
                <label>
                    Zadanie do wykonania:
                    <input type="text" name="zadanie">
                </label>
                <br>
                <label>
                    Data realizacji:
                    <input type="date" name="data">
                </label>
                <input type="submit" name="dodaj" value="Dodaj">
            </form>
            <!-- skrypt 2 -->
            <?php
            if (isset($_POST['dodaj'])) {
                $zadanie = $_POST['zadanie'];
                $data = $_POST['data'];
                $sql = "INSERT INTO zadania (zadanie, data, osoba_id) VALUES ('$zadanie','$data','1');";
                $wynik = $pol->query($sql);
                if ($wynik)
                    header('Location: przewozy.php');
            }

            $pol->close();
            ?>
        </section>
        <section class="prawa">
            <img src="auto.png" alt="auto firmowe">
            <h3>Nasza specjalność</h3>
            <ul>
                <li>Przeprowadzki</li>
                <li>Przewóz mebli</li>
                <li>Przesyłki gabarytowe</li>
                <li>Wynajem pojazdów</li>
                <li>Zakupy towarów</li>
            </ul>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 0123456789</p>
    </footer>
</body>

</html>
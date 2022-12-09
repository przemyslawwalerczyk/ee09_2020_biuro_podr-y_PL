<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>

    <?php
    $connect = new mysqli('localhost', 'root', '', 'egzamin3');
    ?>

    <div id="baner">
        <h1>BIURO PODRÓŻY</h1>
    </div>
    <div id="lewy">
        <h2>KONTAKT</h2>
        <a href="mailto:wycieczki@wycieczki.pl">napisz do nas</a>
        <p>telefon: 555666777</p>
    </div>

    <div id="środkowy">
        <h2>GALERIA</h2>
        <?php
            $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC";
            $result = $connect->query($sql);

            while($row = $result->fetch_assoc()) {
                $src = $row['nazwaPliku'];
                $alt = $row['podpis'];
                echo "<img src=\"$src\" alt=\"$alt\">";
            }
        ?>
    </div>

    <div id="prawy">
        <h2>PROMOCJE</h2>
        <table>
            <tr>
                <td>Jesień</td>
                <td>Grupa 4+</td>
                <td>Grupa 10+</td>
            </tr>
            <tr>
                <td>5%</td>
                <td>10%</td>
                <td>15%</td>
            </tr>
        </table>
    </div>
    <div id="main">
        <h2>LISTA WYCIECZEK</h2>
        <?php
            $sql = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1";
            $result = $connect->query($sql);

            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $dataWyjazdu = $row['dataWyjazdu'];
                $cel = $row['cel'];
                $cena = $row['cena'];
                echo "$id. $dataWyjazdu, $cel, cena: $cena <br>";
            }
        ?>
    </div>

    <div id="stopka">
        <p>Stronę wykonał: Przemysław Walerczyk</p>
    </div>

    <?php
    $connect->close()
    ?>

</body>
</html>
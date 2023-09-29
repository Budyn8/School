<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'firma');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <main>
        <section id="left-section">
            <h1>Akta Pracownicze</h1>
            <?php
                $zapytanie = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id = 2";
                echo "<h3>dane</h3><p>".$row[0]." ".$row[1]."</p><hr><h3>adres</h3><p>".$row[3]."<br>".$row[4]."</p><hr>";
            ?>
            <hr>
            <h3>Dokument pracownika</h3>
            <a href="cv.txt">Pobierz</a>
            <?php ?>
        </section>
        <section id="right-section">
            <?php ?>
        </section>
    </main>
    <footer>
        Autorem aplikacji jest: 00000000000
        <li>
            <ul>skontaktuj się</ul>
            <ul>poznaj naszą firmę</ul>
        </li>
    </footer>
</body>
</html>
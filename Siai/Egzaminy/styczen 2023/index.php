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
        <section id="left-section">
            <h1>Akta Pracownicze</h1>
            <?php
                $zapytanie = "SELECT imie, nazwisko, adres, miasto, czyRODO, czyBadania FROM pracownicy WHERE id = 2";
                $query = mysqli_query($conn, $zapytanie);
                $row = mysqli_fetch_row($query);
                
                $podpisanie_rodo = "nie";
                $badania_aktualne = "nie";
                
                if($row[4]){
                    $podpisanie_rodo = "";
                }

                if($row[5]){
                    $badania_aktualne = "";
                }

                echo "<h3>dane</h3><p>"
                    .$row[0]." ".$row[1]
                    ."</p><hr><h3>adres</h3><p>"
                    .$row[2]."<br>".$row[3]
                    ."</p><hr><p>RODO: "
                    .$podpisanie_rodo
                    ."podpisano</p><p>Badania: "
                    .$badania_aktualne
                    ."aktualne</p>";
            ?>
            <hr>
            <h3>Dokument pracownika</h3>
            <a href="cv.txt">Pobierz</a>
            <h1>Liczba zatrudnionych pracowników</h1>
            <?php 
                $zapytanie = "SELECT COUNT(*) FROM pracownicy LIMIT 1";
                $query = mysqli_query($conn, $zapytanie);
                $row = mysqli_fetch_row($query);

                echo $row[0];
            ?>
        </section>
        <section id="right-section">
            <?php 
                $zapytanie = "SELECT id, imie, nazwisko FROM pracownicy WHERE id = 2";
                $query = mysqli_query($conn, $zapytanie);
                $row = mysqli_fetch_row($query);

                $plik_obrazu = "$row[0].jpg";
                echo '<img src="'.$plik_obrazu.'" atl="pracownik"><h2>'.$row[1].' '.$row[2].'</h2>';

                $zapytanie = "SELECT p.id, s.nazwa, s.opis FROM pracownicy AS p INNER JOIN stanowiska AS s ON p.stanowiska_id = s.id WHERE p.id = 2";
                $query = mysqli_query($conn, $zapytanie);
                $row = mysqli_fetch_row($query);

                echo "<h4>$row[1]</h4><h5>$row[2]</h5>";

                mysqli_close($conn);
            ?>
        </section>
    <footer>
        Autorem aplikacji jest: 00000000000
        <ul>
            <li>skontaktuj się</li>
            <li>poznaj naszą firmę</li>
        </ul>
    </footer>
</body>
</html>
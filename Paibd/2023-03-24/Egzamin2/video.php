<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <nav>
        <section id="left">
            <h1>Internetowa wyporzyczalnia filmów</h1>
        </section>
        <section id="right">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
                
            </table>
        </section>
    </nav>
    <main>
        <section>
            <h3>Polecamy</h3>
            <?php
                $connect = mysqli_connect('localhost', 'root', '', 'egzamin2');
                $wynik_zapytania1 = mysqli_query($connect, 'SELECT id, nazwa, opis, zdjecie FROM `produkty` WHERE id = 18 or id = 22 or id = 23 or id = 25;');
                

                while($wynik = mysqli_fetch_row($wynik_zapytania1)){
                    echo '<article><h4>'.$wynik[0].'.'.$wynik[1].'</h4>';
                    echo '<img src="'.$wynik[3].'" alt="film">';
                    echo '<p>'.$wynik[2].'</p></article>';
                };

                
            ?>
        </section>
        <section>
            <h3>Filmy fantastyczne</h3>
            <?php
                $wynik_zapytania2 = mysqli_query($connect, 'SELECT id, nazwa, opis, zdjecie FROM `produkty` WHERE Rodzaje_id = 12');
                                

                while($wynik = mysqli_fetch_row($wynik_zapytania2)){
                    echo '<article><h4>'.$wynik[0].'.'.$wynik[1].'</h4>';
                    echo '<img src="'.$wynik[3].'" alt="film">';
                    echo '<p>'.$wynik[2].'</p></article>';
                };

            
            ?>
        </section>
    </main>
    <footer>
        <form action="#" method='POST'>
            <label for="input">Usuń film nr.:</label>
            <input type="integer" name='input' id='input'>
            <button type="submit">Usuń film</button>
            <?php
                $id = $_POST['input'];
                $zapytanie = 'DELETE FROM produkty WHERE id = '.$id;
                mysqli_query($connect,$zapytanie);
                mysqli_close($connect);
            ?>
        </form>
        Stronę wykonał: <a href="mailto:ja@gmail.com">ja@gmail.com</a>
    </footer>
    
</body>
</html>
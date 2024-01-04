<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dane osobowe</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header><h1>Dane osobowe pracowników</h1></header>
  <main>
    <section id="lewy">
      <ul>
        <li><a href="index.php">Wyświetl dane</a></li>
        <li><a href="formularz.php">Wpisz dane</a></li>
      </ul>
    </section>
    <section id="prawy">
      <h2>Podaj dane</h2>
      <form action="" method="post">
        <label for="nazwisko">Nazwisko</label><input type="text" name="nazwisko">
        <label for="imie">Imie</label><input type="text" name="imie">
        <label for="pesel">PESEL</label><input type="text" name="pesel">
        <input type="submit" value="Sprawdź i zapisz">
      </form>
      <article id="dane">
        <?php
          $con = mysqli_connect( 'localhost', 'root', '', 'firma' );
          $zapytac = true;

          if( empty($_POST["nazwisko"]) ) {
            echo "brak nazwiska<br>";
            $zapytac = false;
          }
          if( empty($_POST["imie"]) ){ 
            echo "brak imienia<br>";
            $zapytac = false;
          }
          if( empty($_POST["pesel"]) ) {
            echo "brak numeru PESEL<br>";
            $zapytac = false;
          }

          if( $zapytac ){

            $nazwisko = $_POST["nazwisko"];
            $imie = $_POST["imie"];
            $pesel = $_POST["pesel"];

            if( strlen($pesel) != 11 ){
              echo "nie prawidlowy pesel";
            }else{
              $kontrolna = 1*$pesel[10];
              $s = 1*$pesel[0] + 3*$pesel[1] + 7*$pesel[2] + 9*$pesel[3] + 1*$pesel[4] + 3*$pesel[5] + 7*$pesel[6] + 9*$pesel[7] + 1*$pesel[8] + 3*$pesel[9];
              $m = $s%10;
              if( ($m == 0 && $kontrolna == 0) || ($m > 0 && $kontrolna = 10 - $m) ){
                $zapytanie = "INSERT INTO pracownicy ( nazwisko, imie, PESEL ) VALUES( '$nazwisko', '$imie', '$pesel')";
                if(mysqli_query( $con, $zapytanie )) echo "pomyślnie dodano do tablicy";
              }else{
                echo "nie prawidlowy pesel";
              }
            }
          }
          mysqli_close($con);
        ?>
      </article>
    </section>
  </main>
  <footer><h5>AUTOR strony: PESEL</h5></footer>
</body>
</html>
<?php
  $wiadomosc = "";
  $zgodny_pesel = false;
  $wypelnino_dane = true;
  $error = false;

  if ( isset($_POST["pesel"]) ){

    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $pesel = $_POST["pesel"];
    
    if( empty($imie) || empty($nazwisko) || empty($pesel)){
      $wypelnino_dane = flase;
      $wiadomosc = "Nie wypełniono wszyskich pól";
    }

    if( strlen($pesel) == 11 ){
      $sum = 1 * $pesel[0] + 3 * $pesel[1] + 7 * $pesel[2] + 9 * $pesel[3] + 1 * $pesel[4] + 3 * $pesel[5] + 7 * $pesel[6] + 9 * $pesel[7] + 1 * $pesel[8] + 3 * $pesel[9];

      $mod = $sum%10;
      if( ( $mod == 0 && $pesel[10] == 0 ) || ( $mod > 0 && $pesel[10] == 10 - $mod ) ){
        $zgodny_pesel = true;
      }

    }
    
    if( $zgodny_pesel && $wypelnino_dane ){
      $conn = mysqli_connect('127.0.0.1', 'root', '', 'szkola');
      $zapytanie = 'SELECT id FROM uczen WHERE pesel = '.$pesel;
      $odpowiedz = mysqli_query($conn, $zapytanie);

      if( !mysqli_num_rows($odpowiedz) ){

        $zapytanie = 'INSERT INTO uczen (imie, nazwisko, pesel) VALUES("'.$imie.'", "'.$nazwisko.'", "'.$pesel.'")';

        mysqli_query($conn, $zapytanie);
        $wiadomosc = "Udało się! Zostałeś dodany";
        $error = false;
      }else{
        $wiadomosc = "Ten pesel już istnieje";
        $error = true;
      }
      mysqli_close($conn); 
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zapis Uczniów Do Szkoły XXX</title>
  <link rel="stylesheet" href="style_zapisy.css">
</head>
<body>
  <div id="container">
    <header>
      <h1>Zapis Uczniów</h1>
    </header>
    <main>
      <form action="#" method="POST">
        <article>
          <input type="text" name="imie" id="imie" placeholder="Imie" required>
        </article>
        <article>
          <input type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko" required>
        </article>
        <article>
          <div><input type="text" name="pesel" id="pesel" placeholder="PESEL" required>
          <h6 class="wiadomosc" style="color:rgb(200,40,10);"><?php if(!$zgodny_pesel && $wypelnino_dane) echo "Podano nie prawidłowy pesel"; ?></h6></div>
        </article>
        <input type="submit" value="Zapisz">
        <h6 class="wiadomosc" style="color:rgb(<?php echo ($odpowiedz) ? "200,10,50" : "100,200,10"; ?>)"><?php echo $wiadomosc; ?></h6>
      </form>
    </main>
    <footer>
      <h4>Zapisy do szkoly XXX</h4>
    </footer>
  </div>
</body>
</html>
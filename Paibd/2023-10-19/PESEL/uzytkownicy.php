<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal społecznościowy</title>
  <link rel="stylesheet" href="styl5.css">
</head>
<body>
  <header>
    <section class="lewy">
      <h2>Nasze osiedle</h2>
    </section>
    <section class="prawy">
      <?php
      $conn = mysqli_connect('localhost', 'root', '', 'portal');
      
      $zapytanie = 'SELECT COUNT(*) FROM dane WHERE 1';

      $query = mysqli_query($conn, $zapytanie);
      foreach(mysqli_fetch_row($query) as $value){
        echo "<h5>Liczba użytkowników portalu:".$value."<h5>";
      }
      ?>
    </section>
  </header>
  <main>
    <section class="lewy"><h3>logowanie</h3>
    <form action="#" method="post">
      login<br>
      <input type="text" name="login" id=""><br>
      hasło<br>
      <input type="password" name="haslo" id=""><br>
      <input type="submit" value="Zaloguj">    
    </form>
    </section>
    <section class="prawy">
      <h3>Wizytówka</h3>
      <article id="wizytowka">
        <?php

        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        if ($login != '' && $haslo != ''){

          $login_istnieje = false;
          $zapytanie = "SELECT login FROM uzytkownicy WHERE 1";
          $query = mysqli_query( $conn, $zapytanie );

          foreach (mysqli_fetch_row($query) as $value) {
            if( $login == $value){
              $login_istnieje = true;
              break;
            }
          }

          if( $login_istnieje ) {

            $zapytanie = "SELECT haslo FROM `uzytkownicy` WHERE login='Justyna'"; 
            $query = mysqli_query($conn, $zapytanie);

            if( sha1($haslo) == mysqli_fetch_row($query)[0]) {
            
              $rok = date("Y");
              $zapytanie = 'SELECT login, rok_urodz, przyjaciol, hobby, zdjecie FROM dane INNER JOIN uzytkownicy as u ON dane.id = u.id WHERE login="'.$login.'"';
              $query = mysqli_query( $conn, $zapytanie );
              $dane = mysqli_fetch_array($query);

              echo 
                '<img src="./pliki/'.$dane['zdjecie'].
                '" alt="osoba"><br>
                <h4>'.$dane['login'].'('.strval( intval($rok) - intval($dane['rok_urodz']) ).')</h4><br>
                hobby: '.$dane['hobby'].'<br>
                <h1><img src="./pliki/icon-on.png">'.$dane['przyjaciol'].'</h1><br>
                <button onclick="window.location.href=\'./dane.html\'">Więcej informacji</button>';
            }else{
              echo "hasło nieprawidłowe";
            }

        }else{
          echo "login nie istnieje";
        }}

        mysqli_close($conn);
        ?>
      </article>
    </section>
  </main>
  <footer>Stronę wykonał: PESEL</footer>
</body>
</html>
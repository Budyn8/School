<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hurtownia papiernicza</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body> 
  <header>
    <h1>
      W naszej hurtowni kupisz najtaniej
    </h1>
  </header>
  <main>
    <section id="lewy">
      <h3>
        Ceny wybranych artykułów w hurtowni:
      </h3>
      <table>
        <?php
        
        $conn = mysqli_connect('localhost', 'root', '', 'sklep');

        // Generalnie to powinno się (w teori) poprostu wpisać ręcznie te query ale ponieważ jest napisane że bierzemy to z pliku kwerendy.txt to postanowiłem że zrobię jak napisali

        //$query = "SELECT nazwa, cena FROM towary WHERE 1 LIMIT 4";
        
        $file = fopen('kwerendy.txt', 'r');
        $query = fgets($file);
        $req = mysqli_query($conn, $query);

        while( $res = mysqli_fetch_row($req) ){
          echo "
          <tr>
            <td>$res[0]</td>
            <td>$res[1]</td>
          </tr>";
        }

        ?>
      </table>
    </section>
    <section id="srodkowy">
      <h3>Ile będą kosztować twoje zakupy?</h3>
      <form action="#" method="post">
        wybierz artykuł
        <select name="artykul" id="">
          <?php
            $query = "SELECT nazwa FROM towary WHERE 1 LIMIT 6";
            $req = mysqli_query($conn, $query);

            while( $res = mysqli_fetch_row($req) ){
              echo "<option value='$res[0]'>$res[0]</option>";
            }
          ?>
        <!-- 
          <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
          <option value="Zeszyt 32 kartk">Zeszyt 32 kartk</option>
          <option value="Cyrkiel">Cyrkiel</option>
          <option value="Linijka 30cm">Linijka 30cm</option>
          <option value="Ekierka">Ekierka</option>
          <option value="Linijka 50cm">Linijka 50cm</option> 
        -->
        </select>
        <br/>
        <label for="ilosc">liczba sztuk: </label><input type="number" name="ilosc" id="" default="1">
        <br/>
        <input type="submit" value="OBLICZ">
      </form>
      
      <?php
        
        if( !empty($_POST["artykul"]) && !empty($_POST["ilosc"]) ){

        // $query = "SELECT cena FROM towary WHERE nazwa = '$_POST["artykul"]'";

          $query = str_replace("cyrkiel", $_POST["artykul"], fgets($file));
          $req = mysqli_query($conn, $query);
          $res = mysqli_fetch_row($req)[0];
          $cena = round($res * $_POST['ilosc'], 2);
          echo "$cena";

        }

        fclose($file);
        mysqli_close($conn);    
      ?>
    </section>
    <section id="prawy">
      <img src="zakupy2.png" alt="hurtownia">
      <h3>Kontakt</h3>
      <p>telefon:<br/> 111222333<br/> email:<br/> <a href="mailto:hurt@wp.pl">hurt@wp.pl</a></p>
    </section>
  </main>
  <footer>
    <h4>Witrynę wykonał PESEL</h4>
  </footer>
</body>
</html>
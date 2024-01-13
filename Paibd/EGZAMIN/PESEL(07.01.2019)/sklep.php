<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styl1.css">
</head>
<body>
  <header>
    <section id="logo">
      <img src="komputer.png" alt="hurtownia komputerowa">
    </section>
    <section id="list">
      <ul>
        <li>Sprzęt
          <ol>
            <li>Procesory</li>
            <li>Pamięć RAM</li>
            <li>Monitory</li>
            <li>Obudowy</li>
            <li>Karty Graficzne</li>
            <li>Dyski twarde</li>
          </ol>
        </li>
        <li>Oprogramowanie</li>
      </ul>
    </section>
    <section id="form">
      <h2>Hurtownia komputerowa</h2>
      <form action="#" method="POST">
        <label for="kategoria">Wybierz kategorię sprzętu</label><br/><input type="number" name="kategoria">
        <input type="submit" value="SPRAWDŹ">
      </form>
    </section>
  </header>
  <main>
    <h1>Podzespoły we wskazanej kategorii</h1>
    <?php
    
      $conn = mysqli_connect('localhost', 'root', '', 'sklep');

      $kategoria = "";
      if( isset($_POST['kategoria']) ){
        $kategoria = $_POST['kategoria'];
      }

      echo "<script>alert('Wybierz  poprawną kategorię sprzętu');</script>";

      $query = "SELECT nazwa, podzespoly.opis, cena FROM podzespoly INNER JOIN typy ON podzespoly.typy_id = typy.id WHERE typy.id = $kategoria";
      if( $kategoria != "" ){
        $req = mysqli_query($conn, $query);
        
        while( $res = mysqli_fetch_row($req) ){
          echo "<p>$res[0] $res[1] CENA: $res[2]</p>";
        }
      }

      mysqli_close($conn);

    ?>
  </main>
  <footer>
    <h3>
    Hurtownia działa od poniedziałku do soboty w godzinach 7<sup>00</sup>-16<sup>00</sup>
    </h3>
    <a href="bok@hurtownia.pl">Napisz do nas</a>
    Partnerzy: 
    <a href="http://intel.pl">Intel</a>
    <a href="http://amd.pl">AMD</a>
    <p>Stronę wykonał numer PESEL</p>
  </footer>
</body>
</html>
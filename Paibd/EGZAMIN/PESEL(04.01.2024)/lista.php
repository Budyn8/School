<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista Przyjaciół</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  <header><h1>Portal Społecznościowy - moje konto</h1></header>
  <main>
    <h2>Moje zainteresowania</h2>
    <ul>
      <li>muzyka</li>
      <li>film</li>
      <li>komputery</li>
    </ul>
    <h2>Moi znajomi</h2>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'dane');
    $zapytanie1 = "SELECT imie, nazwisko, opis, zdjecie FROM `osoby` WHERE Hobby_id = 1 OR Hobby_id = 2 OR Hobby_id = 6";

    $rezultat = mysqli_query($conn, $zapytanie1);

    while( $row = mysqli_fetch_array($rezultat) ){
      echo '
        <section>
          <section class="img" >
            <img src="./portal/'.$row['zdjecie'].'" alt="przyjaciel">
          </section>
          <article>
            <h3>'
            .$row['imie'].' '
            .$row['nazwisko'].
            '</h3>
            <p>Ostatni wpis: '.$row['opis'].'</p>
          </article>
          <hr/>
        </section>
        ';
    }
      mysqli_close($conn);
    ?>
  </main>
  <footer>Stronę wykonał: numer PESEl</footer>
  <footer><a href="mailto:ja@portal.pl">napisz do mnie</a></footer>
</body>
</html>
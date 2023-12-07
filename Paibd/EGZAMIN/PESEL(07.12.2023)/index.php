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
      <h2>Dane osobowe</h2>
      <table>
        <tbody>
        <tr>
          <th>Id</th>
          <th>Nazwisko</th>
          <th>Imie</th>
          <th>PESEL</th>
        </tr>
        <?php
          $con = mysqli_connect( 'localhost', 'root', '', 'firma' );
          $zapytanie = 'SELECT * FROM pracownicy WHERE 1';
          $odpowiedz = mysqli_query( $con, $zapytanie );

          while( $columna = mysqli_fetch_array( $odpowiedz ) ){
            echo "<tr>".
            "<td>".$columna["id"]."</td>".
            "<td>".$columna["nazwisko"]."</td>".
            "<td>".$columna["imie"]."</td>".
            "<td>".$columna["PESEL"]."</td>".
            "</tr>";
          }
          mysqli_close($con);
        ?>
        </tbody>
      </table>
    </section>
  </main>
  <footer><h5>AUTOR strony: PESEL</h5></footer>
</body>
</html>
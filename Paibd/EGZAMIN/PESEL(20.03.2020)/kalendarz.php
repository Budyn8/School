<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mój kalendarz</title>
  <link rel="stylesheet" href="styl5.css">
</head>
<body>
  <header id="left"><img src="logo1.png" alt="Mój kalendarz"></header>
  <header id="right">
    <h1>KALENDARZ</h1>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'egzamin5');

    $query = 'SELECT miesiac, rok FROM zadania WHERE zadania.dataZadania = "2020-07-01"';
    $req = mysqli_query($conn, $query);
    $res = mysqli_fetch_row($req);

    echo "<h3>miesiac: {$res[0]}, rok: {$res[1]}</h3>";

    ?>
  </header>
  <?php
  if( !empty($_POST['wpis']) ) {
    $query = 'UPDATE zadania SET wpis = "'.$_POST['wpis'].'" WHERE dataZadania = "2020-07-13"';
    $req = mysqli_query($conn, $query);
  }
  ?>
  <main>
    <?php

    $query = 'SELECT dataZadania, wpis FROM zadania WHERE miesiac = "lipiec"';
    $req = mysqli_query($conn, $query);
    while( $res = mysqli_fetch_row($req) ){
      echo "
      <section>
        <h5>{$res[0]}</h5>
        <p>{$res[1]}</p>
      </section>";
    };

    mysqli_close($conn);
    ?>
  </main>
  <footer>
    <form  action="#" method="POST">
      <label for="wpis">dodaj wpis:</label>
      <input type="text" name="wpis">
      <input type="submit" value="DODAJ">
    </form>
    <p>
      Stronę wykonał: numer PESEL 
    </p>
  </footer>
</body>
</html>
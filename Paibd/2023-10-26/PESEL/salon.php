<!DOCTYPE html>
<html lang="pl-pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Salon urody VENUS</title>
  <link rel="stylesheet" href="styl.css">
</head>
<body>
  <header>
    <h1>Salon urody VENUS</h1>
  </header>
  <main>
    <img src="1.jpg" alt="">
    <img src="2.jpg" alt="">
    <img src="3.jpg" alt="">
    <img src="4.jpg" alt="">
    <img src="5.jpg" alt="">
    <img src="6.jpg" alt="">
  </main>
    <?php 

    $conn = mysqli_connect('localhost',  'root', '', 'egzamin');

    ?>
 
  <section id="lewy">
    <h2>Cennik</h2>
    <table>
      <tr>
        <th>Nazwa<hr></th>
        <th>Opis<hr></th>
        <th>Cena<hr></th>
      </tr>
    <?php 

    $query = "SELECT id, Nazwa, Opis, Cena FROM zabiegi WHERE 1";
    $rezultat = mysqli_query($conn, $query);

    $liczba = mysqli_num_rows($rezultat);
    
    for ($i = 0; $liczba > $i; $i ++){

      $tabela = mysqli_fetch_array($rezultat);

      echo "<tr>"
        ."<td>".$tabela[1]."<hr></td>"
        ."<td>".$tabela[2]."<hr></td>"
        ."<td>".$tabela[3]."<hr></td>"
        ."</tr>";

    }

    ?>
    </table>
  </section>
  <section id="prawy">
    <form action="#" method="post">
      Zabieg: <select name="zabieg" id="">
        <?php
        
        $query = "SELECT id, Nazwa FROM zabiegi WHERE 1";
        $rezultat = mysqli_query($conn, $query);

        $liczba = mysqli_num_rows($rezultat);

        for ($i = 0; $liczba > $i; $i ++){

          $tabela = mysqli_fetch_array($rezultat);

          echo "<option value=\"".$tabela[0]."\">".$tabela[1]."</option>";
        }

        ?>
      </select><br><br>

      Wybierz datę: <input type="date" name="data" id=""><br><br>
      
      <?php
      for ($i = 8; $i < 16; $i++){
        if($i < 10){ $i = '0'.$i;}
        echo '<label for="godzina">'.$i.':00</label>'
          .'<input type="radio" name="godzina" value="'.$i
          .':00"><br><br>';
      }
      ?>
      <input type="submit" value="Zarezerwuj"><div style="color: red; height: 9px; font-size: 9px;">
      <?php 
      
      if(isset($_POST['zabieg']) && isset($_POST['data']) && isset($_POST['godzina'])){
        if($_POST['zabieg'] != '' && $_POST['data'] != '' && $_POST['godzina'] != ''){

          $zabieg_id = $_POST['zabieg'];
          $data = $_POST['data'];
          $godzina = $_POST['godzina'];


          $query = "SELECT id, grafik.Status FROM grafik WHERE grafik.Data = '".$data."' &&  grafik.Godzina = '". $godzina."'";
          $rezultat = mysqli_query($conn, $query);

          $tabela = mysqli_fetch_array($rezultat);

          if ( $tabela == null){
            die('Nie ma takiego terminu');
          }

          $grafik_id = $tabela['id'];
          $grafik_status =  $tabela['Status'];

          if( $grafik_status == 'Z' ){
            die('Termin już jest zajęty');
          }
         
          $query = "INSERT INTO rezerwacja (Id_zabieg, Id_grafik, Komentarz) VALUES ($zabieg_id, $grafik_id, '')";
          $rezultat = mysqli_query($conn, $query);

          if (!$rezultat){ die('Nie udało się zarezerwować terminu'); } 
          
          $query = "UPDATE grafik SET `Status` = 'Z' WHERE id = $grafik_id";
          $rezultat = mysqli_query($conn, $query);

          if (!$rezultat) { die('Nie udało się zapisać rezerwacji'); }

        }
      } 

      ?>
      </div>
    </form>
  </section>
  <footer><p>PESEL: numer PESEL</p></footer>
</body>
</html>
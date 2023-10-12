<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    main, body, html{
     width: 100%; 
     overflow: hidden;
    }
    body, main{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    body{
      height: 100vh;
    }
    main{
      width: 30%;
      height: 200px;
      box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      border-radius: 10px;
    }
    section{
      margin: 10px;
    }
  </style>

</head>
<body>

<main>
  <form action="#" method="post">
    <section>
      <label for="p_tablica">Wpisz listę: </label>
      <input type="text" name="p_tablica" id="tablica"><br>
    </section>
    
    <section>
      <label for="opt">Zaznacz rodzaj sortowania: </label>
      <select name="opt" id="opt">
        <option value="1" default>Bubble sort</option>
        <option value="2">Merge sort</option>
      </select>
    <section>
    <section>
      <center><input type="submit" value="Posortuj"></center>
    </section>
  </form>
  <?php

function sort($i, $j, $tablica) : array {
  
}

if(isset($_POST['p_tablica'])){

  $tablica = $_POST['p_tablica'];

  $tablica = explode(',', $tablica);

  if(isset($_POST['opt'])){

    $opt = $_POST['opt'];

    switch ($opt) {
      case 1:

        $len_tb = count($tablica) - 1;

        for($i = 0; $i < $len_tb; $i++){

          for($j = 0; $j < $len_tb - $i; $j++){

            if($tablica[$j] > $tablica[$j + 1]){

              $licz_pami = $tablica[$j];
              $tablica[$j] = $tablica[$j + 1];
              $tablica[$j + 1] = $licz_pami;
            }
          }
        }

        break;
      
      case 2:

        $len_tb = count($tablica);
        $piwot;
        if($len_tb%2 = 1){
          $piwot = $tablica[($len_tb - 1) /2];
        }else{
          $piwot = $tablica[$len_tb/2];
        }

        break;

      default:
        echo 'coś poszło nie tak w wyborze sortowania'; 
        break;
    }
?>
<center><table><tr>
<?php

    foreach($tablica as $value){

      echo '<td>'.$value.'</td>';

    }
  }
}
?>
</tr></table><center></main>


</body>
</html>
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
      height: 300px;
      box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      border-radius: 10px;
      overflow: scroll;
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

function sort_table($tablica) : array {

  $dlugoscTablicy = count($tablica);

  if($dlugoscTablicy == 1){
    return $tablica;
  }

  $polowaTablicy = ($dlugoscTablicy%2 == 0) ? $dlugoscTablicy/2 : ($dlugoscTablicy - 1)/2;

  $lewaTablica = array();
  $prawaTablica = array();

  for($i = 0; $i < $polowaTablicy; $i++){
    $lewaTablica[] = $tablica[$i];
  }

  for($i = $polowaTablicy; $i < $dlugoscTablicy; $i++){
    $prawaTablica[] = $tablica[$i];
  }

  
  $posortowanaLewaTablica= array_merge(sort_table($lewaTablica)); 
  $posortowanaPrawaTablica = array_merge(sort_table($prawaTablica));

  echo "tablica-L[";
  foreach ($posortowanaLewaTablica as $value) {
    echo $value;
  }

  echo "]&emsp;tablica-R[";
  foreach ($posortowanaPrawaTablica as $value) {
    echo $value;
  }
  echo "]<hr>";

  $indexLewy = 0;
  $indexPrawy = 0;
  $dlugoscLewejTablicy = count($posortowanaLewaTablica);  
  $dlugoscPrawejTablicy = count($posortowanaPrawaTablica);
  while(1){
    
    if($posortowanaLewaTablica[$indexLewy] > $posortowanaPrawaTablica[$indexPrawy]) {
      $tablica[] = $posortowanaLewaTablica[$indexLewy];
      $indexLewy++;
    }else{ 
      $tablica[] = $posortowanaPrawaTablica[$indexPrawy];
      $indexPrawy++;
    }

    if($indexLewy == $dlugoscLewejTablicy){
      for($i = $indexPrawy; $i < $dlugoscPrawejTablicy; $i++){
        $tablica[] = $posortowanaPrawaTablica[$i];
      }
      break;
    }

    if($indexPrawy == $dlugoscPrawejTablicy){
      for($i = $indexLewy; $i < $dlugoscLewejTablicy; $i++){
        $tablica[] = $posortowanaLewaTablica[$i];
      }
      break;
    }
  }

  return $tablica;

}

if(isset($_POST['p_tablica'])){

  $tablica = $_POST['p_tablica'];

  $tablica = explode(',', $tablica);

  if(isset($_POST['opt'])){

    $opt = $_POST['opt'];

    switch ($opt) {
      case 1:

        $dlugoscTablicy = count($tablica) - 1;

        for($i = 0; $i < $dlugoscTablicy; $i++){

          for($j = 0; $j < $dlugoscTablicy - $i; $j++){

            if($tablica[$j] > $tablica[$j + 1]){

              $liczbaWPamieci = $tablica[$j];
              $tablica[$j] = $tablica[$j + 1];
              $tablica[$j + 1] = $liczbaWPamieci;
            }
          }
        }

        break;
      
      case 2:

        $tablica = sort_table($tablica);

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
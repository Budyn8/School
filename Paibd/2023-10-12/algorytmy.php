<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<main>
  <form action="#" method="post">
    <section>
      <label for="p_tablica">Wpisz listę: </label>
      <input type="text" name="p_tablica" id="tablica" maxlenght="59">
    </section>
    
    <section>
      <label for="opt">Zaznacz rodzaj sortowania: </label>
      <select name="opt" id="opt">
        <option value="1" default>Bubble sort</option>
        <option value="2">Merge sort</option>
        <option value="3">Better merge sort</option>
      </select>
      <input type="submit" value="Posortuj">
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

  $indexLewy = 0;
  $indexPrawy = 0;
  $dlugoscLewejTablicy = count($posortowanaLewaTablica);  
  $dlugoscPrawejTablicy = count($posortowanaPrawaTablica);
  $indexTablicy = 0;
  while(1){
    
    if($posortowanaLewaTablica[$indexLewy] < $posortowanaPrawaTablica[$indexPrawy]) {
      $tablica[$indexTablicy] = $posortowanaLewaTablica[$indexLewy];
      $indexLewy++;
    }else{ 
      $tablica[$indexTablicy] = $posortowanaPrawaTablica[$indexPrawy];
      $indexPrawy++;
    }
    $indexTablicy++;

    if($indexLewy == $dlugoscLewejTablicy){
      for($i = $indexPrawy; $i < $dlugoscPrawejTablicy; $i++){
        $tablica[$indexTablicy] = $posortowanaPrawaTablica[$i];
        $indexTablicy++;
      }
      break;
    }

    if($indexPrawy == $dlugoscPrawejTablicy){
      for($i = $indexLewy; $i < $dlugoscLewejTablicy; $i++){
        $tablica[$indexTablicy] = $posortowanaLewaTablica[$i];
        $indexTablicy++;
      }
      break;
    }
  }
  return $tablica;
}

function better_merge_sort(&$tablica){

  $dlugoscTablicy = count($tablica);
  if($dlugoscTablicy == 1){
    return 1;
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

  better_merge_sort($lewaTablica);
  better_merge_sort($prawaTablica);
  
  $indexLewy = 0;
  $indexPrawy = 0;
  $indexTablicy = 0;
  
  $dlugoscLewejTablicy = count($lewaTablica);
  $dlugoscPrawejTablicy = count($prawaTablica);

  $p = 0;

  while(1){

    if($lewaTablica[$indexLewy] < $prawaTablica[$indexPrawy]){
      $tablica[$indexTablicy++] = $lewaTablica[$indexLewy++]; 
    }else{
      $tablica[$indexTablicy++] = $prawaTablica[$indexPrawy++];
    }

    if($p > 2){
      break;
    }
    $p ++;

    if($indexLewy >= $dlugoscLewejTablicy){
      for($i = $indexPrawy; $i < $dlugoscPrawejTablicy; $i++){
        $tablica[$indexTablicy++] = $prawaTablica[$i];
      }
      break;
    }

    if($indexPrawy >= $dlugoscPrawejTablicy){
      for($i = $indexLewy; $i < $dlugoscLewejTablicy; $i++){
        $tablica[$indexTablicy++] = $lewaTablica[$i];
      }
      break;
    }

  }
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
          $p = 0;
          for($j = 0; $j < $dlugoscTablicy - $i; $j++){
            if($tablica[$j] > $tablica[$j + 1]){

              $liczbaWPamieci = $tablica[$j];
              $tablica[$j] = $tablica[$j + 1];
              $tablica[$j + 1] = $liczbaWPamieci;
              $p++;
            }
          }
          if($p == 0) {
            break;
          }
        }

        break;
      
      case 2:

        $tablica = sort_table($tablica);

        break;
      
      case 3:

        better_merge_sort($tablica);
        break;

      default:
        echo 'coś poszło nie tak w wyborze sortowania'; 
        break;
    }
?>
<article>
<?php
    echo "0";
    foreach($tablica as $value){
      echo ", ".$value;
    }
  }
}
?>
</article>
</main>


</body>
</html>
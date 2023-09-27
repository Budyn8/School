<?php
// $poczatek = strtotime('January 1 2021');
// $koniec = mktime(0, 0, 0, 2, 1, 2021);
// $data_poczatkowa = date('l, d M Y', $poczatek);
// $data_koncowa = date('l, d M Y', $koniec);

$poczatek = new DateTime('2021-01-01 00:00');
$koniec = date_create_from_format('Y-m-d H:i', '2021-02-01 00:00');

?>

<html>
    <body>
        
     <p><b>Wyprzedaż zaczyna się: </b> 
     <!-- <?php $data_poczatkowa ?> -->
     <?= $poczatek -> format('l, jS M Y H:i')?></p>   
     <p><b>Wyprzedaż kończy się: </b> 
     <!-- <?php $data_koncowa ?> -->
     <?= $koniec->format('l, jS M Y')?> <b>o godzinie</b>
     <?= $koniec->format('H:i')?>
    <footer></footer>

    </body>
</html>
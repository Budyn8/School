<?php
$napis = "nie ma pliku";
if($_FILES["plik"]['error'] === 0){
    $napis = "<br>".$_FILES["plik"]['name']."<br>";
    $napis .= $_FILES["plik"]['size'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="plik">Wybierz plik</label>
        <input type="file" name="plik" id=""><br>
        <input type="submit" value="Submit">
        <?php
        echo $napis
        ?>
    </form>
</body>
</html>
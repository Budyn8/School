<?php

$filename = "testfile.txt";
$f = fopen( $filename, "r") or die ("nie udało się otworzyć pliku");
$text = fread($f, filesize( $filename ));
fclose( $f );
$name = "kitten.jpg";

ECHO <<< _END

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <main>
  $text
  <img src="$name">
  </main>
</body>
</html>


_END;

?>
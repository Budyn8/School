<?php

  $fn = fopen("testfile.txt", 'w') or die ("Nie ma pliku");

  $text = <<<_END
  
  Testowanie Tworzenia plików
  w pliku .txt

  Plik txt

  _END;

  fwrite($fn, $text) or die ("Nie udało się wpisać w plik");
  fclose($fn);
  echo $text;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

</body>
</html>
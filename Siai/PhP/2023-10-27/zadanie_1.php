<?php

$fh = fopen("testfile.txt", 'w') or die("Nie udało się utworzyć pliku");

$text = <<<_END
Line 1
Line 2
Line 3
_END;

fwrite($fh, $text) or die("Nie udało sie zapisać danych w pliku");
fclose($fh);

echo "Plik 'testfile.txt' został zapisany pomyślnie";

echo "<pre>";
echo file_get_contents("testfile.txt");
echo "</pre>";

?>
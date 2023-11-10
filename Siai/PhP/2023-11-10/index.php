<?php
session_start();
require_once 'header.php';
echo "<div class='center'>Witamy w Robin's Nest,";
if ($loggedin) echo " $user, jesteś zalogowany.";
else echo ' zarejestruj się albo zaloguj.';

echo <<<_END
</div><br>
</div>
<div data-role="footer">
<h4>Aplikacja z książki <i><a href='ftp://ftp.helion.pl/przyklady/phmyj5.zip'
target='_blank'>PHP, MySQL i JavaScript. Wprowadzenie. Wydanie V</a></i></h4>
</div>
</body>
</html>
_END;
?>
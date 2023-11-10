<?php
require_once 'header.php';
$error = $user = $pass = "";
if (isset($_POST['user'])){
  $user = sanitizeString($_POST['user']);
  $pass = sanitizeString($_POST['pass']);
  if ($user == "" || $pass == "") $error = 'Nie wszystkie pola zostały wypełnione';
  else {
    $result = queryMySQL("SELECT user,pass FROM members
    WHERE user='$user' AND pass='$pass'");
    if ($result->num_rows == 0) $error = "Nieudana próba logowania";
    else {
      $_SESSION['user'] = $user;
      $_SESSION['pass'] = $pass;
      die("Jesteś zalogowany. <a data-transition='slide'
      href='members.php?view=$user'>Kliknij tutaj</a>, aby kontynuować.</div>
      </body></html>");
    }
  }
}
echo <<<_END
<form method='post' action='login.php'>
<div data-role='fieldcontain'>
<label></label>
<span class='error'>$error</span>
</div>
<div data-role='fieldcontain'>
<label></label>
Wprowadź dane, aby się zalogować.
</div>
<div data-role='fieldcontain'>
<label>Użytkownik</label>
<input type='text' maxlength='16' name='user' value='$user'>
</div>
<div data-role='fieldcontain'>
<label>Hasło</label>
<input type='password' maxlength='16' name='pass' value='$pass'>
</div>
<div data-role='fieldcontain'>
<label></label>
<input data-transition='slide' type='submit' value='Zaloguj się'>
</div>
</form>
</div>
</body>
</html>
_END;
?>
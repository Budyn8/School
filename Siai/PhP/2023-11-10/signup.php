<?php

require_once 'header.php';
echo <<<_END
<script>
function checkUser(user){ 
  if (user.value == ''){
    $('#used').html('&nbsp;')
    return
  }
  $.post('checkuser.php',
    { user : user.value },
    function(data){$('#used').html(data)}
  )
}
</script>
_END;
$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();
if (isset($_POST['user'])){
  $user = sanitizeString($_POST['user']);
  $pass = sanitizeString($_POST['pass']);
  if ($user == "" || $pass == "") $error = 'Nie wszystkie pola zostały wypełnione <br><br>';
  else {
    $result = queryMysql("SELECT * FROM members WHERE user='$user'");
    if ($result->num_rows) $error = 'Użytkownik o takiej nazwie już istnieje.<br><br>';
    else{
      queryMysql("INSERT INTO members VALUES('$user', '$pass')");
      die('<h4>Konto utworzone</h4>Proszę się zalogować.</div></body></html>');
    }
  }
}

echo <<<_END
<form method='post' action='signup.php'>$error
<div data-role='fieldcontain'>
<label></label>
Proszę wpisać dane do rejestracji
</div>
<div data-role='fieldcontain'>
<label>Nazwa użytkownika</label>
<input type='text' maxlength='16' name='user' value='$user'
onBlur='checkUser(this)'>
<label></label><div id='used'>&nbsp;</div>
</div>
<div data-role='fieldcontain'>
<label>Hasło</label>
<input type='text' maxlength='16' name='pass' value='$pass'>
</div>
<div data-role='fieldcontain'>
<label></label>
<input data-transition='slide' type='submit' value='Zarejestruj się'>
</div>
</div>
</body>
</html>
_END;

?>
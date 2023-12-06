<?php // adduser.php
// Rozpoczynamy od kodu PHP
$forename = $surname = $username = $password = $age = $email = "";

if (isset($_POST['forename'])) $forename = fix_string($_POST['forename']);
if (isset($_POST['surname'])) $surname = fix_string($_POST['surname']);
if (isset($_POST['username'])) $username = fix_string($_POST['username']);
if (isset($_POST['password'])) $password = fix_string($_POST['password']);
if (isset($_POST['age'])) $age = fix_string($_POST['age']);
if (isset($_POST['email'])) $email = fix_string($_POST['email']);

$fail = validate_forename($forename);
$fail .= validate_surname($surname);
$fail .= validate_username($username);
$fail .= validate_password($password);
$fail .= validate_age($age);
$fail .= validate_email($email);
echo "<!DOCTYPE html>\n<html><head><meta charset='utf-8'><title>Przykładowy formularz</title>";

if ($fail == "")
{
  echo "</head><body>Dane formularza pomyślnie zweryfikowane:<br>
      &emsp;- forename: $forename<br>
      &emsp;- surname: $surname<br>
      &emsp;- username: $username<br>
      &emsp;- password: $password<br>
      &emsp;- age: $age<br>
      &emsp;- email: $email
    </body></html>";

  exit;
}
echo <<<_END
<!-- Sekcja HTML/JavaScript -->
<style>
  .signup {
    border: 1px solid #999999;
    font: normal 14px helvetica; color:#444444;
  }
</style>
<script>
  function validate(form){
    fail = validateForename(form.forename.value)
    fail += validateSurname(form.surname.value)
    fail += validateUsername(form.username.value)
    fail += validatePassword(form.password.value)
    fail += validateAge(form.age.value)
    fail += validateEmail(form.email.value)
    if (fail == "") {return true}
    else { alert(fail); return false }
  }
  function validateForename(field){ return (field == "") ? "Nie wpisano imienia.\\n" : "" }
  function validateSurname(field){ return (field == "") ? "Nie wpisano nazwiska.\\n" : "" }
  function validateUsername(field){
    if (field == "") {return "Nie wpisano nazwy użytkownika.\\n"}
    else if (field.length < 5) {return "Nazwa użytkownika musi się składać z co najmniej 5 znaków.\\n"}
    else if (/[^a-zA-Z0-9_-]/.test(field)) {return "Tylko znaki a-z, A-Z, 0-9, - oraz _ dopuszcza się w nazwie użytkownika.\\n"}
    return ""
  }
  function validatePassword(field){
    if (field == "") {return "Nie wpisano hasła.\\n"}
    else if (field.length < 6) {return "Hasło musi mieć co najmniej 6 znaków.\\n"}
    else if (! /[a-z]/.test(field) || ! /[A-Z]/.test(field) || ! /[0-9]/.test(field)) {return "W haśle musi się znaleźć co najmniej jeden znak z zakresów a-z, A-Z oraz 0-9.\\n"}
    return ""
  }
  function validateAge(field){
    if (isNaN(field)) { return "Nie podano wieku.\\n" }
    else if (field < 18 || field > 110) {return "Wiek musi się zawierać między 18 a 110.\\n"}
    return ""
  }
  function validateEmail(field)
  {
    if (field == "") {return "Nie podano adresu e-mail.\\n"}
    else if (!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field)) {return "Podany adres e-mail jest nieprawidłowy.\\n"}
    return ""
  }
</script>

</head>
<body>
  <table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee" class="signup">
    <th colspan="2" align="center">Signup Form</th>
    <tr>
      <td colspan="2">Przykro nam, w formularzu wykryto następujące błędy: <p><font color=red size=1><i>$fail</i></font></p></td>
    </tr>
    <form method="post" action="adduser.php" onsubmit="return validate(this)">
      <tr>
        <td>Imię</td>
        <td><input type="text" maxlength="32" name="forename" value="$forename"></td>
      </tr>
      <tr>
        <td>Nazwisko</td>
        <td><input type="text" maxlength="32" name="surname" value="$surname"></td>
        </tr>
      <tr>
        <td>Nazwa użytkownika</td>
        <td><input type="text" maxlength="16" name="username" value="$username"></td>
      </tr>
      <tr>
        <td>Hasło</td>
        <td><input type="text" maxlength="12" name="password" value="$password"></td>
      </tr>
      <tr>
        <td>Wiek</td>
        <td><input type="text" maxlength="3" name="age" value="$age"></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><input type="text" maxlength="64" name="email" value="$email"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Zarejestruj się"></td>
      </tr>
    </form>
  </table>
</body>
</html>
_END;
// Funkcje PHP
function validate_forename($field){
  return ($field == "") ? "Nie wprowadzono imienia<br>": "";
}
function validate_surname($field){
  return($field == "") ? "Nie wprowadzono nazwiska<br>" : "";
}
function validate_username($field){
  if ($field == "") return "Nie wprowadzono nazwy użytkownika<br>";
  else if (strlen($field) < 5) return "Nazwa użytkownika musi się składać z co najmniej 5 znaków<br>";
  else if (preg_match("/[^a-zA-Z0-9_-]/", $field)) return "Tylko znaki a-z, A-Z, 0-9, - oraz _ dopuszcza się w nazwie użytkownika<br>";
  return "";
}
function validate_password($field){
  if ($field == "") return "Nie wpisano hasła<br>";
  else if (strlen($field) < 6) return "Hasło musi mieć co najmniej 6 znaków<br>";

  else if (!preg_match("/[a-z]/", $field) || !preg_match("/[A-Z]/", $field) || !preg_match("/[0-9]/", $field)) return "W haśle musi się znaleźć co najmniej jeden znak z zakresów a-z, A-Z oraz 0-9<br>";
  return "";
}
function validate_age($field){
  if ($field == "") return "Nie podano wieku<br>";
  else if ($field < 18 || $field > 110) return "Wiek musi się zawierać między 18 a 110<br>";
  return "";
}
function validate_email($field){
  if ($field == "") return "Nie podano adresu e-mail<br>";
  else if (!((strpos($field, ".") > 0) && (strpos($field, "@") > 0)) || preg_match("/[^a-zA-Z0-9.@_-]/", $field)) return "Podany adres e-mail jest nieprawidłowy<br>";
  return "";
}
function fix_string($string){
  return htmlentities($string);
}
?>
<?php //
session_start();
echo <<<_INIT
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='jquery.mobile-1.4.5.min.css'>
<link rel='stylesheet' href='styles.css'>
<script src='javascript.js'></script>
<script src='jquery-2.2.4.min.js'></script>
<script src='jquery.mobile-1.4.5.min.js'></script>
_INIT;

require_once 'functions.php';
$userstr = 'Witaj, gościu';
if (isset($_SESSION['user'])){
  $user = $_SESSION['user'];
  $loggedin = TRUE;
  $userstr = "Zalogowany jako: $user";
}else $loggedin = FALSE;

echo <<<_MAIN
<title>Robin's Nest: $userstr</title>
</head>
<body>
<div data-role='page'>
<div data-role='header'>
<div id='logo'
class='center'>R<img id='robin' src='robin.gif'>bin's Nest</div>
<div class='username'>$userstr</div>
</div>
<div data-role='content'>
_MAIN;

if ($loggedin){
echo <<<_LOGGEDIN
<div class='center'>
<a data-role='button' data-inline='true' data-icon='home'
data-transition="slide" href='members.php?view=$user'>Strona główna</a>
<a data-role='button' data-inline='true'
data-transition="slide" href='members.php'>Członkowie</a>
<a data-role='button' data-inline='true'
data-transition="slide" href='friends.php'>Przyjaciele</a>
<a data-role='button' data-inline='true'
data-transition="slide" href='messages.php'>Wiadomości</a>
<a data-role='button' data-inline='true'
data-transition="slide" href='profile.php'>Edytuj profil</a>
<a data-role='button' data-inline='true'
data-transition="slide" href='logout.php'>Wyloguj się</a>
</div>
_LOGGEDIN;
}else{

echo <<<_GUEST
<div class='center'>
<a data-role='button' data-inline='true' data-icon='home'
data-transition='slide' href='index.php'>Strona główna</a>
<a data-role='button' data-inline='true' data-icon='plus'
data-transition="slide" href='signup.php'>Zarejestruj się</a>
<a data-role='button' data-inline='true' data-icon='check'
data-transition="slide" href='login.php'>Zaloguj się</a>
</div>
<p class='info'>(Aby skorzystać z tej aplikacji, musisz być zalogowany).</p>
_GUEST;
}
?>
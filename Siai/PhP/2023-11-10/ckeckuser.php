<?php
require_once 'functions.php';
if (isset($_POST['user'])){

  $user = sanitizeString($_POST['user']);
  $result = queryMysql("SELECT * FROM members WHERE user='$user'");
  if ($result->num_rows) echo "<span class='taken'>&nbsp;&#x2718; "."Nazwa '$user' już istnieje.</span>";
  else echo "<span class='available'>&nbsp;&#x2714; "."Nazwa '$user' jest dostępna.</span>";

}
?>
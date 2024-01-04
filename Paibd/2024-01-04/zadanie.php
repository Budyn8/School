<?php
  $login_message = '';
  $email_message = '';
  if( empty($_POST['login']) || empty($_POST['email']) ){
    $login_message = "Proszę podać login";
    $email_message = "Proszę podać email";
  }else{
    $login = $_POST['login'];
    $email = $_POST['email'];

    $login_pattern = "/^([a-z]|[A-z]|[0-9]_?){8,}$/i";
    $email_pattern = "/^([a-zA-z0-9]_?){8,}(@{1})([a-zA-Z]){1,}(\.{1})([a-zA-Z]){1,}$/i";

    if( preg_match($login_pattern, $login) == 0 ){
      $login_message = 'Login jest niepoprawny';
    }

    if( preg_match($email_pattern, $email) == 0 ){
      $email_message = 'Email jest niepoprawny';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email and password veryfication</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <script src="api.js"></script>
  <main>
    <header></header>
    <form action="" method="post">
      <section>
        <input type="text" name="login" placeholder="Login">
        <p><?php
        echo $login_message;
        ?></p>
      </section>
      <section>
        <input type="text" name="email" placeholder="Email">
        <p><?php
        echo $email_message;
        ?></p>
      </section>
      <input type="submit" value="Sprawdź">
      <input type="button" value="Test" onClick="hello()">
    </form>
    <footer>  
    <?php
      echo $email_message == "" && $login_message == "" ? "Wpisano poprawne dane" : "";
    ?>
    </footer>
  </main>

</body>
</html>
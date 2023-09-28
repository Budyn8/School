<?php

session_start();

?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <title>Zapisanie się do newslettera</title>

    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>
<?php
                        $zapisany = FALSE;
                        if(!isset($_POST['email']) || empty($_POST['email'])){
                            header('Location: index.php');
                            exit(); 
                        }
                        $email = $_POST['email'];
                        $_SESSION['email'] = $email;
                        $db_config = array(
                            'host' => 'localhost',
                            'port' => '3306',
                            'user' => 'root',
                            'pass' => '',
                            'db' => 'newsletter',
                            'db_type' => 'mysql',
                            'encoding' => 'utf-8'
                        );

                        try{
                            $dsn = $db_config['db_type'] .
                            ':host=' . $db_config['host'] .
                            ';port=' . $db_config['port'] .
                            ';encoding=' . $db_config['encoding'] .
                            ';dbname=' . $db_config['db'];

                            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                           
                            $dbh = new PDO($dsn, $db_config['user'], $db_config['pass'],$options);
                            
                            define('DB_CONNECTED', true);
                            echo '<h1>Connection success!</h1>';
                            
                            $stmt = $dbh -> prepare('SELECT email FROM users');
                            $stmt -> execute();

                            foreach($stmt as $row){
                                if($email == $row[0]) $zapisany = TRUE;
                            } 
                            $stmt -> closeCursor();

                            if(!$zapisany){
                                $stmt = $dbh -> prepare('INSERT INTO users VALUES( null , :email)');
                                $stmt -> bindValue(':email', $email, PDO::PARAM_STR);
                                $stmt -> execute();
                            }

                            $stmt -> closeCursor();
                            unset($stmt);
                            $dbh = null;
                        
                        } catch(PDOException $error){

                            die('Unable to connect: ' . $error->getMessage());
                        
                        }
                        $wiadomosc = 'Dziękujemy za zapisanie się na listę mailową naszego newslettera!';
                        ?>
    <div class="container">

        <header>
            <h1>Newsletter</h1>
        </header>

        <main>
            <article>
                <p><?php 
                if($zapisany) {
                    $_SESSION['wiadomosc'] = 'Ten email już jest zapisany';
                    header('Location: index.php');
                    exit();
                } 
                echo $wiadomosc;
                ?></p>
            </article>
        </main>

    </div>

</body>
</html>
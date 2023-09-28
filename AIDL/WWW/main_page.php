<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header></header>
    <main>
    <input type="button" value="Creating usin Js">
    <form action="#" method="post">
        
    <input type="submit" value="Creating using PhP">
 
        <?php

        $today = date("Y-m-j", time());
        $path = 'C:\xampp\htdocs\5Ti\School\Paibd\\'.$today;

        if(is_dir($path)) {
            die("<p>Plik już istnieje</p>");
        }else{
            mkdir($path);
        }

        ?>
        
    </form>
    </main>
</body>
</html>
<?php
$napis = "nie wybrałeś opcji";
if(isset($_POST['items'])) {
    $items = $_POST['items'];

    $napis = "";

    foreach($items as $item){
        $napis = $napis."<br>   - ".$item;
    }
}
ECHO <<< _END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Twój wybór: </h1>
    $napis
    <form action="#" method="post">
        <select name="items[]" size="6" multiple>
            <option value="Item 1">Item 1</option>
            <option value="Item 2">Item 2</option>
            <option value="Item 3">Item 3</option>
            <option value="Item 4">Item 3</option>
            <option value="Item 5">Item 3</option>
            <option value="Item 6">Item 6</option>
        </select>
        <input type='submit'>
    </form>
</body> 
</html>
_END;
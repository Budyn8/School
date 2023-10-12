<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Kup mieszkanie</title>
	<style>
		body,html
		{
			margin: 0px;
			padding: 0px;
		}
		#lewy
		{
			display: block;
			width: 40%;
			height: auto;
			background-color: #FF8989;
			float: left;
		}
		#prawy
		{
			width: 60%;
			background-color:  #7872D9;
			float: left;
		}
		h1
		{
			text-align: center;
		}
		main{
			display: flex;
			flex-direction: row;
			align-items: stretch;
		}
	</style>
</head>
<body>
	<main>
	<div id="lewy">
		<h1>INFORMACJE Z TABELI</h1>
		<table>
			<tr>
				<th>Nazwisko</th>
				<th>Imię</th>
				<th>Dodatkowe informacje</th>
			</tr>
		<?php 
			
			$connect = new mysqli('localhost','root','','w3schools');

			$zapytanie1 = 'SELECT LastName, FirstName, Notes FROM employees';
			$wynik1 = $connect -> query($zapytanie1);

			while($wiersz1 = $wynik1 -> fetch_row() ){
				echo '<tr><td>'.$wiersz1[1].'</td><td>'.$wiersz1[0].'</td><td>'.$wiersz1[2].'</td></tr>';
			};
		?>
		</table>
	</div>
	<div id="prawy">
		<h1>OBLICZENIA</h1>
		
		<form action="#" method='POST'>
		<?php 
		if(isset($_POST['text']) && isset($_POST['ilość']) && $_POST['text'] && $_POST['ilość']){
			$text = $_POST['text'];
			$num = $_POST['ilość'];
			$zapytanie3 = 'SELECT Price,ProductName FROM products WHERE ProductId = '.$text;
		}
		?>
		<input type="number" id="num" name="ilość"> <br> <br>

		<select name="text" id="text">

			<?php 
			$zapytanie2 = 'SELECT ProductName, ProductId FROM products';
			$wynik2 = $connect -> query($zapytanie2);

			while($wiersz2 = $wynik2 -> fetch_row()){
				echo '<option value="'.$wiersz2[1].'">'.$wiersz2[0].'</option>';
			};
			?>

		</select><br><br>

		<input type="checkbox" id="check">Zaznacz <br> <br>

		<input type="submit" value="OPERACJA" id="przycisk">

		<p id="wynik">
		<?php 
		if(isset($_POST['text']) && isset($_POST['ilość']) && $_POST['text'] && $_POST['ilość']){
		$wynik3 = $connect -> query($zapytanie3);

			while($wiersz3 = $wynik3 -> fetch_row() ){
				echo 'Koszt zamówienia: '.$num.' produktów '.$wiersz3[1].' wynosi '.($wiersz3[0]*$num);
			};
		}
		?>
		</p>
	</form>

	<form action='#' method='POST'>
		<label for="name">Imię</label>
		<textarea name="name" id="name" cols="30" rows="1"></textarea>
		<br>
		<label for="s_name">Nazwisko</label>
		<textarea name="s_name" id="s_name" cols="30" rows="1"></textarea>
		<br>
		<label for="b_date">Data Urodzenia</label>
		<textarea name="b_date" id="b_date" cols="30" rows="1"></textarea>
		<br>
		<label for="img_file">Plik ze zdjęciem</label>
		<textarea name="img_file" id="img_file" cols="30" rows="1"></textarea>
		<br>
		<label for="notes">Dodatkowe informacje</label>
		<textarea name="notes" id="notes" cols="30" rows="1"></textarea>
		<br>	
		<input type="submit" value="DODAJ PRACOWNIKA">
		<br>

		<?php 
		if(isset($_POST['name']) and isset($_POST['s_name']) and isset($_POST['b_date']) and isset($_POST['img_file']) and isset($_POST['notes'])){
			$name = $_POST['name'];
			$s_name = $_POST['s_name'];
			$b_date = $_POST['b_date'];
			$img_file = $_POST['img_file'];
			$notes = $_POST['notes'];

			$zapytanie4 = "INSERT INTO employees (EmployeeId, FirstName, LastName, BirthDate, Photo, Notes) VALUES (NULL,'$name','$s_name','$b_date','$img_file','$notes')";
			if($connect -> query($zapytanie4)){
				echo 'Pracownik został dodany.';
			}else{
				echo 'Niestety nie udało się dodać pracownika.';
			};
			$connect -> close();
		};
		
		?>
	</form>
	</div>
	</main>	
</body>
</html>
<?php 
session_start();
header("refresh:20");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Grzybobranie</title>
	<link rel="stylesheet" href="./styl5.css" />
</head>
<body>
	<div id="miniatura">
		<a href="borowik.jpg"><img src="borowik-miniatura.jpg" alt="Grzybobranie" /></a>
	</div>
	<div id="tytulowy">
		<h1>Idziemy na grzyby</h1>
	</div>
	
		<?php

		if (isset($_SESSION['id_grzyba']) == FALSE) $_SESSION['id_grzyba'] = 1;

		$id_grzyba = $_SESSION['id_grzyba'];

		$con = mysqli_connect('localhost', 'root', '', 'dane2');
		$query = "SELECT potoczna, nazwa_pliku, opis FROM grzyby WHERE id=$id_grzyba";

		$response = mysqli_query($con, $query);
		
		$full_response = mysqli_fetch_row($response);

		$nazwa = $full_response[0];
		$zdjecie = $full_response[1];
		$opis = $full_response[2];

		ECHO <<<_END
		<div id="lewy">
			<img src="./$zdjecie" alt="$nazwa">
		</div>
		<div id="prawy">
			<div id="content">
				<h1>$nazwa</h1>
				<div id="opis">$opis</div>
			</div>
		</div>

		_END;

		if ($id_grzyba >= 7) $id_grzyba = 0;
		$id_grzyba += 1;

		$_SESSION['id_grzyba'] = $id_grzyba;
		

		mysqli_close($con);
		?>
	<div id="stopka">
		<p>Autor: PESEL</p>
	</div>
</body>
</html>
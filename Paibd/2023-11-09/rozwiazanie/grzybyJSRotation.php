<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
	<link rel="stylesheet" href="./styl5Rotation.css" />
  <?php
	$con = mysqli_connect('localhost', 'root', '', 'dane2');
	$query = "SELECT potoczna, nazwa_pliku, opis FROM grzyby WHERE 1";
	$response = mysqli_query($con, $query);
	?>

	<script>
		const sleep = (delay) => new Promise((resolve) => setTimeout(resolve, delay))
		const ready = async () => {
			let response = [
				<?php
					while ($row = mysqli_fetch_row($response)){
						echo "{ nazwa : '$row[0]', zdjecie : '$row[1]', opis : '$row[2]'},";
					}; 
				?>
			]

			index = 1;
			sec = 20;

			while ( index < 6 ){

				setNewHtml( response[index] );
				index < 7 ? index++: index = 1;
				await sleep(sec*1000);

			}
		}
		
		const setNewHtml = ( record ) => {
			let img = document.querySelector("#lewy > img");
			let h1 = document.querySelector("#prawy > #content > h1");
			let opis = document.querySelector("#prawy > #content > #opis");

			img.src = "./" + record.zdjecie;
			h1.innerText = record.nazwa;
			opis.innerText = record.opis;
		}
	</script>
	<?php mysqli_close($con) ?>
</head>
<body onload="ready()">
<div id="miniatura">
		<a href="borowik.jpg"><img src="borowik-miniatura.jpg" alt="Grzybobranie" /></a>
	</div>
	<div id="tytulowy">
		<h1>Idziemy na grzyby</h1>
	</div>

	<div id="lewy">
		<img src="" alt="">
	</div>
	<div id="prawy">
		<div id="content">
			<h1></h1>
			<div id="opis"></div>
		</div>
	</div>

	<div id="stopka">
		<p>Autor: PESEL</p>
	</div>
</body>
</html>
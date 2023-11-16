<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Grzybobranie</title>
	<link rel="stylesheet" href="styl5.css" />
</head>
<body>
	<div class="dropdown">
		<div class="ondrop"><a href="#" class="dropper">Uczeń</a></div>
		<ul class="list">
				<li class="list-element"><a href="https://narwik.edu.pl/konkursy/" class="element-link">Konkursy</a></li>
				<li class="list-element"><a href="https://portal.librus.pl/rodzina/synergia/loguj" class="element-link">Dziennik</a></li>
				<li class="list-element"><a href="https://narwik.edu.pl/dzwonki/" class="element-link">Dzwonki</a></li>
				<li class="list-element"><a href="https://narwik.edu.pl/pzo/" class="element-link">PZO</a></li>
				<li class="list-element"><a href="https://narwik.edu.pl/uczen/podreczniki/" class="element-link">Podręczniki</a></li>
				<li class="list-element"><a href="https://narwik.edu.pl/egzaminy/" class="element-link">Egzaminy</a></li>
				<li class="list-element"><a href="https://narwik.edu.pl/biblioteka/" class="element-link">Biblioteka</a></li>
				<li class="list-element"><a href="https://narwik.edu.pl/szkolenia/" class="element-link">Szkolenia</a></li>
		</ul>
	</div>
	<div id="tytulowy">
		<h1>Idziemy na grzyby</h1>
	</div>
	<div id="lewy">
		<?php
		$con = mysqli_connect('localhost', 'root', '', 'dane2');
		$kw1 = "SELECT nazwa_pliku, potoczna FROM grzyby;";
		$res1 = mysqli_query($con, $kw1);
		while($tab = mysqli_fetch_row($res1)) {
			echo "<img src='$tab[0]' title='$tab[1]' />";
		}
		?>
	</div>
	<div id="prawy">
		<h2>Grzyby jadalne</h2>
		<?php
		$kw2 = "SELECT nazwa, potoczna FROM grzyby WHERE jadalny = 1;";
		$res2 = mysqli_query($con, $kw2);
		while($tab = mysqli_fetch_row($res2)) {
			echo "<p>$tab[0] ($tab[1])</p>";
		}
		?>
		<h2>Polecamy do sosów</h2>
		<?php
		$kw3 = "SELECT grzyby.nazwa, grzyby.potoczna, rodzina.nazwa FROM grzyby, rodzina, potrawy WHERE grzyby.rodzina_id = rodzina.id AND grzyby.potrawy_id = potrawy.id AND potrawy.nazwa = 'sos';";
		$res3 = mysqli_query($con, $kw3);
		echo "<ol>";
		while($tab = mysqli_fetch_row($res3)) {
			echo "<li>$tab[0] ($tab[1]), rodzina: $tab[2]</li>";
		}
		echo "</ol>";
		mysqli_close($con);
		?>
	</div>
	<div id="stopka">
		<p>Autor: PESEL</p>
	</div>
</body>
</html>
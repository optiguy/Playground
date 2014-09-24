<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<h1>Super Globals</h1>
	<h2>Alle Super globals er Multidimensionelle arrays</h2>

	<pre>
		<?php
			print_r($GLOBALS); //Indholder alle Globals sat i systemet
			print_r($_SERVER); //Indeholder oplysninger om selve serveren
			print_r($_GET); //Get henter værdier i URL adressen
			print_r($_POST); //Post er værdier der bliver postet til siden
			print_r($_FILES); //Files er filer der bliver uploaded igennem en multipart/form-data form
			print_r($_COOKIE); //Cookies er værdier gemt lokalt på brugerens computer
			print_r($_SESSION); //Session er værdier gemt lokalt i brugeres session (browser)
			print_r($_REQUEST); //er en samling af GET og POST værdier. (Typsik ikke rbugt pga. sikkerhed)
			print_r($_ENV); //Environment er debug værdier vi selv kan sætte og gemme.
		?>	
	</pre>

	<h2>Global variabler er vædier vi selv sætter og er tilgængelige i hele siden's kontekst.</h2>
	<h2>Vi kan bruge både global i klasse 'global $a' eller sætte dem i $GLOBALS</h2>

</body>
</html>
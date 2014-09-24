<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<pre>
<?php
	//løkker : foreach, while, for
	
	//for og foreach kan det samme, men foreach er nemmere at skrive.
	// 3 parametre : hvor skal vi starte ($i = 0), hvor mange gange ($i<10), for hver gang($i++)
	// Typisk til array hvor man så tæller hvor mange rækker der er i array'et. f.eks: $i < count($array)
	for ($i=0; $i < 10; $i++) { 
		// hent værdien ud : $array[$i]
		echo $i;
	}

echo '<br>';

	//Kan det samme som for, men splitter array op i værdier og navne.
	//God til associative arrays, da vi får navnet på feltet i array'et 
	$array = array('Æbler','bananer','pære','Kiwi','Fisk');
	foreach ($array as $key => $value) {
		echo 'Nøgle:'.$key. ' - ';;
		echo 'værdi:'.$value . '<br>';
	}

echo '<br>';

	//Kan det samme som for, men splitter array op i værdier og navne.
	//God til associative arrays, da vi får navnet på feltet i array'et 
	$array = array('username'=>'Bjarke','age'=>30,'mail'=>'bbr@rts.dk');
	foreach ($array as $key => $value) {
		echo 'Nøgle:'.$key. ' - ';
		echo 'værdi:'.$value . '<br>';
	}

echo '<br>';

/*
	//kører så længe der er indhold, eller så længe noget er sandt.
	// skal have ne true false værdi.
	while ('betingelse') {
		# code...
	}

	//så længe der er rækker der kan hentes ud fra $result
	while ($row = mysqli_fetch_assoc($result)) {
		# code...
	}
*/
	//Brug while som en for
	$i = 0;
	while ($i < 10) {
		echo $i;
		$i++;

	}
?>
</pre>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<pre><?php
			
			//Alle array funktioner : http://php.net/manual/en/ref.array.php
			
			//fladt array med enkelte værider
			$frugtkurv = array('æbler','pære','bananer','kiwi');

			$frugtkurv[] = 'Chokolade'; //Tilføjer et elemetnt i slutningen af array'et
			array_push($frugtkurv, 'fisk'); //Tilføjer et elemetnt i slutningen af array'et
			
			$num_array = array(
				0 => 'æbler',
				1 => 'pære',
				2 => 'bananer',
				3 => 'kiwi',
			);

			$ass_array = array(
				'username' => 'bjarke',
				'mail' => 'bbr@rts.dk'
			);
			
			$name = 'bjarke';
			$age = 30;
			$grades = array('it'=>12,'Web2'=>10);
			/* Istedet for at oprette et array og koble værdierne sammen
			$result = array(
				'name' => $name,
				'age' => $age,
				'grades' => $grades
				); */
			//Kan vi bruge compact til at oprette et array ud fra variabel navne i scope'et.
			print_r(compact('name','age','grades'));

			$array_keys = array('navn1','navn2','navn3'); //Sæt af navne
			$array_values = array('værdi1','værdi2','værdi3'); //Sæt af værdier
			print_r(array_combine($array_keys,$array_values)); // Kombiner navne og værdier

			print_r(array_keys($ass_array)); //Hent alle nøgler i et array
			print_r(array_values($ass_array)); //hent alle værdier i et array

			$array1 = array(
				'test1'=>'værdi1',
				'test2'=>'værdi2',
				'test3'=>'værdi3',
				'test4'=>'værdi4',
				);
			$array2 = array(
				'navn1'=>'felt1',
				'navn2'=>'felt2',
				'navn3'=>'felt3',
				'navn4'=>'felt4',
				);
			print_r( array_merge($array1,$array2) ); //Flet to array's

			unset($ass_array['username']); //Unset variabel - Virker også på array's

			var_dump($frugtkurv); //Giver alle informationer omkring en variabel (Inkl. datatyper)
			var_export($frugtkurv); //Giver alle værdier i en variabel
			print_r($frugtkurv); //Printer alt indhold af et array
			
			$json = json_encode($ass_array);
			echo $json;
			var_dump(json_decode($json));

			//Tjekker på om det er et array
			if( is_array($frugtkurv) )
			{
				echo "Frugtkurv er et array!";
			}

			//Tjekker på om en værdi findes i et array
			if( in_array('kiwi', $frugtkurv) )
			{
				echo "Der er kiwi i kurven!";
			}

			//tjekker på om en nøgle findes i et array
			if ( array_key_exists('username', $ass_array)) {
				echo 'Feltet findes';
			}


	?></pre>
</body>
</html>
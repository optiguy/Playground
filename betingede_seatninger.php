<pre>
	<?php 
	

	//betingede sætninger : If, ifelse, else, switch case

	//betingelse for hvad der skal sker. Skal have true/false
	if ('condition') {
		# koden som skal udføres hvis betingelsen er sand...
	}

	// If/else
	if ('condition') {
		# koden som skal udføres hvis betingelsen er sand...
	} else {
		# Koden som skal udføres hvis betingelsen ikke er sand.
	}

	//If/elseIf
	if ('condition') {
		# koden som skal udføres hvis betingelsen er sand...
	} elseif('condition') {
		# Hvis første betingelse ikke er sand men...
		# Betingelsen i næste if er sand, bliver koden udført
	}

	//If/elseIf/else
	if ('condition') {
		# koden som skal udføres hvis betingelsen er sand...
	} elseif('condition') {
		# Hvis første betingelse ikke er sand men...
		# Betingelsen i næste if er sand, bliver koden udført
	} else {
		# Hvis ingen af ovenstående betingelser er sande.
	}

	//Switch case - for betinede sætninger som er længere en bare en alm. if/elseif/else statement
	switch ('variabel') {
		case 'værdi': //Svarer til if($variabel == 'værdi')
			# koden som skal udføres, hvis varibalen har samme værdig som denne case
			break; //break slutter hver case
		case 'værdi2': //Svarer til elseif($variabel == 'værdi')
			# koden som skal udføres, hvis varibalen har samme værdig som denne case
			break;
		case 'værdi2': //Svarer til elseif($variabel == 'værdi')
			continue; //stopper casen
			break;
		default: //Svarer til else
			# koden som skal udføres, hvis varibalen har samme værdig som denne case
			break;
	}

	//Der er mange flere shorthanded If sætninger
	// Kig evt : http://davidwalsh.name/php-ternary-examples
	$name = ( isset($_SESSION['name']) ) ? $_SESSION['name'] : 'Gæst' ;
	?>
</pre>
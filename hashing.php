<?php

	echo $password = '1234';
	
	//hash password
  	if(defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
    	echo "CRYPT_BLOWFISH is enabled!";
    	$password_hash = crypt($password);
		//DES (Old/OK) : CrC3BP3gjcv8E
		//MD5 (New/Good): $1$j9fuc/za$JCN3NPoTGjHvsAo6x7yDl1
  	}

  	//Check password
  	$password_entered = '1234';
	if(crypt($password_entered, $password_hash) == $password_hash) {
		echo 'password is correct!';
	}

	// http://www.the-art-of-web.com/php/blowfish-crypt/
	// Original PHP code by Chirp Internet: www.chirp.com.au
  	// Please acknowledge use of this code by including this header.
	function better_crypt($input, $rounds = 7)
	{
		$salt = "";
		$salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
		for($i=0; $i < 22; $i++) {
		  $salt .= $salt_chars[array_rand($salt_chars)];
		}
		//Result : $2a$07$vY6x3F45HQSAiOs6N5wMuOwZQ7pUPoSUTBkU/DEF/YNQ2uOZflMIa
		return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
	}

	$password2 = better_crypt($password);
	if(crypt('1234', $password2) == $password2) {
		echo 'password is correct!';
	}
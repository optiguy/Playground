<?php
//Mere dokumentation her : 
//http://php.net/manual/en/ref.session.php

// $_SESSION - Super Global og også et array
// Bruges til Flash data
// Session Hijacking

session_start(); //Starter session
echo session_id(); //Udskriv brugerens session id

$_SESSION['test'] = 'Hej Verden!';
$_SESSION['test2'] = 'Hej Verden!';
$_SESSION['errors'] = array(
	'navn'=>'værdi1',
	'navn2'=>'værdi2',
	'navn3'=>'værdi3',
	'navn4'=>'værdi4',
	);

echo $_SESSION['test'];

session_unset(); //Delete All

unset($_SESSION['test']); //Delete one session

print_r($_SESSION);

	
